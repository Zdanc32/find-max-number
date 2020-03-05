<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 21:08
 */

namespace App\Tests\FindNumber;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FindNumberFormTest extends WebTestCase
{
    public function testShowForm()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}