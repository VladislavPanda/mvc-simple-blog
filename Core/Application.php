<?php

declare(strict_types=1);

namespace Core;

use Core\Exceptions\Filesystem\ClassNotFoundException;
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
     * @throws ClassNotFoundException
     */
    public function run(): void
    {
        $router = $this->serviceContainer->getService(Router::class);
        $router->run();
    }
}