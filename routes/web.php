<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// ================= GUEST (BELUM LOGIN) =================
Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});


Route::get('/', function () {
    return view('index');
})->name('index');

// ================= AUTH (SUDAH LOGIN) =================
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Pengajuan (WEB VIEW)
    Route::get('/pengajuan-form', function () {
        return view('pengajuan.form');
    })->name('pengajuan.form');

    Route::get('/formulir-pengajuan', function () {
        return view('formulir');
    })->name('formulir-pengajuan');

    Route::get('/coba-pengajuan', function () {
        return view('coba_pengajuan');
    });
});
