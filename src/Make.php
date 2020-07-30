<?php
namespace Make;

use Make\MakeCommand;

class Main extends MakeCommand
{
    const DOCKER = 'docker-compose';

    // /**
    //  * @command
    //  * @before(['install', 'quality'])
    //  */
    // public function all()
    // {
        
    // }

    // /**
    //  * @command
    //  */
    // public function install()
    // {
    //     $this->printSection('CLEAN-VENDOR');
    //     $this->execute('rm -rf ${SOURCE_DIR}/vendor');
    // }

    /**
     * @command
     */
    public function quality(string $name = 'QUALITY')
    {
        $this->printSection($name);
    }

    protected function printSection(string $name)
    {
        $this->output->writeln("\033[36m\n==================================================\n\033[0m");
        $this->output->writeln("\033[36m $name \033[0m");
        $this->output->writeln("\033[36m\n==================================================\n\033[0m");
    }
}