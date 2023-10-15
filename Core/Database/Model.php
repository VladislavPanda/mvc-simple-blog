<?php

declare(strict_types=1);

namespace Core\Database;

use Core\Contracts\Database\QueryComponentsInterface;

abstract class Model implements QueryComponentsInterface
{
    /**
     * @var string
     */
    protected string $table;

    /**
     * @var array
     */
    protected array $fields;

    /**
     * @var string
     */
    protected string $primaryKey = 'id';

    /**
     * CRUD operation which have to be executed
     *
     * @var string|null
     */
    protected ?string $operation;

    /**
     * List of fields from the Select operation
     *
     * @var array|null
     */
    protected ?array $selectedFields;

    /**
     * List of conditions
     *
     * @var array
     */
    protected array $conditions = [];

    /**
     * Limit operation
     *
     * @var int|string
     */
    protected int|string $limit = '';

    /**
     * String for order by operation (with possible reworking into array for multiple)
     *
     * @var string
     */
    protected string $orderBy = '';



    public function where(string $field, string $operator, mixed $value): Model
    {
        return $this;
    }

    public function orderBy(string $field, string $direction = 'ASC'): Model
    {
        return $this;
    }

    public function limit(int $number): Model
    {
        return $this;
    }
}