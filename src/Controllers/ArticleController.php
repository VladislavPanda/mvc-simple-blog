<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        echo '<pre>';
        var_dump($this->request->get());
        echo '<pre>';
        echo $this->view->make('single')->render();
    }

    public function show()
    {
        echo '<pre>';
        var_dump($this->request->get('id'));
        echo '<pre>';
    }
}