<?php

namespace Core\Database\QueryComponentsModifiers;

use Core\Contracts\Database\QueryComponentsModifiersInterface;

class FieldsModifier implements QueryComponentsModifiersInterface
{
    public function process(): string
    {
        return '';
    }
}