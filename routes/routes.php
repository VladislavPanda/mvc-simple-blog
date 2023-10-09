<?php

// File containing routes of the Application

use App\Controllers\ArticleController;
use App\Controllers\HomeController;
use App\Routing\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/', [ArticleController::class, 'index']),
    Route::post('/article/add', [ArticleController::class, 'save'])
];