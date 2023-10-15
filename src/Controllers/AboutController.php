<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return $this->view->make('about')->render();
    }
}