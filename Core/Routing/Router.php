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
        $this->routes = $this->groupRoutes();
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