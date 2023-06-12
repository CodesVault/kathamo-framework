<?php
namespace Kathamo\Framework\CLI;

use Symfony\Component\Console\Application;
use Kathamo\Framework\CLI\Command\CreateController;
use Kathamo\Framework\CLI\Command\CreateService;
use Kathamo\Framework\CLI\Command\CreateMiddleware;
use Kathamo\Framework\CLI\Command\CreateMigration;

class KathamoCli
{
	public function __construct()
	{
		$app = new Application();

		$app->add(new CreateController());
		$app->add(new CreateService());
		$app->add(new CreateMiddleware());
		$app->add(new CreateMigration());

		$app->run();
	}
}
