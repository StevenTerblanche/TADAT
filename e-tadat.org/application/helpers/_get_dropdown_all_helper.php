<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = COMPLETE!
		NORMALISE = COMPLETE!
		COMMENTS = COMPLETE!
		echo get_instance()->db->last_query();
	 */

	# ONLY DROPDOWNS GO HERE!!!
	# Use 'real-world' table names as defined in application/config/tables.php

 	# Gets All Performance Indicators( status = 1)
    function _get_dropdown_all_mds(){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		get_instance()->db_b->order_by("MeasurementDimensions.id", "ASC");		
		get_instance()->db_b->select("MeasurementDimensions.id, CONCAT(PerformanceIndicators.fkidPoa,'- Question ', PerformanceIndicators.indicatorNumber,' (', MeasurementDimensionTypes.typeName, '): ', MeasurementDimensions.dimensionName) AS 'poa'");
		get_instance()->db_b->from('MeasurementDimensions');
		get_instance()->db_b->join('PerformanceIndicators', 'MeasurementDimensions.fkidPi = PerformanceIndicators.id');
		get_instance()->db_b->join('MeasurementDimensionTypes', 'MeasurementDimensions.fkidDimensionType = MeasurementDimensionTypes.id');		
				
		//get_instance()->db_b->select('MeasurementDimensions.id, MeasurementDimensions.dimensionName, PerformanceIndicators.fkidPoa');
//		get_instance()->db_b->from('MeasurementDimensions');
//		get_instance()->db_b->join('PerformanceIndicators', 'MeasurementDimensions.fkidPi = PerformanceIndicators.id');
        $query = get_instance()->db_b->get();
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = 'POA: '.$row['poa'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('md')) + $result;
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('md').lang('_found'));
    }
	
 	# Gets All Measurement Dimension Types( status = 1)
    function _get_dropdown_all_mdt(){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
        $query = get_instance()->db_b->get_where('MeasurementDimensionTypes', array('status'=>'1'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['typeName'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('mdt')) + $result;
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('mdts').lang('_found'));
    }	

 	# Gets All Scoring Methods( status = 1)
    function _get_dropdown_all_sms(){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
        $query = get_instance()->db_b->get_where('ScoringMethods', array('status'=>'1'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['methodType'].': '.$row['methodName'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('sm')) + $result;
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('sms').lang('_found'));
    }	

 	# Gets All Outcomes Areas( status = 1)
    function _get_dropdown_all_poas(){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
        $query = get_instance()->db_b->get_where('Poa', array('status'=>'1'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['poa'].$row['poa'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('outcome_area')) + $result;
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('outcome_areas').lang('_found'));
    }
	
 	# Gets All Performance Indicators( status = 1)
    function _get_dropdown_all_pis(){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
        $query = get_instance()->db_b->get_where('PerformanceIndicators', array('status'=>'1'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['indicatorNumber'].': '.$row['indicatorName'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('performance_indicator')) + $result;
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('performance_indicator').lang('_found'));
    }	

	# LANGUAGES
	function _get_dropdown_all_languages(){
		get_instance()->db->order_by("language", "ASC");
		$query = get_instance()->db->get('Languages');
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
		get_instance()->db->order_by("id", "ASC");
		$query = get_instance()->db->get('Titles');
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

	# SCORES
	function _get_dropdown_all_scores(){
		get_instance()->db_b->order_by("score", "ASC");
		$query = get_instance()->db_b->get('ScoringScales');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['score'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('scoring_scale')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('scoring_scale').lang('_found'));
	}

 	# Gets Statusses
    function _get_dropdown_all_status(){
        $query = get_instance()->db->get_where('MissionStatus', array('id'=>'3'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['status'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('mission').lang('_status')) + $result;	
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('mission').lang('_status').lang('_found'));
    }

 	# Get User Roles according to login type
    function _get_dropdown_all_roles($checkStatus = null, $checkTester = array(), $checkRole = array()){
		get_instance()->db->select('id,role');
		get_instance()->db->from('UserRoles');
		if (!empty($checkRole)) get_instance()->db->where_in('id', $checkRole);
		$query =  get_instance()->db->get();
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

 	# Gets Assessment Periods ( status = 1)
    function _get_dropdown_all_period(){
        $query = get_instance()->db->get_where('AssessmentPeriod', array('status'=>'1'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['period'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_an_').lang('assessment').lang('_period')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('assessment').lang('periods').lang('_found'));
    }

 	# Gets All Missions( status = 1)
    function _get_dropdown_all_missions(){
        $query = get_instance()->db->get_where('Missions', array('status'=>'1'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['mission'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('mission')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('missions').lang('_found'));
    }


    function _get_dropdown_all_rev_auth_user($arrAuthorities = null){
		get_instance()->db->from('RevenueAuthorities');
		if (!is_null($arrAuthorities)){ 
			get_instance()->db->where('RevenueAuthorities.fkidUserCreated', $arrAuthorities);
		}
	        get_instance()->db->where('status','1');
			$query = get_instance()->db->get();					
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['authority'] . " (" .  $row['city'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('revenue_authority')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('revenue_authorities').lang('_found'));
    }


 	# Gets Revenue Authorities ( status = 1)
    function _get_dropdown_all_rev_auth($arrAuthorities = array()){
		get_instance()->db->from('RevenueAuthorities');
		if (!empty($arrAuthorities)){ 
			get_instance()->db->where_in('RevenueAuthorities.id', $arrAuthorities);
		}
	        get_instance()->db->where('status','1');
			$query = get_instance()->db->get();					
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['authority'] . " (" .  $row['city'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('revenue_authority')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('revenue_authorities').lang('_found'));
    }

 	# Gets ASSESSORS (UserRole = 5 and status = 1)
    function _get_dropdown_all_assessors(){
        $query = get_instance()->db->get_where('Users', array('fkidUserRole'=>'5', 'status'=>'1'));
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['name'] . " " . $row['surname'] . " - " .  $row['designation'] . " (" .  $row['city'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_an_').lang('assessor')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('assessors').lang('_found'));
    }
 	# Gets TEAM LEADERS (UserRole = 4 and status = 1)
	function _get_dropdown_all_team_leaders($checkUser = null){
		get_instance()->db->select('Users.*');
		get_instance()->db->from('Users');
		if (!is_null($checkUser)) get_instance()->db->where(array('fkidUserRole'=>'4', 'status'=>'1', 'fkidUserCreated'=>$checkUser));
		if (is_null($checkUser)) get_instance()->db->where(array('fkidUserRole'=>'4', 'status'=>'1'));
		$query = get_instance()->db->get();
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['name'] . " " . $row['surname'] . " - " .  $row['designation'] . " (" .  $row['city'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('mission_').lang('team_leader')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('mission_').lang('team_leaders').lang('_found'));
    }
	
 	# Gets Revenue Authority Managers (UserRole = 6 and status = 1)
    function _get_dropdown_all_ram($checkTester = null){
        if (!is_null($checkTester)){
			get_instance()->db->select('*');
			get_instance()->db->from('Users');
			get_instance()->db->where_in('tester', $checkTester);
			get_instance()->db->where(array('fkidUserRole'=>'6', 'status'=>'1'));
			$query = get_instance()->db->get();	
		}			
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['name'] . " " . $row['surname'] . " - " .  $row['designation'] . " (" .  $row['city'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('revenue_authority').lang('_contact')) + $result;			
            return $result;
        }
		return array('' => lang('no_').lang('revenue_authority').lang('_contacts').lang('_found'));
    }
	
 	# Gets Revenue Authority Counterpart (UserRole = 7 and status = 1)
    function _get_dropdown_all_counterpart($checkTester = null){
        if (!is_null($checkTester)){
			get_instance()->db->select('*');
			get_instance()->db->from('Users');
			get_instance()->db->where_in('tester', $checkTester);
			get_instance()->db->where(array('fkidUserRole'=>'7', 'status'=>'1'));
			$query = get_instance()->db->get();	
		}			

        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['name'] . " " . $row['surname'] . " - " .  $row['designation'] . " (" .  $row['city'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('revenue_authority').' counterpart') + $result;			
            return $result;
        }
		return array('' => lang('no_').lang('revenue_authority').' Counterparts'.lang('_found'));
    }	


 	# Gets all Users
    function _get_dropdown_all_users_not_assigned($authorityId, $missionId, $table, $ignore, $userRole = null){
		get_instance()->db->order_by("Users.name", "ASC");		
		get_instance()->db->select("Users.id, CONCAT(Users.name,' ',Users.surname) AS 'User', UserRoles.role AS 'Role'", false);
		get_instance()->db->from('Users');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');
        get_instance()->db->where('(Users.fkidUserRole = 4 OR Users.fkidUserRole = 5)'); 
        get_instance()->db->where('status','1'); 

		if($userRole && $userRole != 1){
	        get_instance()->db->where('tester','0'); 
		}else{
			get_instance()->db->where('tester','1'); 
			}

				
        get_instance()->db->where('mailSent','1'); 	
        get_instance()->db->where('loginPasswordChange','1'); 		
        get_instance()->db->where('NOT EXISTS(SELECT * from RightsAssignmentsIndicators WHERE RightsAssignmentsIndicators.fkidAuthority = '.$authorityId.' AND RightsAssignmentsIndicators.fkidMission = '.$missionId.' AND Users.id = RightsAssignmentsIndicators.fkidUser)',NULL, false); 
		$query = get_instance()->db->get();
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['User'] . " (" .  $row['Role'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('user')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('users').lang('_found'));
    }


 	# Gets all Users that can be assigned
    function _get_dropdown_all_users_assignments(){
		get_instance()->db->order_by("Users.name", "ASC");		
		get_instance()->db->select("Users.id, CONCAT(Users.name,' ',Users.surname) AS 'User', UserRoles.role AS 'Role'");
		get_instance()->db->from('Users');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');
        get_instance()->db->where('(Users.fkidUserRole = 4 OR Users.fkidUserRole = 5)'); 
        get_instance()->db->where('status','1'); 
        get_instance()->db->where('mailSent','1'); 				
        get_instance()->db->where('loginPasswordChange','1'); 
		$query = get_instance()->db->get();
//		echo get_instance()->db->last_query();
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['User'] . " (" .  $row['Role'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('user')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('users').lang('_found'));
    }



 	# Gets all Users
    function _get_dropdown_all_users(){
		get_instance()->db->order_by("Users.name", "ASC");		
		get_instance()->db->select("Users.id, CONCAT(Users.name,' ',Users.surname) AS 'User', UserRoles.role AS 'Role'");
		get_instance()->db->from('Users');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');
        get_instance()->db->where('status','1'); 
		$query = get_instance()->db->get();
//		print_r($query->result_array());
        if ($query->num_rows()){
			$result = array();
            foreach ($query->result_array() as $row) $result[$row['id']] = $row['User'] . " (" .  $row['Role'] . ")";
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('user')) + $result;			
            return $result;
        }
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('users').lang('_found'));
    }


	# REGIONS
	function _get_dropdown_all_region(){
		get_instance()->db->order_by("region", "ASC");
		$query = get_instance()->db->get('Regions');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) if (strpos($row['region'], "[reserved]" ) === false) $result[$row['id']] = $row['region'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('region')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('regions').lang('_found'));
	}

	# COUNTRIES
	function _get_dropdown_all_country(){
		get_instance()->db->order_by("country", "ASC" );
		$query = get_instance()->db->get('Countries');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) if (strpos($row['country'], "[reserved]" ) === false ) $result[$row['id']] = $row['country'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options
			$result = array('' => lang('select_a_').lang('country')) + $result;
			return $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('countries').lang('_found'));
	}