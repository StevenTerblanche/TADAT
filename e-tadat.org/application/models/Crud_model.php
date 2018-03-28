<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Crud_model extends CI_Model {
private $db_select;
	function __construct(){
		parent::__construct();
	}
	/* This is revised levels of Authority in Ascending order of importance
		1 = Developers
		2 = Site Owner
		3 = TADAT Secretariat
		4 = Mission Team Leader
		5 = IMF Appointed Assessor	
		6 = Revenue Authority
		7 = Observer (Limited read-only role)
		8 = Role with custom access permissions.
	*/

	/* 	Brief crud function explanation
		- action = Create, Update, disable, delete
		- tbl = The table the operation should occur on
		- form_data = what gets posted (if any)
		- id = The id of the record to be changed
		- fkID = the field in the database the it refers to - typically the primary index (id)
	*/
	function crud($action, $tbl, $form_data, $id, $fkID = null, $db = null){

	if ($db == null){$db_select = 'db';}else{$db_select = $db;}

		$switcher = lang('the_record_has_been_successfully_').lang('crud_'.trim($action));
        if ($action === 'create'){
			$form_data['dateCreated'] = date('Y-m-d H:i:s');
			$form_data['fkidUserCreated'] = $this->user->id;
	        $this->$db_select->insert($tbl, $form_data);
//			echo $this->db->last_query();
			$id = $this->$db_select->insert_id();
		}
        if ($action === 'update'){
			$form_data['dateUpdated'] = date('Y-m-d H:i:s');
			$form_data['fkidUserUpdated'] = $this->user->id;
			$this->$db_select->update($tbl, $form_data, array($fkID=>$id));
		}
		// Only their Site Admin can disable data
        if ($action === 'disable' && $this->user->fkidUserRole < 6){
			$this->$db_select->where($fkID, $id);
			$this->$db_select->update($tbl, array('status'=>0, 'fkidUserDisabled'=>$this->user->id, 'dateDisabled'=>date('Y-m-d H:i:s')));
    	}
		// Only their Site Admin can disable data
        if ($action === 'enable' && $this->user->fkidUserRole < 6){
			$this->$db_select->where($fkID, $id);
			$this->$db_select->update($tbl, array('status'=>1, 'fkidUserUpdated'=>$this->user->id, 'dateUpdated'=>date('Y-m-d H:i:s')));
    	}		
		// Only us 'grown-ups' can delete data
		if ($action === 'delete' && $this->user->fkidUserRole < 6){
			$this->$db_select->delete($tbl, array($fkID => $id));
    	}

//		$this->session->set_flashdata('message', $switcher);
		return (empty($id)) ? true : $id;
	}
}