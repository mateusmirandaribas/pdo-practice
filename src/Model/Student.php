<?php

namespace src\Model;

use Exception;
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

        echo "Student {$student->name} successfully registered!";
    }

    /**
     *
     * @return array
     * @throws Exception
     */
    public function selectAllStudents(): array
    {
        $query = "SELECT * FROM students";

        $statement = $this->sqliteConnection->pdo->query($query);
        $studentDataList = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach ($studentDataList as $studentData) {
            $studentList[] = new StudentObject(
                $studentData['id'],
                $studentData['name'],
                $studentData['birth_date']
            );
        }

        return $studentList;
    }

    /**
     *
     * @param integer $id
     * @return StudentObject
     * @throws Exception
     */
    public function selectStudentById(int $id): StudentObject
    {
        $query = "SELECT * FROM students WHERE id = {$id}";

        $statement = $this->sqliteConnection->pdo->query($query);
        $studentData = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($studentData != false) {
            $student = new StudentObject(
                $studentData['id'],
                $studentData['name'],
                $studentData['birth_date']
            );
    
            return $student;
        }

        throw new Exception("No student with ID {$id} was found.", 404);
    }
}
