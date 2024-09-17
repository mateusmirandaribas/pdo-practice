<?php

require_once '../index.php';

use src\Repository\SQLiteConnection;
use src\Model\Student as StudentModel;

try {
    $sqliteConnection = new SQLiteConnection();
    $studentModel = new StudentModel($sqliteConnection);

    $studentModel->deleteStudentById(3);
} catch (Exception $execption) {
    echo $execption->getMessage() . PHP_EOL . $execption->getCode();
}
