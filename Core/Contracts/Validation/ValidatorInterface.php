<?php

declare(strict_types=1);

namespace Core\Contracts\Validation;

interface ValidatorInterface
{
    /**
     * @return array
     */
    public function process(): array;
}