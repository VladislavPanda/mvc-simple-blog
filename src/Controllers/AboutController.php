<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return $this->view->make('about', ['categories' => $categories])->render();
    }
}