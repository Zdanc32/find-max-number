<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 20:12
 */

namespace App\Service\FindNumber;

use App\DTO\NumberDTO;

interface FindNumberServiceInterface
{
    public function execute(int $number): NumberDTO;

}