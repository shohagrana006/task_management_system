<?php

use App\Http\Controllers\Api\Admin\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::apiResource('/tasks', TaskController::class);
    });
});