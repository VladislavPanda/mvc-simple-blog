<?php

declare(strict_types=1);

namespace Core\Database\QueryComponentsModifiers;

class LimitModifier extends Modifier
{
    public function process(): string
    {
        return $this->model->getLimit()
            ? ' LIMIT ' . $this->model->getLimit()
            : '';
    }
}