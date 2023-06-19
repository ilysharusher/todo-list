<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('/login', LoginController::class);
        Route::post('/signup', RegisterController::class);
    });
    Route::post('/logout', LogoutController::class);
});

Route::get('/', function () {
    return view('welcome');
});
