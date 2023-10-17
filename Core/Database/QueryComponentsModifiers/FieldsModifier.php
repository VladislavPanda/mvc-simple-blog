<?php

declare(strict_types=1);

namespace Core\Database\QueryComponentsModifiers;

class FieldsModifier extends Modifier
{
    /**
     * @return string
     */
    public function process(): string
    {
        return is_array($this->model->getSelectedFields())
            ? implode(', ', $this->model->getSelectedFields())
            : ' *';
    }
}