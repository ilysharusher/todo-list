<?php

use App\Http\Controllers\Api\V2\{CompleteTaskController, TaskController};
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v2')->group(function () {
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});