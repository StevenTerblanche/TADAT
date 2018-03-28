<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Uploads extends Core_Controller{
    function __construct(){
        parent::__construct();
    }
	
	function do_upload(){
		$CI =& get_instance();
//		$fkidUserReference = $CI->input->post('fkidUserReference');
//		$uUploadType = $CI->input->post('uUploadType');	
		$options = array(
							'fkidUserReference' => $CI->input->post('fkidUserReference'), 
							'uploadType' => $CI->input->post('uUploadType'),
							'short_url' => 'data/files/users/',
							'script_url' => base_url().'/uploads/do_upload',
							'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/data/files/users/',
							'upload_url' => base_url().'/data/files/users/',
							'user_dirs' => true,
							'database' => $this->db->database,
							'host' => $this->db->hostname,
							'username' => $this->db->username,
							'password' => $this->db->password
						);
		$this->load->library("UsersUploadHandler" ,$options);
	}
}