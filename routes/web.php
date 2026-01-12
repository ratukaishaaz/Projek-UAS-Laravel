<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\WargaSementaraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard (Memanggil Controller agar angka tidak 0)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route Profile Bawaan Laravel
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RESOURCE ROUTES SIPENDAWA (CRUD Sesuai Soal UAS Poin 4)
    // 1. Manajemen Kartu Keluarga
    Route::resource('kartukeluarga', KartuKeluargaController::class);

    // 2. Manajemen Warga Tetap (Relasi ke KK)
    Route::resource('warga', WargaController::class);

    // 3. Manajemen Mutasi (Relasi ke Warga - Syarat UAS)
    Route::resource('mutasi', MutasiController::class);

    // 4. Manajemen Warga Sementara
    Route::resource('wargasementara', WargaSementaraController::class);
});

require __DIR__.'/auth.php';