<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Uploads extends Core_Controller{
    function __construct(){
        parent::__construct();
    }
	
	function do_upload(){
		$CI =& get_instance();
		$uFkidUser = $CI->input->post('fkidUser');
		$uFkidMission = $CI->input->post('fkidMission');
		$uFkidIndicator = $CI->input->post('fkidIndicator');
		if($CI->input->post('fkidDimension') >= 1){
			$uFkidDimension = $CI->input->post('fkidDimension');			
		}else{
			$uFkidDimension = 0;
		}
		$uUploadType = $CI->input->post('uUploadType');	
		$options = array('fkidUser' => $uFkidUser, 'fkidMission' => $uFkidMission, 'fkidPi' => $uFkidIndicator, 'fkidDimension' => $uFkidDimension, 'uploadType' => $uUploadType);
		//error_reporting(E_ALL | E_STRICT);
		$this->load->library("UploadHandler" ,$options);
	}
}