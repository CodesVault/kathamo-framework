<?php

namespace Kathamo\Framework\Lib;

class Middleware
{
	protected $request = null;

	protected function getRequestParams()
	{
		if (is_null($this->request)) {
			$this->request = $_REQUEST;
		}

		return $this->request;
	}
}
