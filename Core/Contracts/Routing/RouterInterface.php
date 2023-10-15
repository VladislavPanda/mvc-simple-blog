<?php

declare(strict_types=1);

namespace Core\Contracts\Routing;

interface RouterInterface
{
    public function run(): void;
}