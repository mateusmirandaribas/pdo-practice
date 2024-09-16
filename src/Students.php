<?php

namespace src;

use DateTimeInterface;

class Students
{
    public function __construct(
        private ?int $id,
        private string $name,
        private DateTimeInterface $birthDate
    ){
    }
}
