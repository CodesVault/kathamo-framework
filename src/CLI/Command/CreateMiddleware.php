<?php

namespace Kathamo\Framework\CLI\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kathamo\Framework\CLIManager\MakeMiddleware;

class CreateMiddleware extends Command
{
	protected function configure()
    {
        $this->setName('make make:middleware')
            ->setDescription('New Middleware for plugin')
			->setAliases(['make:mw']);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        new MakeMiddleware(getcwd());

		return Command::SUCCESS;
	}
}
