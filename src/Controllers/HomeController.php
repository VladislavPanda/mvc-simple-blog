<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->view->make('welcome')->render();
    }
}