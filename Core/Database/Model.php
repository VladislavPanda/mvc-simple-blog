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
     * @var string
     */
    protected string $operation = 'select';

    /**
     * List of fields from the Select operation
     *
     *
     * @var array|string
     */
    protected array|string $selectedFields;

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
     * @var PDO
     */
    protected PDO $connection;

    public function __construct(
        $operation = null,
        $selectedFields = '*',
        $conditions = []
    ) {
        $this->operation = $operation;
        $this->selectedFields = $selectedFields;
        $this->conditions = $conditions;
        $this->connection = DBConnector::getInstance()->getConnection();
    }

    /**
     * Method for specifying columns which have to be selected or select *
     *
     * @param array|string $fields
     * @return $this
     */
    public static function select(array|string $fields = '*'): Model
    {
        return new static('select', [$fields]);
    }

    /**
     * Method for creating new record
     *
     * @param array $record
     * @return int
     */
    public static function create(array $record): int
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
        return (new static('select', '*', ["id = $id"]))->get();
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
        $this->conditions[] = "$field $operator $value";

        return $this;
    }

    public function orderBy(string $field, string $direction = 'ASC'): Model
    {
        $this->orderBy = "$field $direction";

        return $this;
    }

    public function limit(int $number): Model
    {
        $this->limit = $number > 0 ? $number : '';

        return $this;
    }

    public function get()
    {
        $params = [];
        $queryString = $this->createQueryBuilder()->makeSelect();
        $sth = $this->connection->prepare($queryString);

        if (! empty($this->conditions)) {
            $params = $this->createStatementParamsCreator($queryString)->process();
        }

        $sth->execute($params);

        return $sth->fetchAll();
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

    /**
     * @param string $queryString
     * @return StatementParamsCreator
     */
    protected function createStatementParamsCreator(string $queryString): StatementParamsCreator
    {
        return new StatementParamsCreator($this->conditions, $queryString);
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }

    /**
     * @return string
     */
    public function getOperation(): string
    {
        return $this->operation;
    }

    /**
     * @return array|string
     */
    public function getSelectedFields(): array|string
    {
        return $this->selectedFields;
    }

    /**
     * @return array
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * @return int|string
     */
    public function getLimit(): int|string
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public function getOrderBy(): string
    {
        return $this->orderBy;
    }
}