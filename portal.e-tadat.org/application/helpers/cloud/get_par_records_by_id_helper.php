<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = DONE!
		NORMALISE = DONE!
		COMMENTS = DONE!
		//		echo get_instance()->cloud_questions->last_query();		
	 */
	

	/*
	fkidMission
	score_symbol_dimension_1_final
	score_symbol_dimension_2_final
	score_symbol_overall_final
	*/

	function _get_par_sources_of_evidence_by_id($id = null){
        if (!$id) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE);
		get_instance()->cloud_questions->select("EvidentiaryDocumentation.fkidIndicator, EvidentiaryDocumentation.documentTitle, EvidentiaryDocumentation.documentPath");
		get_instance()->cloud_questions->from('EvidentiaryDocumentation');
        get_instance()->cloud_questions->where('EvidentiaryDocumentation.fkidMission',$id);
		$query = get_instance()->cloud_questions->get();
//		echo get_instance()->cloud_questions->last_query();				
        if ($query->num_rows()){
			return $query->result_array();
		}
        return false;
	}


	function _get_par_performance_inidcators_details_by_id($id = null){
        if (!$id) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE);
		get_instance()->cloud_questions->select("PerformanceIndicators.indicatorNumber, PerformanceIndicators.fkidScoringMethod, PerformanceIndicators.questionTable");
		get_instance()->cloud_questions->from('PerformanceIndicators');
        get_instance()->cloud_questions->where('PerformanceIndicators.indicatorNumber',$id);
		$query = get_instance()->cloud_questions->get();
        if ($query->num_rows()){
			return $query->row_array();
		}
        return false;
	}

	function _get_par_indicator_score_by_id($id = null, $table = null){
        if (!$id) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE);
		get_instance()->cloud_questions->select("score_symbol_dimension_1_final, score_symbol_dimension_2_final, score_symbol_dimension_3_final, score_symbol_dimension_4_final, score_symbol_dimension_5_final, score_symbol_overall_final, reportText");
		get_instance()->cloud_questions->from($table);
        get_instance()->cloud_questions->where('fkidMission',$id);
		$query = get_instance()->cloud_questions->get();
        if ($query->num_rows()){
			return $query->row_array();
		}
        return false;
	}
	



	# GET USERS ASSIGNED TO THE MISSION CHECKING THAT MTL IS NOT DUPLICATE IN RIGHTS ASSIGNMENT TABLE
	function _get_par_users_by_id_missions($id = null){
        if (!$id) return false;
		get_instance()->db->select("Users.id as UserId, CONCAT(Titles.title, ' ', Users.name, ' ', Users.surname) AS User, Users.designation as Designation", FALSE);
		get_instance()->db->from('Missions');
		get_instance()->db->join('Users', 'Missions.fkidTeamLeader = Users.id');
		get_instance()->db->join('Titles', 'Users.fkidTitle = Titles.id');		
        get_instance()->db->where('Missions.id',$id);
		$mtl = get_instance()->db->get();

        if ($mtl->num_rows()){
			$mtl_id = $mtl->result_array();
		}
		get_instance()->db->select("Users.id as UserId, CONCAT(Titles.title, ' ', Users.name, ' ', Users.surname) AS User, Users.designation as Designation", FALSE);
		get_instance()->db->from('RightsAssignmentsIndicators');
		get_instance()->db->join('Users', 'RightsAssignmentsIndicators.fkidUser = Users.id');
		get_instance()->db->join('Titles', 'Users.fkidTitle = Titles.id');		
        get_instance()->db->where('RightsAssignmentsIndicators.fkidMission',$id);
        get_instance()->db->where_not_in('RightsAssignmentsIndicators.fkidUser',$mtl_id[0]['UserId']);		
		$query = get_instance()->db->get();
//		echo get_instance()->db->last_query();		

        if ($query->num_rows()){
			$result = array_merge($mtl_id, $query->result_array());
			return $result;			
		}
        return false;
}

	function _get_par_mission_details_by_id($id = null){
        if (!$id) return false;
		get_instance()->db->select("Missions.mission, Missions.dateStart, RevenueAuthorities.authority, Countries.country, Regions.region");
		get_instance()->db->from('Missions');
		get_instance()->db->join('RevenueAuthorities', 'Missions.fkidRevenueAuthority = RevenueAuthorities.id');
		get_instance()->db->join('Countries', 'RevenueAuthorities.fkidCountry = Countries.id');				
		get_instance()->db->join('Regions', 'RevenueAuthorities.fkidRegion = Regions.id');						
        get_instance()->db->where('Missions.id',$id);
		$query = get_instance()->db->get();
        if ($query->num_rows()){
			return $query->row_array();
		}
        return false;
}


	function _get_par_mission_period_by_id($id = null){
        if (!$id) return false;
		get_instance()->db->select("AssessmentPeriod.period");
		get_instance()->db->from('Missions');
		get_instance()->db->join('AssessmentPeriod', 'AssessmentPeriod.id = Missions.fkidAssessmentPeriod');						
        get_instance()->db->where('Missions.id',$id);
		$query = get_instance()->db->get();
        if ($query->num_rows()){
			return $query->row_array();
		}
        return false;
}



	function _get_par_table_id_by_mission_id($id = null, $section_id = null){
        if (!$id) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE); 		
		get_instance()->cloud_questions->select("id");
		get_instance()->cloud_questions->from($section_id);
        get_instance()->cloud_questions->where('fkidMission',$id);
		$query = get_instance()->cloud_questions->get();

		if ($query->num_rows()){
			$result = null;
			foreach ($query->result_array() as $row) $result = $row['id'];
			return $result;
		}
        return false;
	}

	function _get_par_table_data_by_mission_id($id = null, $table = null, $section_id = null){
        if (!$id || !$table || !$section_id) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE); 		
		get_instance()->cloud_questions->select("*");
		get_instance()->cloud_questions->from($table);
        get_instance()->cloud_questions->where('id',$id);
        get_instance()->cloud_questions->where('fkidSection',$section_id);		
		$query = get_instance()->cloud_questions->get();
		if ($query->num_rows()){
			return $query->result_array();
		}
        return false;
	}

	function _get_par_table_report_text_by_mission_id($id = null, $table = null, $section_id = null){
        if (!$id || !$table || !$section_id) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE); 		
		get_instance()->cloud_questions->select("*");
		get_instance()->cloud_questions->from($table);
        get_instance()->cloud_questions->where('id',$id);
        get_instance()->cloud_questions->where('fkidSection',$section_id);		
		$query = get_instance()->cloud_questions->get();
		if ($query->num_rows()){
			return $query->result_array();
		}
        return false;
	}
	
	function _get_par_score_by_indicator_mission_id($id = null, $table = null){
        if (!$id || !$table) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE); 		
		get_instance()->cloud_questions->select("score_symbol_overall_final");
		get_instance()->cloud_questions->from($table);
        get_instance()->cloud_questions->where('fkidMission',$id);
		$query = get_instance()->cloud_questions->get();
		if ($query->num_rows()){
			foreach ($query->result_array() as $row) $score = $row['score_symbol_overall_final'];
			return $score;
		}
        return false;
	}	

	function _get_par_country_by_mission_id($id = null){
        if (!$id) return false;
		get_instance()->db->select("Countries.country");
		get_instance()->db->from('Missions');
		get_instance()->db->join('RevenueAuthorities', 'Missions.fkidRevenueAuthority = RevenueAuthorities.id');
		get_instance()->db->join('Countries', 'RevenueAuthorities.fkidCountry = Countries.id');				
        get_instance()->db->where('Missions.id',$id);
		$query = get_instance()->db->get();
		if ($query->num_rows()){
			foreach ($query->result_array() as $row) $country = $row['country'];
			return $country;
		}
        return false;
	}	

	function _get_pmq_table_by_mission_id($id = null, $table = null){
        if (!$id) return false;
		get_instance()->cloud_questions = get_instance()->load->database('cloud_questions', TRUE); 		
		get_instance()->cloud_questions->select("*");
		get_instance()->cloud_questions->from($table);
        get_instance()->cloud_questions->where('fkidMission',$id);
		$query = get_instance()->cloud_questions->get();
		if ($query->num_rows()){
			return $query->result_array();
		}
		return false;
	}




