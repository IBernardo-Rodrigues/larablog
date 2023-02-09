<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\User\TagController as UserTagController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;

Route::controller(PagesController::class)->group(function() {
    Route::get('/about-us', 'aboutUs')->middleware('auth');
});

Route::prefix('user')->group(function() {
    Route::get('/dashboard', [UserArticleController::class, 'dashboard'])->middleware(['auth', 'hasAuthorization']);
    
    Route::resource('articles', UserArticleController::class)->middleware('auth');

    Route::resource('categories', UserCategoryController::class)->except('show')->middleware('auth');
    
    Route::resource('tags', UserTagController::class)->except('show')->middleware('auth');
});

Route::controller(ArticleController::class)->group(function() {
    Route::get('/', 'index')->middleware('auth');
    
    Route::get('/articles/{article}', 'show')->middleware('auth');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/signup', 'signup')->middleware('guest');
    
    Route::post('/register', 'register')->middleware('guest');
    
    Route::get('/login', 'login')->middleware('guest')->name('login');
    
    Route::post('/authenticate', 'authenticate')->middleware('guest');

    Route::get('/logout', 'logout');
});

Route::fallback(function() {
    return view('pages.not-found');
});