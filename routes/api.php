<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PengajuanController;
use App\Http\Controllers\Api\PencairanController;

// ================= PUBLIC =================
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// ================= PROTECTED (SANCTUM) =================
Route::middleware('auth:sanctum')->group(function () {

    // ---------- AUTH ----------
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/me', [AuthController::class, 'me'])->name('auth.me');
    Route::get('/get-users', [AuthController::class, 'getUsers'])->name('auth.getUsers');

    // ---------- PENGAJUAN ----------
    Route::prefix('pengajuan')->name('pengajuan.')->group(function () {
        Route::get('/', [PengajuanController::class, 'index'])->name('index');       // GET all
        Route::post('/', [PengajuanController::class, 'store'])->name('store');      // CREATE
        Route::get('/{pengajuan}', [PengajuanController::class, 'show'])->name('show'); // READ single
        Route::put('/{pengajuan}', [PengajuanController::class, 'update'])->name('update'); // UPDATE
        Route::delete('/{pengajuan}', [PengajuanController::class, 'destroy'])->name('destroy'); // DELETE
    });

    // ---------- PENCAIRAN ----------
    Route::prefix('pencairan')->name('pencairan.')->group(function () {
        Route::get('/', [PencairanController::class, 'index'])->name('index');       // GET all
        Route::get('/{id}', [PencairanController::class, 'show'])->name('show');     // READ single
        Route::post('/{pengajuan_id}', [PencairanController::class, 'store'])->name('store'); // CREATE
        Route::put('/{id}', [PencairanController::class, 'update'])->name('update'); // UPDATE
        Route::delete('/{id}', [PencairanController::class, 'destroy'])->name('destroy'); // DELETE
    });
});