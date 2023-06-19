<?php

use App\Http\Controllers\Api\Auth\{LoginController, RegisterController, LogoutController};
use App\Http\Controllers\Api\V1\{CompleteTaskController, TaskController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});

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
