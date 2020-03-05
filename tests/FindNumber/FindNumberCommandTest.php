<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 21:09
 */

namespace App\Tests\FindNumber;

use App\Service\FindNumber\FindNumberService;
use Monolog\Test\TestCase;

class FindNumberCommandTest extends TestCase
{
    public function testFirstAdd()
    {
        $findNumberService = new FindNumberService();
        $result = $findNumberService->executeFromCommand(5);
        $this->assertEquals(3, $result->getMaxNumber());
    }

    public function testSecondAdd()
    {
        $findNumberService = new FindNumberService();
        $result = $findNumberService->executeFromCommand(10);
        $this->assertEquals(4, $result->getMaxNumber());
    }
}