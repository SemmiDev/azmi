<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // Index method to display a list of students
    public function index()
    {
        $siswaList = User::where('role', 'siswa')->get();
        return view('siswa.index', compact('siswaList'));
    }

    // Show method to display details of a student
    public function show($id)
    {
        $siswa = User::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    // Create method to show the create form
    public function create()
    {
        return view('siswa.create');
    }

    // Store method to handle the creation process
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|string',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
            'no_identitas' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'siswa',
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'no_identitas' => $request->no_identitas,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa created successfully');
    }

    // Edit method to show the edit form
    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    // Update method to handle the update process
    public function update(Request $request, $id)
    {
        $siswa = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
            'no_identitas' => 'required|string|max:255',
        ]);

        $siswa->update([
            'name' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'no_identitas' => $request->no_identitas,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa updated successfully');
    }

    // Destroy method to handle the deletion process
    public function destroy($id)
    {
        $siswa = User::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa deleted successfully');
    }
}
