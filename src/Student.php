<?php

namespace src;

class Student
{
    /**
     *
     * @param integer|null $id
     * @param string $name
     * @param string $birthDate
     */
    public function __construct(
        public ?int $id,
        public string $name,
        public string $birthDate
    ){
    }
}
