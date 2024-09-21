<?php

require_once '../index.php';

use src\Student as StudentObject;
use src\Infrastructure\SQLiteConnection;
use src\Model\Student as StudentModel;

try {
    $sqliteConnection = new SQLiteConnection();
    $studentModel = new StudentModel($sqliteConnection);

    $student = new StudentObject(
        null,
        'Jon',
        '2001-01-01'
    );

    $studentModel->store($student);
} catch (Exception $execption) {
    echo $execption->getMessage() . PHP_EOL . $execption->getCode();
}
