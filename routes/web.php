<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Route resource untuk produk
Route::resource('/products', \App\Http\Controllers\ProductController::class);

// Route resource untuk rekap masuk
Route::resource('/rekap_masuks', \App\Http\Controllers\Rekap_MasukController::class);

// Route resource untuk rekap keluar
Route::resource('/rekap_keluars', \App\Http\Controllers\Rekap_KeluarController::class);

// Group route dengan middleware autentikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route untuk logout
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/'); // Atau redirect ke halaman lain setelah logout
    })->name('logout');
});

// Route OAuth untuk Google (Socialite)
Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');

Route::get('/logout', function () {
    // Logout dari session Laravel
    Auth::logout();

    // Ini akan menghapus session Socialite untuk Google atau layanan lain yang digunakan
    // Anda bisa menambahkan logout untuk provider lain jika perlu
    session()->forget('socialite');

    // Redirect ke halaman utama setelah logout
    return redirect('/');
})->name('logout');