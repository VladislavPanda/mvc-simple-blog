<?php

namespace Core;

use Core\Http\Request;
use Core\Routing\Router;

class Application
{
    /**
     * @return void
     */
    public function run(): void
    {
        $request = Request::createFromSuperGlobals();

        $router = new Router($request->uri(), $request->requestMethod());
        $router->dispatch();
    }
}