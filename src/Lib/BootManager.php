<?php

namespace Kathamo\Framework\Lib;

class BootManager
{
	protected $registerList = [];

	public function __construct()
	{
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
}
