<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controllers\Controller;

/**
 * @property $categoryService
 */
class RegisterController extends Controller
{
    public function index()
    {
        return $this->view->make('register', ['categories' => $this->categoryService->getAll()])->render();
    }

    public function submit()
    {
        $errors = $this->request->validate([
            'login' => 'min:6',
            'password' => 'min:6|max:12',
            'password_repeat' => 'min:6|max:12|=password'
        ]);

        if (empty($errors)) {
            $this->redirect->to('auth');
        }

        return $this->view->make('register', [
            'categories' => $this->categoryService->getAll(),
            'errors' => $errors
        ])->render();
    }
}