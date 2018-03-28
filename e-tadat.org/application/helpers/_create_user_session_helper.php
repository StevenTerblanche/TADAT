<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	STATUS = DONE!
	LANGUAGE = DONE!
	NORMALISE = DONE!
	COMMENTS = DONE!
 */
function _set_user_session_by_id($id = null){
	# Set the userdata as logged in
	
	get_instance()->session->unset_userdata('logged_in');
	get_instance()->session->set_userdata('logged_in', 1);

	//print_r(get_instance()->users->objUser);

	$strfkidUserRole = null;
	$strId = null;


	foreach(get_instance()->users->objUser as $field => $content){
		# Here we ensure that the specific field in the userdata session is empty before assigning a new value
		get_instance()->session->unset_userdata($field);
		
		if($field == 'fkidUserRole'){
			$strfkidUserRole = $content;
			#  Assign 'Role' field to the userdata session and query the db with the fkidUserRole
			get_instance()->session->set_userdata('Role', _get_fields_by_id('UserRoles', 'id', $content, array('role')));
		}
		if($field == 'fkidRegion'){
			#  Assign 'Region' field to the userdata session and query the db with the fkidRegion
			get_instance()->session->set_userdata('Region', _get_fields_by_id('Regions', 'id', $content, array('region')));
		}
		if($field == 'fkidCountry'){
			#  Assign 'Country' field to the userdata session and query the db with the fkidCountry
			get_instance()->session->set_userdata('Country', _get_fields_by_id('Countries', 'id', $content, array('country')));
		}
		if($field == 'fkidLanguage'){
			#  Assign 'Language' field to the userdata session and query the db with the fkidLanguage
			get_instance()->session->set_userdata('Language', _get_fields_by_id('Languages', 'id', $content, array('language')));
		}
		
		if($field == 'id'){
			$strId = $content;
		}
		# Set a new value in the userdata session from the object iteration
		get_instance()->session->set_userdata($field, $content);
	}
		if(!is_null($strId) && !is_null($strfkidUserRole)){
			if($strfkidUserRole == 1 || $strfkidUserRole == 2 ||$strfkidUserRole == 4){
				$arrCombinedMission_RA = _get_current_missions_by_id_array($strId, $strfkidUserRole);			
	
				$arrRaAssignedID = array();
				$arrMissionAssignedID = array();		
				if($arrCombinedMission_RA){
					foreach($arrCombinedMission_RA as $key => $value){
						$arrRaAssignedID[] = $value['RAid'];	
						$arrMissionAssignedID[] = $value['MID'];	
					}		
					get_instance()->session->set_userdata('assignedTa', $arrRaAssignedID);
					get_instance()->session->set_userdata('assignedMission', $arrMissionAssignedID);
				}
			}else{
				get_instance()->session->set_userdata('assignedTa', null);
				get_instance()->session->set_userdata('assignedMission', null);
			}
		}	
	return true;
}

	function _get_current_missions_by_id_array($id = null, $role = null){
        if (!$id) return false;
		get_instance()->db->select('RevenueAuthorities.id AS RAid, Missions.id AS MID');
		get_instance()->db->from('Missions');
		get_instance()->db->join('RevenueAuthorities', 'RevenueAuthorities.id = Missions.fkidRevenueAuthority');

		if ($role == 4){
			$id_checker = 'Missions.fkidTeamLeader';
			}

		if ($role == 1 || $role == 2){
			$id_checker = 'Missions.fkidUserCreated';
			}

        get_instance()->db->where(array($id_checker=>$id, 'Missions.fkidMissionStatus'=>3));
		
		$query = get_instance()->db->get();
        if ($query->num_rows()){
			return $query->result_array();
			}
        return false;	
	}		
