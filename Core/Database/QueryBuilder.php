<?php

namespace Core\Database;

use Core\Contracts\Database\MakeCrudQueryInterface;

class QueryBuilder implements MakeCrudQueryInterface
{
    public function makeSelect(): string
    {
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
}