<?php

namespace Kathamo\Framework\CLI\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kathamo\Framework\CLIManager\MakeMigration;

class CreateMigration extends Command
{
	protected function configure()
    {
        $this->setName('make make:migration')
            ->setDescription('New Migration class for plugin')
			->setAliases(['make:m']);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        new MakeMigration(getcwd());

		return Command::SUCCESS;
	}
}
