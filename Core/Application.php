<?php

namespace Core;

use Core\Http\Request;
use Core\Routing\Router;

class Application
{
    /**
     * @var ServiceContainer
     */
    private ServiceContainer $serviceContainer;

    public function __construct()
    {
        $this->serviceContainer = new ServiceContainer();
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $router = $this->serviceContainer->getService(Router::class);
        $router->run();
    }
}