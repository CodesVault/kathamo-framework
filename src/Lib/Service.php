<?php

namespace Kathamo\Framework\Lib;

use Codesvault\Validator\Validator;
use Kathamo\Framework\Lib\MiddlewareResolver;

class Service
{
	/**
	 * Resolve middleware
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function middleware($key)
	{
		return MiddlewareResolver::resolve($key);
	}

	/**
	 * Validate data
	 *
	 * @param array $rules
	 * @param array $data
	 *
	 * @return \Codesvault\Validator\ValidationEngine
	 */
	public function validate($rules, $data = [])
	{
		if (! class_exists("Codesvault\Validator\Validator")) {
			throw new \Exception('Validator class not found. Install `codesvault/validator` package.');
		}
		return Validator::validate($rules, $data);
	}
}
