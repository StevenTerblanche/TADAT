<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	class SoapDebugClient extends CventClient {
		public function __doRequest($request, $location, $action, $version, $one_way = 0) {
			//if (DEBUG) print htmlspecialchars($request);
			flush();
			return parent::__doRequest($request, $location, $action, $version);
		}
	
		public function webServiceDetails() {
			print "<strong>Functions:</strong><pre>";
			print_r($this->client->__getFunctions());
			print "</pre>";
	
			print "<strong>Types:</strong><pre>";
			print_r($this->client->__getTypes());
			print "</pre>";
		}
		public function debug() {
			print "<pre>";
			print htmlspecialchars($this->client->__getLastRequestHeaders());
			print "</pre>";
			print "<pre>";
			print htmlspecialchars($this->client->__getLastRequest());
			print "</pre>";
			print "<pre>";
			print htmlspecialchars($this->client->__getLastResponseHeaders());
			print "</pre>";
			print "<pre>";
			print htmlspecialchars($this->client->__getLastResponse());
			print "</pre>";
		}
	}
?>