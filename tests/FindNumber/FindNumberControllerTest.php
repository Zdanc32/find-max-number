<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 20:57
 */

namespace App\Tests\FindNumber;

use App\Service\FindNumber\FindNumberService;
use Monolog\Test\TestCase;

class FindNumberControllerTest extends TestCase
{
    public function testFirstAdd()
    {
        $findNumberService = new FindNumberService();
        $formData['howLongSeries'] = 5;
        $result = $findNumberService->executeFromController($formData);
        $this->assertEquals(3, $result->getMaxNumber());
    }

    public function testSecondAdd()
    {
        $findNumberService = new FindNumberService();
        $formData['howLongSeries'] = 10;
        $result = $findNumberService->executeFromController($formData);
        $this->assertEquals(4, $result->getMaxNumber());
    }
}