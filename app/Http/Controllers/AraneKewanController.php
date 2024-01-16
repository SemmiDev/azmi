<?php

namespace App\Http\Controllers;

use App\Models\AraneKewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AraneKewanController extends Controller
{
    public function index()
    {
        $araneKewans = AraneKewan::all();
        return view('arane_kewan.index', compact('araneKewans'));
    }

    public function create()
    {
        return view('arane_kewan.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'voice' => 'nullable|mimes:mp3|max:2048',
        ]);

        // Upload background image
        $backgroundPath = $request->file('background')->store('backgrounds', 'public');

        // Upload voice file
        $voicePath = $request->file('voice')->store('voices', 'public');

        // Create a new AraneKewan instance
        AraneKewan::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'background' => $backgroundPath,
            'voice' => $voicePath,
        ]);

        return redirect()->route('arane_kewan.index')->with('success', 'Arane Kewan created successfully');
    }

    public function show(AraneKewan $araneKewan)
    {
        return view('arane_kewan.show', compact('araneKewan'));
    }

    public function edit(AraneKewan $araneKewan)
    {
        return view('arane_kewan.edit', compact('araneKewan'));
    }

    public function update(Request $request, AraneKewan $araneKewan)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'voice' => 'nullable|mimes:mp3|max:2048',
        ]);

        // Update fields
        $araneKewan->title = $validatedData['title'];
        $araneKewan->description = $validatedData['description'];

        // Check if a new background file is provided
        if ($request->hasFile('background')) {
            // Delete the old background file
            Storage::disk('public')->delete($araneKewan->background);

            // Upload the new background file
            $backgroundPath = $request->file('background')->store('backgrounds', 'public');
            $araneKewan->background = $backgroundPath;
        }

        // Check if a new voice file is provided
        if ($request->hasFile('voice')) {
            // Delete the old voice file
            Storage::disk('public')->delete($araneKewan->voice);

            // Upload the new voice file
            $voicePath = $request->file('voice')->store('voices', 'public');
            $araneKewan->voice = $voicePath;
        }

        // Save the changes
        $araneKewan->save();

        return redirect()->route('arane_kewan.index')->with('success', 'Arane Kewan updated successfully');
    }

    public function destroy(AraneKewan $araneKewan)
    {
        // Delete the background and voice files
        Storage::disk('public')->delete($araneKewan->background);
        Storage::disk('public')->delete($araneKewan->voice);

        // Delete the AraneKewan instance
        $araneKewan->delete();

        return redirect()->route('arane_kewan.index')->with('success', 'Arane Kewan deleted successfully');
    }
}
