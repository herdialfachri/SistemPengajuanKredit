<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthWebController;

// Halaman utama (index)
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/pengajuan', function () {
    return view('nasabah.pengajuan');
})->name('pengajuan');

Route::get('/data-pengajuan', function () {
    return view('nasabah.pengajuan_data');
})->name('data.pengajuan');

Route::get('/profile', function () {
    return view('nasabah.profile');
})->name('profile');

// Register
Route::get('/register', [AuthWebController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthWebController::class, 'register'])->name('register');

// Login & Logout
Route::get('/login', [AuthWebController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthWebController::class, 'login'])->name('login');
Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');

// Dashboard (cek session token di controller)
Route::get('/dashboard', [AuthWebController::class, 'dashboard'])->name('dashboard');
