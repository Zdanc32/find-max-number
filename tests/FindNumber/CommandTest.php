<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 21:09
 */

namespace App\Tests\FindNumber;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CommandTest extends KernelTestCase
{
    public function testFirstExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:max-number');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            // pass arguments to the helper
            'selectedNumber' => 10,

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertContains('Max number: 4', $output);

        // ...
    }

    public function testSecondExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:max-number');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            // pass arguments to the helper
            'selectedNumber' => 5,

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertContains('Max number: 3', $output);

        // ...
    }
}