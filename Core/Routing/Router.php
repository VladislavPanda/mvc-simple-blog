<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\Http\Request;
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
        private Request $request,
        private View $view
    ) {
        $this->routes = $this->groupRoutes();
        $this->routeDispatcher = new RouteDispatcher($this->request, $this->routes);
    }

    public function run()
    {
        $route = $this->routeDispatcher->process();

        if ($route) {
            $controller = new $route['controllerName'];
            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, $route['actionName']]);
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