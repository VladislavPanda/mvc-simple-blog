<?php

declare(strict_types=1);

namespace Core\Contracts\Database;

use Core\Database\Model;

interface RepositoryInterface
{
    /**
     * @param array|string $fields
     * @return Model
     */
    public static function select(array|string $fields = '*'): Model;

    /**
     * @param array $record
     * @return int
     */
    public function create(array $record): int;

    /**
     * @param int $id
     * @param array $updateData
     * @return bool
     */
    public function update(int $id, array $updateData): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @return array
     */
    public static function all(): array;

    /**
     * @param int $id
     * @return array
     */
    public static function find(int $id): array;
}