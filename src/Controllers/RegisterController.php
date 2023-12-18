<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
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

    public function store()
    {
        $errors = $this->request->validate([
            'login|Логин' => 'min:3',
            'password|Пароль' => 'min:6|max:12',
            'password_repeat|Подтверждение пароля' => 'min:6|max:12|=password'
        ]);

        if (empty($errors)) {
            $registerFormData = $this->request->post();
            User::create([
                'email' => $registerFormData['email'],
                'login' => $registerFormData['login'],
                'password' => password_hash($registerFormData['password'], PASSWORD_DEFAULT),
                'first_name' => $registerFormData['first_name'],
                'second_name' => $registerFormData['second_name'],
                'last_name' => $registerFormData['last_name']
            ]);
exit;
            $this->redirect->to('auth');
        }

        return $this->view->make('register', [
            'categories' => $this->categoryService->getAll(),
            'errors' => $errors
        ])->render();
    }
}