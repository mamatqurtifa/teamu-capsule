<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CapsuleController;
use App\Http\Controllers\CapsulePostController;
use App\Http\Controllers\PublicCapsuleController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('home');
});

Route::get('/team', function () {
    return view('team');
});

// Section Routes - Harus diletakkan setelah routes yang lebih spesifik
Route::get('/{section}', function ($section) {
    return view('home', ['section' => $section]);
})->where('section', 'about|features|testimonials')->name('section');

// Auth Routes
require __DIR__.'/auth.php';

// Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Public Capsules Routes - Harus diletakkan sebelum route capsules/{id}
    Route::controller(PublicCapsuleController::class)->prefix('capsules')->name('capsules.')->group(function () {
        Route::get('/public', 'index')->name('public.index');
        Route::get('/public/filter', 'filter')->name('public.filter');
        Route::get('/public/{capsule}', 'show')->name('public.show');
    });

    // Personal Capsules Routes
    Route::controller(CapsuleController::class)->group(function () {
        Route::get('/capsules', 'index')->name('capsules.index');
        Route::post('/capsules', 'store')->name('capsules.store');
        Route::get('/capsules/{id}', 'show')->name('capsules.show');
    });

    // Capsule Posts Routes
    Route::controller(CapsulePostController::class)->group(function () {
        Route::get('/capsule-post', 'index')->name('capsule-post.index');
        Route::post('/capsule-post', 'store')->name('capsule-post.store');
    });
});

// Fallback Route
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});