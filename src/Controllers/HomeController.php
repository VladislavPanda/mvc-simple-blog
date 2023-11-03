<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        //$categories = Category::all();
        $categories = Category::select('title')->where('id', '=', 2)->where('title', '=', 'Категория2')->get();

        echo '<pre>';
        var_dump($categories);
        echo '</pre>';
        return $this->view->make('welcome', ['categories' => $categories])->render();
    }
}