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


		echo $this->db_portal->last_query();

	*/

	function crud_register($form_data, $table){
				$form_data['dateCreated'] = date('Y-m-d H:i:s');
				$this->db_portal->insert($table, $form_data);				
//		echo $this->db_portal->last_query();				
				$id = $this->db_portal->insert_id();
				return (empty($id)) ? true : $id;
	}


	function crud_connect_register($form_data, $table){
				$this->db_connect->insert($table, $form_data);				
				$id = $this->db_connect->insert_id();
				return (empty($id)) ? true : $id;
	}

	function crud_connect_update($form_data, $table, $fkID, $id){
			$this->db_connect->update($table, $form_data, array($fkID=>$id));
	}


	function crud_register_update($table, $form_data, $id){
		$this->db_portal->update($table, $form_data, array('id'=>$id));
		return;
	}

	function crud_register_update_profile($table, $form_data, $id){
		$this->db_portal->update($table, $form_data, array('fkidUserId'=>$id));
//		echo get_instance()->db_portal->last_query();						
		return;
	}


	function crud_register_update_documents($table, $reference, $document_data){
		$this->db_portal->where('fkidUserReference like', '%' . $reference . '%');
		$this->db_portal->update($table, $document_data);
		return;
	}



	function crud($action, $tbl, $form_data, $id, $fkID = null, $db = null){
        if ($action === 'create'){
			$form_data['dateCreated'] = date('Y-m-d H:i:s');
			$form_data['fkidUserCreated'] = $this->user->id;
	        $this->$db->insert($tbl, $form_data);
			$id = $this->$db->insert_id();
		}
        if ($action === 'update'){
			$form_data['dateUpdated'] = date('Y-m-d H:i:s');
			$form_data['fkidUserUpdated'] = $this->user->id;
			$this->$db->update($tbl, $form_data, array($fkID=>$id));
		}
		// Only their Site Admin can disable data
        if ($action === 'disable' && $this->user->fkidUserRole < 6){
			$this->$db->where($fkID, $id);
			$this->$db->update($tbl, array('status'=>0, 'fkidUserDisabled'=>$this->user->id, 'dateDisabled'=>date('Y-m-d H:i:s')));
    	}
		// Only their Site Admin can disable data
        if ($action === 'enable' && $this->user->fkidUserRole < 6){
			$this->$db->where($fkID, $id);
			$this->$db->update($tbl, array('status'=>1, 'fkidUserUpdated'=>$this->user->id, 'dateUpdated'=>date('Y-m-d H:i:s')));
    	}		
		// Only us 'grown-ups' can delete data
		if ($action === 'delete' && $this->user->fkidUserRole < 6){
			$this->$db->delete($tbl, array($fkID => $id));
    	}

		return (empty($id)) ? true : $id;
	}
}