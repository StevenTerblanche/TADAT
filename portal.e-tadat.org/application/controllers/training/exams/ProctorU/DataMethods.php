<?php

namespace ProctorU;

trait DataMethods {
	
	/**
	 * Exports the entirety of a child's $data index
	 * 
	 * @return string
	 */
	function __toString() {
		return var_export($this->data, true);
	}


	/**
	 * Accesses a single element from the $data index of a child class
	 *
	 * @param $key (string) The name of the key to access
	 * @return mixed Returns null if the key was not found; otherwise its value is returned
	 */
	function __get($key) {
		if(!array_key_exists($key, $this->data)) {
			throw new Exception($key . ' could not be found in ' . __CLASS__ . '::$data', 100);

			return null;
		}

		return $this->data[$key];
	}
}