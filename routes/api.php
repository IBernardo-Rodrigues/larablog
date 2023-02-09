<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->group(function() {
    Route::post('/register', [UserController::class, 'register']);
    
    Route::post('/login', [UserController::class, 'login']);

    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
    // 1|hmUqUbKrkl32OfUvz2u11o1CY9IJ78f3BtictzoJ
});

Route::prefix('v1')->group(function() {
    
    Route::get('/users', [UserController::class, 'index']);
    
    Route::get('/users/{user}', [UserController::class, 'show']);
    
    Route::post('/users', [UserController::class, 'store'])->middleware('auth:sanctum');
    
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');
    
    Route::delete('/users/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');
    
    Route::get('/users/{user}/articles', [UserController::class, 'articles']);
    
    Route::get('/users/{user}/articles/week', [UserController::class, 'thisWeekArticles']);
    
    Route::get('/users/{user}/articles/{article}', [UserController::class, 'article']);
});


Route::fallback(function() {
    return response()->json(['message' => 'Not found'], 404);
});