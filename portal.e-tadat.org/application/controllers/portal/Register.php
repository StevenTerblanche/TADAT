<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends Core_Controller {
    function __construct(){
        parent::__construct();
		$this->add_external_css(array("/themes/core/css/login.css","/themes/core/css/login-animate.css"));
		$this->add_external_js(array("/themes/core/js/login/login.js", "/themes/core/js/login/placeholder-shim.js", "/themes/core/js/bootstrapvalidator.min.js", "/themes/core/js/jquery.menu.js", "/themes/core/js/jquery.bootstrap.wizard.js", "/themes/core/js/views/register/register.js", "/themes/core/js/bootstrap-datepicker.js"));
        $this->load->model('login_model');	
		$this->load->helper('global/registration');
        $this->type = ($this->input->get('type')) ? $this->encrypt->decode(base64_decode($this->input->get('type'))) : null;		
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;	
		$this->form_extended_data = '';			
		$this->registered_user = '';					
		$this->data = $this->includes;			
		$this->panel_title = 'TADAT PORTAL REGISTRATION';
		$this->action ='';		
    }

	// Show first page - Role Type Dropdown
	function index(){
		$this->content_data['uri'] = base_url('register/selector');
        $this->content_data['get_dropdown_all_registration_roles'] = _get_dropdown_all_registration_roles();				
		$this->data['content'] = $this->load->view('portal/registration/register', $this->content_data, true);
        $this->load->view($this->registration_template, $this->data);
	}


	function selector(){
		$this->content_data['uri'] = current_url();
		if(isset($this->form_data['selector']) && !isset($this->form_data['referenceNumber'])){
			$this->session->set_flashdata('fkidUserRole', $this->form_data['selector']);
			$this->session->set_flashdata('action', 'new');
			$redirector = 'register/application';	
			redirect(base_url($redirector));
		}

		if(isset($this->form_data['referenceNumber']) && $this->form_data['referenceNumber'] !== ''){
			$this->session->set_flashdata('referenceNumber', trim($this->form_data['referenceNumber']));
			$this->session->set_flashdata('action', 'resume');
			$this->session->set_flashdata('RegisterType', trim($this->form_data['RegisterType']));
			$redirector = 'register/application';	
			redirect(base_url($redirector));
		}
	}



	function application(){
		$this->add_external_css(array("/themes/core/css/blue_imp/blueimp-gallery.min.css", "/themes/core/css/blue_imp/jquery.fileupload-ui.css", "/themes/core/css/blue_imp/jquery.fileupload.css"));
		$this->add_external_js(array("/themes/core/js/blue_imp/tmpl.min.js", "/themes/core/js/blue_imp/load-image.all.min.js", "/themes/core/js/blue_imp/canvas-to-blob.min.js", "/themes/core/js/blue_imp/jquery.blueimp-gallery.min.js", "/themes/core/js/blue_imp/jquery.iframe-transport.js", "/themes/core/js/blue_imp/jquery.fileupload.js", "/themes/core/js/blue_imp/jquery.fileupload-process.js", "/themes/core/js/blue_imp/jquery.fileupload-image.js", "/themes/core/js/blue_imp/jquery.fileupload-audio.js", "/themes/core/js/blue_imp/jquery.fileupload-video.js", "/themes/core/js/blue_imp/jquery.fileupload-validate.js", "/themes/core/js/blue_imp/jquery.fileupload-ui.js", "/themes/core/js/blue_imp/main.js"));		
		$this->data = $this->includes;			
		$this->content_data['uri'] = base_url('register/complete');


		/* Check resume type - If invitation update tables before resuming*/
			if($this->session->flashdata('RegisterType')){
				$arrInviteeDetails = _get_record_by_reference_invitee($this->session->flashdata('referenceNumber'));
				//_show_array($arrInviteeDetails);
				$this->content_data['retreivedFkidUserId'] = '';
			}



		/* Check if reference number set - get user data from db*/
		if($this->session->flashdata('referenceNumber')){
			$this->content_data['action'] = $this->session->flashdata('action');
			$this->content_data['get_record_by_id'] = _get_record_by_reference_user($this->session->flashdata('referenceNumber'));
			$this->content_data['retreivedFkidUserId'] = $this->content_data['get_record_by_id']->fkidUserId;
			$this->content_data['fkidUserRolePassed'] = $this->content_data['get_record_by_id']->fkidUserRole;
			$this->session->set_flashdata('fkidUserRole', $this->content_data['get_record_by_id']->fkidUserRole);
		}else{
			$this->content_data['action'] = $this->session->flashdata('action');
			$this->content_data['get_fields_user'] = $this->db->list_fields('Users');
			$this->content_data['get_fields_profile'] = $this->db->list_fields('UserProfile');
			$this->content_data['passed_referenceNumber'] = _generate_random_reference('', 8);
			$this->content_data['fkidUserRolePassed'] = $this->session->flashdata('fkidUserRole');							
			$this->content_data['retreivedFkidUserId'] = '';			
		}
			$this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();				
			$this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages_register();
			$this->content_data['get_dropdown_all_genders'] = _get_dropdown_all_genders();
			$this->content_data['get_dropdown_all_countries'] = _get_dropdown_all_country();
			$this->content_data['get_dropdown_all_organization_types'] = _get_dropdown_all_organization_types();		
			$this->content_data['get_dropdown_all_degrees'] = _get_dropdown_all_degrees();
			$this->content_data['get_dropdown_all_occupation'] = _get_dropdown_all_occupation();			


		if(!$this->session->flashdata('fkidUserRole')){
			redirect(base_url('register'));

		}else{
			switch ($this->session->flashdata('fkidUserRole')){
		
				// TADAT Trainee
				case 8: 
					$this->data['content'] = $this->load->view('portal/registration/register_trainee', $this->content_data, true);
				break;
		
				// TADAT Survey Participant
				case 9: 
					$this->data['content'] = $this->load->view('portal/registration/register_application', $this->content_data, true);
				break;
				
				// TADAT Donor / Sponsor
				case 13: 
					$this->data['content'] = $this->load->view('portal/registration/register_sponsor', $this->content_data, true);
				break;
			}
		}	
        
		
		$this->load->view($this->registration_template, $this->data);
	}





	function resume(){
		$this->content_data['uri'] = base_url('register/selector');

		if($this->encrypt->decode($this->input->get('type'))){
			$this->content_data['type'] = $this->encrypt->decode($this->input->get('type'));
		}else{
			$this->content_data['type'] = null;
		}
	
		$this->data['content'] = $this->load->view('portal/registration/resume', $this->content_data, true);
        $this->load->view($this->registration_template, $this->data);
	}


	function resume_invitation(){
		$this->panel_title = 'TADAT WORKSHOP REGISTRATION';
		$this->content_data['uri'] = base_url('register/selector');	
		
		$this->data['content'] = $this->load->view('portal/registration/resume_invitation', $this->content_data, true);
        $this->load->view($this->registration_template, $this->data);
	}





	function workshop_invitee(){
		$this->add_external_css(array("/themes/core/css/blue_imp/blueimp-gallery.min.css", "/themes/core/css/blue_imp/jquery.fileupload-ui.css", "/themes/core/css/blue_imp/jquery.fileupload.css"));
		$this->add_external_js(array("/themes/core/js/blue_imp/tmpl.min.js", "/themes/core/js/blue_imp/load-image.all.min.js", "/themes/core/js/blue_imp/canvas-to-blob.min.js", "/themes/core/js/blue_imp/jquery.blueimp-gallery.min.js", "/themes/core/js/blue_imp/jquery.iframe-transport.js", "/themes/core/js/blue_imp/jquery.fileupload.js", "/themes/core/js/blue_imp/jquery.fileupload-process.js", "/themes/core/js/blue_imp/jquery.fileupload-image.js", "/themes/core/js/blue_imp/jquery.fileupload-audio.js", "/themes/core/js/blue_imp/jquery.fileupload-video.js", "/themes/core/js/blue_imp/jquery.fileupload-validate.js", "/themes/core/js/blue_imp/jquery.fileupload-ui.js", "/themes/core/js/blue_imp/main.js"));		
		$this->data = $this->includes;			
		$this->content_data['uri'] = base_url('register/workshop/complete');

		/* Check if reference number set - get user data from db*/
		$this->content_data['action'] = $this->session->flashdata('action');
		$this->content_data['get_record_by_id'] = _get_record_by_reference_invitee($this->session->flashdata('invitationCode'));
		$this->content_data['passed_referenceNumber'] =	$this->session->flashdata('invitationCode');	
		$this->content_data['get_fields_user'] = $this->db->list_fields('Users');
		$this->content_data['get_fields_profile'] = $this->db->list_fields('UserProfile');		
		
		$this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();				
		$this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages_register();
		$this->content_data['get_dropdown_all_genders'] = _get_dropdown_all_genders();
		$this->content_data['get_dropdown_all_countries'] = _get_dropdown_all_country();
		$this->content_data['get_dropdown_all_organization_types'] = _get_dropdown_all_organization_types();		

		$this->data['content'] = $this->load->view('portal/registration/register_invitee', $this->content_data, true);
        $this->load->view($this->registration_template, $this->data);
	}

	

   
    function decline_invite(){
		$referenceNumber = ($this->input->get('id')) ? $this->input->get('id') : (($this->input->post('id')) ? $this->input->post('id') : null);
		$this->load->model('crud_model');	
		
		$this->form_data['acceptanceStatus'] = '2'; 		
		$this->user = (object) ['id' => '0'];
		$this->crud_model->crud('update', 'WorkshopInvitees', $this->form_data, $referenceNumber, 'referenceNumber', 'db_training');
		$this->content_data['message'] = "Declined";
		$this->panel_title = "TADAT PORTAL CONFIRMATION";
		$this->data['content'] = $this->load->view('portal/registration/confirmation_decline', $this->content_data, true);
        $this->load->view($this->registration_template, $this->data);
	}
   
   
   
    function register_invitee(){
		$this->load->model('crud_model');	
		$progressStatus = 0;
		$updateStatus = 0;
		$notifyStatus = 1;			
		$this->form_extended_data['fkidUserStatus'] = '1'; 

		/* STEP 1 - INSERT USER TABLE*/
		$tmp_password = _generate_random_password();
		$tmp_salt = _generate_salt();
		$tmp_hash = _generate_hash ($tmp_password, $tmp_salt);

		$this->form_extended_data['loginPasswordSalt'] = $tmp_salt;
		$this->form_extended_data['loginPasswordHash'] = $tmp_hash;
		$this->form_extended_data['mailSent'] = 1;
		$this->form_extended_data['status'] = 1; 							
		$this->form_extended_data['progress'] = $this->form_data['progress'];
		$this->form_extended_data['fkidUserRole'] = $this->form_data['fkidUserRole'];
		$this->form_extended_data['fkidTitle'] = $this->form_data['fkidTitle'];
		$this->form_extended_data['name'] = $this->form_data['name'];
		$this->form_extended_data['middle_name'] = $this->form_data['middle_name'];
		$this->form_extended_data['surname'] = $this->form_data['surname'];
		$this->form_extended_data['email'] = $this->form_data['email'];
		$this->form_extended_data['fkidLanguage'] = $this->form_data['fkidLanguage']; 
		$this->form_extended_data['referenceNumber'] = $this->form_data['referenceNumber'];
		$referenceNumber = $this->form_data['referenceNumber'];
		$this->form_data['fkidUserId'] = $this->crud_model->crud_register($this->form_extended_data, 'Users');

		$fkidUserId = $this->form_data['fkidUserId'];
		$WorkshopFkId = $this->form_data['WorkshopFkId'];

		/* STEP 2 - UPDATE THE GROUP MEMBERSHIP TABLES */		
		# CONNECT
		$this->membership_form_data['UserFkid'] = $fkidUserId;	
		$this->membership_form_data['GroupFkid'] = 100;
		$this->membership_form_data['GroupRightsFkid'] = 100;			
		$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');
		# TRAINING
		$this->membership_form_data['GroupFkid'] = 300;
		$this->membership_form_data['GroupRightsFkid'] = 300;			
		$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');
		# WORKSHOPS - READ
		$this->membership_form_data['GroupFkid'] = 310;
		$this->membership_form_data['GroupRightsFkid'] = 310;			
		$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');
		# SURVEYS - READ
		$this->membership_form_data['GroupFkid'] = 900;
		$this->membership_form_data['GroupRightsFkid'] = 900;			
		$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');


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
		

		unset($this->form_data['retreivedFkidUserId']);
		unset($this->form_data['submit']);
		unset($this->form_data['referenceNumber']);		
		unset($this->form_data['WorkshopFkId']);		
		unset($this->form_data['fkidUserRole']);
		unset($this->form_data['fkidTitle']);
		unset($this->form_data['name']);
		unset($this->form_data['middle_name']);
		unset($this->form_data['surname']);
		unset($this->form_data['email']);
		unset($this->form_data['fkidLanguage']);
		unset($this->form_data['progress']);
		$this->crud_model->crud_register($this->form_data, 'UserProfile');

		/* STEP 4 - NOW UPDATE THE CONNECT TABLES */
		$this->load->helper('training/users/users');

		$this->connect_user = get_record_connect_user_profile($fkidUserId); 
		$this->connect_form_data['fkidUserId'] = $fkidUserId;
		$this->connect_form_data['username'] = $this->connect_user->name;
		$this->connect_form_data['email'] = $this->connect_user->email;
		$this->connect_form_data['first_name'] = $this->connect_user->name;
		$this->connect_form_data['last_name'] = $this->connect_user->surname;
		$this->connect_form_data['country'] = $this->connect_user->CountryResidence;
		$this->connect_form_data['location'] = $this->connect_user->current_business_address_city;
		$this->connect_form_data['work'] = $this->connect_user->current_organization;
		$this->connect_form_data['image'] = 'default.png';
		$this->connect_form_data['cover'] = 'default.png';				
		
		$this->crud_model->crud_connect_register($this->connect_form_data, 'users');
		

		# STEP 5 - UPDATE INVITATION TABLE
		$this->user = (object) ['id' => $fkidUserId];
		$this->invitation_form_data['acceptanceStatus']  = '1';
		$this->crud_model->crud('update', 'WorkshopInvitees', $this->invitation_form_data, $referenceNumber, 'referenceNumber', 'db_training');
		
		# STEP 6 - UPDATE WORKSHOP LINKER TABLE
		$this->user = (object) ['id' => $fkidUserId];
		$this->workshop_form_data['UserFkid']  = $fkidUserId;
		$this->workshop_form_data['WorkshopFkId']  = $WorkshopFkId;		
		$this->crud_model->crud('create', 'WorkshopLinker', $this->workshop_form_data, null, null, 'db_training');	
	
		# STEP 6 - SEND REGISTRATION E-MAIL
		$this->notify_invitee($fkidUserId, $tmp_password);		

		# STEP 7 - DISPLAY CONFIRMATION PAGE
		$data = $this->includes;
		$this->content_data['get_record_registration_user'] = _get_record_registration_user($this->form_data['fkidUserId']);
		$data['content'] = $this->load->view('portal/registration/invitee_confirmation', $this->content_data, true);
		$this->load->view($this->template, $data);		
	}


    function register(){
		$this->load->model('crud_model');		
		/* CHECK IF SAVING OR SUBMITTING */

		## First time registration - Saving Progress ** REGISTER
		if($this->form_data['progress'] === '0' && $this->form_data['retreivedFkidUserId'] === ''){
			$progressStatus = 0;
			$updateStatus = 0;
			$notifyStatus = 0;
			$this->form_extended_data['fkidUserStatus'] = '0'; 
		}

		## First Time registration - Submitting ** REGISTER
		if($this->form_data['progress'] === '1' && $this->form_data['retreivedFkidUserId'] === ''){
			$progressStatus = 1;
			$updateStatus = 0;
			$notifyStatus = 1;			
			$this->form_extended_data['fkidUserStatus'] = '1'; 
		}		

		## Returning registration - Submitting ** UPDATE
		if($this->form_data['progress'] === '1' && $this->form_data['retreivedFkidUserId'] !== ''){
			$progressStatus = 1;
			$updateStatus = 1;
			$notifyStatus = 1;			
			$this->form_extended_data['fkidUserStatus'] = '1'; 
		}		

		## Returning registration - Saving Progress ** UPDATE
		if($this->form_data['progress'] === '0' && $this->form_data['retreivedFkidUserId'] !== ''){
			$progressStatus = 0;
			$updateStatus = 1;
			$notifyStatus = 0;			
			$this->form_extended_data['fkidUserStatus'] = '0'; 
		}



		/* STEP 1 - UPDATE USER TABLE*/
		$this->form_extended_data['progress'] = $this->form_data['progress'];
		$this->form_extended_data['fkidUserRole'] = $this->form_data['fkidUserRole'];
		$this->form_extended_data['fkidTitle'] = $this->form_data['fkidTitle'];
		$this->form_extended_data['name'] = $this->form_data['name'];
		$this->form_extended_data['middle_name'] = $this->form_data['middle_name'];
		$this->form_extended_data['surname'] = $this->form_data['surname'];
		$this->form_extended_data['email'] = $this->form_data['email'];
		$this->form_extended_data['fkidLanguage'] = $this->form_data['fkidLanguage']; 
		$this->form_extended_data['referenceNumber'] = $this->form_data['referenceNumber'];


		if(($progressStatus === 0 && $updateStatus === 0) || ($progressStatus === 1 && $updateStatus === 0)){
			$this->form_data['fkidUserId'] = $this->crud_model->crud_register($this->form_extended_data, 'Users');
			$passedID = $this->form_data['fkidUserId'];
		}

		if(($progressStatus === 1 && $updateStatus === 1) || ($progressStatus === 0 && $updateStatus === 1)){
			$this->crud_model->crud_register_update('Users', $this->form_extended_data, $this->form_data['retreivedFkidUserId']);
			$this->form_data['fkidUserId'] = $this->form_data['retreivedFkidUserId'];
			$passedID = $this->form_data['fkidUserId'];
		}

		/* STEP 2 - UPDATE USER DOCUMENTS */
		$document_data = array("fkidUserId"=>$this->form_data['fkidUserId']);
		$this->crud_model->crud_register_update_documents('UserDocuments', $this->form_data['referenceNumber'], $document_data);


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

		unset($this->form_data['retreivedFkidUserId']);
		unset($this->form_data['submit']);
		unset($this->form_data['referenceNumber']);		
		unset($this->form_data['fkidUserRole']);
		unset($this->form_data['fkidTitle']);
		unset($this->form_data['name']);
		unset($this->form_data['middle_name']);
		unset($this->form_data['surname']);
		unset($this->form_data['email']);
		unset($this->form_data['fkidLanguage']);


		if(($progressStatus === 1 && $updateStatus === 1) || ($progressStatus === 0 && $updateStatus === 1)){
			unset($this->form_data['progress']);
			$this->crud_model->crud_register_update_profile('UserProfile', $this->form_data, $passedID);
		}

		if(($progressStatus === 0 && $updateStatus === 0) || ($progressStatus === 1 && $updateStatus === 0)){
			unset($this->form_data['progress']);
			$this->crud_model->crud_register($this->form_data, 'UserProfile');
		}
	
		/* STEP 4 - DISPLAY CONFIRMATION PAGE*/
		$data = $this->includes;
		$this->notify($passedID, $notifyStatus);
		$this->content_data['get_record_registration_user'] = _get_record_registration_user($this->form_data['fkidUserId']);
		$data['content'] = $this->load->view('portal/registration/confirmation', $this->content_data, true);
		$this->load->view($this->template, $data);		
	}





function notify_invitee($fkidUserID, $tmp_password){
	
	# Set the assigned_user object by taking the returned id and retreiving details from DB.
	$this->assigned_user = _get_record_by_id_users($fkidUserID);


	# Determine what type of message need to be sent and then build the inner message.
	$redirect_url = base_url('workshops/schedule');


	# Build the e-mail message for a new user
	$email_subject = "TADAT PORTAL - LOGIN DETAILS";
	$email_msg =
				$this->config->item('start_html_email').
				'<p><strong>' . lang('dear_')._global_get_fields_by_id('Titles', 'id' ,$this->assigned_user->fkidTitle, array('title'),null,'db_portal').' '.$this->assigned_user->name.' '.$this->assigned_user->surname.'</strong></p>'.
				'<p>'.lang('this_serves_'). lang('in_role_'). _global_get_fields_by_id('UserRoles', 'id', $this->assigned_user->fkidUserRole, array('role'),null,'db_portal') . 
				lang('on_the_') . $this->config->item('application_name').lang('_platform').'.</p>';
	$email_msg .=	
				'<p>'.lang('your_login_').lang('_platform').lang('_are').':</p>'.
				'<p><strong>'.lang('username_').'</strong>'.$this->assigned_user->email.'</p>'.
				'<p><strong>'.lang('password_').'</strong>'.$tmp_password.' (<i>'.lang('case_sensitive').'</i>)</p>'.
				'<p>'.lang('you_will_be_').'</p>'.
				'<p>'.lang('click_').'<a href="'.$this->config->item('base_url').'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.								
				'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>'.
				'<p>'.lang('kind_regards').'</p>'.
				'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
				'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
		$this->config->item('end_html_email');

	$this->load->helper('portal/notify');
	# Send the E-mail
	_send_email(
				$this->config->item('support_from_address'),
				strtoupper($this->config->item('application_name')), 
				$this->config->item('support_reply_to_address'), 
				$this->config->item('application_name').lang('_support').lang('_team'), 
				$this->assigned_user->email, 
				$email_subject, 
				$email_msg
			);	
	
	}




	function notify($userId, $progressStatus){
		$data = $this->includes;
		$this->registered_user = _get_record_registration_user($userId); 
		$this->load->helper('portal/notify');
		$phpdate = strtotime($this->registered_user->dateCreated);
		$email_subject = 'TADAT PORTAL REGISTRATION APPLICATION';
		$email_msg = $this->config->item('start_html_email').
		'<p><strong>' . lang('dear_') . _global_convert_id_to_name("Title", "Titles", $this->registered_user->fkidTitle) . ' ' . $this->registered_user->name .' '. $this->registered_user->surname .'</strong></p>'.
		'<p>This serves to confirm that you have applied for access to the TADAT Portal as a ' . _global_convert_id_to_name("role", "UserRoles", $this->registered_user->fkidUserRole) . '.</p>';
	
		if($progressStatus === 0){						
			$email_msg .=	'<p>The application you submitted on '. date('l jS \of F Y', $phpdate). ' at '.date('H:i:s', $phpdate).', has been saved.</p>'.
							'<p>Your registration reference number is '.$this->registered_user->referenceNumber.' and should be used when resuming your application.</p>'.
							'<p>To resume your application, you must visit <a href="'.base_url().'register/resume">'.base_url().'register/resume</a>.</p>';
		}else{
			$email_msg .=	'<p>The application you submitted on '. date('l jS \of F Y', $phpdate). ' at '.date('H:i:s', $phpdate).', will be reviewed shortly by the TADAT Secretariat and you will be notified via e-mail to '. $this->registered_user->email . ' of the status of your application and what further information, if any, may be required.</p>'.
							'<p>Your registration reference number is '.$this->registered_user->referenceNumber.' and should be included in any correspondence with the TADAT Secretariat regarding your registration status.</p>';
		}
		$email_msg .='<p>'.lang('kind_regards').'</p>'.
		'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
		'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
		$this->config->item('end_html_email');

		# Send the e-mail message from the notify helper
		_send_email($this->config->item('support_from_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->config->item('support_reply_to_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->registered_user->email, $email_subject, $email_msg);

		return true;
	}	

	function info(){
        $this->content_data['get_dropdown_all_registration_roles'] = '';
		$this->data['content'] = $this->load->view('portal/info', $this->content_data, true);
        $this->load->view($this->template, $this->data);
	}


	
}