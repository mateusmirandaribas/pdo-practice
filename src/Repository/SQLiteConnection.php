<?php

namespace src\Repository;

use PDO;

class SQLiteConnection implements DatabaseConnectionInterface
{
    private const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR;

    /**
     *
     * @var string
     */
    public string $databasePath = self::BASE_PATH . 'database.sqlite';

    /**
     *
     * @var PDO
     */
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('sqlite:' . $this->databasePath);
    }
}
