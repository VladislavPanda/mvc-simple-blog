<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Config\Config;
use Core\Controllers\Controller;
use Core\Database\DBConnector;

class HomeController extends Controller
{
    public function index()
    {
        Category::all();

        return $this->view->make('welcome')->render();
    }
}