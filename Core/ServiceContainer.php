<?php

declare(strict_types=1);

namespace Core;

use App\Providers\AppServiceProvider;
use Core\Exceptions\Filesystem\ClassNotFoundException;
use Core\Http\Request;
use Core\Http\Response;
use Core\Providers\Provider;
use Core\Routing\Router;
use Core\Validating\Validator;
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
     * @throws \Core\Exceptions\Filesystem\ClassNotFoundException
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
     * @throws \Core\Exceptions\Filesystem\ClassNotFoundException
     */
    private function initServices(): void
    {
        $this->services[Request::class] = Request::createFromSuperGlobals();
        $this->services[View::class] = new View();
        $this->services[Response::class] = new Response();
        $this->services[AppServiceProvider::class] = new AppServiceProvider();
        $this->services[Provider::class] = new Provider(
            $this->getService(Request::class),
            $this->getService(View::class),
            $this->getService(AppServiceProvider::class)
        );
        $this->services[Router::class] = new Router(
            $this->getService(Provider::class),
            $this->getService(Response::class)
        );
    }
}