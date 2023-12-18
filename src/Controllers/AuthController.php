<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controllers\Controller;

/**
 * @property $categoryService
 */
class AuthController extends Controller
{
    public function index()
    {
        return $this->view->make('auth', ['categories' => $this->categoryService->getAll()])->render();
    }

    public function submit()
    {
        $errors = $this->request->validate([
            'login' => 'min:6',
            'password' => 'min:6|max:12'
        ]);


    }
}