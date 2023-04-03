<?php

namespace Kathamo\Framework\CLIManager;

class Manager
{
	protected $input = [];
	protected $root_path;
	protected $target_path;

    public function input($label)
    {
        return readline(
            sprintf(" %s%s %s", "\033[1;34m", $label, "\033[0m")
        );
    }

	protected function getConfig()
	{
		$configs = require $this->root_path . "/Configs/config.php";
		return $configs;
	}

	protected function generateFile($template)
	{
		$data = array_merge($this->input, $this->getConfig());
		$controller_template = dirname(__DIR__) . "/templates/$template";

		$mustache = new \Mustache_Engine(array('entity_flags' => ENT_QUOTES));
		$file_content = $mustache->render(file_get_contents($controller_template), $data);

		$controller_dir = $this->target_path;
		if (! empty($data['input_path']) && ! is_dir($controller_dir)) {
			$controller_dir .= $data['input_path'];
			mkdir($controller_dir);
		}
		if (is_dir($controller_dir)) {
			$target_path = $controller_dir . "/";
		}

		$file = fopen(
			$target_path . $data['input_class_name'] . ".php", "w"
		);
		fwrite($file, $file_content);
		fclose($file);
	}
}
