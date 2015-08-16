<?php

include '../lib.php';

function __autoload($class)
{
	$file_path = 'lib/'.$class.'.php';
	if (file_exists($file_path) == false) {
		$file_path = 'controllers/'.$class.'.php';
	}

	require_once $file_path;
}

$route = new Route;

$route->add(
	[
		'/about',
		'/contact'
	]
);

$route->submit();