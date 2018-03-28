<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Classmarker extends Core_Controller {

	public $apiKey;							//API Key
	public $secret;							//API secret string
	public $signature;						//Signature for verification - created by self::setApiCredentials()
	public $finished_after_timestamp;		//Return only results taken after this time. -2 weeks as far back as results can be retrieved - Save your results in your tables.
	public $limit;							//how many results to return. Max 200
	public $api_version;					//Api version you are requesting
	public $api_base_url;					//ClassMarker's api base url to call
	public $request_path;					//The request path to get your results. Example /v1/recent_results.json
	public $request_parameters;				//The paramaters snd to ClassMarker. 	Example ?api_key, signature, timestamps etc
	public $request_type;					// get_available_tests | get_results
	public $error_message; 					//used to see is an error has occurred "before" making a request to ClassMarker
	public $response;						//ClassMarker response
	public $data, $assets, $content_data;

	function __construct() {
		parent::__construct();
		$this->apiKey 			 		= $this->config->item('cm_api_key');
		$this->secret 			 		= $this->config->item('cm_api_secret');
		$this->signature 		 		= md5($this->apiKey . $this->secret . time());
		$this->api_version 		 		= $this->config->item('cm_api_version');
		$this->api_base_url 	 		= $this->config->item('cm_api_base_url');
		$this->error_message 	 		= false;
		$this->limit 			 		= 200;
		$this->finished_after_timestamp = 1477902815;		
		$this->setResponseFormat 		= 'json';
		$this->format 					= '.json';		

		$this->load->model('cm_model');	
		$this->load->library('cm_library');		
		$this->load->helper('training/workshops/workshop');		
		$this->database = 'portal';
		$this->data = $this->includes;
		$this->page_header = 'MANAGE WORKSHOP';		

	}
	
/* DO REROUTE CHECK IF OFF-LINE*/
	function update_results(){
		$this->passedUserId = null;
//		$this->passedUserId = ($this->input->get('cm_user_id')) ? $this->input->get('cm_user_id') : (($this->input->post('cm_user_id')) ? $this->input->post('cm_user_id') : null);
		if($this->passedUserId){
			$userid = $this->auto_update_tests($this->passedUserId, 0);			
		}else{
			$userid = $this->auto_update_tests($this->passedUserId, null);	
		}

			$this->panel_title = 'WORKSHOP RESULTS';
			$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/data_tables.js"));
			$this->data = $this->includes;
			$response_format 			= 'json';
			$request_type 				= 'get_all_recent_results';
			$request_results_type 		= 'links';
			$finished_after_timestamp 	= $this->cm_library->getHighestTimeStamp($request_results_type);
			$display_raw_reponse 		= false;
			$classmarkerApiObj 			= new Cm_library($this->apiKey, $this->secret, $this->format);
			
			if ($request_type == 'get_all_recent_results'){
				$classmarkerApiObj->getRecentResults($request_results_type, $finished_after_timestamp);
			}else if($request_type == 'get_specific_recent_results'){
				$group_or_link_id = 1; 
				$test_id = 1; 
				$classmarkerApiObj->getSingleTestResults($request_results_type, $group_or_link_id, $test_id, $finished_after_timestamp);
			}else if($request_type == 'available_groups'){
				$classmarkerApiObj->getAvailableLinks();
			}else{
				echo 'No data. Did you select a valid $request_type.';
				exit;
			}
			
			if ($classmarkerApiObj->doesPreRequestErrorExists()){
				echo $classmarkerApiObj->getError();
				exit;
			} else {
				$response = $classmarkerApiObj->getResponse();
				if ($response == ''){
					echo 'No data. Did you select a valid $request_type.';
					exit;
				}
			}
	
			$results = json_decode($response, true);

			if ( $results['status'] == 'error' || $results['status'] == 'no_results' || $results['status'] == 'request_limit_reached' ){
				$content_data['result_status'] = false;
			}else{
				$content_data['result_status'] = true;
			
				/* Add results to array */
				foreach ($results['results'] as $element){
					$results_array[] = $element['result'];
				}
			
		
				# Insert groups results
				foreach ($results_array as $result){
					if($result['cm_user_id'] !== ''){
						$result_data = array(
							'link_result_id'	=> $result['link_result_id'],
							'test_id'			=> $result['test_id'],
							'link_id'			=> $result['link_id'],
							'cm_user_id' 		=> $result['cm_user_id'],						
							'percentage' 		=> $result['percentage'],
							'points_scored' 	=> $result['points_scored'],
							'points_available' 	=> $result['points_available'],
							'time_started' 		=> $result['time_started'],
							'time_finished' 	=> $result['time_finished'],
							'duration' 			=> $result['duration'],
							'test_status'		=> $result['status'],
							'requires_grading' 	=> $result['requires_grading'],
							'access_code' 		=> $result['access_code'],
							'ip_address' 		=> $result['ip_address'],
							'points_scored' 	=> $result['points_scored'],
							'points_available' 	=> $result['points_available']
						);
						$extended_sql = ' ON DUPLICATE KEY UPDATE percentage = ' . $result['percentage'];
						$this->cm_model->cm_crud('TrainingWorkshopsCmResults', $result_data, $extended_sql);
					}
				}
			}

			if($userid){
				$content_data['get_classmarker_results'] = _get_classmarker_results($userid);
			}else{
				$content_data['get_classmarker_results'] = _get_classmarker_results();
			}
			
			$this->data['content'] = $this->load->view('training/workshops/workshop_results', $content_data, true);
			$this->load->view($this->template, $this->data);
	}


	function auto_update_tests($userId, $passedStatus){
		$response_format 			= 'json';
		$request_type 				= 'get_all_recent_results';
		$request_results_type 		= 'links';
		$finished_after_timestamp 	= $this->cm_library->getHighestTimeStamp($request_results_type);
		$display_raw_reponse 		= false;
		$classmarkerApiObj 			= new Cm_library($this->apiKey, $this->secret, $this->format);
		
		$classmarkerApiObj->getRecentResults($request_results_type, $finished_after_timestamp);
		
		if ($classmarkerApiObj->doesPreRequestErrorExists()){
			echo $classmarkerApiObj->getError();
			exit;
		} else {
			$response = $classmarkerApiObj->getResponse();
			if ($response == ''){
				echo 'No data. Did you select a valid $request_type.';
				exit;
			}
		}
		$results = json_decode($response, true);
		if ($results['status'] == 'error' || $results['status'] == 'no_results' || $results['status'] == 'request_limit_reached' ){
			$content_data['result_status'] = false;
		}else{
			$content_data['result_status'] = true;

			/* Add tests names and ids to array */
			foreach ($results['tests'] as $element){
				$tests_array[ $element['test']['test_id'] ] = $element['test']['test_name'];
			}

			# Insert tests data 
			foreach ($tests_array as $test_id => $test_name){
				$test_data = array(
					'test_id' => $test_id,
					'test_name' => $test_name
				);
				$extended_sql = ' ON DUPLICATE KEY UPDATE test_name = ' . $test_name;
				$this->cm_model->cm_crud('TrainingWorkshopsCmTests', $test_data, $extended_sql);
			}
		}
		
		if($userId){
			return $userId;
		}else{
			return $passedStatus;
		}
		
	}



	function update_tests(){
		$this->panel_title = 'COMPLETED WORKSHOPS';
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/data_tables.js"));
		$this->data = $this->includes;
		$response_format 			= 'json';
		$request_type 				= 'get_all_recent_results';
		$request_results_type 		= 'links';
		$finished_after_timestamp 	= $this->cm_library->getHighestTimeStamp($request_results_type);
		$display_raw_reponse 		= false;
		$classmarkerApiObj 			= new Cm_library($this->apiKey, $this->secret, $this->format);
		
		$classmarkerApiObj->getRecentResults($request_results_type, $finished_after_timestamp);
		
		if ($classmarkerApiObj->doesPreRequestErrorExists()){
			echo $classmarkerApiObj->getError();
			exit;
		} else {
			$response = $classmarkerApiObj->getResponse();
			if ($response == ''){
				echo 'No data. Did you select a valid $request_type.';
				exit;
			}
		}

		

		$results = json_decode($response, true);
		if ($results['status'] == 'error' || $results['status'] == 'no_results' || $results['status'] == 'request_limit_reached' ){
			$content_data['result_status'] = false;
		}else{
			$content_data['result_status'] = true;

			/* Add tests names and ids to array */
			foreach ($results['tests'] as $element){
				$tests_array[ $element['test']['test_id'] ] = $element['test']['test_name'];
			}

			# Insert tests data 
			foreach ($tests_array as $test_id => $test_name){
				$test_data = array(
					'test_id' => $test_id,
					'test_name' => $test_name
				);
				$extended_sql = ' ON DUPLICATE KEY UPDATE test_name = ' . $test_name;
				$this->cm_model->cm_crud('TrainingWorkshopsCmTests', $test_data, $extended_sql);
			}


		}

		if($this->user->fkidUserRole === '1' || $this->user->fkidUserRole === '2'){
			$content_data['get_record_all_workshops'] = _get_record_all_workshops();
		}elseif($this->user->fkidUserRole === '11'){
			$content_data['get_record_all_workshops'] = _get_record_all_workshops($this->user->id);			
		}




		$this->data['content'] = $this->load->view('training/workshops/workshop_list_for_results', $content_data, true);
		$this->load->view($this->template, $this->data);
	}
	
	function update_links(){
		$this->panel_title = 'WORKSHOP LINKS';
		$response_format 			= 'json';
		$request_type 				= 'available_groups';
		$request_results_type 		= 'links';
		$finished_after_timestamp 	= $this->cm_library->getHighestTimeStamp($request_results_type);
		$display_raw_reponse 		= false;
		$classmarkerApiObj 			= new Cm_library($this->apiKey, $this->secret, $this->format);
		$classmarkerApiObj->getAvailableLinks();
		
		if ($classmarkerApiObj->doesPreRequestErrorExists()){
			echo $classmarkerApiObj->getError();
			exit;
		} else {
			$response = $classmarkerApiObj->getResponse();
			if ($response == ''){
				echo 'No data. Did you select a valid $request_type.';
				exit;
			}
		}
		$results = json_decode($response, true);
		foreach ($results['links'] as $element){
			$link_data = array(
				'link_id' => $element['link']['link_id'],
				'link_name' => $element['link']['link_name'],
				'link_url' => $element['link']['link_url_id']					
			);
			$extended_sql = ' ON DUPLICATE KEY UPDATE link_name = ' . $element['link']['link_name'];
			$this->cm_model->cm_crud('TrainingWorkshopsCmLinks', $link_data, $extended_sql);
		}
		$this->content_data['get_classmarker_links'] = _get_classmarker_links();
		$this->data['content'] = $this->load->view('training/workshops/workshop_links', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
}