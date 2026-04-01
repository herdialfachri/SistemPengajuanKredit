<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/', function () {
    return view('index');
})->name('index');

// routes/web.php
Route::get('/coba-pengajuan', function() {
    return view('coba_pengajuan');
});

Route::get('/formulir-pengajuan', function() {
    return view('formulir');
})->name('formulir-pengajuan');

Route::get('/login', function () {
    return view('auth.login');  
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Form pengajuan (hanya bisa diakses setelah login)
Route::get('/pengajuan-form', function () {
    return view('pengajuan.form');
})->name('pengajuan.form');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');