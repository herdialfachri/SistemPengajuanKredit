<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthWebController;

// Halaman utama (index)
Route::get('/', function () {
    return view('index');
})->name('index');

// Login & Logout
Route::get('/login', [AuthWebController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthWebController::class, 'login'])->name('login');
Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');

// Dashboard (cek session token di controller)
Route::get('/dashboard', [AuthWebController::class, 'dashboard'])->name('dashboard');
