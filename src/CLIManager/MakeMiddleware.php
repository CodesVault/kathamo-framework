<?php

namespace Kathamo\Framework\CLIManager;

use Symfony\Component\Filesystem\Filesystem;

class MakeMiddleware extends Manager
{
	private $input = [];
	private $root_path;
	private $target_path;

	public function __construct($path)
	{
		$this->root_path = $path;
		$this->target_path = $path . "/app/Controllers/Middleware/";
		$this->input['middleware_class_name'] = $this->input("Middleware Class Name:");
		$this->input['middleware_key'] = $this->input("Middleware key:");
		$this->input['middleware_path'] = $this->input("Path [app/Controllers/Middleware]:");

		$this->generateMiddleware();
	}

	private function generateMiddleware()
	{
		$data = $this->input;
		$config_data = $this->getConfig();
		$middware_list = $config_data['middlewares'];
		$middleware_name = $config_data['namaspace_root'] . "\App\Controllers\Middleware\\" . $data['middleware_class_name'];
		$middware_list[$data['middleware_key']] = $middleware_name;

		$this->writeConfig($middware_list);
		$this->createFile($data, $config_data);
	}

	private function createFile($data, $config_data)
	{
		$data = array_merge($data, $config_data);
		$controller_template = dirname(__DIR__) . '/templates/Middleware_php.mustache';

		$mustache = new \Mustache_Engine(array('entity_flags' => ENT_QUOTES));
		$file_content = $mustache->render(file_get_contents($controller_template), $data);

		$controller_dir = $this->target_path . $data['middleware_path'];
		if ($data['middleware_path'] && ! is_dir($controller_dir)) {
			mkdir($controller_dir);
		}
		if (is_dir($controller_dir)) {
			$this->target_path = $controller_dir . "/";
		}

		$file = fopen(
			$this->target_path . $data['middleware_class_name'] . ".php",
			"w"
		);
		fwrite($file, $file_content);
		fclose($file);
	}

	private function writeConfig($data)
	{
		$schema = '';
		foreach ($data as $key => $i) {
			$schema .= "'$key'	=> $i::class,\n\t\t";
		}

		$controller_template = dirname(__DIR__) . '/templates/config_php.mustache';
		$mustache = new \Mustache_Engine();
		$file_content = $mustache->render(
			file_get_contents($controller_template),
			['middleware_list' => $schema]
		);

		$filesystem = new Filesystem;
		$filesystem->dumpFile($this->root_path . '/Configs/config.php', $file_content);
	}

	private function getConfig()
	{
		$configs = require $this->root_path . "/Configs/config.php";
		return $configs;
	}
}
