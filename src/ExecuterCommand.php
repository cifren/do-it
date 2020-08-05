<?php
namespace Doit;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ExecuterCommand extends Command
{
    protected array $configuration;
    protected static $defaultName = 'app:run-command';
    protected array $arguments;

    public function __construct(array $configuration, array $arguments = [])
    {
        parent::__construct();
        $this->configuration = $configuration;
        $this->arguments = $arguments;
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Run a command')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('You can run any command you defined in your config')
            ->addArgument('commandName', InputArgument::REQUIRED, 'Command name from your config')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $commandName = $input->getArgument('commandName');
        $arguments = $this->arguments;

        $process = new Process([$this->getCommand($commandName), ...$arguments]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            $output->write($process->getErrorOutput());
            return Command::FAILURE;
        }

        $output->write($process->getOutput());

        return Command::SUCCESS;
    }

    protected function getCommand(string $name)
    {
        return $this->configuration['command'][$name];
    }
}
