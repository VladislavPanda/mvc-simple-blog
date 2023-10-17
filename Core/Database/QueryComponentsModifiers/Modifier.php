<?php

namespace Core\Database\QueryComponentsModifiers;

use Core\Database\Model;

abstract class Modifier
{
    public function __construct(
        protected readonly Model $model
    ) {
    }

    /**
     * @return string
     */
    abstract public function process(): string;
}