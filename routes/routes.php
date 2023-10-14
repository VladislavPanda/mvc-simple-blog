<?php

// File containing routes of the Application

use App\Controllers\AboutController;
use App\Controllers\ArticleController;
use App\Controllers\HomeController;
use Core\Routing\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/articles', [ArticleController::class, 'index']),
    Route::get('/articles/{$id}', [ArticleController::class, 'show']),
    Route::post('/article/add', [ArticleController::class, 'save']),
    Route::get('/about', [AboutController::class, 'index']),
];