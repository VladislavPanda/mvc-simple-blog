<?php

declare(strict_types=1);

namespace Core\Http;

class Request
{
    public function __construct(
        public readonly array $server,
        public readonly array $get,
        public readonly array $post,
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
        return new static($_SERVER, $_GET, $_POST, $_COOKIE);
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
}