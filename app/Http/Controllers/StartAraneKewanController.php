<?php

namespace App\Http\Controllers;

use App\Models\AraneKewan;

class StartAraneKewanController extends Controller
{
    public function material()
    {
        $daftarArane = AraneKewan::all();

        return view('start_arane_kewan.material', [
            'daftarArane' => $daftarArane,
        ]);
    }

    public function play()
    {
        $daftarArane = AraneKewan::all();
        $daftarAraneShuffle = AraneKewan::all()->shuffle();

        session(['daftarAraneShuffle' => $daftarAraneShuffle]);

        return view('start_arane_kewan.play', [
            'daftarArane' => $daftarArane,
            'daftarAraneShuffle' => $daftarAraneShuffle,
        ]);
    }

    public function play2()
    {
        $daftarArane = AraneKewan::all();
        $daftarAraneShuffle = session('daftarAraneShuffle');

        return view('start_arane_kewan.play2', [
            'daftarArane' => $daftarArane,
            'daftarAraneShuffle' => $daftarAraneShuffle,
        ]);
    }
}
