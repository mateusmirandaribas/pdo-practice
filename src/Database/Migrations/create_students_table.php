<?php

require_once '../../../index.php';

use src\Repository\SQLiteConnection;

try {
    $sqliteConnection = new SQLiteConnection();
    $sqliteConnection->pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');

    echo "Table created successfully!";
} catch (Exception $execption) {
    echo $execption->getMessage() . PHP_EOL . $execption->getCode();
}
