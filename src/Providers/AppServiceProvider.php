<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\ArticleService;
use App\Services\CategoryService;
use Core\Contracts\Providers\RegisterInterface;

class AppServiceProvider implements RegisterInterface
{
    /**
     * @var array
     */
    private array $services = [];

    /**
     * @return $this
     */
    public function register(): AppServiceProvider
    {
        // Register your services which have to be injected in controllers here
        $this->services = [
            CategoryService::class => new CategoryService(),
            ArticleService::class => new ArticleService()
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function getServices(): array
    {
        return $this->services;
    }
}