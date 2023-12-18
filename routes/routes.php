<?php

// File containing routes of the Application

use App\Controllers\AboutController;
use App\Controllers\ArticleController;
use App\Controllers\AuthController;
use App\Controllers\CategoryController;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use Core\Routing\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/about', [AboutController::class, 'index']),
    Route::get('/categories/show/{$id}', [CategoryController::class, 'show']),
    Route::get('/articles', [ArticleController::class, 'index']),
    Route::get('/articles/show/{$id}', [ArticleController::class, 'show']),
    //Route::post('/articles/search', [ArticleController::class, 'search']),
    //Route::post('/article/add', [ArticleController::class, 'save']),
    Route::get('/auth', [AuthController::class, 'index']),
    Route::post('/auth', [AuthController::class, 'store']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::post('/register', [RegisterController::class, 'store'])
];