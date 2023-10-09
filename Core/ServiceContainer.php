<?php

declare(strict_types=1);

namespace Core;

use Core\Http\Request;
use Core\Routing\Router;
use Core\View\View;

class ServiceContainer
{
    /**
     * @var array
     */
    public array $services;

    public function __construct()
    {
        $this->initServices();
    }

    /**
     * @param string $name
     * @return object|false
     */
    public function getService(string $name): object|false
    {
        return $this->services[$name];
    }

    /**
     * @return void
     */
    private function initServices(): void
    {
        $this->services[Request::class] = Request::createFromSuperGlobals();
        $this->services[View::class] = new View();
        $this->services[Router::class] = new Router(
            $this->getService(Request::class)->uri(),
            $this->getService(Request::class)->requestMethod(),
            $this->getService(View::class)
        );
    }
}