<?php

class Route
{
	private $_uri = [];
	private $_class = [];

	public function add($url)
	{
		$this->addClass($url);
		$this->addUrl($url);
	}

	private function addClass(array $url)
	{
		foreach ($url as $class) {
			$this->_class[] = ucfirst(str_replace('/', '', $class));
		}
	}

	private function addUrl(array $url)
	{
		foreach ($url as $uri) {
			$this->_uri[] = rtrim($uri, '/');	
		}		
	}

	public function submit()
	{
		$uriGetParam = explode('/', isset($_GET['uri']) ? $_GET['uri'] : '/');

		$class = '/'.$uriGetParam[0];

		if ($class === '/') {
			require('home.php');
			die();
		}

		$method = empty($uriGetParam[1]) ? null : $uriGetParam[1];

		foreach ($this->_uri as $key => $value) {
			
			if (preg_match("#^$value$#", $class)) {
				
				if (class_exists($this->_class[$key]) == false) {
					return header('HTTP/1.1 404 Resource Not Found');
				}

				$new_class = new $this->_class[$key];	
				
				if (is_null($method) && method_exists($new_class, 'index')) {
					$new_class->index();
					return;
				}

				if (method_exists($new_class, $method) == false) {
					return header('HTTP/1.1 404 Resource Not Found');
				}
				
				$new_class->$method();				
			}
		}
	}

}
