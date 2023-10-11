<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\Http\Request;
use Core\Routing\Exceptions\RouteNotFoundException;

class RouteDispatcher
{
    private const REMOVE_SPEC_CHARS_PATTERN = '/[^a-zA-Z0-9\/]/';
    private const REMOVE_MULTIPLE_SLASHES_PATTERN = '/([^:])(\/{2,})/';
    private const PARAMS_EXTRACTION_PATTERN = '/{.*}/';

    /**
     * @var string
     */
    private string $currentUri;

    /**
     * @var array
     */
    private array $uriExploded;

    /**
     * @var array|null
     */
    private ?array $mappedParams = null;

    public function __construct(
        private readonly Request $request,
        private readonly array $routes
    ) {
        $this->currentUri = self::normalize($this->request->uri());
        $this->uriExploded = explode('/', $this->currentUri);
    }

    /**
     * @throws RouteNotFoundException
     */
    public function process()
    {
        foreach ($this->routes[$this->request->requestMethod()] as $routeString => $route) {
            $routeExploded = explode('/', $routeString);

            if (count($this->uriExploded) != count($routeExploded)) {
                continue;
            }

            if (! $this->compareRouteWithUri($routeExploded)) {
                continue;
            }

            $this->mapParams($routeExploded);

            return $route;
        }

        throw new RouteNotFoundException('Route ' . $this->currentUri . ' not found');
    }

    /**
     * @param array $routeExploded
     * @return bool
     */
    private function compareRouteWithUri(array $routeExploded): bool
    {
        foreach ($routeExploded as $segmentKey => $segment) {
            if (preg_match(RouteDispatcher::PARAMS_EXTRACTION_PATTERN, $segment)) {
                continue;
            }

            if ($segment != $this->uriExploded[$segmentKey]) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $routeExploded
     * @return void
     */
    private function mapParams(array $routeExploded): void
    {
        foreach ($routeExploded as $index => $param) {
            if (preg_match(RouteDispatcher::PARAMS_EXTRACTION_PATTERN, $param)) {
                $this->mappedParams[] = (int) $this->uriExploded[$index];
            }
        }

        $this->mappedParams ??= [];
    }

    /**
     * Method for normalizing incoming URI:
     * - Remove special characters
     * - Remove spaces
     * - Remove multiple slashes
     * - Remove last slash
     *
     * @param string $currentUri
     * @return string
     */
    private static function normalize(string $currentUri): string
    {
        // Remove spaces
        $normalizedUri = str_replace(' ', '', urldecode($currentUri));
        // Remove multiple slashes
        $normalizedUri = preg_replace(RouteDispatcher::REMOVE_MULTIPLE_SLASHES_PATTERN, '$1', $normalizedUri);
        // Remove special chars
        $normalizedUri = preg_replace(RouteDispatcher::REMOVE_SPEC_CHARS_PATTERN, '', $normalizedUri);

        return $normalizedUri == '/'
            ? '/'
            : rtrim($normalizedUri, '/');
    }
}