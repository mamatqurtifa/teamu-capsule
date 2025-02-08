<?php

namespace App\Http\Controllers;

use App\Models\Capsule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class PublicCapsuleController extends Controller
{
    public function __construct()
    {
        // Simplify middleware - no need for double auth check
        $this->middleware(['auth', 'web']);
    }

    /**
     * Display a listing of public capsules
     */
    public function index()
    {
        try {
            // Add logging to debug auth issues
            Log::info('Public capsules access attempt', [
                'user_id' => Auth::id(),
                'user_name' => Auth::user()->name,
                'timestamp' => now()->format('Y-m-d H:i:s')
            ]);

            $capsules = Capsule::query()
                ->where('capsule_type', 'public')
                ->with('user') // Eager load user relationship
                ->orderBy('created_at', 'desc')
                ->paginate(12);

            return view('capsules.public.index', [
                'capsules' => $capsules,
                'currentTime' => Carbon::now('Asia/Jakarta'),
            ]);

        } catch (\Exception $e) {
            Log::error('Error in public capsules index', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);
            
            return back()
                ->with('error', 'Unable to load public capsules. Please try again.');
        }
    }

    /**
     * Display the specified public capsule
     */
    public function show(Capsule $capsule)
    {
        try {
            // Validate capsule type
            if ($capsule->capsule_type !== 'public') {
                Log::warning('Non-public capsule access attempt', [
                    'capsule_id' => $capsule->id,
                    'user_id' => Auth::id()
                ]);
                abort(404, 'Capsule not found or not public');
            }

            // Check if capsule is locked
            if ($capsule->isLocked()) {
                Log::info('Locked capsule access attempt', [
                    'capsule_id' => $capsule->id,
                    'user_id' => Auth::id()
                ]);
                return back()->with('error', 'This time capsule is not yet ready to be opened.');
            }

            return view('capsules.public.show', [
                'capsule' => $capsule,
                'currentTime' => Carbon::now('Asia/Jakarta')
            ]);

        } catch (\Exception $e) {
            Log::error('Error in public capsule show', [
                'error' => $e->getMessage(),
                'capsule_id' => $capsule->id,
                'user_id' => Auth::id()
            ]);
            
            return back()
                ->with('error', 'Unable to load the capsule. Please try again.');
        }
    }

    /**
     * Filter public capsules
     */
    public function filter(Request $request)
    {
        try {
            $query = Capsule::query()
                ->where('capsule_type', 'public')
                ->with('user');

            // Apply sorting
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

            // Apply status filter with proper timezone handling
            if ($request->has('status')) {
                $now = Carbon::now('Asia/Jakarta');
                if ($request->status === 'locked') {
                    $query->where('future_time', '>', $now);
                } elseif ($request->status === 'unlocked') {
                    $query->where('future_time', '<=', $now);
                }
            }

            // Apply search with proper escaping
            if ($request->filled('search')) {
                $searchTerm = '%' . addcslashes($request->search, '%_') . '%';
                $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'like', $searchTerm)
                      ->orWhere('text', 'like', $searchTerm)
                      ->orWhereHas('user', function($userQuery) use ($searchTerm) {
                          $userQuery->where('name', 'like', $searchTerm);
                      });
                });
            }

            $capsules = $query->paginate(12)->appends(request()->query());

            if ($request->ajax()) {
                return response()->json([
                    'html' => view('capsules.public._capsules_list', [
                        'capsules' => $capsules,
                        'currentTime' => Carbon::now('Asia/Jakarta')
                    ])->render(),
                    'hasMorePages' => $capsules->hasMorePages(),
                ]);
            }

            return view('capsules.public.index', [
                'capsules' => $capsules,
                'currentTime' => Carbon::now('Asia/Jakarta')
            ]);

        } catch (\Exception $e) {
            Log::error('Error in public capsules filter', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'request' => $request->all()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'Unable to filter capsules. Please try again.'
                ], 500);
            }
            
            return back()
                ->with('error', 'Unable to filter capsules. Please try again.');
        }
    }
}