<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Cm_library{
	protected $CI;
	public $objCm = null;
	public $obj;
	public function __construct(){		
		$obj =& get_instance();
	}

	function getAvailableLinks(){
		$obj =& get_instance();
		if (!$obj->cm_library->setApiCredentials()){
			return false;
		}
		$obj->request_path = 'v'.$obj->api_version.''.$obj->format.'?'.$obj->request_parameters;
		if  (!$obj->cm_library->makeRequest() ){
			return false;
		}
		return true;
	}
	
	function setApiCredentials(){
		$obj =& get_instance();
		if (!$obj->cm_library->setApiVersion($obj->api_version)){
			return false;
		}
		$obj->request_parameters = 'api_key='.$obj->apiKey.'&signature='.$obj->signature.'&timestamp='.time();
		return true;
	}	
	
	function setApiVersion($api_version){
		$obj =& get_instance();
		$available_versions = array(1);
		if (!in_array($api_version, $available_versions) ){
			$obj->error_message = 'Version not available';
			return false;
		}
		$obj->api_version = $api_version;
		return true;
	}	
	
	function makeRequest() {
		$obj =& get_instance();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $obj->api_base_url . $obj->request_path);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$obj->response = curl_exec($ch);
		if ($obj->response === false){
			$obj->error_message = 'cURL failed on curl_exec().';
			make_error(2);
			return false;
		}

		curl_close($ch);
	}	

	function make_error($err_no){
		$obj =& get_instance();		
		echo 'error at:'.$err_no;		
	}

	function doesPreRequestErrorExists(){
		$obj =& get_instance();		
		if ($obj->error_message !== false){
			return true;
		} else {
			return false;
		}
	}	
	
	function getResponse() {
		$obj =& get_instance();		
		return $obj->response;
	}
	
	function getRecentResults($group_type='links', $finished_after_timestamp=NULL, $limit=200){
		$obj =& get_instance();		
		$obj->request_type = 'get_results';
		$obj->cm_library->setApiCredentials();

		/* Basic $limit check - else use 200 as set in constructor */
		if (is_numeric($limit) && $limit <= 200){
			$obj->limit = $limit;
		}
		$obj->request_parameters .= '&limit='.$obj->limit;

		/* Basic $finished_after_timestamp check - else ClassMarker API will default use timestamp from 2 weeks ago */
		if (is_numeric($finished_after_timestamp) && $finished_after_timestamp >= strtotime("-2 weeks")){
			$obj->finished_after_timestamp = $finished_after_timestamp;
		} else {
			$obj->finished_after_timestamp = strtotime("-2 weeks");
		}
		$obj->request_parameters .= '&finishedAfterTimestamp='.$obj->finished_after_timestamp;
		$obj->request_path = 'v'.$obj->api_version.'/'.$group_type.'/recent_results'.$obj->format.'?'.$obj->request_parameters;
		if (!$obj->cm_library->makeRequest() ){
			return false;
		}
		return true;
	}
	
	
		/* Get the highest timestamp from results we have  */
		function getHighestTimeStamp($request_results_type){
		/*
			global $mysqli;
		
			if ( $request_results_type == 'groups' ){
		
				$table_name = 'training_cm_group_results';
		
		
			} else if ( $request_results_type == 'links'){
		
				$table_name = 'training_cm_link_results';
			}
		
			$query = 'SELECT max(time_finished) as highestTimestamp FROM '. $table_name;
		
		
			if ($result = $mysqli->query($query)) {
				while ( $obj = $result->fetch_object() ) {
					return $obj->highestTimestamp;
				}
		
			}
		*/
			/* Default will be 2 weeks ago if no timestamp is send to ClassMarker */
			return NULL;
		
		}
}