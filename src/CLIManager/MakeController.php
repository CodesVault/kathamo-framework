<?php

namespace Kathamo\Framework\CLIManager;

class MakeController
{
	private $input = [];
	private $root_path;
	private $target_path;

	public function __construct($path)
	{
		$this->root_path = $path;
		$this->target_path = $path . "/app/Controllers/";
		$this->input['controller_name'] = readline(" Controller Name: ");
		$this->input['controller_path'] = readline(" Path [app/Controllers/]: ");
		$this->generateController();
	}

	private function generateController()
	{
		$data = $this->input;
		$data = array_merge($data, $this->getConfig());
		$controller_template = dirname(__DIR__) . '/templates/Controller_php.mustache';

		$mustache = new \Mustache_Engine(array('entity_flags' => ENT_QUOTES));
		$file_content = $mustache->render(file_get_contents($controller_template), $data);

		$controller_dir = $this->target_path . $data['controller_path'];
		if ($data['controller_path'] && ! is_dir($controller_dir)) {
			mkdir($controller_dir);
		}
		if (is_dir($controller_dir)) {
			$this->target_path = $controller_dir . "/";
		}

		$file = fopen(
			$this->target_path . $data['controller_name'] . ".php", "w"
		);
		fwrite($file, $file_content);
		fclose($file);
	}

	private function getConfig()
	{
		$configs = require $this->root_path . "/Configs/config.php";
		return $configs;
	}
}
