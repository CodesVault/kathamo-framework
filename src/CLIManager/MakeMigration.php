<?php

namespace Kathamo\Framework\CLIManager;

class MakeMigration extends Manager
{
	public function __construct($path)
	{
		$this->root_path = $path;
		$this->target_path = $path . "/Database/Migrations/";
		$this->input['input_class_name'] = $this->input("Migration Name:");

		$this->generateFile('Migration_php.mustache');
	}
}
