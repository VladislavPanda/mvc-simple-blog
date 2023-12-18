<?php

namespace Core\Database;

use Core\Contracts\Database\MakeCrudQueryInterface;
use Core\Contracts\Database\QueryComponentsModifiersInterface;
use Core\Database\QueryComponentsModifiers\Modifier;

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

    /**
     * @return string
     */
    public function makeSelect(): string
    {
        $queryString = 'SELECT ';

        foreach ($this->queryComponentsModifiers as $queryComponentsModifier) {
            $queryString .= $queryComponentsModifier->process();
        }

        return $queryString;
    }

    /**
     * @return string
     */
    public function makeInsert(): string
    {


        return 'INSERT INTO ' . $this->model->getTable() . ' (' . implode(', ', $this->model->getFields()) . ')
            VALUES (' . rtrim(str_repeat('?, ', count($this->model->getFields())), ', ') . ')';
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
     * @return Modifier[]
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