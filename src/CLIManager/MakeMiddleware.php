<?php

namespace Kathamo\Framework\CLIManager;

use Symfony\Component\Filesystem\Filesystem;

class MakeMiddleware extends Manager
{
	// private $input = [];
	// private $root_path;
	// private $target_path;

	public function __construct($path)
	{
		$this->root_path = $path;
		$this->target_path = $path . "/app/Controllers/Middleware/";
		$this->input['input_class_name'] = $this->input("Middleware Class Name:");
		$this->input['middleware_key'] = $this->input("Middleware key:");
		$this->input['input_path'] = $this->input("Path [app/Controllers/Middleware]:");

		$this->generateMiddleware();
	}

	private function generateMiddleware()
	{
		$data = $this->input;
		$config_data = $this->getConfig($this->root_path);
		$middware_list = $config_data['middlewares'];
		$middleware_name = $config_data['namaspace_root'] . "\App\Controllers\Middleware\\" . $data['input_class_name'];
		$middware_list[$data['middleware_key']] = $middleware_name;

		$this->writeConfig($middware_list);
		$this->generateFile('Middleware_php.mustache');
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
}
