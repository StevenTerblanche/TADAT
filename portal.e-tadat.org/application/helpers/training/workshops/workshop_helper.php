<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = DONE!
		NORMALISE = DONE!
		COMMENTS = DONE!
		echo get_instance()->db->last_query();						
		echo $obj->db_portal->last_query();				
	 */

	function _get_record_all_workshops($UserId = null){
		get_instance()->db_training->select('*');
		get_instance()->db_training->from('Workshops');
		if($UserId){
			get_instance()->db_training->where('WorkshopRevenueAuthorityContactFkId',$UserId);	
		}
			$query = get_instance()->db_training->get();
        if ($query->num_rows()){
			return $query ->result_array();	
		}
        return false;
	}

	function _get_record_list_workshops($UserId = null){
		get_instance()->db_training->select('id, WorkshopName, WorkshopCity');
		get_instance()->db_training->from('Workshops');
		if($UserId){
			get_instance()->db_training->where('WorkshopRevenueAuthorityContactFkId',$UserId);	
		}
			$query = get_instance()->db_training->get();
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['WorkshopName'] . ' - ' .  " (" .  $row['WorkshopCity'] . ")";
			$result = array('' => lang('select_a_').lang('workshop')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' =>'No Workshops found!');
    }

	function _get_record_all_workshop_invitees($workshopId){
		get_instance()->db_training->select('WorkshopInvitees.*');
		get_instance()->db_training->from('WorkshopInvitees');
		get_instance()->db_training->where('WorkshopFkId',$workshopId);
		$query = get_instance()->db_training->get();
        if ($query->num_rows()){
			return $query ->result_array();	
		}
        return false;
	}


	function _get_record_all_workshop_by_attendees($UserId){
		get_instance()->db_training->select('WorkshopLinker.WorkshopFkId');
		get_instance()->db_training->from('WorkshopLinker');
		get_instance()->db_training->where('UserFkid',$UserId);
		$query = get_instance()->db_training->get();
        if ($query->num_rows()){
			$arrWorkshops = array();
			foreach ($query->result_array() as $row) $arrWorkshops[] = $row['WorkshopFkId'];
		}
		get_instance()->db_training->select('Workshops.*');
		get_instance()->db_training->from('Workshops');
		get_instance()->db_training->where_in('id',$arrWorkshops);
		$query = get_instance()->db_training->get();
        if ($query->num_rows()){
			$result = array();
			return $query ->result_array();	
		}
        return false;
	}



	
    function _get_dropdown_all_workshop_ra_administrators(){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id, Titles.title, Users.name, Users.surname, UserProfile.fkid_country_citizen, Countries.country');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle');				
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id');				
		$obj->db_portal->join('Countries', 'Countries.id = UserProfile.fkid_country_residence');						
		$obj->db_portal->where('fkidUserRole','11');
		$query = $obj->db_portal->get();
//		echo $obj->db_portal->last_query();								
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['name'] . ' ' . $row['surname'] . " (" .  $row['country'] . ")";
			$result = array('' => lang('select_a_').lang('ra_workshop_administrator')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('ra_workshop_administrators').lang('_found'));
    }
	

	function _get_classmarker_results($userId=null){
		$obj =& get_instance();
		$obj->db_portal->select('TrainingWorkshopsCmResults.percentage, TrainingWorkshopsCmResults.points_scored, TrainingWorkshopsCmResults.points_available, TrainingWorkshopsCmResults.time_started, TrainingWorkshopsCmResults.time_finished, TrainingWorkshopsCmResults.duration, TrainingWorkshopsCmResults.test_status, Users.name, Users.surname, Titles.title, TrainingWorkshopsCmTests.test_name, TrainingWorkshopsCmLinks.link_name');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('TrainingWorkshopsCmResults', 'TrainingWorkshopsCmResults.cm_user_id = Users.id');		
		$obj->db_portal->join('TrainingWorkshopsCmTests', 'TrainingWorkshopsCmTests.test_id = TrainingWorkshopsCmResults.test_id');	
		$obj->db_portal->join('TrainingWorkshopsCmLinks', 'TrainingWorkshopsCmLinks.link_id = TrainingWorkshopsCmResults.link_id');						
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle');								
		if($userId){
			$obj->db_portal->where('cm_user_id',$userId);
		}
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}
	

	function _get_record_workshop_test_result(){
		$obj =& get_instance();
		$obj->db_portal->select('*');
		$obj->db_portal->from('TrainingWorkshopsCmResults');
		
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}	
	
	function _get_record_workshop_test_result_by_id($id){
		$obj =& get_instance();
		
		/* Get the Workshop link_url FIRST!*/
		$obj->db_training->select('Workshops.WorkshopName, Workshops.WorkshopPassmark, Workshops.WorkshopLink AS WorkshopLinkUrl');
		$obj->db_training->from('Workshops');
		$obj->db_training->where('Workshops.id', $id);
		$workshops = $obj->db_training->get();

        if ($workshops->num_rows()){
			$arrWorkshopDetail = $workshops->row_array();
			$arrWorkshopDetail['WorkshopLinkUrl'];		
			/* NOW GET THE LINK ID FROM URL */

			$obj->db_portal->select('TrainingWorkshopsCmLinks.link_id');
			$obj->db_portal->from('TrainingWorkshopsCmLinks');
			$obj->db_portal->where('TrainingWorkshopsCmLinks.link_url', $arrWorkshopDetail['WorkshopLinkUrl']);	
			$links = $obj->db_portal->get();
			if ($links->num_rows()){
				$arrWorkshoplink = $links->row_array();
				$strWorkshopLinkId = $arrWorkshoplink['link_id'];
				$obj->db_portal->select('TrainingWorkshopsCmResults.percentage, TrainingWorkshopsCmResults.points_scored, TrainingWorkshopsCmResults.points_available, TrainingWorkshopsCmResults.time_started, TrainingWorkshopsCmResults.time_finished, TrainingWorkshopsCmResults.duration, TrainingWorkshopsCmResults.test_status, Users.id, Users.name, Users.surname, Titles.title, TrainingWorkshopsCmTests.test_name, TrainingWorkshopsCmLinks.link_name');
				$obj->db_portal->from('Users');
				$obj->db_portal->join('TrainingWorkshopsCmResults', 'TrainingWorkshopsCmResults.cm_user_id = Users.id');		
				$obj->db_portal->join('TrainingWorkshopsCmTests', 'TrainingWorkshopsCmTests.test_id = TrainingWorkshopsCmResults.test_id');	
				$obj->db_portal->join('TrainingWorkshopsCmLinks', 'TrainingWorkshopsCmLinks.link_id = TrainingWorkshopsCmResults.link_id');						
				$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle');								
				$obj->db_portal->where('TrainingWorkshopsCmResults.link_id', $strWorkshopLinkId);	
				$query = $obj->db_portal->get();
				if ($query->num_rows()){
					$arrResults = $query ->result_array();
					foreach($arrResults as &$value) {
						$value['WorkshopPassmark'] = $arrWorkshopDetail['WorkshopPassmark'];
						$value['WorkshopName'] = $arrWorkshopDetail['WorkshopName'];	
					}
					return $arrResults;
				}
				return false;

			}
			return false;
		}		
		return false;		
	}	

	function _get_certificate_recipient($id){
		$obj =& get_instance();
		$obj->db_portal->select('Users.name, Users.surname');
		$obj->db_portal->from('Users');
		$obj->db_portal->where('id', $id);
		$user = $obj->db_portal->get();
        if ($user->num_rows()){
			$arrUser = $user->row_array();
			$strUser = $arrUser['name'].' '.$arrUser['surname'];
			return $strUser;
		}
		return false;
	}


			

	function _get_classmarker_tests(){
		$obj =& get_instance();
		$obj->db_portal->select('TrainingWorkshopsCmTests.*');
		$obj->db_portal->from('TrainingWorkshopsCmTests');
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}	
	
	function _get_classmarker_tests_by_workshop_admin($userId){
		$obj =& get_instance();
		$obj->db_training->select('Workshops.WorkshopLink');
		$obj->db_training->from('Workshops');
		$obj->db_training->where('WorkshopRevenueAuthorityContactFkId', $userId);					
		$query = get_instance()->db_training->get();
        if ($query->num_rows()){
			$arrLinks = array();
			foreach ($query->result_array() as $row) $arrLinks[] = $row['WorkshopLink'];
		}

		$obj->db_portal->select('TrainingWorkshopsCmLinks.link_id');
		$obj->db_portal->from('TrainingWorkshopsCmLinks');
		$obj->db_portal->where_in('link_url',$arrLinks);
		$query = get_instance()->db_portal->get();
        if ($query->num_rows()){
			$arrLinkIds = array();
			foreach ($query->result_array() as $row) $arrLinkIds[] = $row['link_id'];
		}

		$obj->db_portal->select('TrainingWorkshopsCmResults.test_id');
		$obj->db_portal->from('TrainingWorkshopsCmResults');
		$obj->db_portal->where_in('link_id',$arrLinkIds);
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			$arrTestIds = array();
			foreach ($query->result_array() as $row) $arrTestIds[] = $row['test_id'];
		}

		$obj->db_portal->select('*');
		$obj->db_portal->from('TrainingWorkshopsCmTests');
		$obj->db_portal->where_in('test_id',$arrTestIds);
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			$result = array();
			return $query ->result_array();	
		}
        return false;
	}

	
	
	
	
	function _get_classmarker_links(){
		$obj =& get_instance();
		$obj->db_portal->select('*');
		$obj->db_portal->from('TrainingWorkshopsCmLinks');
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}		
	
	
	
	function _get_dropdown_all_workshop_links(){
		get_instance()->db_portal->select('link_url,link_name');
		get_instance()->db_portal->from('TrainingWorkshopsCmLinks');
		$query = get_instance()->db_portal->get();
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['link_url']] = $row['link_name'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('workshop').' '.lang('link')) + $result;
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('links').lang('_found'));
    }
	
