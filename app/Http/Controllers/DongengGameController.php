<?php

namespace App\Http\Controllers;

use App\Models\Dongeng;
use App\Models\DongengGame;
use Illuminate\Http\Request;

class DongengGameController extends Controller
{
    public function index(Dongeng $dongeng)
    {
        $dongengGames = DongengGame::where('dongeng_id', $dongeng->id)->get();
        return view('dongeng_game.index', [
            'dongeng' => $dongeng,
            'dongengGames' => $dongengGames,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $searchResults = Dongeng::where('title', 'like', '%' . $keyword . '%')->get();

        return response()->json($searchResults);
    }

    public function create(Dongeng $dongeng)
    {
        return view('dongeng_game.create', [
            'dongeng' => $dongeng,
        ]);
    }

    public function store(Request $request, Dongeng $dongeng)
    {
        $validatedData = $request->validate([
            'dongeng_id' => 'required|exists:dongeng,id',
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        DongengGame::create($validatedData);

        return redirect()->route('dongeng_game.index', ['dongeng'=>$dongeng])->with('success', 'Game question created successfully');
    }

    public function show(DongengGame $dongengGame)
    {
        return view('dongeng_game.show', compact('dongengGame'));
    }

    public function edit(DongengGame $dongengGame)
    {
        return view('dongeng_game.edit', compact('dongengGame'));
    }

    public function update(Request $request, DongengGame $dongengGame)
    {
        $validatedData = $request->validate([
            'dongeng_id' => 'required|exists:dongeng,id',
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $dongengGame->update($validatedData);

        return redirect()->route('dongeng_game.index')->with('success', 'Game question updated successfully');
    }

    public function destroy(DongengGame $dongengGame)
    {
        $dongeng = $dongengGame->dongeng;
        $dongengGame->delete();
        return redirect()->route('dongeng_game.index', ['dongeng' => $dongeng])->with('success', 'Game question deleted successfully');
    }
}
