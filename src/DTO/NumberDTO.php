<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 19:52
 */

namespace App\DTO;

class NumberDTO
{
    /**@var int*/
    private $selectedNumber;

    /**@var int*/
    private $maxNumber;

    public function __construct(
        int $selectedNumber = 0,
        int $maxNumber = 0
    ) {
        $this->selectedNumber = $selectedNumber;
        $this->maxNumber = $maxNumber;
    }

    public function getNumber(): int
    {
        return $this->selectedNumber;
    }

    public function getMaxNumber(): int
    {
        return $this->maxNumber;
    }
}