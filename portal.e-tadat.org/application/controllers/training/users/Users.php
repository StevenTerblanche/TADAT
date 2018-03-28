<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Core_Controller {

	public $data, $assets, $content_data, $id, $action;

	function __construct() {
		parent::__construct();
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
        $this->user_type = ($this->input->get('user_type')) ? $this->encrypt->decode(base64_decode($this->input->get('user_type'))) : (($this->input->post('user_type')) ? $this->input->post('user_type') : null);		
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;		
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		$this->data = $this->includes;
		$this->load->helper('training/workshops/workshop');
		$this->load->helper('training/users/users');		
		$this->load->helper('global/registration');		
		$this->load->model('crud_model');
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;			
		$this->page_header = 'MANAGE USERS';		
	}
	
	function awaiting_approval(){
		$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users.js"));
		if($this->user_type && $this->user_type === '8'){
			$this->panel_title = 'CURRENT TRAINEES AWAITING APPROVAL';	
	        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_trainee_users(1, array(8));
		}else{
			$this->panel_title = 'CURRENT USERS AWAITING APPROVAL';	
	        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_trainee_users(1, array(1,2,3,4,5,6,7,9,10,11,12,13));
		}
		$this->data = $this->includes;		
		$this->panel_icon = 'fa fa-th-list';
		$this->data['content'] = $this->load->view('portal/users/users_list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}


	function approved(){
		$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users.js"));
		$this->data = $this->includes;		
		$this->panel_title = 'CURRENT USERS APPROVED';
		$this->panel_icon = 'fa fa-th-list';
//        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_trainee_users(array(2,4));
        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_users_by_status(array(2,4,5));
		$this->data['content'] = $this->load->view('portal/users/users_list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}


	function all(){
		$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users.js"));
		$this->data = $this->includes;		
		$this->panel_title = 'CURRENT USERS';
		$this->panel_icon = 'fa fa-th-list';
        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_users_by_status(array(1,2,3,4,5));
		$this->data['content'] = $this->load->view('portal/users/users_list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function imported(){
		$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users.js"));
		$this->data = $this->includes;		
		$this->panel_title = 'IMPORTED USERS AWAITING APPROVAL';
		$this->panel_icon = 'fa fa-th-list';
        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_users_imported();
		$this->data['content'] = $this->load->view('portal/users/users_list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
	
	function imported_connect(){
		$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users.js"));
		$this->data = $this->includes;		
		$this->panel_title = 'IMPORTED USERS AWAITING APPROVAL';
		$this->panel_icon = 'fa fa-th-list';
        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_users_imported_connect();
		$this->data['content'] = $this->load->view('portal/users/users_list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}	



	
	function awaiting_approval_profile(){
		$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users_approval.js"));
		$this->data = $this->includes;		

		$this->content_data['uri'] = base_url('users/awaiting/approval/submit');
		$this->panel_title = 'APPLICANT PROFILE';
		$this->panel_icon = 'fa fa-graduation-cap';

        $this->content_data['profile'] = get_record_full_user_profile($this->id);
        $this->content_data['get_dropdown_all_training_user_status'] = _get_dropdown_all_training_user_status(array(2,3,4));	
		$this->content_data['get_dropdown_all_normal_user_status'] = _get_dropdown_all_training_user_status(array(1,3,5));	
		
		$this->data['content'] = $this->load->view('portal/users/full_profile', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}	
	


	function awaiting_approval_profile_edit(){
		$this->add_external_js(array(
			base_url()."/themes/core/js/views/training/users/users_approval.js",
			base_url()."/themes/core/js/bootstrap-datepicker.js")			
			);
		$this->data = $this->includes;		

		$this->content_data['uri'] = base_url('users/awaiting/approval/submit');
//		$this->content_data['uri'] = base_url('training/users/users/update_user');
		
		$this->panel_title = 'APPLICANT PROFILE';
		$this->panel_icon = 'fa fa-graduation-cap';
        $this->content_data['profile'] = get_record_full_user_profile_edit($this->id);

		$this->method = ($this->input->get('m')) ? $this->input->get('m') : (($this->input->post('m')) ? $this->input->post('m') : null);					
			
			if($this->method){
				if($this->method === 's'){
					$this->content_data['edit_mode'] = 'self';
				}else{
					$this->content_data['edit_mode'] = 'other';
				}
			}else{
				$this->content_data['edit_mode'] = 'other';
			}

		$this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();				
		$this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages_register();
		$this->content_data['get_dropdown_all_genders'] = _get_dropdown_all_genders();
		$this->content_data['get_dropdown_all_countries'] = _get_dropdown_all_country();
		$this->content_data['get_dropdown_all_organization_types'] = _get_dropdown_all_organization_types();		
		$this->content_data['get_dropdown_all_degrees'] = _get_dropdown_all_degrees();
		$this->content_data['get_dropdown_all_occupation'] = _get_dropdown_all_occupation();			
        $this->content_data['get_dropdown_all_training_user_status'] = _get_dropdown_all_training_user_status(array(2,3,4));		
        $this->content_data['get_dropdown_all_normal_user_status'] = _get_dropdown_all_training_user_status(array(1,3,5));				
		
		$this->data['content'] = $this->load->view('portal/users/full_profile_edit', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}		




	// THIS IS THE SUBMIT FUNCTION THAT SIMPLY UPDATES TABLES
	function update_user(){
		$this->load->model('crud_model');		

		$fkidUserID = $this->form_data['FkidUserId'];
		$editMode = $this->form_data['edit_mode'];
		unset($this->form_data['edit_mode']);
		
		$this->users_form_data['fkidTitle'] = $this->form_data['fkidTitle'];
		unset ($this->form_data['fkidTitle']);
		$this->users_form_data['name'] = $this->form_data['name'];
		unset ($this->form_data['name']);
		$this->users_form_data['middle_name'] = $this->form_data['middle_name'];
		unset ($this->form_data['middle_name']);
		$this->users_form_data['surname'] = $this->form_data['surname'];
		unset ($this->form_data['surname']);
		$this->users_form_data['email'] = $this->form_data['email'];
		unset ($this->form_data['email']);
		$this->users_form_data['fkidLanguage'] = $this->form_data['fkidLanguage'];
		unset ($this->form_data['fkidLanguage']);


		/* NOW UPDATE THE USER TABLE */		
		$this->crud_model->crud_register_update('Users', $this->users_form_data, $fkidUserID);
		
		# STEP 3 - UPDATE PROFILE TABLE
		if(isset ($this->form_data['fkid_language'])){
			$language = '';
			foreach($this->form_data['fkid_language'] as $langId){$language .= $langId.', ';}
			unset($this->form_data['fkid_language']);		
			$this->form_data['fkid_language']  = rtrim($language,', ');
		}		

		if(isset ($this->form_data['fkid_interests'])){
			$interest = '';
			foreach($this->form_data['fkid_interests'] as $intId){$interest .= $intId.', ';}
			unset($this->form_data['fkid_interests']);				
			$this->form_data['fkid_interests']  = rtrim($interest,', ');
		}

		if(isset ($this->form_data['fkid_tax_administration_experience'])){
			$experience = '';
			foreach($this->form_data['fkid_tax_administration_experience'] as $expId){$experience .= $expId.', ';}
			unset($this->form_data['fkid_tax_administration_experience']);				
			$this->form_data['fkid_tax_administration_experience']  = rtrim($experience,', ');
		}
		
		$this->crud_model->crud_register_update_profile('UserProfile', $this->form_data, $fkidUserID);		


		// NOW UPDATE / CREATE CONNECT RECORD
				$this->connect_user = get_record_full_user_profile($fkidUserID); 
				$this->connect_form_data['fkidUserId'] = $fkidUserID;
				$this->connect_form_data['username'] = $this->connect_user->name;
				$this->connect_form_data['email'] = $this->connect_user->email;
				$this->connect_form_data['first_name'] = $this->connect_user->name;
				$this->connect_form_data['last_name'] = $this->connect_user->surname;
				if($this->connect_user->CountryResidence){
					$this->connect_form_data['country'] = $this->connect_user->CountryResidence;
				}else{
					$this->connect_form_data['country'] = '';
				}
		
				if($this->connect_user->current_business_address_city){
					$this->connect_form_data['location'] = $this->connect_user->current_business_address_city;
				}else{
					$this->connect_form_data['location'] = '';
				}
				$this->connect_form_data['address'] = $this->connect_user->current_business_address_1.', '. $this->connect_user->current_business_address_2;
				if($this->connect_user->current_organization){
					$this->connect_form_data['work'] = $this->connect_user->current_organization;
				}else{
					$this->connect_form_data['work'] = '';
				}
				$this->connect_form_data['image'] = 'default.png';
				$this->connect_form_data['cover'] = 'default.png';				

			if(_check_user_connect_status($fkidUserID)){
				$this->crud_model->crud_connect_update($this->connect_form_data, 'users', 'fkidUserId', $fkidUserID);
			}else{
				$this->crud_model->crud_connect_register($this->connect_form_data, 'users');	
			}				



		if($editMode === 'self'){
			redirect(base_url());
		}else{
			$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users.js"));
			$this->data = $this->includes;		
			$this->panel_title = 'CURRENT USERS';
			$this->panel_icon = 'fa fa-th-list';
			$this->content_data['get_record_all_awaiting_approval'] = _get_record_all_users_by_status(array(1,2,3,4,5));
			$this->data['content'] = $this->load->view('portal/users/users_list', $this->content_data, true);			
		}
		$this->load->view($this->template, $this->data);
	}


	// THIS IS THE AUTHORISE FUNCTION THAT SENDS MAIL
	function update_applicant(){
		$this->load->model('crud_model');		

		$fkidUserRole = $this->form_data['FkidUserRole'];
		unset($this->form_data['FkidUserRole']);


		$fkidUserID = $this->form_data['FkidUserId'];
		$fkidUserStatus = $this->form_data['fkidUserStatus'];
		$applicant_message = $this->form_data['applicant_message'];
		unset($this->form_data['FkidUserId']);
		unset($this->form_data['applicant_message']);

		# Generate a password from Core Helper
		$tmp_password = _generate_random_password();
		# Generate a SALT from Core Helper
		$tmp_salt = _generate_salt();
		# Generate a HASH from the Password and SALT combined from Core Helper
		$tmp_hash = _generate_hash ($tmp_password, $tmp_salt);
		# Set the SALTED Password value in the posted form_data
		$this->form_data['loginPasswordSalt'] = $tmp_salt;
		# Set the HASH value in the posted form_data
		$this->form_data['loginPasswordHash'] = $tmp_hash;
		$this->form_data['mailSent'] = 1;
		$this->form_data['status'] = 1;	


		/* NOW UPDATE THE USER TABLE */		
		$this->crud_model->crud_register_update('Users', $this->form_data, $fkidUserID);

		/* NOW UPDATE THE GROUP MEMBERSHIP TABLES */		
		if($fkidUserRole === '8'){
			// CONNECT
			$this->extended_form_data['UserFkid'] = $fkidUserID;	
			$this->extended_form_data['GroupFkid'] = 100;
			$this->extended_form_data['GroupRightsFkid'] = 100;			
			$this->crud_model->crud_register($this->extended_form_data, 'GroupsLinker');
			// TRAINING
			$this->extended_form_data['GroupFkid'] = 300;
			$this->extended_form_data['GroupRightsFkid'] = 300;			
			$this->crud_model->crud_register($this->extended_form_data, 'GroupsLinker');
			// EDX
			$this->extended_form_data['GroupFkid'] = 700;
			$this->extended_form_data['GroupRightsFkid'] = 710;			
			$this->crud_model->crud_register($this->extended_form_data, 'GroupsLinker');
			// ProctorU
			$this->extended_form_data['GroupFkid'] = 800;
			$this->extended_form_data['GroupRightsFkid'] = 810;			
			$this->crud_model->crud_register($this->extended_form_data, 'GroupsLinker');
		}
	
		if($fkidUserRole === '5' || $fkidUserRole === '10'){
			// CONNECT
			$this->extended_form_data['UserFkid'] = $fkidUserID;	
			$this->extended_form_data['GroupFkid'] = 100;
			$this->extended_form_data['GroupRightsFkid'] = 100;			
			$this->crud_model->crud_register($this->extended_form_data, 'GroupsLinker');
		}
			
		
		/* NOW UPDATE THE CONNECT TABLES */

		$this->connect_user = get_record_full_user_profile($fkidUserID); 
		
		$this->connect_form_data['fkidUserId'] = $fkidUserID;
		$this->connect_form_data['username'] = $this->connect_user->name;
		$this->connect_form_data['email'] = $this->connect_user->email;
		$this->connect_form_data['first_name'] = $this->connect_user->name;
		$this->connect_form_data['last_name'] = $this->connect_user->surname;
		if($this->connect_user->CountryResidence){
			$this->connect_form_data['country'] = $this->connect_user->CountryResidence;
		}else{
			$this->connect_form_data['country'] = '';
		}

		if($this->connect_user->current_business_address_city){
			$this->connect_form_data['location'] = $this->connect_user->current_business_address_city;
		}else{
			$this->connect_form_data['location'] = '';
		}


		$this->connect_form_data['address'] = $this->connect_user->current_business_address_1.', '. $this->connect_user->current_business_address_2;
		
		
		if($this->connect_user->current_organization){
			$this->connect_form_data['work'] = $this->connect_user->current_organization;
		}else{
			$this->connect_form_data['work'] = '';
		}
		$this->connect_form_data['image'] = 'default.png';
		$this->connect_form_data['cover'] = 'default.png';				

		if(_check_user_connect_status($fkidUserID)){
			$this->crud_model->crud_connect_update($this->connect_form_data, 'users', 'fkidUserId', $fkidUserID);
		}else{
			$this->crud_model->crud_connect_register($this->connect_form_data, 'users');	
		}			

		/* GET USER DETAILS FOR NOTIFY FUNCTION*/
		$this->registered_user = _get_record_registration_user($fkidUserID); 
		$this->load->helper('portal/notify');

		$phpdate = strtotime(date('Y-m-d H:i:s'));

		// ASSESSOR
		if($fkidUserRole === '5'){
			$email_subject = 'TADAT PORTAL REGISTRATION';
			$email_msg = $this->config->item('start_html_email').
			'<p><strong>' . lang('dear_') . $this->registered_user->name .' '. $this->registered_user->surname .'</strong></p>'.
			'<p>You have been granted access to the TADAT Portal as a ' . _global_convert_id_to_name("role", "UserRoles", $this->registered_user->fkidUserRole) . ' on '. date('l jS \of F Y', $phpdate). ' at '.date('H:i:s', $phpdate).'.</p>';
			$email_msg .=	'<p>' . $applicant_message . '</p>';
			if($fkidUserStatus === '5'){
			$email_subject .= ' - APPROVED';
				$email_msg .=
				'<p>'.lang('your_login_').lang('_platform').lang('_are').':</p>'.
				'<p><strong>'.lang('username_').'</strong>'.$this->registered_user->email.'</p>'.
				'<p><strong>'.lang('password_').'</strong>'.$tmp_password.' (<i>'.lang('case_sensitive').'</i>)</p>'.
				'<p>'.lang('you_will_be_').'</p>'.
				'<p>'.lang('click_').'<a href="'.$this->config->item('base_url').'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.								
				'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>';
			}else{
				$email_subject .= ' - DECLINED';			
			}
			$email_msg .='<p>'.lang('kind_regards').'</p>'.
			'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
			'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
			$this->config->item('end_html_email');
	
			# Send the e-mail message from the notify helper
			_send_email($this->config->item('support_from_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->config->item('support_reply_to_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->registered_user->email, $email_subject, $email_msg);			
			
		}
		// CONNECT
		if($fkidUserRole === '10'){
			$email_subject = 'TADAT PORTAL';
			$email_msg = $this->config->item('start_html_email').
			'<p><strong>' . lang('dear_') . $this->registered_user->name .' '. $this->registered_user->surname .'</strong></p>'.
			'<p>You have been invited by the TADAT Secretariat to join the TADAT Portal as a ' . _global_convert_id_to_name("role", "UserRoles", $this->registered_user->fkidUserRole) . ' on '. date('l jS \of F Y', $phpdate). ' at '.date('H:i:s', $phpdate).'.</p>';
			$email_msg .=	'<p> TADAT Connect is an internal communication platform used exclusively by members of the TADAT community.</p>';
			if($fkidUserStatus === '5'){
			$email_subject .= ' - INVITATION';
				$email_msg .=
				'<p>'.lang('your_login_').lang('_platform').lang('_are').':</p>'.
				'<p><strong>'.lang('username_').'</strong>'.$this->registered_user->email.'</p>'.
				'<p><strong>'.lang('password_').'</strong>'.$tmp_password.' (<i>'.lang('case_sensitive').'</i>)</p>'.
				'<p>'.lang('you_will_be_').'</p>'.
				'<p>'.lang('click_').'<a href="'.$this->config->item('base_url').'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.								
				'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>';
			}else{
				$email_subject .= ' - DECLINED';			
			}
			$email_msg .='<p>'.lang('kind_regards').'</p>'.
			'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
			'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
			$this->config->item('end_html_email');
	
			# Send the e-mail message from the notify helper
			_send_email($this->config->item('support_from_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->config->item('support_reply_to_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->registered_user->email, $email_subject, $email_msg);			
			_send_email($this->config->item('support_from_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->config->item('support_reply_to_address'), $this->config->item('application_name').lang('_support').lang('_team'), 'siesta@netactive.co.za', $email_subject, $email_msg);						
			
		}
		
		if($fkidUserRole === '8'){
//_show_array($this->registered_user);
			if ($this->registered_user->fkidTitle){
			$strTitle = _global_convert_id_to_name("Title", "Titles", $this->registered_user->fkidTitle). ' ';	
			}else{
			$strTitle = '';
			} 

			$email_subject = 'TADAT PORTAL REGISTRATION APPLICATION';
			$email_msg = $this->config->item('start_html_email').
			'<p><strong>' . lang('dear_') . $strTitle . $this->registered_user->name .' '. $this->registered_user->surname .'</strong></p>'.
			'<p>You have applied for access to the TADAT Portal as a ' . _global_convert_id_to_name("role", "UserRoles", $this->registered_user->fkidUserRole) . ' on '. date('l jS \of F Y', $phpdate). ' at '.date('H:i:s', $phpdate).'.</p>';
			$email_msg .=	'<p>' . $applicant_message . '</p>';
			if($fkidUserStatus === '2' || $fkidUserStatus === '4'){
			$email_subject .= ' - APPROVED';
				$email_msg .=
				'<p>'.lang('your_login_').lang('_platform').lang('_are').':</p>'.
				'<p><strong>'.lang('username_').'</strong>'.$this->registered_user->email.'</p>'.
				'<p><strong>'.lang('password_').'</strong>'.$tmp_password.' (<i>'.lang('case_sensitive').'</i>)</p>'.
				'<p>'.lang('you_will_be_').'</p>'.
				'<p>'.lang('click_').'<a href="'.$this->config->item('base_url').'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.								
				'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>';
			}else{
				$email_subject .= ' - DECLINED';			
			}
			$email_msg .='<p>'.lang('kind_regards').'</p>'.
			'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
			'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
			$this->config->item('end_html_email');
	
			# Send the e-mail message from the notify helper
			_send_email($this->config->item('support_from_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->config->item('support_reply_to_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->registered_user->email, $email_subject, $email_msg);			
		}
		
		


		if($fkidUserRole === '2'){		
			//redirect(base_url('users/awaiting/approval?user_type='.base64_encode($this->encrypt->encode(8))));
			redirect(base_url('secretariat/dashboard'));
		}else{
			redirect(base_url());
		}
/*
		$this->add_external_js(array(base_url()."/themes/core/js/views/training/users/users.js"));
		$this->data = $this->includes;		
		$this->panel_title = 'CURRENT TRAINEES AWAITING APPROVAL';
		$this->panel_icon = 'fa fa-th-list';
        $this->content_data['get_record_all_awaiting_approval'] = _get_record_all_trainee_users(null);
		$this->data['content'] = $this->load->view('training/users/users_list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
		*/
	}
}