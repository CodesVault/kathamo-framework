<?php

namespace Kathamo\Framework\CLIManager;

class MakeController extends Manager
{
	public function __construct($path)
	{
		$this->root_path = $path;
		$this->target_path = $path . "/app/Controllers/";
		$this->input['input_class_name'] = $this->input("Controller Name:");
		$this->input['input_path'] = $this->input("Path [app/Controllers/]:");

		$this->generateController('Controller_php.mustache');
	}
}
