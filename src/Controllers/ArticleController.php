<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return $this->view->make('single')->render();
    }

    public function show()
    {
    }
}