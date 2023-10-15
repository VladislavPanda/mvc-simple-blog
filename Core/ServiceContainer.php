<?php

declare(strict_types=1);

namespace Core;

use Core\Exceptions\ClassNotFoundException;
use Core\Http\Request;
use Core\Http\Response;
use Core\Routing\RouteDispatcher;
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
     * @return object
     * @throws ClassNotFoundException
     */
    public function getService(string $name): object
    {
        if (! class_exists($name)) {
            throw new ClassNotFoundException('Class ' . $name . ' not found');
        }

        return $this->services[$name];
    }

    /**
     * @return void
     * @throws ClassNotFoundException
     */
    private function initServices(): void
    {
        $this->services[Request::class] = Request::createFromSuperGlobals();
        $this->services[View::class] = new View();
        $this->services[Response::class] = new Response();
        $this->services[Router::class] = new Router(
            $this->getService(Request::class),
            $this->getService(View::class),
            $this->getService(Response::class)
        );
    }
}