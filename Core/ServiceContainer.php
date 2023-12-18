<?php

declare(strict_types=1);

namespace Core;

use App\Providers\AppServiceProvider;
use Core\Exceptions\Filesystem\ClassNotFoundException;
use Core\Http\Redirect;
use Core\Http\Request;
use Core\Http\Response;
use Core\Providers\Provider;
use Core\Routing\Router;
use Core\Session\Session;
use Core\View\View;

class ServiceContainer
{
    /**
     * @var array
     */
    public array $services;

    /**
     * @throws ClassNotFoundException
     */
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
        $this->services[Redirect::class] = new Redirect();
        $this->services[Session::class] = new Session();
        $this->services[AppServiceProvider::class] = new AppServiceProvider();
        $this->services[Provider::class] = new Provider(
            $this->getService(Request::class),
            $this->getService(View::class),
            $this->getService(Redirect::class),
            //$this->getService(Session::class),
            $this->getService(AppServiceProvider::class)
        );
        $this->services[Router::class] = new Router(
            $this->getService(Provider::class),
            $this->getService(Response::class)
        );
    }
}