<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        // Arah folder: resources/views/pages/admin/dashboard.blade.php
        return view('pages.admin.dashboard'); 
    })->name('admin.dashboard');

});


Route::middleware(['auth', 'verified', 'role:masyarakat'])->group(function () {
    
    Route::get('/dashboard', function () {
        // Arah folder: resources/views/pages/masyarakat/dashboard.blade.php
        return view('pages.users.dashboard');
    })->name('dashboard'); 

});


Route::middleware(['auth', 'verified', 'role:asn'])->group(function () {
    
    Route::get('/asn/dashboard', function () {
        // Arah folder: resources/views/pages/asn/dashboard.blade.php
        return view('pages.asn.dashboard'); 
    })->name('asn.dashboard');

});


Route::middleware('auth')->group(function () {
    // Dinonaktifkan sementara
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\Auth\ForgotPasswordController;

// Rute untuk menampilkan halaman Form Lupa Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])
    ->name('password.request')
    ->middleware('guest');

// Rute untuk memproses data dari Form Lupa Password
Route::post('/forgot-password/proses', [ForgotPasswordController::class, 'prosesReset'])
    ->name('asn.forgot-password.proses')
    ->middleware('guest');

// ========================================================
// RUTE KHUSUS ADMIN
// ========================================================
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('admin.dashboard');

});