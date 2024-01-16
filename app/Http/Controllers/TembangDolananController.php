<?php

namespace App\Http\Controllers;

use App\Models\TembangDolanan;
use Illuminate\Http\Request;

class TembangDolananController extends Controller
{
    public function index()
    {
        $tembangs = TembangDolanan::all();
        return view('tembang_dolanan.index', compact('tembangs'));
    }

    public function create()
    {
        return view('tembang_dolanan.create');
    }

    public function store(Request $request)
    {
        $tembang = TembangDolanan::create($request->all());

        // Handle file uploads (background image)
        if ($request->hasFile('background')) {
            $backgroundPath = $request->file('background')->store('backgrounds', 'public');
            $tembang->update(['background' => $backgroundPath]);
        }

        return redirect()->route('tembang_dolanan.index')->with('success', 'Tembang Dolanan created successfully.');
    }

    public function show(TembangDolanan $tembang)
    {
        return view('tembang_dolanan.show', compact('tembang'));
    }

    public function edit(TembangDolanan $tembang)
    {
        return view('tembang_dolanan.edit', compact('tembang'));
    }

    public function update(Request $request, TembangDolanan $tembang)
    {
        $tembang->update($request->all());

        // Handle file uploads (background image)
        if ($request->hasFile('background')) {
            $backgroundPath = $request->file('background')->store('backgrounds', 'public');
            $tembang->update(['background' => $backgroundPath]);
        }

        return redirect()->route('tembang_dolanan.index')->with('success', 'Tembang Dolanan updated successfully.');
    }

    public function destroy(TembangDolanan $tembang)
    {
        $tembang->delete();
        return redirect()->route('tembang_dolanan.index')->with('success', 'Tembang Dolanan deleted successfully.');
    }
}
