<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        Category::select('title')->where('id', '=', 2);

        return $this->view->make('welcome')->render();
    }
}