<?php

declare(strict_types=1);

namespace Core\Contracts\Database;

interface QueryComponentsModifiersInterface
{
    /**
     * @return string
     */
    public function process(): string;
}