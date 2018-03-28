<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = DONE!
		NORMALISE = DONE!
		COMMENTS = DONE!
		echo get_instance()->db->last_query();						
	 */

 function _global_get_fields_by_id($table, $in, $id, $out = array(), $seperator = null, $db = null, $numRecords = null){
		if($db == null){return false;}
		$db =& get_instance()->$db; 

		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}
		$query = $db->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){
			$fields ='';
			$delimiter  = array();
			foreach($out as $field){				
				# Regular expression removes all AlphaNumeric characters as well as - and _ and returns an array of enclosures to wrap the specified fields in.
				$delimiter = preg_replace('/[\_^\da-zA-Z -]/', '', $field);
				# Regular expression removes all special characters excluding - and _ and returns the specified field name.
				$fields .= (!empty($delimiter[0])? $delimiter[0]:'') . $query->row(preg_replace('/[\'\/~`\!@#\$%\^&\*\(\) +=\{\}\[\]\|;:"\<\>,\.\?\\\]/', '', $field)).(!empty($delimiter[1])? $delimiter[1]:'') . $seperator;
			}
			# Removes seperator from end of line
			return rtrim($fields, $seperator);
			}
        return false;
    }


function _global_get_user_full_name($id = null){
	$db =& get_instance()->db_portal;
	$db->select('Users.name, Users.surname, Titles.title');
	$db->from('Users');
	$db->join('Titles', 'Titles.id = Users.fkidTitle');
    $db->where('Users.id', $id);
	$query = $db->get();
    if ($query->num_rows()){
		foreach ($query->result_array() as $row){ 
			$strFullName = $row['title']. ' ' .$row['name'].' '. $row['surname'];
		}
		return $strFullName;	
	}
    return false;
}



function _get_hash_by_id($id = null){
	$db =& get_instance()->db_portal;
	$db->select('loginPasswordHash');
	$db->from('Users');
    $db->where('id', $id);
	$query = $db->get();
    if ($query->num_rows()){return $query->row_array();}
    return false;
}



 function _global_convert_id_to_name($field_name, $table, $id, $db = null){
		if($db == null){
			$db =& get_instance()->db_portal;
		}else{
			$db =& get_instance()->$db; 
		}
		$db->select($field_name);
		$db->from($table);
		$db->where('id', $id);
		$query = $db->get();
        if ($query->num_rows()){
			$row = $query->row();
			return $row->$field_name;
		}
        return false;
    }


 function _get_documents_by_reference_or_id($referenceNumber = null, $id = null){
		$db =& get_instance()->db_portal;
		$db->select('documentTitle, documentDescription, documentName, documentSize, documentType, documentPath, thumbPath');
		$db->from('UserDocuments');
		if(!$referenceNumber){
			$db->where('fkidUserId', $id);
		}else{
			$db->where('fkidUserReference', $referenceNumber);			
		}
		$query = $db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }


	function formatBytes($size, $precision = 2){
		$base = log($size, 1024);
		$suffixes = array('', 'KB', 'MB', 'GB', 'TB');   
		return round(pow(1024, $base - floor($base)), $precision) . ' '.$suffixes[floor($base)];
	}




	# TRAINING USER STATUS
	function _get_dropdown_all_training_user_status($statusType = array()){
		get_instance()->db_portal->order_by("status", "ASC");
		get_instance()->db_portal->from('UserStatus');
		if (!empty($statusType)){
			get_instance()->db_portal->where_in('id', $statusType);
		}
			$query = get_instance()->db_portal->get();
		
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['status'];
			$result = array('' => lang('select_a_').lang('status')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('languages').lang('_found'));
	}


 	# USER ROLES
    function _get_dropdown_all_roles($checkStatus = null, $checkTester = array(), $checkRole = array()){
		get_instance()->db_portal->select('id,role');
		get_instance()->db_portal->from('UserRoles');
		if (!empty($checkRole)) get_instance()->db_portal->where_in('id', $checkRole);
		$query =  get_instance()->db_portal->get();
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['role'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('user').lang('_role')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('user').lang('_roles').lang('_found'));
    }



    function _get_dropdown_all_secretariat(){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id, Titles.title, Users.name, Users.surname, UserProfile.fkid_country_citizen, Countries.country');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle');				
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id');				
		$obj->db_portal->join('Countries', 'Countries.id = UserProfile.fkid_country_residence');						
		$obj->db_portal->where('fkidUserRole','2');
		$query = $obj->db_portal->get();
//		echo $obj->db_portal->last_query();								
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['name'] . ' ' . $row['surname'] . " (" .  $row['country'] . ")";
			$result = array('' => lang('select_a_').lang('workshop').' '.lang('facilitator')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('workshop').' '.lang('facilitator').lang('_found'));
    }

	# LANGUAGES
	function _get_dropdown_all_languages(){
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

	# TITLES
	function _get_dropdown_all_titles(){
		get_instance()->db_portal->order_by("id", "ASC");
		$query = get_instance()->db_portal->get('Titles');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['title'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('title')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('titles').lang('_found'));
	}


	# WORKSHOP DURATION
	function _get_dropdown_all_workshop_duration(){
		get_instance()->db_training->order_by("WorkshopDuration", "ASC");
		$query = get_instance()->db_training->get('WorkshopDuration');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['WorkshopDuration'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('workshop').' '.lang('duration')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('workshop').' '.lang('duration').lang('_found'));
	}


	# WORKSHOP TYPES
	function _get_dropdown_all_workshop_types(){
		get_instance()->db_training->order_by("WorkshopType", "ASC");
		$query = get_instance()->db_training->get('WorkshopTypes');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['WorkshopType'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('workshop').' '.lang('type')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('workshop').' '.lang('types').lang('_found'));
	}

	# REGIONS
	function _get_dropdown_all_region(){
		get_instance()->db_portal->order_by("region", "ASC");
		$query = get_instance()->db_portal->get('Regions');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['region'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('region')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('regions').lang('_found'));
	}

	# COUNTRIES
	function _get_dropdown_all_country(){
		get_instance()->db_portal->order_by("country", "ASC" );
		$query = get_instance()->db_portal->get('Countries');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['country'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('country')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('countries').lang('_found'));
	}	
	# COUNTERPARTS

	function _get_dropdown_by_id_counterparts($id = null, $ignore = null){
		get_instance()->db_cloud_main->select('RevenueAuthorities.fkidUser, RevenueAuthorities.fkidCounterpart');
		get_instance()->db_cloud_main->from('RevenueAuthorities');		
		get_instance()->db_cloud_main->where('RevenueAuthorities.id', $id);
		$arrCounterparts = get_instance()->db_cloud_main->get();
		if ($arrCounterparts->num_rows()){
			foreach ($arrCounterparts->result_array() as $row => $counterparts){
				 $counterparts_result = array($counterparts['fkidUser'], $counterparts['fkidCounterpart']);
				 }
		}
		get_instance()->db_portal->select('Users.id, Titles.title, Users.name, Users.surname, UserRoles.role');
		get_instance()->db_portal->from('Users');		
		get_instance()->db_portal->join('Titles', 'Titles.id = Users.fkidTitle');
		get_instance()->db_portal->join('UserRoles', 'UserRoles.id = Users.fkidUserRole');		
		
		get_instance()->db_portal->where_in('Users.id',$counterparts_result);
		$query = get_instance()->db_portal->get();
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['title'] .' '. $row['name'] .' '. $row['surname'] .' ('. $row['role'].')';
			return $result = ($ignore === 'no')? array('' => lang('select_a_').lang('counterpart'))+$result : $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('counterpart').lang('_found'));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	