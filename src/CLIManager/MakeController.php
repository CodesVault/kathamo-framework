<?php

namespace Kathamo\Framework\CLIManager;

class MakeController extends Manager
{
	public function __construct()
	{
		$this->root_path = getcwd();
		$this->target_path = getcwd() . "/app/Controllers/";
		$this->input['input_class_name'] = $this->input("Controller Name:");
		$this->input['input_path'] = $this->input("Path [app/Controllers/]:");

		$this->generateFile('Controller_php.mustache');
	}
}
