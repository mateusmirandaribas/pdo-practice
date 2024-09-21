<?php

require_once '../index.php';

use src\Infrastructure\SQLiteConnection;
use src\Model\Student as StudentModel;

try {
    $sqliteConnection = new SQLiteConnection();
    $studentModel = new StudentModel($sqliteConnection);

    $student = $studentModel->selectStudentById(1);
    var_dump($student);
} catch (Exception $execption) {
    echo $execption->getMessage() . PHP_EOL . $execption->getCode();
}
