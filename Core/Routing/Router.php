<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\Http\Request;
use Core\Http\Response;
use Core\Providers\Provider;
use Core\Routing\RouteDispatcher;
use Core\View\View;

class Router
{
    /**
     * @var array
     */
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * @var \Core\Routing\RouteDispatcher
     */
    private RouteDispatcher $routeDispatcher;

    public function __construct(
        private Provider $serviceProvider,
        private Response $response
    ) {
        $this->routes = $this->groupRoutes();
        $this->routeDispatcher = new RouteDispatcher($this->serviceProvider->getRequest(), $this->routes);
    }

    public function run()
    {
        $route = $this->routeDispatcher->process();

        if ($route) {
            $controller = new $route['controllerName'];
            $this->serviceProvider->register($controller);
            $body = call_user_func([$controller, $route['actionName']]);
            $this->response->send($body);
        } else {
            echo '404 not found';
        }
    }

    /**
     * Method for sorting routes by Http Methods
     *
     * @return array
     */
    private function groupRoutes(): array
    {
        $appRoutes = require __DIR__ . '/../../routes/routes.php';

        foreach ($appRoutes as $appRoute) {
            $routes[$appRoute->getHttpMethod()][$appRoute->getUri()] = [
                'controllerName' => $appRoute->getControllerName(),
                'actionName' => $appRoute->getActionName()
            ];
        }

        return $routes ?? [];
    }
}