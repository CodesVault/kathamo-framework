<?php

namespace Kathamo\Framework\Lib;

class MiddlewareResolver
{
	public static function resolve($key)
	{
		$middleware = static::getMiddleres();
		if ( empty( $middleware[$key] ) ) {
			throw new \Exception("No middleware found for key '{$key}'");
		}

		$middleware = $middleware[$key];
		return (new $middleware)->handle();
	}

	protected static function getConfigs()
	{
		$path = dirname(__DIR__, 5) . "/configs/config.php";
		if (! file_exists($path)) {
			throw new \Exception("No config file found at '{$path}'");
		}
		$configs = require $path;

		return $configs;
	}

	protected static function getMiddleres()
	{
		$configs = static::getConfigs();
		if (! isset($configs['middlewares'])) {
			throw new \Exception("No middlewares found in config file");
		}

		return $configs['middlewares'];
	}
}
