<?php

namespace App\Http\Controllers;

use App\Models\Capsule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapsuleController extends Controller
{
    public function index()
    {
        $capsules = Capsule::where('user_id', Auth::id())->get();
        return view('capsules.index', compact('capsules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('capsules', 'public');

        Capsule::create([
            'title' => $validated['title'],
            'text' => $validated['text'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('capsules.index')->with('success', 'Capsule created successfully.');
    }
}
