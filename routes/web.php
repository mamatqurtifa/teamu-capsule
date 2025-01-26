<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapsuleController;
use App\Http\Controllers\CapsulePostController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login-form', function () {
    return view('login');
});

Route::get('/login-test', function () {
    return view('login');
});

Route::get('/dashboard-test', function () {
    return view('dashboard-test');
});

Route::get('/{section}', function ($section) {
    return view('home', ['section' => $section]);
})->where('section', 'about|features|testimonials')->name('section');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/capsules', [CapsuleController::class, 'index'])->name('capsules.index');
    Route::post('/capsules', [CapsuleController::class, 'store'])->name('capsules.store');
    Route::get('/capsules/{id}', [CapsuleController::class, 'show'])->name('capsules.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/capsule-post', [CapsulePostController::class, 'index'])->name('capsule-post.index');
    Route::post('/capsule-post', [CapsulePostController::class, 'store'])->name('capsule-post.store');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});