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

