<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        echo $this->view->make('single')->render();
    }
}