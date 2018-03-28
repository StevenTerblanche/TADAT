<?php

define('API_URL',	'https://x.proctoru.com/api/');
define('API_KEY',	'30c6a871-d8bb-4fc2-a382-934972e2091e');

/**
 * Registers an autoloader into the stack
 *
 * @param $class (string) The name of the class being loaded
 * @return void
 */
spl_autoload_register(function($class) {
	$class = ltrim($class, '\\');

	if($namespace = strrpos($class, '\\')) {
		$file = substr($class, $namespace + 1) . '.php';
	} else {
		$file = $class . '.php';
	}

	require_once __DIR__ . '/' . $file;
});