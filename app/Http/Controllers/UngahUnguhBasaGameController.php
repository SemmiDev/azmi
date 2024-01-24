<?php

namespace App\Http\Controllers;

use App\Models\UngahUnguhBasa;
use App\Models\UngahUnguhBasaGame;
use Illuminate\Http\Request;

class UngahUnguhBasaGameController extends Controller
{

    public function index(UngahUnguhBasa $ungahUnguhBasa)
    {
        $ungahUnguhBasaGames = UngahUnguhBasaGame::where('ungah_unguh_basa_id', $ungahUnguhBasa->id)->get();
        foreach ($ungahUnguhBasaGames as $ungahUnguhBasaGame) {
            $decoded = json_decode($ungahUnguhBasaGame->options);
            $ungahUnguhBasaGame->options = $decoded;
        }

        return view('ungah_unguh_basa_game.index', [
            'ungahUnguhBasa' => $ungahUnguhBasa,
            'ungahUnguhBasaGames' => $ungahUnguhBasaGames,
        ]);
    }

    public function create(UngahUnguhBasa $ungahUnguhBasa)
    {
        return view('ungah_unguh_basa_game.create', [
            'ungahUnguhBasa' => $ungahUnguhBasa,
        ]);
    }

    public function store(Request $request, UngahUnguhBasa $ungahUnguhBasa)
    {
        $request->validate([
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'options' => 'required|array', // Ensure options is an array
        ]);

        $options = $request->input('options');
        $jsonOptions = json_encode($options);

        // UPLOAD
        $image1Path = $request->file('image1')->store('ungah_unguh_basa_game', 'public');
        $image2Path = $request->file('image2')->store('ungah_unguh_basa_game', 'public');

        // Save the data to the database
        UngahUnguhBasaGame::create([
            'question' => $request->input('question'),
            'ungah_unguh_basa_id' => $ungahUnguhBasa->id,
            'answer1' => $request->input('answer1'),
            'answer2' => $request->input('answer2'),
            'image1' => $image1Path,
            'image2' => $image2Path,
            'options' => $jsonOptions,
        ]);

        return redirect()->route('ungah_unguh_basa_game.index', [
            'ungahUnguhBasa' => $ungahUnguhBasa,
        ])->with('success', 'Game created successfully.');
    }

    public function destroy(UngahUnguhBasaGame $ungahUnguhBasaGame)
    {
        $ungahUnguhBasa = UngahUnguhBasa::find($ungahUnguhBasaGame->ungah_unguh_basa_id);
        $ungahUnguhBasaGame->delete();

        return redirect()->route('ungah_unguh_basa_game.index', [
            'ungahUnguhBasa' => $ungahUnguhBasa,
        ])->with('success', 'Game deleted successfully.');
    }

}
