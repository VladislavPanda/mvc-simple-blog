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
        if (empty($this->model->getConditions())) {
            return '';
        }

        $modifiedConditions = array_map(
            fn (string $condition) => explode(' ', $condition)[0] . ' = :' . explode(' ', $condition)[0],
            $this->model->getConditions()
        );

        return ' WHERE ' . implode(' AND ', $modifiedConditions);
    }
}