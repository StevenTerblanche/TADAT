<?php

namespace ProctorU;

class Response {
	use DataMethods;
	
	/**
	 * Response data pertaining to a previous request
	 */
	private $data;

	
	/**
	 * Builds the object and decodes the supplied data
	 *
	 * @param $data (string) JSON encoded data that was returned by the previous HTTP request
	 * @return void
	 */
	function __construct($data) {
		$this->data = json_decode($data, true);
	}

}