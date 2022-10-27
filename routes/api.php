<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RegisterController;
use App\Models\User;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::get('/product/search/{name}', [ProductController::class, 'search']);
Route::get('product', [ProductController::class, 'index']);
Route::get('category', [CategoryController::class, 'index']);
Route::get('product/{product}', [ProductController::class, 'show']);


Route::middleware('auth:sanctum')->group(function() {

    Route::post('logout', [LoginController::class, 'logout']);

    //Comment
    Route::controller(CommentController::class)->group(function() {
        Route::post('product/{id}/comment', 'store');
        Route::put('product/{id}/comment/{comm}', 'update');
        Route::delete('product/{id}/comment/{comm}', 'destroy');
    });

});

Route::middleware('auth:sanctum', 'isAdmin')->prefix('/admin')->group(function() {

    Route::controller(ProductController::class)->group(function() {
        Route::post('products', 'store');
        Route::put('products/{product}', 'update');
        Route::delete('products/{product}', 'destroy');
    });

    //category
    Route::controller(CategoryController::class)->group(function() {
        Route::post('category', 'store');
        Route::put('category/{category}', 'update');
        Route::delete('category/{category}', 'destroy');
    });


});








