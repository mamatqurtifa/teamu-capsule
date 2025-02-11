<?php

namespace App\Http\Controllers;

use App\Models\Capsule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapsuleController extends Controller
{
    public function index()
    {
        $capsules = Capsule::where('user_id', Auth::id())->latest()->get();
        return view('capsules.index', compact('capsules'));
    }

    public function publicIndex(Request $request)
    {
        $query = Capsule::query()
            ->where('capsule_type', 'public')
            ->with('user')
            ->orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('text', 'like', "%{$searchTerm}%")
                  ->orWhereHas('user', function($userQuery) use ($searchTerm) {
                      $userQuery->where('name', 'like', "%{$searchTerm}%");
                  });
            });
        }

        $capsules = $query->paginate(12);
        $currentTime = Carbon::now();

        return view('capsules.public.index', compact('capsules', 'currentTime'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,bmp,webp,svg,tiff,ico,heic,heif,raw,cr2,nef,arw,dng,raf|max:10240',
            'capsule_type' => 'required|in:public,private',
            'future_time' => 'required|date|after:now',
        ]);

        $imagePath = $request->file('image')->store('capsules', 'public');

        Capsule::create([
            'title' => $validated['title'],
            'text' => $validated['text'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'capsule_type' => $request->input('capsule_type'),
            'future_time' => $validated['future_time'],
        ]);

        return redirect()->route('capsules.index')->with('success', 'Capsule created successfully.');
    }

    public function show(Capsule $capsule)
    {
        if ($capsule->user_id !== Auth::id() && $capsule->capsule_type !== 'public') {
            abort(403);
        }

        if (!$this->isCapsuleReadyToOpen($capsule)) {
            return back()->with('error', 'This time capsule is not yet ready to be opened.');
        }

        return view('capsules.show', compact('capsule'));
    }

    public function filter(Request $request)
    {
        $query = Capsule::query();

        if ($request->input('view') === 'public') {
            $query->where('capsule_type', 'public');
        } else {
            $query->where('user_id', Auth::id());
        }

        $sort = $request->input('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'opening_soon':
                $query->orderBy('future_time', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        if ($request->has('status')) {
            $now = Carbon::now();
            if ($request->status === 'locked') {
                $query->where('future_time', '>', $now);
            } elseif ($request->status === 'unlocked') {
                $query->where('future_time', '<=', $now);
            }
        }

        if ($request->has('type')) {
            $query->where('capsule_type', $request->type);
        }

        $capsules = $query->with('user')->paginate(12);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('capsules._capsules_list', compact('capsules'))->render(),
                'hasMorePages' => $capsules->hasMorePages(),
            ]);
        }

        return back();
    }

    protected function isCapsuleReadyToOpen(Capsule $capsule): bool
    {
        return Carbon::now()->gte($capsule->future_time);
    }

    public function getStatus(Capsule $capsule): array
    {
        $now = Carbon::now();
        $futureTime = Carbon::parse($capsule->future_time);

        if ($now->lt($futureTime)) {
            $diff = $now->diff($futureTime);
            
            if ($diff->days > 30) {
                return [
                    'status' => 'Locked',
                    'class' => 'bg-red-100 text-red-800'
                ];
            } else if ($diff->days > 7) {
                return [
                    'status' => 'Opening Soon',
                    'class' => 'bg-yellow-100 text-yellow-800'
                ];
            } else {
                return [
                    'status' => 'Opening Very Soon',
                    'class' => 'bg-green-100 text-green-800'
                ];
            }
        }

        return [
            'status' => 'Unlocked',
            'class' => 'bg-green-100 text-green-800'
        ];
    }
}