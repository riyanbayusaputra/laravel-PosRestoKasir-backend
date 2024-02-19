<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController; // Import ProductController

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () { // Menggunakan middleware auth:sanctum dengan group
    Route::apiResource('/api-product', ProductController::class);
});

Route::middleware('auth:sanctum')->group(function () { // Menggunakan middleware auth:sanctum dengan group
    Route::apiResource('/api-category', CategoryController::class);
});
