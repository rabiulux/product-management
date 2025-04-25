<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/new-product', [ProductController::class, 'store']);

Route::put('/update/{id}', [ProductController::class, 'update']);

Route::delete('/delete/{id}', [ProductController::class, 'destroy']);

