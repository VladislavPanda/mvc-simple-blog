<?php

declare(strict_types=1);

namespace Core\Database\QueryComponentsModifiers;

use Core\Contracts\Database\QueryComponentsModifiersInterface;

class LimitModifier implements QueryComponentsModifiersInterface
{
    public function process(): string
    {
        return '';
    }
}