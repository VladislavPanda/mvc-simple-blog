<?php

declare(strict_types=1);

namespace Core\Database\QueryComponentsModifiers;

class FromModifier extends Modifier
{
    /**
     * @return string
     */
    public function process(): string
    {
        return ' FROM ' . $this->model->getTable();
    }
}