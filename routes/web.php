<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource for products
Route::resource('/products', \App\Http\Controllers\ProductController::class);

//route resource for products
Route::resource('/rekap_masuks', \App\Http\Controllers\Rekap_MasukController::class);

//route resource for products
Route::resource('/rekap_keluars', \App\Http\Controllers\Rekap_KeluarController::class);

// Rute untuk halaman login
Route::get('/login', function () {
    return view('login'); // Halaman login
})->name('login');

// Rute untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Rute untuk logout
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk halaman register
Route::get('/register', function () {
    return view('register'); // Pastikan 'register' sesuai dengan nama view yang akan dibuat
})->name('register');
// Rute untuk proses registrasi
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');