<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CapsuleController;
use App\Http\Controllers\CapsulePostController;
use App\Http\Controllers\PublicCapsuleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;

// Configure Rate Limiters
RateLimiter::for('global', function (Request $request) {
    return Limit::perMinute(45) // 45 requests per minute globally
        ->by($request->user()?->id ?: $request->ip())
        ->response(function () {
            return response()->view('errors.429', [], 429); // Too Many Requests
        });
});

RateLimiter::for('auth', function (Request $request) {
    return [
        Limit::perMinute(45)->by($request->ip()),
        Limit::perHour(100)->by($request->ip()) // Additional hourly limit
    ];
});

// Public Routes
Route::middleware(['throttle:global'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/team', function () {
        return view('team');
    });

    // Section Routes
    Route::get('/{section}', function ($section) {
        return view('home', ['section' => $section]);
    })->where('section', 'about|features|testimonials')->name('section');
});

// Auth Routes
Route::middleware(['throttle:auth'])->group(function () {
    require __DIR__.'/auth.php';
});

// Protected Routes
Route::middleware(['auth', 'verified', 'throttle:global'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::controller(ProfileController::class)
        ->middleware(['throttle:45,1']) // 45 requests per minute
        ->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Public Capsules Routes
    Route::controller(PublicCapsuleController::class)
        ->prefix('capsules')
        ->name('capsules.')
        ->middleware(['throttle:45,1'])
        ->group(function () {
            Route::get('/public', 'index')->name('public.index');
            Route::get('/public/filter', 'filter')->name('public.filter');
            Route::get('/public/{capsule}', 'show')->name('public.show');
    });

    // Personal Capsules Routes
    Route::controller(CapsuleController::class)
        ->middleware(['throttle:45,1'])
        ->group(function () {
            Route::get('/capsules', 'index')->name('capsules.index');
            Route::post('/capsules', 'store')->name('capsules.store');
            Route::get('/capsules/{id}', 'show')->name('capsules.show');
    });

    // Capsule Posts Routes
    Route::controller(CapsulePostController::class)
        ->middleware(['throttle:45,1'])
        ->group(function () {
            Route::get('/capsule-post', 'index')->name('capsule-post.index');
            Route::post('/capsule-post', 'store')->name('capsule-post.store');
    });
});

// Fallback Route with rate limiting
Route::fallback(function () {
    return response()->view('errors.404', [
        'currentTime' => now()->format('Y-m-d H:i:s'),
        'currentUser' => \Illuminate\Support\Facades\Auth::user()?->name ?? 'Guest'
    ], 404);
})->middleware('throttle:45,1');

// Add response macro for rate limit headers
Response::macro('withRateLimitHeaders', function ($request) {
    $this->headers->add([
        'X-RateLimit-Limit' => 45,
        'X-RateLimit-Remaining' => RateLimiter::remaining('global:'.$request->ip(), 45),
        'X-RateLimit-Reset' => RateLimiter::availableIn('global:'.$request->ip())
    ]);
    return $this;
});