<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;



Route::resource('produk', ProdukController::class);

Route::get('/', AuthController::class . '@loginForm');
Route::post('/login', AuthController::class . '@login');
Route::get('/register/form', AuthController::class . '@registerForm');
Route::post('/register', AuthController::class . '@register');
