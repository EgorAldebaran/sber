<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use CBR\CurrencyDaily;
use CBR\Request;

// the name of the command is what users type after php bin/console
#[AsCommand(name: 'sber:parser-current')]
class SberCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $handler = new CurrencyDaily;
        $result = $handler
                ->setDate('20/09/2023')
                ->request()
                ->getResult();

        
        var_dump ('--success--');
        return 1;
    }
}
