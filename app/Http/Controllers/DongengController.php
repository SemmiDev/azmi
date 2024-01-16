<?php

namespace App\Http\Controllers;

use App\Models\Dongeng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DongengController extends Controller
{
    public function index()
    {
        $dongengs = Dongeng::all();
        return view('dongeng.index', compact('dongengs'));
    }

    public function create()
    {
        return view('dongeng.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'story' => 'required|string',
            'background' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'voice' => 'nullable|mimes:mp3',
        ]);

        // Upload background image
        $backgroundPath = $request->file('background')->store('backgrounds', 'public');

        // Upload voice file
        $voicePath = $request->file('voice')->store('voices', 'public');

        // Create a new Dongeng instance
        Dongeng::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'story' => $validatedData['story'],
            'background' => $backgroundPath,
            'voice' => $voicePath,
        ]);

        return redirect()->route('dongeng.index')->with('success', 'Dongeng created successfully');
    }

    public function show(Dongeng $dongeng)
    {
        return view('dongeng.show', compact('dongeng'));
    }

    public function edit(Dongeng $dongeng)
    {
        return view('dongeng.edit', compact('dongeng'));
    }

    public function update(Request $request, Dongeng $dongeng)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'story' => 'required|string',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'voice' => 'nullable|mimes:mp3|max:2048',
        ]);

        // Update fields
        $dongeng->title = $validatedData['title'];
        $dongeng->description = $validatedData['description'];
        $dongeng->story = $validatedData['story'];

        // Check if a new background file is provided
        if ($request->hasFile('background')) {
            // Delete the old background file
            Storage::disk('public')->delete($dongeng->background);

            // Upload the new background file
            $backgroundPath = $request->file('background')->store('backgrounds', 'public');
            $dongeng->background = $backgroundPath;
        }

        // Check if a new voice file is provided
        if ($request->hasFile('voice')) {
            // Delete the old voice file
            Storage::disk('public')->delete($dongeng->voice);

            // Upload the new voice file
            $voicePath = $request->file('voice')->store('voices', 'public');
            $dongeng->voice = $voicePath;
        }

        // Save the changes
        $dongeng->save();

        return redirect()->route('dongeng.index')->with('success', 'Dongeng updated successfully');
    }

    public function destroy(Dongeng $dongeng)
    {
        // Delete the background and voice files
        Storage::disk('public')->delete($dongeng->background);
        Storage::disk('public')->delete($dongeng->voice);

        // Delete the Dongeng instance
        $dongeng->delete();

        return redirect()->route('dongeng.index')->with('success', 'Dongeng deleted successfully');
    }
}
