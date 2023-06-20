<?php

use App\Http\Controllers\Api\Auth\{LoginController, RegisterController, LogoutController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__.'/api/v1.php';
require __DIR__.'/api/v2.php';

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('/login', LoginController::class);
        Route::post('/signup', RegisterController::class);
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', LogoutController::class);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
