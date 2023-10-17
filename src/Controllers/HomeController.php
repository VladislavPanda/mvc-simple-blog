<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo '<pre>';
        var_dump(Category::find(2));
        echo '</pre>';
        // Category::select('title')->where('id', '=', 2)->where('title', '=', 'Категория2')->get()

        return $this->view->make('welcome')->render();
    }
}