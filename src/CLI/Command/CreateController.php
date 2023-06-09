<?php

namespace Kathamo\Framework\CLI\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kathamo\Framework\CLIManager\MakeController;

class CreateController extends Command
{
	protected function configure()
    {
        $this->setName('make make:controller')
            ->setDescription('New Controller for plugin')
			->setAliases(['make:c']);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        new MakeController();

		return Command::SUCCESS;
	}
}
