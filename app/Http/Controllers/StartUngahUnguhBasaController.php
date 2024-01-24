<?php

namespace App\Http\Controllers;

use App\Models\UngahUnguhBasa;
use App\Models\UngahUnguhBasaGame;
use Illuminate\Http\Request;

class StartUngahUnguhBasaController extends Controller
{

    public function material(UngahUnguhBasa $ungahUnguhBasa)
    {
        return view('start_ungah_unguh_basa_game.material', [
            'ungahUnguhBasa' => $ungahUnguhBasa,
        ]);
    }

    public function play(UngahUnguhBasa $ungahUnguhBasa)
    {
        $ungahUnguhBasaGame = UngahUnguhBasaGame::where('ungah_unguh_basa_id', $ungahUnguhBasa->id)
            ->paginate(1);

        return view('start_ungah_unguh_basa_game.play', [
            'ungahUnguhBasa' => $ungahUnguhBasa,
            'ungahUnguhBasaGame' => $ungahUnguhBasaGame,
        ]);
    }
}
