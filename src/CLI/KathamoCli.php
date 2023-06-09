<?php
namespace Kathamo\Framework\CLI;

use Kathamo\Framework\CLI\Command\CreateController;
use Kathamo\Framework\CLI\Command\CreateMiddleware;
use Kathamo\Framework\CLI\Command\CreateMigration;
use Symfony\Component\Console\Application;

class KathamoCli
{
	public function __construct()
	{
		$app = new Application();

		$app->add(new CreateController());
		$app->add(new CreateMiddleware());
		$app->add(new CreateMigration());

		$app->run();
	}
}
