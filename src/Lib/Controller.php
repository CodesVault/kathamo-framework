<?php

namespace Kathamo\Framework\Lib;

use Codesvault\Validator\Validator;
use Kathamo\Framework\Lib\MiddlewareResolver;

class Controller
{
	/**
	 * Register hooks callback
	 *
	 * @return void
	 */
	public function register()
	{}

	/**
	 * Render view file and pass data to the file.
	 *
	 * @param  string $file_path
	 * @param  array  $data
	 * @param  bool   $buffer
	 *
	 * @return mixed
	 */
	public function render($file_path, $data = [], $buffer = false)
	{}

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
