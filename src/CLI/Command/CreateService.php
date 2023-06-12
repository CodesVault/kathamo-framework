<?php

namespace Kathamo\Framework\CLI\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kathamo\Framework\CLIManager\MakeController;

class CreateService extends Command
{
	protected function configure()
    {
        $this->setName('make make:service')
            ->setDescription('New Service for plugin')
			->setAliases(['make:s']);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        new MakeController();

		return Command::SUCCESS;
	}
}
