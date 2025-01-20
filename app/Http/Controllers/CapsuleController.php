<?php

namespace App\Http\Controllers;

use App\Models\Capsule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapsuleController extends Controller
{
    public function index()
    {
        $capsules = Capsule::where('user_id', Auth::id())->latest()->get();
        return view('capsule-post.index', compact('capsules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'capsule_type' => 'required|in:public,private',
            'future_time' => 'required|date|after:now',
        ]);

        $imagePath = $request->file('image')->store('capsules', 'public');

        Capsule::create([
            'title' => $validated['title'],
            'text' => $validated['text'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'capsule_type' => $validated['capsule_type'],
            'future_time' => $validated['future_time'],
        ]);

        return redirect()->route('capsule-post.index')->with('success', 'Capsule created successfully.');
    }
}
