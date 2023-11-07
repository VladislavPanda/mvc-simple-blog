<?php

declare(strict_types=1);

namespace Core\Database;

use Core\Contracts\Database\RepositoryInterface;
use Core\Contracts\Database\QueryComponentsInterface;
use PDO;
use Carbon\Carbon;

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
     * @var string
     */
    protected string $selectMethod;

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

    //protected

    /**
     * @var PDO
     */
    protected PDO $connection;

    /**
     * @var string
     */
    protected string $timestamps = 'd.m.Y';

    public function __construct(
        $operation = null,
        $selectMethod = 'select',
        $selectedFields = '*',
        $conditions = []
    ) {
        $this->operation = $operation;
        $this->selectMethod = $selectMethod;
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
        return new static('select', 'select', !is_array($fields) ? [$fields] : $fields);
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
        return (new static('select', 'all', '*'))->get();
    }

    /**
     * Method for retrieving one record by id
     *
     * @param int $id
     * @return array
     */
    public static function find(int $id): array
    {
        return (new static('select', 'find', '*', ["id = $id"]))->get();
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

    /**
     * @param string $field
     * @param string $direction
     * @return $this
     */
    public function orderBy(string $field, string $direction = 'ASC'): Model
    {
        $this->orderBy = "$field $direction";

        return $this;
    }

    /**
     * @param int $number
     * @return $this
     */
    public function limit(int $number): Model
    {
        $this->limit = $number > 0 ? $number : '';

        return $this;
    }

    /**
     * @param string $param
     * @return $this
     */
    public function like(string $param): Model
    {
        return $this;
    }

    /**
     * @return array|false
     */
    public function get(): array|false
    {
        $params = [];
        $queryString = $this->createQueryBuilder()->makeSelect();
        //$queryString = "SELECT * FROM articles WHERE title LIKE '%патче%'";
        $sth = $this->connection->prepare($queryString);

        if (! empty($this->conditions)) {
            $params = $this->createStatementParamsCreator($queryString)->process();
        }

        $sth->execute($params);

        $queryResult = $this->getTimestampsAttributes($sth->fetchAll());

        return $this->selectMethod == 'find'
            ? $queryResult[0]
            : $queryResult;
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
     * Accessor for timestamps
     *
     * @param array $queryResult
     * @return array
     */
    protected function getTimestampsAttributes(array $queryResult): array
    {
        foreach ($queryResult as $key => $value) {
            if ($value['created_at']) {
                $queryResult[$key]['created_at'] = Carbon::parse($value['created_at'])
                    ->format($this->timestamps);
            }

            if ($value['updated_at']) {
                $queryResult[$key]['updated_at'] = Carbon::parse($value['updated_at'])
                    ->format($this->timestamps);
            }
        }

        return $queryResult;
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