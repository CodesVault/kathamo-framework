<?php
namespace Kathamo\Framework\CLI;

use Kathamo\Framework\CLIManager\MakeController;
use Kathamo\Framework\CLIManager\MakeMiddleware;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class KathamoFramework extends Command
{
    protected function configure()
    {
        $this->setName('make')
            ->setDescription('Cli for Kathamo framework.')
			->addOption('controller', 'c')
			->addOption('middleware', 'mw');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$path = getcwd();
		if ($input->getOption('controller')) {
            new MakeController($path);
        }
		if ($input->getOption('middleware')) {
            new MakeMiddleware($path);
        }

		return Command::SUCCESS;
    }
}
