<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route untuk mendapatkan informasi user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk proses logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Grup route yang dilindungi oleh middleware auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Route CRUD untuk Product
    Route::apiResource('/api-product', ProductController::class);
    
    // Route CRUD untuk Category
    Route::apiResource('/api-categories', CategoryController::class);
    
    // Route untuk menyimpan order, dilindungi oleh middleware auth:sanctum
    Route::post('/api-order', [OrderController::class, 'saveOrder']);

//discount api
Route::get('/api-discount', [App\Http\Controllers\Api\DiscountController::class, 'index'])->middleware('auth:sanctum');

//create discount api
Route::post('/api-discount', [App\Http\Controllers\Api\DiscountController::class, 'store'])->middleware('auth:sanctum');
});
