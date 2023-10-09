<?php

declare(strict_types=1);

namespace App\Routing;

class Router
{
    /**
     * @var string
     */
    private string $currentUri;

    /**
     * @var array|mixed
     */
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct($currentUri)
    {
        $this->currentUri = $currentUri;
        $this->routes = $this->initRoutes();
    }

    public function dispatch()
    {
        echo '<pre>';
        var_dump($this->routes);
        echo '</pre>';

    }

    /**
     * Method for sorting routes by Http Methods
     *
     * @return array
     */
    private function initRoutes(): array
    {
        $routes = [];
        $appRoutes = require __DIR__ . '/../../routes/routes.php';

        foreach ($appRoutes as $appRoute) {
            $routes[$appRoute->getHttpMethod()][$appRoute->getUri()] = [
                'controllerName' => $appRoute->getControllerName(),
                'actionName' => $appRoute->getActionName()
            ];
        }

        return $routes;
    }
}