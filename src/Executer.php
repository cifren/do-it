<?php
namespace Doit;

use Symfony\Component\Console\Input\ArgvInput;

class Executer
{
    protected array $configuration;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    public function execute(ArgvInput $input)
    {

    }

}
