<?php

declare(strict_types=1);

namespace Core\Database\QueryComponentsModifiers;

class OrderByModifier extends Modifier
{
    public function process(): string
    {
        return $this->model->getOrderBy()
            ? ' ORDER BY ' . $this->model->getOrderBy()
            : '';
    }
}