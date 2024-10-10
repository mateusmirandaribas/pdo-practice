<?php

require_once '../../../index.php';

use src\Infrastructure\SQLiteConnection;

try {
    $sqliteConnection = new SQLiteConnection();
    $sqliteConnection->pdo->exec(
        'CREATE TABLE phones IF NOT EXISTS (
            id INTEGER PRIMARY KEY,
            area_code TEXT,
            number TEXT,
            student_id INTEGER,
            FOREIGN KEY(student_id) REFERENCES students(id)
        );'
    );

    echo "Table created successfully!";
} catch (Exception $execption) {
    echo $execption->getMessage() . PHP_EOL . $execption->getCode();
}
