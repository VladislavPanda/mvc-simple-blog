<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\View\View;

class Router
{
    /**
     * @var string
     */
    private string $currentUri;

    /**
     * @var string
     */
    private string $httpMethod;

    /**
     * @var View
     */
    private View $view;

    /**
     * @var array
     */
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct(string $currentUri, string $httpMethod, View $view)
    {
        $this->currentUri = $currentUri;
        $this->httpMethod = $httpMethod;
        $this->view = $view;
        $this->routes = $this->groupRoutes();
    }

    public function dispatch()
    {
        $route = $this->routes[$this->httpMethod][$this->currentUri];

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