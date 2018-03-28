<?php

namespace ProctorU;

class Wrapper {
	
	/**
	 * The value that is passed in the Authorization-token header
	 * of the HTTP request
	 */
	private $auth;

	/**
	 * The URL to direct requests to (ProctorU's API URL)
	 */
	private $url;


	/**
	 * Builds the Wrapper object and sets the URL and auth token
	 *
	 * @param $url (string) URL to ProctorU's API
	 * @param $auth (string) Value to supply to Authorization-token
	 * @return void
	 */
	function __construct($url, $auth) {
		$this->url = $url;
		$this->auth = $auth;
	}


	/**
	 * Handles calls to all valid endpoints of ProctorU's API
	 *
	 * @param $endpoint (string) The controller which to request
	 * @param $arguments (array) Parameters and headers of the HTTP request, respectively
	 * @return mixed An object of \ProctorU\Response or boolean false
	 */
	function __call($endpoint, $arguments) {
		if(!isset($arguments[0])) {
			$arguments[0] = array();
		} 

		if(!isset($arguments[1])) {
			$arguments[1] = array();
		}

		$arguments[0]['time_sent'] = gmdate('c');

		$arguments[1][0] = 'Authorization-token: ' . $this->auth;
		$arguments[1][1] = 'Content-type: application/json';

		$request = new Request(
			$this->url . $endpoint,
			$arguments
		);

		try {
			$response = $request->call();
		} catch(Exception $e) {
			throw $e;
		}

		return $response;
	}
}