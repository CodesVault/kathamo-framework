<?php

namespace Kathamo\Framework\CLIManager;

class Manager
{
    public function input($label)
    {
        return readline(
            sprintf(" %s%s %s", "\033[1;34m", $label, "\033[0m")
        );
    }

	protected function getConfig($root_path)
	{
		$configs = require $root_path . "/Configs/config.php";
		return $configs;
	}
}
