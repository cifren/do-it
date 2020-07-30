<?php
namespace Make;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeCommand extends Command
{
    protected static $defaultName = 'app:command';

    protected OutputInterface $output;

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("\033[36m plop \033[0m");
    }
}