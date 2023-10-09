<?php

declare(strict_types=1);

namespace App\Routing;

class Route
{
    /**
     * @var string
     */
    private string $controllerName;

    /**
     * @var string
     */
    private string $actionName;

    public function __construct(
        private string $uri,
        private string $httpMethod,
        array $handler
    ) {
        $this->controllerName = $handler[0];
        $this->actionName = $handler[1];
    }

    /**
     * @param string $uri
     * @param array $handler
     * @return static
     */
    public static function get(string $uri, array $handler): static
    {
        return new static($uri, 'GET', $handler);
    }

    /**
     * @param string $uri
     * @param array $handler
     * @return static
     */
    public static function post(string $uri, array $handler): static
    {
        return new static($uri, 'POST', $handler);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }
}