<?php

namespace Kathamo\Framework\Lib\Http;

class Kernel
{
	protected static $base_url;
	protected static $default_params = [];

	public static function setBaseUrl($url)
	{
		static::$base_url = $url;
	}

	public static function getUrl($route)
	{
		return static::$base_url . $route;
	}

	public static function setDefaultParams($args)
	{
		static::$default_params = $args;
	}

	public static function getDefaultParams()
	{
		return static::$default_params;
	}
}
