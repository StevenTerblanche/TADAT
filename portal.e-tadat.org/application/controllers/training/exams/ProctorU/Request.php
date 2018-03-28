<?php

namespace ProctorU;

class Request {
	use DataMethods;

	/**
	 * Represents a handle for a cURL resource
	 */
	private $handle;


	/**
	 * Data gathered from the HTTP request
	 */
	private $data;


	/**
	 * Builds a new Request object and initializes cURL
	 *
	 * @param $url (string) The URL to supply to CURLOPT_URL
	 * @param $arguments (array) Arguments passed from Wrapper::__call()
	 * @return void
	 */
	function __construct($url, $arguments) {
		$this->handle = curl_init();

		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => json_encode($arguments[0]),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CONNECTTIMEOUT => 60,
			CURLOPT_TIMEOUT => 60,
			CURLINFO_HEADER_OUT => true,
			CURLOPT_HTTPHEADER => $arguments[1],
			CURLOPT_SSL_VERIFYPEER => false
		);

		curl_setopt_array($this->handle, $options);
	}


	/**
	 * Submits the HTTP request and returns a Response object with the returned data
	 *
	 * @return mixed Returns false if something went wrong or an object of Response if successful
	 */
	public function call() {
		$response = curl_exec($this->handle);

		if(curl_errno($this->handle) !== 0) {
			throw new Exception(curl_error($this->handle), curl_errno($this->handle));

			$response = false;
		} else {
			$response = new Response($response);
		}

		$this->data = curl_getinfo($this->handle);

		curl_close($this->handle);

		return $response;
	}

}