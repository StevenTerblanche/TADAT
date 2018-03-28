<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = DONE!
		NORMALISE = DONE!
		COMMENTS = DONE!

echo get_instance()->db->last_query();
	 */

	# This is for listings only and NOT dropdowns or GET BY ID!
	# Functions return all records in array
	# Use 'real-world' table names as defined in application/config/tables.php


	# Gets all Assigned Missions
	function _get_record_all_assigned_missions($userid = null){
		get_instance()->db->select('fkidMission');
		get_instance()->db->from('RightsAssignmentsIndicators');
		get_instance()->db->where('RightsAssignmentsIndicators.fkidUser', $userid);
		$query = get_instance()->db->get();
        if ($query->num_rows()){
			$arrQueryId = array();
			foreach ($query->result_array() as $row => $value){ 
				$arrQueryId[] = $value['fkidMission'];
			}
			get_instance()->db->from('Missions');
			get_instance()->db->where_in('id', $arrQueryId);
			$returnQuery = get_instance()->db->get();
			return $returnQuery ->result_array();			
		}
        return false;
	}
	
	



	# Usage: _get_records_array('TableName', 'Field to Query' ,'Value to Query[id]', 'Array of Fields to Return (can enclose fields with special characters excluding _ and -)', 'Fields Seperator')
    function _get_records_array($db = null,$table, $field=null, $val=null, $out = array(), $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select($out);
		if($field !== null && $val !== null){
			$query = get_instance()->$db_selector->get_where($table, array ($field=>$val), $numRecords);
		}else{
			get_instance()->$db_selector->from($table);
			$query = get_instance()->$db_selector->get();
		}
        if ($query->num_rows()){
			return $query->result_array();
		}
        return false;
    }


	# Gets all Authorities
	function _get_record_all_authorities(){
		get_instance()->db->select('RevenueAuthorities.*, RightsAssignments.fkidMission');
		get_instance()->db->group_by('RevenueAuthorities.id');		
		get_instance()->db->from('RightsAssignments');
		get_instance()->db->join('RevenueAuthorities', 'RightsAssignments.fkidAuthority = RevenueAuthorities.id');
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}


	# Gets all POA's for Main Listings Table
	function _get_poa_intro_questions(){
		get_instance()->db_b->select('Poa.id AS poaId, Poa.poa_number, Poa.poa AS poaName, Poa.description AS poaDescription, PerformanceIndicators.indicatorNumber, PerformanceIndicators.indicatorName, PerformanceIndicators.fkidPoa');
		get_instance()->db_b->from('Poa');
		get_instance()->db_b->join('PerformanceIndicators', 'PerformanceIndicators.fkidPoa = Poa.id');
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}

	# Gets all RA PMQ Questions and types
	function _get_record_all_scoring(){
		get_instance()->db_b->order_by("MeasurementDimensionsScoring.fkidMd", "ASC");		
		get_instance()->db_b->select('*');
		get_instance()->db_b->from('MeasurementDimensionsScoring');
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}


	# Gets all RA PMQ Questions and types
	function _get_ra_pmq_questions(){
		get_instance()->db_b->order_by("QuestionsPmq.sort_order", "ASC");
		get_instance()->db_b->select('QuestionsPmq.*,QuestionsPmq.status as QuestionStatus, QuestionsPmq.id as QuestionId, QuestionTypes.*');
		get_instance()->db_b->from('QuestionsPmq');
		get_instance()->db_b->join('QuestionTypes', 'QuestionsPmq.fkidQuestionType = QuestionTypes.id');
		get_instance()->db_b->where('QuestionsPmq.status', 1);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}

	# Get all missions linked to countries, with lat, lng for dashboard map
	function _get_record_by_all_map_missions($CreatedUser = null, $UserType = null){
		get_instance()->db->select('Missions.*, Missions.id AS MissionID, RevenueAuthorities.*, Countries.country, Countries.lat, Countries.lng, MissionStatus.status, Users.fkidTitle, Users.name, Users.surname, Users.fkidUserRole');
		get_instance()->db->from('Missions');
		get_instance()->db->join('MissionStatus', 'Missions.fkidMissionStatus = MissionStatus.id');
		get_instance()->db->join('RevenueAuthorities', 'RevenueAuthorities.id = Missions.fkidRevenueAuthority');
		get_instance()->db->join('Users', 'RevenueAuthorities.fkidCounterpart = Users.id');
		get_instance()->db->join('Countries', 'RevenueAuthorities.fkidCountry = Countries.id');		
		if(!is_null($CreatedUser)){
			if(is_null($UserType)){
				get_instance()->db->where('Missions.fkidUserCreated', $CreatedUser);			
			}else{
				get_instance()->db->where('Missions.fkidTeamLeader', $CreatedUser);	
			}
		}
		
		$query = get_instance()->db->get();
//		echo get_instance()->db->last_query();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}
	
	# Gets all Glossary Terms
    function _get_record_all_glossary($checkStatus = null){
		get_instance()->db->from('Glossary');
        if ($checkStatus) get_instance()->db->where('status', 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }

	function _get_record_all_indicators_by_poa(){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		get_instance()->db_b->select('Poa.poa_number, Poa.poa, PerformanceIndicators.indicatorNumber, PerformanceIndicators.indicatorName');
		get_instance()->db_b->from('Poa');
		get_instance()->db_b->join('PerformanceIndicators', 'Poa.id = PerformanceIndicators.fkidPoa');
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}


	
	# Gets all Assignments's
    function _get_record_all_assignments($arrMissions = array()){
		get_instance()->db->from('RightsAssignmentsIndicators');
		get_instance()->db->where('status', 1);
		if (!empty($arrMissions)){ 
			get_instance()->db->where_in('RightsAssignmentsIndicators.fkidMission', $arrMissions);
		}
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }	

	# Gets all Login Stats
    function _get_record_all_logins($checkStatus = null, $checkTester = null){
		get_instance()->db->order_by("UserLogins.date", "DESC");		
		get_instance()->db->select('UserLogins.date, UserLogins.fkidUser, Users.fkidTitle, Users.name, Users.surname, UserRoles.role');
		get_instance()->db->from('UserLogins');
		get_instance()->db->join('Users', 'UserLogins.fkidUser = Users.id');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');
		if (!is_null($checkTester)) get_instance()->db->where_in('UserLogins.tester', $checkTester);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }

	# MEasurement Dimensions
    function _get_record_all_md($checkStatus = null, $db = null){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->from('MeasurementDimensions');
        if ($checkStatus) get_instance()->$db_selector->where('status', 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }

	# Gets selected records for POA's
    function _get_selected_records_poa($checkStatus = null, $db = null){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = 'db_b';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('Poa.id, Poa.poa_number, Poa.status, Poa.poa');
		get_instance()->$db_selector->from('Poa');
        if ($checkStatus) get_instance()->$db_selector->where('status', 1);
		
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }



	# Gets all POA's
    function _get_record_all_poa($checkStatus = null, $db = null){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = 'db_b';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->from('Poa');
        if ($checkStatus) get_instance()->$db_selector->where('status', 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }
	
	# Gets all Performance Indicators
    function _get_record_all_pi($checkStatus = null, $db = null){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->from('PerformanceIndicators');
        if ($checkStatus) get_instance()->$db_selector->where('status', 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }

	# Gets all Evidentiary Examples
    function _get_record_all_ev($checkStatus = null, $db = null){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->order_by("fkidDimension", "ASC");
		get_instance()->$db_selector->from('EvidentiaryExamples');
        if ($checkStatus) get_instance()->$db_selector->where('status', 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }
		
	# Gets all registered Users
    function _get_record_all_users($checkStatus = null, $checkTester = array(), $checkRole = array()){
		get_instance()->db->from('Users');
        if (!empty($checkTester)) get_instance()->db->where_in('tester', $checkTester);
		if (!empty($checkRole)) get_instance()->db->where_in('fkidUserRole', $checkRole);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }
	# Gets Revenue Authorities (status = 1)	
    function _get_record_all_rev_auth($checkStatus = null, $checkUser = null){
		get_instance()->db->from('RevenueAuthorities');
        if (!is_null($checkStatus)) get_instance()->db->where('status', 1);
        if (!is_null($checkUser)) get_instance()->db->where('fkidUserCreated', $checkUser);	
		$query = get_instance()->db->get();
        
		if ($query->num_rows()){return $query->result_array();}
        return false;
    }

 	# Gets All Missions(status = 1)
    function _get_record_all_missions($checkStatus = null, $checkUser = null, $checkRole = ''){
		get_instance()->db->from('Missions');
        if (!is_null($checkStatus)) get_instance()->db->where('status', 1);
        if (!is_null($checkUser)){
			if($checkRole === ''){
				 get_instance()->db->where('fkidUserCreated', $checkUser);	
			}else{
				get_instance()->db->where('fkidTeamLeader', $checkUser);
			}
		}
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }


	# Gets Revenue Authority Managers (UserRole = 5 and enabled = 1)
    function _get_record_all_ram(){
        $query = get_instance()->db->get_where('Users', array('fkidUserRole'=>'6', 'enabled'=>'1'));
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }

	# Regions
    function _get_record_all_region(){
        $query = get_instance()->db->get('Regions');
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }

	# Countries
    function _get_record_all_country(){
        $query = get_instance()->db->get('Countries');
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }


    # Gets All Templates ()
    function _get_record_all_templates($latestRevision = null)
    {
        get_instance()->db->from('Templates');
        # highest idParentTemplate per fkidTemplateType
        if ( $latestRevision )
        {
            $query = get_instance()->db->query(
                                                "
                                                SELECT t1.*
                                                FROM Templates t1
                                                LEFT OUTER JOIN Templates t2
                                                ON
                                                (
                                                    t1.fkidTemplateType = t2.fkidTemplateType
                                                    AND t1.idParentTemplate < t2.idParentTemplate
                                                )
                                                WHERE t2.fkidTemplateType IS NULL;
                                                "
                                            );
        }
        # otherwise just get them all (risky - user may modify revision!)
        else $query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }



