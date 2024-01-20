<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TembangDolananGame;
use App\Models\TembangDolanan;
use Illuminate\Support\Facades\DB;

class TembangDolananGameController extends Controller
{
    public function index(TembangDolanan $tembangDolanan)
    {
        $games = TembangDolananGame::where('tembang_dolanan_id', $tembangDolanan->id)->get();
        foreach ($games as $game) {
            $decoded = json_decode($game->options);
            $decoded = array_combine(range('a', 'e'), $decoded);
            $game->options = $decoded;
        }

        return view('tembang_dolanan_game.index', [
            'tembangDolanan' => $tembangDolanan,
            'games' => $games,
        ]);
    }

    public function create(TembangDolanan $tembangDolanan)
    {
        return view('tembang_dolanan_game.create', [
            'tembangDolanan' => $tembangDolanan,
        ]);
    }

    public function store(Request $request, TembangDolanan $tembangDolanan)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'options' => 'required|array', // Ensure options is an array
        ]);

        $options = $request->input('options');
        $jsonOptions = json_encode($options);

        // Save the data to the database
        DB::transaction(function () use ($tembangDolanan, $request, $jsonOptions) {
            TembangDolananGame::create([
                'tembang_dolanan_id' => $tembangDolanan->id,
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
                'options' => $jsonOptions,
            ]);
        });

        return redirect()->route('tembang_dolanan_game.index', [
            'tembangDolanan' => $tembangDolanan,
        ])->with('success', 'Game created successfully.');
    }

    public function show(TembangDolananGame $game)
    {
        return view('tembang_dolanan_game.show', compact('game'));
    }

    public function edit(TembangDolananGame $game, TembangDolanan $tembangDolanan)
    {
        return view('tembang_dolanan_game.edit', compact('game', 'tembangDolanan'));
    }

    public function update(Request $request, TembangDolananGame $game, TembangDolanan $tembangDolanan)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'options' => 'required',
        ]);

        $request->merge([
            'tembang_dolanan_id' => $tembangDolanan->id,
            'options' => json_encode($request->options),
        ]);


        $game->update($request->all());

        return redirect()->route('tembang_dolanan_game.index')->with('success', 'Game updated successfully.');
    }

    public function destroy(TembangDolananGame $game)
    {
        $tembangDolanan = $game->tembang_dolanan_id;
        $game->delete();

        return redirect()->route('tembang_dolanan_game.index', [
            'tembangDolanan' => $tembangDolanan,
        ])->with('success', 'Game deleted successfully.');
    }
}
