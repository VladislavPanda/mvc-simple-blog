<?php

declare(strict_types=1);

namespace Core\Database\QueryComponentsModifiers;

class ConditionsModifier extends Modifier
{
    /**
     * @return string
     */
    public function process(): string
    {
        return $this->model->getConditions()
            ? ' WHERE ' . implode(' AND', $this->model->getConditions())
            : '';
    }
}