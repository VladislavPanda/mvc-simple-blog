<?php

declare(strict_types=1);

namespace Core\Contracts\Database;

use Core\Database\Model;

interface QueryComponentsInterface
{
    /**
     * @param string $field
     * @param string $operator
     * @param mixed $value
     * @return Model
     */
    public function where(string $field, string $operator, mixed $value): Model;

    /**
     * @param string $field
     * @param string $direction
     * @return Model
     */
    public function orderBy(string $field, string $direction = 'ASC'): Model;

    /**
     * @param int $number
     * @return Model
     */
    public function limit(int $number): Model;
}