<?php

namespace App;

use App\Routing\Router;

class Application
{
    /**
     * @return void
     */
    public function run(): void
    {
        $currentUri = $_SERVER['REQUEST_URI'];

        $router = new Router($currentUri);
        $router->dispatch();
    }
}