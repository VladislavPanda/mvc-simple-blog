<?php

declare(strict_types=1);

namespace Core\Contracts\Providers;

use App\Providers\AppServiceProvider;

interface RegisterInterface
{
    /**
     * @return AppServiceProvider
     */
    public function register(): AppServiceProvider;
}