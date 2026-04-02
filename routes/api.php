<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PencairanController;

// ================= PUBLIC =================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ================= PROTECTED (SANCTUM) =================
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Pengajuan (CRUD)
    Route::get('/pengajuan', [PengajuanController::class, 'index']);          // GET all
    Route::post('/pengajuan', [PengajuanController::class, 'store']);         // CREATE
    Route::get('/pengajuan/{pengajuan}', [PengajuanController::class, 'show']);   // READ single
    Route::put('/pengajuan/{pengajuan}', [PengajuanController::class, 'update']); // UPDATE
    Route::delete('/pengajuan/{pengajuan}', [PengajuanController::class, 'destroy']); // DELETE

    // GET semua pencairan
    Route::get('/pencairan', [PencairanController::class, 'index']);

    // GET detail pencairan
    Route::get('/pencairan/{id}', [PencairanController::class, 'show']);

    // POST pencairan baru (pengajuan_id dari URL)
    Route::post('/pencairan/{pengajuan_id}', [PencairanController::class, 'store']);

    // PUT update pencairan
    Route::put('/pencairan/{id}', [PencairanController::class, 'update']);

    // DELETE hapus pencairan
    Route::delete('/pencairan/{id}', [PencairanController::class, 'destroy']);
});
