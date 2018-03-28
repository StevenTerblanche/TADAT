<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Core_Controller{
	public $action, $form_data, $id, $fkID, $tbl, $data, $content_data, $assigned_user, $mode, $strUserRole, $arrDisplayUsersTypes, $arrDisplayUsersRoles;

	function __construct(){
		parent::__construct();
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/users.js"));
		$this->load->model('crud_model');
		$this->load->helper('training/users/users');				
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		$this->tbl = 'Users';
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		$this->fkID = 'id';
		$this->content_data['mode'] = null;
		$this->data = $this->includes;
		$this->assigned_user = null;
		$this->page_header = strtoupper(lang('manage_').lang('users'));
		$this->columns = 12;
		$this->panel_icon = 'fa fa-user';
		$this->panel_title = $this->config->item('application_name').lang('_user').lang('_profile');
		$this->content_data['submit_button'] = lang('action');
		$this->output->enable_profiler(false);
		$this->strUserRole = $this->user->fkidUserRole;
		// Set to default developers and not users
		$this->arrDisplayUsersTypes = array(0);

		/* This is revised levels of Authority in Ascending order of importance
			1 = Developers / TADAT Secretariat
			2 = TADAT Secretariat
			4 = Mission Team Leader (three roles)
			5 = IMF Appointed Assessor	
			6 = Revenue Authority Admin
			7 = Revenue Authority Counterpart
			8 = Role with custom access permissions.
		*/
		// Defaul to current user role
		$this->arrDisplayUsersRoles = array($this->strUserRole);

		if($this->strUserRole){
			switch ($this->strUserRole){
				case 1:
					$this->arrDisplayUsersTypes = array(0,1);
					$this->arrDisplayUsersRoles = array(1,2,4,5,6,7,8,9,10,11);
					break;
				case 2:
					$this->arrDisplayUsersRoles = array(2,4,5,6,7,8,9,10, 11);				
					break;
				case 4:
					$this->arrDisplayUsersRoles = array(5);
					break;
			}
		}
	}




	# Checks if id then show profile else shows listing
	function read(){
		if($this->id && !$this->action){
			$this->columns = 12;
			$this->panel_title = $this->config->item('application_name').lang('_user').lang('_profile');
			$this->content_data['get_record_by_id_users'] = _get_record_by_id_users($this->id);
			$this->data['content'] = $this->load->view('portal/users/profile', $this->content_data, true);
		}elseif(!$this->id && !$this->action){
			$this->columns = 12;
			$this->content_data['panel_title'] = $this->config->item('application_name').lang('_users').lang('_listing');
			
			$this->content_data['get_record_all_users'] = _get_record_all_users(null,$this->arrDisplayUsersTypes,$this->arrDisplayUsersRoles);
			$this->data['content'] = $this->load->view('portal/users/list', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}

	function modify(){
		# Used in Create and Update
		# This populates the Regions
        $this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages();
        $this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();		
        $this->content_data['get_dropdown_all_region'] = _get_dropdown_all_region();
		$this->content_data['get_dropdown_all_roles'] = _get_dropdown_all_roles(null,$this->arrDisplayUsersTypes,$this->arrDisplayUsersRoles);
		
		#** CREATE ** 
		# This shows the 'create view' for a NEW record if no ID OR action 
		if(!$this->id && !$this->action){
			# Tell the crud function what to do.
			$this->action = 'create';
			# Populate view variables according to type
			$this->panel_title = lang('create_').lang('a_').lang('new_').lang('user');
			$this->content_data['submit_button'] = lang('create_').lang('user');
			# This gets all the fields from the DB for the specified table and populates values in the view AFTER validation

			$this->content_data['get_fields'] = array_merge($this->db->list_fields('Users'),$this->db->list_fields('UserProfile'));
			$this->content_data['uri'] = current_url();
			$this->data['content'] = $this->load->view('portal/users/create', $this->content_data, true);
		}
		
		# ** EDIT **
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && !$this->action){
			# Tell the crud function what to do.
			$this->action = 'update';
			# Populate view variables according to type			
			$this->panel_title = lang('update_').lang('user');
			$this->content_data['mode'] = ($this->input->get('m')) ? $this->input->get('m') : null;
			if($this->content_data['mode'] === 's'){
				$this->panel_title = lang('manage_').lang('my').lang('_profile');
				$this->page_header = strtoupper(lang('manage_').lang('my').lang('_profile'));
				$this->content_data['submit_button'] = lang('update_').lang('my').lang('_profile');
				# Encrypts and encodes the id and sets URL mode to m for User OWN profile edit
			    $this->content_data['uri'] = current_url () . "?m=s&id=" . base64_encode($this->encrypt->encode($this->id));
				
			}elseif($this->content_data['mode'] === 'p'){
				$this->page_header = strtoupper(lang('update_').lang('my').lang('_password'));				
				$this->panel_title = lang('update_').lang('my').lang('_password');				
				$this->content_data['submit_button'] = lang('update_').lang('my').lang('_password');
			    $this->content_data['uri'] = current_url () . "?m=p&id=" . base64_encode($this->encrypt->encode($this->id));
			}else{
				$this->content_data['submit_button'] = lang('update_').lang('user');
				# Encrypts and encodes the id and sets URL
			    $this->content_data['uri'] = current_url () . "?id=" . base64_encode($this->encrypt->encode($this->id));
			}
			# Get the entire row as specified by the id

			$this->content_data['get_record_by_id_user'] = _get_record_by_id_users($this->id);
			//_show_array($this->content_data['get_record_by_id_user']);			
			# Get the countries only for the current region as retreived from the Authority fkidRegion
//			$this->content_data['get_dropdown_all_country'] = _get_dropdown_by_id_country($this->content_data['get_record_by_id_user']->fkidRegion);
	        # Get the states by selected Country as retreived from the Authority fkidCountry
//			$this->content_data['get_dropdown_all_states'] = _get_dropdown_by_id_state($this->content_data['get_record_by_id_user']->fkidCountry, 'FederalStates');
			$this->data['content'] = $this->load->view('portal/users/create', $this->content_data, true);
		}

		# If there is an id and the FORM action is NOT delete OR disable
		if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
			# Validate the form on create or update
			$this->load->helper('form');
			$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
			# Check if full form is submitted or only password fields
			if($this->content_data['mode'] !== 'p'){
				$this->form_validation->set_rules('fkidTitle',   lang('user').lang('title'), 'required|trim');
//				 $this->form_validation->set_rules('email', 'Email', 'required|is_unique[Users.email]');
			}else{
				$this->form_validation->set_rules('current_password', lang('password'), 'required|trim');
				//$this->form_validation->set_rules('password', lang('password'), 'required|trim|matches[passconf]');
				$this->form_validation->set_rules('password', lang('password'), 'required|trim|matches[passconf]|min_length[10]|max_length[20]|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,20}$/]');
				$this->form_validation->set_rules('passconf', lang('confirm_password'), 'required|trim');	
			}

			# If there is no errors
			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
				$redirect_url = base_url();
				if ($this->action === 'create' || $this->content_data['mode'] === 'p' ){
					# It the mode is 'change password'
					if($this->content_data['mode'] === 'p'){
						# Retreive the hashed password for the current user from the db
						$userEmail = _global_get_fields_by_id('Users', 'id', $this->id, array('email'),',', 'db_portal');

						$result=array('loginPasswordHash'=> _global_get_fields_by_id('Users', 'id', $this->id, array('loginPasswordHash'),',', 'db_portal'), 'loginPasswordSalt'=> _global_get_fields_by_id('Users', 'id', $this->id, array('loginPasswordSalt'),',', 'db_portal'));
//						_show_array($result);
						# Hash and salt the supplied password then check the supplied password against the HASH value stored in the db

				        if ($result['loginPasswordHash'] !== hash('sha512', trim($this->form_data['current_password']) . $result['loginPasswordSalt'])){
							# Set and return error if not matched
							$this->session->set_flashdata('error', lang('password_not_match'));
							redirect( $this->content_data['uri']);
						}else{

							# Generate a new SALT
							$tmp_salt = _generate_salt();
							# Generate a HASH from the Password and SALT combined
							$tmp_hash = _generate_hash ($this->form_data['password'], $tmp_salt);
							# Set the SALTED Password value to the form_data to be posted
							$this->form_data['loginPasswordSalt'] = $tmp_salt;
							# Set the HASH value in the posted form_data
							$this->form_data['loginPasswordHash'] = $tmp_hash;
							# Removes the password and confirmation fields from the posted form_data before db insertion
							unset($this->form_data['password'], $this->form_data['passconf'], $this->form_data['current_password']);
							# Set the loginPasswordChange to 1 thereby removing the initial dashboard re-direct to change user password
							$this->form_data['loginPasswordChange'] = 1;
							# Create the user and grab the returned id (new or updated)
							unset($this->form_data['tester']);
							$fkidUserID = $this->crud_model->crud('update', $this->tbl, $this->form_data, $this->id, $this->fkID,'db_portal');

							/* UPDATE THE CONNECT DB WITH NEW PASSWORD HASH*/
							/* UNSET THE CURRENT USER PASSWORD HASH AND RESET WITH NEW HASH FOR CONNECT FORM ON DASHBOARD*/
							$this->user->loginPasswordHash = $tmp_hash;
							$this->connect_form_data['password'] = $tmp_hash;
							$this->connect_form_data['verified'] = '1';
							$this->crud_model->crud_connect_update($this->connect_form_data, 'users', 'fkidUserId', $this->id);
							//$tmp_hash
							
							
							
							$this->session->set_flashdata('message', lang('password_changed_successfully'));
							# Check if user is changing password for first time after initial login
							if($this->session->userdata['loginPasswordChange'] == 0){
								# Set user->loginAttempts to 1 and redirect to dashboard
								$this->session->set_userdata('loginPasswordChange', 1);
								# Redirect to dashboard
								redirect(base_url());
							}
						}
					}else{
							# If a new user is created:
							$tmp_password = _generate_random_password();
							$tmp_salt = _generate_salt();
							$tmp_hash = _generate_hash ($tmp_password, $tmp_salt);

							$this->form_extended_data['loginPasswordSalt'] = $tmp_salt;
							$this->form_extended_data['loginPasswordHash'] = $tmp_hash;
							$this->form_extended_data['mailSent'] = 1;
							$this->form_extended_data['fkidUserRole'] = $this->form_data['fkidUserRole'];
							$this->form_extended_data['fkidTitle'] = $this->form_data['fkidTitle'];
							$this->form_extended_data['name'] = $this->form_data['name'];
							$this->form_extended_data['surname'] = $this->form_data['surname'];
							$this->form_extended_data['email'] = $this->form_data['email'];
							$this->form_extended_data['fkidLanguage'] = $this->form_data['fkidLanguage']; 
							$this->form_extended_data['status'] = 1; 							

							# Create the user and grab the returned id (new or updated)
							$this->form_data['fkidUserId'] = $this->crud_model->crud_register($this->form_extended_data, 'Users');
							$fkidUserID = $this->form_data['fkidUserId'];


							# CHECK WHAT TYPE OF USER AND UPDATE THE GROUPS TABLE ACCORDINGLY
							switch ($this->form_data['fkidUserRole']) { 
								case 11: 
									// TA Workshop Administrator
									
									/* NOW UPDATE THE GROUP MEMBERSHIP TABLES */		
									# CONNECT
									$this->membership_form_data['UserFkid'] = $fkidUserID;	
									$this->membership_form_data['GroupFkid'] = 100;
									$this->membership_form_data['GroupRightsFkid'] = 100;			
									$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');
									# TRAINING
									$this->membership_form_data['GroupFkid'] = 300;
									$this->membership_form_data['GroupRightsFkid'] = 300;			
									$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');
									# WORKSHOPS - ADD ATTENDEES							
									$this->membership_form_data['GroupFkid'] = 310;
									$this->membership_form_data['GroupRightsFkid']  = 312;
									$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');
									# SURVEYS - READ
									$this->membership_form_data['GroupFkid'] = 900;
									$this->membership_form_data['GroupRightsFkid'] = 900;			
									$this->crud_model->crud_register($this->membership_form_data, 'GroupsLinker');
									
								break; 
							} 

							unset($this->form_data['fkidUserRole']);
							unset($this->form_data['fkidTitle']);
							unset($this->form_data['name']);
							unset($this->form_data['surname']);
							unset($this->form_data['email']);
							unset($this->form_data['fkidLanguage']);							
							$this->crud_model->crud_register($this->form_data, 'UserProfile');

							/* NOW UPDATE THE CONNECT TABLES */
							$this->connect_user = get_record_connect_user_profile($fkidUserID); 
							$this->connect_form_data['fkidUserId'] = $fkidUserID;
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

	
							# Set the assigned_user object by taking the returned id and retreiving details from DB.
							$this->assigned_user = _get_record_by_id_users($fkidUserID);


							# Determine what type of message need to be sent and then build the inner message.
							$redirect_url = base_url();
							switch ($this->assigned_user->fkidUserRole) { 
								case 11: 
									$inner_email_msg = '<p>The role of Tax Administration Workshop Administrator will allow you to add attendees to any scheduled workshops that TADAT will be conducting in your area.</p>';
									$inner_email_msg .= '<p>Once you have successfully logged in, you will be able to view the upcoming workshops.</p>';
									$redirect_url = base_url('workshops/schedule');
								break; 
								default:
									$inner_email_msg = '';
									$redirect_url = base_url();
								 break;
							} 



							# Build the e-mail message for a new user
							$email_subject = "LOGIN DETAILS";
							$email_msg =
										$this->config->item('start_html_email').
										'<p><strong>' . lang('dear_')._global_get_fields_by_id('Titles', 'id' ,$this->assigned_user->fkidTitle, array('title'),null,'db_portal').' '.$this->assigned_user->name.' '.$this->assigned_user->surname.'</strong></p>'.
										'<p>'.lang('this_serves_'). lang('in_role_'). _global_get_fields_by_id('UserRoles', 'id', $this->assigned_user->fkidUserRole, array('role'),null,'db_portal') . 
										lang('on_the_') . $this->config->item('application_name').lang('_platform').'.</p>';
							$email_msg .= $inner_email_msg;
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
				}else{
					# Update the user and grab the returned id (new or updated)
					$fkidUserID = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
				}
				# This redirects after successfull create or update with the encrypted id as returned from the crud function to the Profiles page.

				redirect($redirect_url);
			}		
		}
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && ($this->action ==='enable' || $this->action ==='disable' || $this->action ==='delete')){
			# Call crud function with relevant action
			$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
			#redirect to listings View
			redirect(base_url('users/list'));
		}
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }
}