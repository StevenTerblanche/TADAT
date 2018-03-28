<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Key				Description 								Default
-------------------------------------------------------------------------

	benchmarks			Elapsed time of Benchmark points
						and total execution time					TRUE

	config				CodeIgniter Config variables				TRUE

	controller_info		The Controller class and
						method requested							TRUE

	get					Any GET data passed in the request			TRUE

	http_headers		The HTTP headers for the current request	TRUE

	memory_usage		Amount of memory consumed by the
						current request, in bytes					TRUE

	post				Any POST data passed in the request			TRUE

	queries				Listing of all database queries
						executed, including execution time			TRUE

	uri_string			The URI of the current request				TRUE

	session_data		Data stored in the current session			TRUE

	query_toggle_count	The number of queries after which the
						query block will default to hidden.			25
*/


$config['benchmarks'] = true;
$config['config'] = true;
$config['controller_info'] = true;
$config['get'] = true;
$config['http_headers'] = true;
$config['memory_usage'] = true;
$config['post'] = true;
$config['queries'] = true;
$config['uri_string'] = true;
$config['session_data'] = true;
$config['query_toggle_count'] = true;


