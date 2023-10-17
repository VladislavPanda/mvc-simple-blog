<?php

declare(strict_types=1);

namespace Core\Database;

use Core\Config\Config;
use PDO;

class DBConnector
{
    /**
     * @var PDO|DBConnector
     */
    private static PDO|self $instance;

    /**
     * @var PDO
     */
    private PDO $connection;

    private function __construct(array $config)
    {
        $this->connection = new PDO(
            $config['driver'] . ':host=' .
            $config['host'] . ';dbname=' . $config['name'] . ';charset=' . $config['charset'],
            $config['user'],
            $config['password'],
            $config['options']
        );
    }

    /**
     * @return self
     * @throws \Core\Exceptions\FileNotFoundException
     */
    public static function getInstance(): self
    {
        return self::$instance ??= new self(Config::get('database'));
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}