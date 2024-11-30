<?php

use Illuminate\Support\Facades\Route;

// Route API untuk products
Route::apiResource('/products', \App\Http\Controllers\ProductController::class);

// Route API untuk rekap_masuks
Route::apiResource('/rekap_masuks', \App\Http\Controllers\RekapMasukController::class);

// Route API untuk rekap_keluars
Route::apiResource('/rekap_keluars', \App\Http\Controllers\RekapKeluarController::class);
