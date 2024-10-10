<?php

namespace src;

class Phone
{
    /**
     *
     * @param integer|null $id
     * @param string $areaCode
     * @param string $number
     */
    public function __construct(
        public ?int $id,
        public string $areaCode,
        public string $number
    ){
    }
}
