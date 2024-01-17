<?php

namespace App\Http\Controllers;

use App\Models\UngahUnguhBasa;
use Illuminate\Http\Request;

class UngahUnguhBasaController extends Controller
{
    public function index()
    {
        $ungahUnguhBasas = UngahUnguhBasa::all();
        return view('ungah_unguh_basa.index', compact('ungahUnguhBasas'));
    }

    public function create()
    {
        return view('ungah_unguh_basa.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'text' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        UngahUnguhBasa::create($validatedData);

        return redirect()->route('ungah_unguh_basa.index')->with('success', 'Ungah Unguh Basa created successfully');
    }

    public function show(UngahUnguhBasa $ungahUnguhBasa)
    {
        return view('ungah_unguh_basa.show', compact('ungahUnguhBasa'));
    }

    public function edit(UngahUnguhBasa $ungahUnguhBasa)
    {
        return view('ungah_unguh_basa.edit', compact('ungahUnguhBasa'));
    }

    public function update(Request $request, UngahUnguhBasa $ungahUnguhBasa)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'text' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        $ungahUnguhBasa->update($validatedData);

        return redirect()->route('ungah_unguh_basa.index')->with('success', 'Ungah Unguh Basa updated successfully');
    }

    public function destroy(UngahUnguhBasa $ungahUnguhBasa)
    {
        $ungahUnguhBasa->delete();

        return redirect()->route('ungah_unguh_basa.index')->with('success', 'Ungah Unguh Basa deleted successfully');
    }
}
