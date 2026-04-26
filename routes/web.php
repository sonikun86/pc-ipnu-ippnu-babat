<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

// Public Routes
Route::get('/', function () {
    $posts = Post::latest()->take(5)->get();
    return view('welcome', compact('posts'));
})->name('home');

// Dashboard Route (Centralized Redirection)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Google Socialite Routes
Route::get('auth/google', [\App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [\App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin Only
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/users', function () {
            return "User Management (TBA)";
        })->name('admin.users');
    });

    // Admin & Pengurus
    Route::middleware('role:admin,pengurus')->group(function () {
        Route::get('/administrasi/surat', function () {
            // Redirect to Google Drive as requested
            return redirect()->away('https://drive.google.com'); 
        })->name('administrasi.surat');
    });
});

require __DIR__.'/auth.php';
