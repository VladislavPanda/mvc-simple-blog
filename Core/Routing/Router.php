<?php

declare(strict_types=1);

namespace Core\Routing;

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
     * @var array
     */
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct($currentUri, $httpMethod)
    {
        $this->currentUri = $currentUri;
        $this->httpMethod = $httpMethod;
        $this->routes = $this->initRoutes();
    }

    public function dispatch()
    {
        echo $this->currentUri;

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