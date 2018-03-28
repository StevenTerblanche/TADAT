<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = DONE!
		NORMALISE = DONE!
		COMMENTS = DONE!
		echo get_instance()->db->last_query();						
	 */

	function _get_record_all_trainee_users($status = array(), $fkidUserRole=array()){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id, Users.referenceNumber, Users.fkidUserRole, Users.name, Users.surname, Users.email, UserRoles.role, Users.dateCreated, Countries.country, Titles.title, UserStatus.status');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle');								
		$obj->db_portal->join('UserRoles', 'UserRoles.id = Users.fkidUserRole');										
		$obj->db_portal->join('UserStatus', 'UserStatus.id = Users.fkidUserStatus');
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id');
		$obj->db_portal->join('Countries', 'Countries.id = UserProfile.fkid_country_residence');		
		$obj->db_portal->where_in('fkidUserRole', $fkidUserRole);
		$obj->db_portal->where_in('fkidUserStatus', $status);
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}


function _get_record_all_users_imported_connect(){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id, Users.referenceNumber, Users.name, Users.fkidUserRole, Users.surname, Users.email, UserRoles.role, Users.dateCreated, Countries.country, Titles.title, UserStatus.status');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle', 'left');			
		$obj->db_portal->join('UserRoles', 'UserRoles.id = Users.fkidUserRole', 'left');							
		$obj->db_portal->join('UserStatus', 'UserStatus.id = Users.fkidUserStatus', 'left');
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id', 'left');
		$obj->db_portal->join('Countries', 'Countries.id = UserProfile.fkid_country_residence', 'left');
		
		$obj->db_portal->where_in('Users.fkidUserRole', 10);
		$obj->db_portal->limit(800);
		$query = $obj->db_portal->get();
//		echo get_instance()->db_portal->last_query();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	
	}

	function _get_record_all_users_imported(){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id, Users.referenceNumber, Users.name, Users.fkidUserRole, Users.surname, Users.email, UserRoles.role, Users.dateCreated, Countries.country, Titles.title, UserStatus.status');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle', 'left');			
		$obj->db_portal->join('UserRoles', 'UserRoles.id = Users.fkidUserRole', 'left');							
		$obj->db_portal->join('UserStatus', 'UserStatus.id = Users.fkidUserStatus', 'left');
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id', 'left');
		$obj->db_portal->join('Countries', 'Countries.id = UserProfile.fkid_country_residence', 'left');
		
		$obj->db_portal->where_in('Users.status', 9);
		$obj->db_portal->limit(800);
		$query = $obj->db_portal->get();
//		echo get_instance()->db_portal->last_query();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	
	}




	function _get_record_all_users_by_status($status = array(), $fkidUserRole=array()){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id, Users.referenceNumber, Users.name, Users.surname, Users.email, Users.fkidUserRole, UserRoles.role, Users.dateCreated, Countries.country, Titles.title, UserStatus.status');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle', 'left');			
		$obj->db_portal->join('UserRoles', 'UserRoles.id = Users.fkidUserRole', 'left');							
		$obj->db_portal->join('UserStatus', 'UserStatus.id = Users.fkidUserStatus', 'left');
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id', 'left');
		$obj->db_portal->join('Countries', 'Countries.id = UserProfile.fkid_country_residence', 'left');
		
		if($fkidUserRole)$obj->db_portal->where_in('fkidUserRole', $fkidUserRole);
		$obj->db_portal->where_in('fkidUserStatus', $status);
		$obj->db_portal->limit(100);
		$query = $obj->db_portal->get();
