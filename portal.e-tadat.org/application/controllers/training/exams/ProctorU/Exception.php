<?php

namespace ProctorU;

class Exception
extends \Exception {
	
	/**
	 * Writes Exception data to a log file, which is changed each day
	 *
	 * @return boolean 
	 */
	public function log() {
		$file = dirname(__FILE__) . '\logs\\' . date('m-d') . '.log';

		if(!is_writable(__DIR__)) {
			throw new \RuntimeException($file . ' could not be opened for writing');

			return false;
		}

		if(false === ($file = fopen($file, 'a+'))) {
			return false;
		} else {
			fwrite($file, $this->formatLog());
		}

		fclose($file);
	}

	
	/**
	 * Formats a string to be written to the log file with Exception data
	 *
	 * Example: 
	 *	[100] [2014-03-31T20:50:14] nonexistent_value could not be found in Request::$data
	 *		#0 C:\xampp\htdocs\wrapper\ProctorU\Request.php(8): foo() #1 {main}
	 *
	 * @return string The Exception data formatted as a string
	 */
	public function formatLog() {
		$text = '[';
		$text .= $this->getCode() . '] [';
		$text .= date('c') . '] ';
		$text .= $this->getMessage() . "\r\n \t";
		$text .= $this->getTraceAsString() . "\r\n";
		$text .= "\r\n \r\n";

		return $text;
	}
}