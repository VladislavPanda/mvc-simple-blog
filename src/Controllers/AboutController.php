<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        echo $this->view->make('about')->render();
    }
}