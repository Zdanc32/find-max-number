<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05.03.2020
 * Time: 20:35
 */

namespace App\Command;


use App\Service\FindNumber\FindNumberServiceInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FindNumberCommand extends Command
{
    protected static $defaultName = 'app:max-number';
    private $findNumberService;
    private $selectedNumber;

    public function __construct(
        FindNumberServiceInterface $findNumberService
    ) {
        $this->findNumberService = $findNumberService;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Generate series from selected number and get max number.')
            ->setHelp('This command allows you to find max number from a generated series...')
            ->addArgument('selectedNumber', $this->selectedNumber ? InputArgument::REQUIRED : InputArgument::OPTIONAL, 'User password')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Max number founder from generated series!',
            '============',
            '',
        ]);
        $numberDTO = $this->findNumberService->executeFromCommand($input->getArgument('selectedNumber'));
        // retrieve the argument value using getArgument()
        $output->writeln('Selected number: '.$numberDTO->getNumber());
        $output->writeln('Max number: '.$numberDTO->getMaxNumber());

        return 0;
    }


}