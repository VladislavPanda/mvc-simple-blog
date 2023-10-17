<?php

namespace Core\Database;

use Core\Contracts\Database\MakeCrudQueryInterface;
use Core\Contracts\Database\QueryComponentsModifiersInterface;

class QueryBuilder implements MakeCrudQueryInterface
{
    /**
     * @var array
     */
    private array $queryComponentsModifiers;

    /**
     * @var array|string[]
     */
    private array $queryComponentsOperations = [
        'Fields',
        'From',
        'Conditions',
        'OrderBy',
        'Limit',
        'GroupBy'
    ];

    public function __construct(
        private readonly Model $model
    ) {
        $this->queryComponentsModifiers = $this->initModifiers();
    }

    public function makeSelect(): string
    {
        $queryString = 'SELECT ';

        return '';
    }

    public function makeInsert(): string
    {
        return '';
    }

    public function makeUpdate(): string
    {
        return '';
    }

    public function makeDelete(): string
    {
        return '';
    }

    /**
     * @return QueryComponentsModifiersInterface[]
     */
    private function initModifiers(): array
    {
        $queryComponentsModifiers = [];

        foreach ($this->queryComponentsOperations as $operation) {
            $queryComponentsModifier = 'Core\Database\QueryComponentsModifiers\\' . $operation . 'Modifier';
            $queryComponentsModifiers[] = new $queryComponentsModifier($this->model);
        }

        return $queryComponentsModifiers;
    }
}