<?php

declare(strict_types=1);

namespace Core\Contracts;

interface RouterInterface
{
    public function run(): void;
}