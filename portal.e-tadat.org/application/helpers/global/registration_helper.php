<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = COMPLETE!
		NORMALISE = COMPLETE!
		COMMENTS = COMPLETE!
		echo get_instance()->db->last_query();
	 */




	# GET USER DETAILS BY ID
	function _get_record_by_reference_user($reference = null){
        if (!$reference) return false;
		get_instance()->db->select('Users.*, UserProfile.*');
		get_instance()->db->from('Users');
		get_instance()->db->join('UserProfile', 'UserProfile.fkidUserId = Users.id');
        get_instance()->db->where('Users.referenceNumber',$reference);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}

	function _get_record_by_reference_invitee($reference = null){
        if (!$reference) return false;
		get_instance()->db_training->select('WorkshopInvitees.*');
		get_instance()->db_training->from('WorkshopInvitees');
        get_instance()->db_training->where('WorkshopInvitees.referenceNumber',$reference);
		$query = get_instance()->db_training->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}


	# FUNCTION TO GET USER DOCUMENTS
	function _get_documents_by_reference_user($userID = null){
        if (!$reference) return false;
		get_instance()->db->select('Users.id');
		get_instance()->db->from('Users');
		get_instance()->db->join('UserDocuments', 'UserDocuments.fkidUserReference = Users.referenceNumber');
        get_instance()->db->where('Users.id',$userID);
        get_instance()->db->where('Users.referenceNumber',$reference);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}

	# FUNCTION TO GET USER DOCUMENTS
	function _update_documents_by_reference_user($userID = null){
        if (!$userID) return false;
		get_instance()->db->select('Users.id');
		get_instance()->db->from('Users');
		get_instance()->db->join('UserDocuments', 'UserDocuments.fkidUserReference = Users.referenceNumber');
        get_instance()->db->where('Users.id',$userID);
        get_instance()->db->where('Users.referenceNumber',$reference);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}






	# CREATE LANGUAGES CHECKBOXES
	function _get_checkboxes_all_languages(){
		get_instance()->db->order_by("language", "ASC");
		get_instance()->db->where('un','1');
		$query = get_instance()->db->get('Languages');		
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row){ 
				$result[] = array('id'=>$row['id'], 'language'=>$row['language']);
			}
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return false;
	}

	# LANGUAGES
	function _get_dropdown_all_languages_register(){
		get_instance()->db_portal->order_by("language", "ASC");
		$query = get_instance()->db_portal->get('Languages');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['language'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('language')) + $result;

			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('languages').lang('_found'));
	}

	

	# CREATE TAX ADMINISTRATION CHECKBOXES
	function _get_checkboxes_all_experience(){
		get_instance()->db->order_by("id", "ASC");
		$query = get_instance()->db->get('TaxAdministrationExperience');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row){ 
				$result[] = array('id'=>$row['id'], 'experience'=>$row['experience']);
			}
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return false;
	}


	# CREATE INTERESTS CHECKBOXES
	function _get_checkboxes_all_interests(){
		get_instance()->db->order_by("id", "ASC");
		$query = get_instance()->db->get('UserInterests');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row){ 
				$result[] = array('id'=>$row['id'], 'interests'=>$row['interests']);
			}
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return false;
	}




	# Gets all registered Users
    function _get_record_registration_user($userId){
		get_instance()->db->select('Users.*, UserProfile.*');
		get_instance()->db->from('Users');		
		get_instance()->db->join('UserProfile', 'UserProfile.fkidUserId = Users.id');
		get_instance()->db->where('Users.id', $userId);
		$query = get_instance()->db->get();
//		echo get_instance()->db->last_query();		
        if ($query->num_rows()){return $query->row();}
        return false;
    }


	# PROFESSIONS
	function _get_dropdown_all_occupation(){
		get_instance()->db->order_by("id", "ASC");
		$query = get_instance()->db->get('UserOccupation');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['occupation'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_an_').lang('occupation')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('occupation').lang('_found'));
	}


	# DEGREES
	function _get_dropdown_all_degrees(){
		get_instance()->db->order_by("id", "ASC");
		$query = get_instance()->db->get('Degrees');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['degree'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('degree')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('degree').lang('_found'));
	}

	# GENDER
	function _get_dropdown_all_genders(){
		get_instance()->db->order_by("gender", "ASC");
		$query = get_instance()->db->get('Genders');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['gender'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('gender')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('gender').lang('_found'));
	}

	# REGISTRATION USER ROLES
	function _get_dropdown_all_registration_roles(){
		$role_types = array(9,13);
		get_instance()->db->order_by("role", "ASC");
		get_instance()->db->where_in('role_type', $role_types);
		$query = get_instance()->db->get('UserRoles');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['role'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => 'Select a Registration Type') + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('organization_type').lang('_found'));
	}


	# ORGANIZATION TYPES
	function _get_dropdown_all_organization_types(){
		get_instance()->db->order_by("sortOrder", "ASC");
		$query = get_instance()->db->get('Organization_types');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['organization_type'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_an_').lang('organization_type')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('organization_type').lang('_found'));
	}







