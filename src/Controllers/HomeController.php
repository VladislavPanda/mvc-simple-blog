<?php

namespace App\Controllers;

use Core\Config\Config;
use Core\Controllers\Controller;
use Core\Database\DBConnector;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view->make('welcome')->render();
    }
}