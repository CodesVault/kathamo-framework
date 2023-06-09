<?php

namespace Kathamo\Framework\Lib\Http;

class Request extends Kernel
{
	/**
	 * POST request
	 *
	 * @param string $route
	 * @param array  $args
	 * @return \Kathamo\Framework\Lib\Http\Response
	 */
	public static function post($route, $args = [])
	{
		$arguments = array_merge(static::getDefaultParams(), $args);
		$url       = static::getUrl($route);

		$res = \wp_remote_post($url, $arguments);
		return new Response($res);
	}

	/**
	 * GET request
	 *
	 * @param string $route
	 * @param array  $args
	 * @return \Kathamo\Framework\Lib\Http\Response
	 */
	public static function get($route, $args = [])
	{
		$arguments = array_merge(static::getDefaultParams(), $args);
		$url       = static::getUrl($route);

		$res = \wp_remote_get($url, $arguments);
		return new Response($res);
	}
}
