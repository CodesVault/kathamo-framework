<?php

namespace Kathamo\Framework\CLIManager;

class MakeService extends Manager
{
	public function __construct()
	{
		$this->root_path = getcwd();
		$this->target_path = getcwd() . "/app/Services/";
		$this->input['input_class_name'] = $this->input("Service Name:");
		$this->input['input_path'] = $this->input("Path [app/Services/]:");

		$this->generateFile('Service_php.mustache');
	}
}
