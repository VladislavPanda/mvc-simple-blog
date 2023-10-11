<?php

declare(strict_types=1);

namespace Core\Http;

class Request
{
    public function __construct(
        public readonly array $server,
        public array $get,
        public readonly array $post,
        public readonly array $files,
        public readonly array $cookie
    ) {
    }

    /**
     * Create Request instance from superglobals
     *
     * @return static
     */
    public static function createFromSuperGlobals(): static
    {
        return new static($_SERVER, $_GET, $_POST, $_FILES, $_COOKIE);
    }

    /**
     * @return string
     */
    public function uri(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    /**
     * @return string
     */
    public function requestMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->get;
    }

    /**
     * @return array
     */
    public function post(): array
    {
        return $this->post;
    }

    /**
     * Method for setting query string params in case params in app route (because of human-readable routes using)
     *
     * @param array $getParams
     * @return void
     */
    public function setGet(array $getParams): void
    {
        $this->get = $getParams;
    }
}