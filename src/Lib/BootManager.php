<?php

namespace Kathamo\Framework\Lib;

class BootManager
{
	protected $registerList = [];

	public function __construct()
	{
		$this->migration();
		$this->run();
	}

	/**
	 * Load controller or service which need to register hooks initially when the plugin is loaded.
	 *
	 * @return false|void
	 */
	public function run()
	{
		$this->registerList();

		if ( empty( $this->registerList ) ) {
			return false;
		}

		foreach ( $this->registerList as $class ) {
			$class::getInstance()->register();
		}
	}

	/**
	 * List of all those classes which need to register hooks.
	 *
	 * @return array
	 */
	protected function registerList()
	{
		return $this->registerList = [];
	}

	/**
	 * Set the array list of controllers & servicess which will be loaded initially.
	 *
	 * @return void
	 */
	protected function setRegisterList()
	{}

	/**
	 * Load migration files.
	 *
	 * @return void
	 */
	protected function migration()
	{
		$migration_dir = dirname(__FILE__, 6) . "/database/Migrations";
		if (! is_dir($migration_dir)) {
			return;
		}

		foreach (new \DirectoryIterator($migration_dir) as $file) {
			if (! $file->isDot() && 'php' === $file->getExtension()) {
				require_once($file->getPathname());
			}
		}
	}
}
