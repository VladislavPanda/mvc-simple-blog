<?php

declare(strict_types=1);

namespace Core\Database;

use Core\Contracts\Database\RepositoryInterface;
use Core\Contracts\Database\QueryComponentsInterface;
use PDO;

abstract class Model implements RepositoryInterface, QueryComponentsInterface
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

    /**
     * @var DBConnector
     */
    protected DBConnector $connection;

    public function __construct(
        string|null $operation = null,
        array|string|null $selectedFields = null,
    ) {
        $this->connection = DBConnector::getInstance();
    }

    /**
     * Method for specifying columns which have to be selected or select *
     *
     * @param array|string $fields
     * @return $this
     */
    public static function select(array|string $fields = '*'): Model
    {
        return new static();
    }

    /**
     * Method for creating new record
     *
     * @param array $record
     * @return int
     */
    public function create(array $record): int
    {
        return 0;
    }

    /**
     * Method for updating record by id
     *
     * @param int $id
     * @param array $updateData
     * @return bool
     */
    public function update(int $id, array $updateData): bool
    {
        return true;
    }

    /**
     * Method for deleting record by id
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return true;
    }

    /**
     * Method for retrieving all the data from the Database
     *
     * @return array
     */
    public static function all(): array
    {
        return (new static('select', '*'))->get();
    }

    /**
     * Method for retrieving one record by id
     *
     * @param int $id
     * @return array
     */
    public static function find(int $id): array
    {
        return [];
    }

    /**
     * Method for setting where statement
     *
     * @param string $field
     * @param string $operator
     * @param mixed $value
     * @return $this
     */
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

    protected function get()
    {
        $this->createQueryBuilder()->makeSelect();

        return [1,23,45];
    }

    /**
     * Method for creating new QueryBuilder instance
     *
     * @return QueryBuilder
     */
    protected function createQueryBuilder(): QueryBuilder
    {
        return new QueryBuilder($this);
    }
}