//		echo get_instance()->db_portal->last_query();						
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}



	function _check_user_connect_status($fkidUserID){
		$obj =& get_instance();
		$obj->db_connect->select('users.fkidUserId');
		$obj->db_connect->from('users');
		$obj->db_connect->where(array('users.fkidUserId'=>$fkidUserID));
		$query = $obj->db_connect->get();
//		echo get_instance()->db_connect->last_query();								
        if ($query->num_rows()){
			return $query ->row();
		}
        return false;
	}


	function get_record_connect_user_profile($userID){
		$obj =& get_instance();
		$obj->db_portal->select('Users.name, Users.surname, Users.email, UserProfile.current_organization, Users.fkidUserRole, UserProfile.current_business_address_city,  Country_Residence.country AS "CountryResidence"');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id');
		$obj->db_portal->join('Countries AS Country_Residence', 'Country_Residence.id = UserProfile.fkid_country_residence');
		$obj->db_portal->where(array('Users.id'=>$userID));
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->row();
		}
        return false;
	}



	function get_record_full_user_profile($userID){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id as UserID, Users.name, Users.middle_name, Users.fkidUserRole, Users.surname, Users.email, 
		UserProfile.dob, UserProfile.telephone, UserProfile.tax_administration_experience_other, UserProfile.current_business_email, UserProfile.current_business_telephone, UserProfile.current_job_title, 
		UserProfile.current_department, UserProfile.current_organization, UserProfile.current_business_address_1, UserProfile.current_business_address_2, 
		UserProfile.current_business_address_city, UserProfile.current_business_address_postal_code, UserProfile.current_start_date, UserProfile.current_duties, 
		UserProfile.diagnostic_program, UserProfile.diagnostic_program_details, UserProfile.degree_name_1, UserProfile.university_1, UserProfile.academic_start_date_1, 
		UserProfile.academic_end_date_1, UserProfile.language_other, UserProfile.reference_name_surname_1, UserProfile.reference_position_1, UserProfile.reference_phone_1, 
		UserProfile.reference_email_1, UserProfile.reference_name_surname_2, UserProfile.reference_position_2, UserProfile.reference_phone_2, UserProfile.reference_email_2, 
		UserProfile.dateCreated, UserProfile.fkid_tax_administration_experience, UserProfile.fkid_language,
		UserRoles.role, 
								Country_Residence.country AS "CountryResidence", Country_Citizen.country AS "CountryCitizen",
								Country_Business_Current.country AS "CountryBusinessCurrent", Country_Academic_Current.country AS "CountryAcademicCurrent", 
								 Titles.title, UserStatus.status, Degrees.degree, Genders.gender, Languages.language, Organization_types.organization_type');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle', 'left');								
		$obj->db_portal->join('Languages', 'Languages.id = Users.fkidLanguage', 'left');		
		$obj->db_portal->join('UserRoles', 'UserRoles.id = Users.fkidUserRole', 'left');										
		$obj->db_portal->join('UserStatus', 'UserStatus.id = Users.fkidUserStatus', 'left');
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id', 'left');
		$obj->db_portal->join('Organization_types', 'Organization_types.id = UserProfile.current_fkid_organization_type', 'left');		
		$obj->db_portal->join('Degrees', 'UserProfile.fkid_academic_degree_1 = Degrees.id', 'left');		
		$obj->db_portal->join('Genders', 'UserProfile.fkid_gender = Genders.id', 'left');				
		$obj->db_portal->join('Countries AS Country_Residence', 'Country_Residence.id = UserProfile.fkid_country_residence', 'left');		
		$obj->db_portal->join('Countries AS Country_Citizen', 'Country_Citizen.id = UserProfile.fkid_country_citizen', 'left');				

		$obj->db_portal->join('Countries AS Country_Business_Current', 'Country_Business_Current.id = UserProfile.current_fkid_country_business', 'left');		
		$obj->db_portal->join('Countries AS Country_Academic_Current', 'Country_Academic_Current.id = UserProfile.fkid_academic_country_1', 'left');				

		$obj->db_portal->where(array('Users.id'=>$userID));
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->row();
		}
        return false;
	}


	function get_record_full_user_profile_edit($userID){
		$obj =& get_instance();
		$obj->db_portal->select('Users.id as UserID, Users.name, Users.fkidTitle, Users.fkidUserRole, Users.fkidLanguage, Users.middle_name, Users.surname, Users.email, 
		UserProfile.dob, UserProfile.telephone, UserProfile.tax_administration_experience_other, UserProfile.current_business_email, UserProfile.current_business_telephone, UserProfile.current_job_title, 
		UserProfile.current_department, UserProfile.current_organization, UserProfile.current_business_address_1, UserProfile.current_business_address_2, 
		UserProfile.current_business_address_city, UserProfile.current_business_address_postal_code, UserProfile.current_start_date, UserProfile.current_duties, 
		UserProfile.diagnostic_program, UserProfile.diagnostic_program_details, UserProfile.degree_name_1, UserProfile.university_1, UserProfile.academic_start_date_1, 
		UserProfile.academic_end_date_1, UserProfile.language_other, UserProfile.reference_name_surname_1, UserProfile.reference_position_1, UserProfile.reference_phone_1, 
		UserProfile.reference_email_1, UserProfile.interests_other, UserProfile.reference_name_surname_2, UserProfile.reference_position_2, UserProfile.reference_phone_2, UserProfile.reference_email_2, 
		UserProfile.dateCreated, UserProfile.fkid_tax_administration_experience, UserProfile.fkid_interests, UserProfile.fkid_language, UserProfile.fkid_gender, UserProfile.fkid_country_citizen, 
		UserProfile.fkid_country_residence, UserProfile.current_fkid_country_business, UserProfile.fkid_occupation, UserProfile.current_fkid_organization_type, UserProfile.fkid_academic_degree_1, 
		UserProfile.fkid_academic_degree_1, UserProfile.fkid_academic_country_1,
		UserRoles.role, 
								Country_Residence.country AS "CountryResidence", Country_Citizen.country AS "CountryCitizen",
								Country_Business_Current.country AS "CountryBusinessCurrent", Country_Academic_Current.country AS "CountryAcademicCurrent", 
								 Titles.title, UserStatus.status, Degrees.degree, Genders.gender, Languages.language, Organization_types.organization_type');
		$obj->db_portal->from('Users');
		$obj->db_portal->join('Titles', 'Titles.id = Users.fkidTitle', 'left');								
		$obj->db_portal->join('Languages', 'Languages.id = Users.fkidLanguage', 'left');		
		$obj->db_portal->join('UserRoles', 'UserRoles.id = Users.fkidUserRole', 'left');										
		$obj->db_portal->join('UserStatus', 'UserStatus.id = Users.fkidUserStatus', 'left');
		$obj->db_portal->join('UserProfile', 'UserProfile.fkidUserId = Users.id', 'left');
		$obj->db_portal->join('Organization_types', 'Organization_types.id = UserProfile.current_fkid_organization_type', 'left');		
		$obj->db_portal->join('Degrees', 'UserProfile.fkid_academic_degree_1 = Degrees.id', 'left');		
		$obj->db_portal->join('Genders', 'UserProfile.fkid_gender = Genders.id', 'left');				
		$obj->db_portal->join('Countries AS Country_Residence', 'Country_Residence.id = UserProfile.fkid_country_residence', 'left');		
		$obj->db_portal->join('Countries AS Country_Citizen', 'Country_Citizen.id = UserProfile.fkid_country_citizen', 'left');				

		$obj->db_portal->join('Countries AS Country_Business_Current', 'Country_Business_Current.id = UserProfile.current_fkid_country_business', 'left');		
		$obj->db_portal->join('Countries AS Country_Academic_Current', 'Country_Academic_Current.id = UserProfile.fkid_academic_country_1', 'left');				

		$obj->db_portal->where(array('Users.id'=>$userID));
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->row();
		}
        return false;
	}



	
	function get_tax_administration_experience($userExperience){
		$arrUserExperience = explode(",", $userExperience);
		$obj =& get_instance();
		$obj->db_portal->select('TaxAdministrationExperience.experience');
		$obj->db_portal->from('TaxAdministrationExperience');
		$obj->db_portal->where_in('id', $arrUserExperience);										
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}


	function get_tax_administration_interests($userExperience){
		$arrUserExperience = explode(",", $userExperience);
		$obj =& get_instance();
		$obj->db_portal->select('UserInterests.interests');
		$obj->db_portal->from('UserInterests');
		$obj->db_portal->where_in('id', $arrUserExperience);										
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}



	function get_selected_languages($userLanguages){
		$arrUserLanguages = explode(",", $userLanguages);
		$obj =& get_instance();
		$obj->db_portal->select('Languages.language');
		$obj->db_portal->from('Languages');
		$obj->db_portal->where_in('id', $arrUserLanguages );										
		$query = $obj->db_portal->get();
        if ($query->num_rows()){
			return $query ->result_array();
		}
        return false;
	}
	
	
	
	
	
	
	
	
	
	
	
	