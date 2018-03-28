<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cm_model extends CI_Model {
private $db_select;
	function __construct(){
		parent::__construct();
	}

	function cm_crud($tbl, $form_data, $extended_sql){
			$form_data['dateCreated'] = date('Y-m-d H:i:s');
			$form_data['fkidUserCreated'] = $this->user->id;
	        $this->db_portal->replace($tbl, $form_data);

	}
}