<?php

namespace src\Model;

use src\Student as StudentObject;
use src\Repository\DatabaseConnectionInterface;

class Student
{
    /**
     *
     * @param DatabaseConnectionInterface $sqliteConnection
     */
    public function __construct(
        private DatabaseConnectionInterface $sqliteConnection
    ){
    }

    /**
     *
     * @param StudentObject $student
     * @return void
     * @throws Exception
     */
    public function store(StudentObject $student): void
    {
        $query = "INSERT INTO students (name, birth_date)
                    VALUES ('{$student->name}', '{$student->birthDate}'
        )";

        $this->sqliteConnection->pdo->exec($query);

        echo "Student successfully registered!";
    }
}
