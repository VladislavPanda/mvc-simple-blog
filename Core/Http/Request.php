<?php

declare(strict_types=1);

namespace Core\Http;

use Core\Validating\Validator;

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
     * @param string $param
     * @return mixed
     */
    public function get(string $param = ''): mixed
    {
        return $param ? $this->get()[$param] : $this->get;
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function post(string $param = ''): mixed
    {
        return $param ? $this->post()[$param] : $this->post;
    }

    /**
     * @return array
     */
    public function files(): array
    {
        return $this->files;
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

    /**
     * @param array $rules
     * @return array
     */
    public function validate(array $rules): array
    {
        return (new Validator($this->post(), $rules))->process();
    }
}