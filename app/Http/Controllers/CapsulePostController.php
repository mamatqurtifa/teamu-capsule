<?php

namespace App\Http\Controllers;

use App\Models\Capsule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapsulePostController extends Controller
{
    public function index()
    {
        // Ambil semua capsule milik user yang sedang login
        $capsules = Capsule::where('user_id', Auth::id())->latest()->get();
        return view('capsule-post.index', compact('capsules'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan gambar ke storage
        $imagePath = $request->file('image')->store('capsules', 'public');

        // Simpan data ke database
        Capsule::create([
            'title' => $validated['title'],
            'text' => $validated['text'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('capsule-post.index')->with('success', 'Capsule created successfully.');
    }
}
