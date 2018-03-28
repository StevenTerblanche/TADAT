<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Core_Controller{
	public $action, $form_data, $id, $fkID, $tbl, $data, $content_data, $assigned_user, $mode, $strUserRole, $arrDisplayUsersTypes, $arrDisplayUsersRoles;

	/*
		action 		 = Required by crud function in Crud_model
					 = create  - Creates and returns inserted id
					 = update  - Updates and returns updated id
					 = disable - Marks status = 0 in db where id = fkID
					 = delete  - Deletes entire row in db where id = fkID
		form_data 	 = gets posted data from view
		id 			 = The id returned via url that corresponds to an actual record in the database
		fkID 		 = The database field that the id above corresponds to
		tbl 		 = the table used for the current crud operations
		data		 = What gets loaded into the view and consists also of content_data
		content_data = Data array that is returned to page
					 = page_title: Title to appear at very top of page e.g. Manage Mission, Manage Users, Manage Authorities. The title is set via the core language file
					 = panel_icon: Icon to appear at top of panel and button
	*/

	function __construct(){
		parent::__construct();
		# Load specific js files here for the relevant section e.g. Mission, User, Authority etc.
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/users.js"));
		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# Table operations are performed on
		$this->tbl = 'Users';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->content_data['mode'] = null;
		$this->data = $this->includes;
		$this->assigned_user = null;
		
		$this->columns = 12;
		$this->panel_icon = 'fa fa-user';
		$this->page_header = strtoupper(lang('manage_').lang('users'));
		$this->panel_title = $this->config->item('application_name').lang('_user').lang('_profile');
		$this->content_data['submit_button'] = lang('action');
		$this->output->enable_profiler(false);
		/* This is to determine User Types (tester in db)
			0 = User
			1 = Developer
		*/			
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
					$this->arrDisplayUsersRoles = array(1,2,4,5,6,7);
					break;
				case 2:
					$this->arrDisplayUsersRoles = array(2,4,5,6,7);				
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
			$this->data['content'] = $this->load->view('users/profile', $this->content_data, true);
		}elseif(!$this->id && !$this->action){
			$this->columns = 12;
			$this->content_data['panel_title'] = $this->config->item('application_name').lang('_users').lang('_listing');
			
			$this->content_data['get_record_all_users'] = _get_record_all_users(null,$this->arrDisplayUsersTypes,$this->arrDisplayUsersRoles);
			$this->data['content'] = $this->load->view('users/list', $this->content_data, true);
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
		
		if($this->user->fkidUserRole == 2 || $this->user->fkidUserRole == 4){

			#** CREATE ** 
			# This shows the 'create view' for a NEW record if no ID OR action 
			if(!$this->id && !$this->action){
				# Tell the crud function what to do.
				$this->action = 'create';
				# Populate view variables according to type
				$this->panel_title = lang('create_').lang('a_').lang('new_').lang('user');
				$this->content_data['submit_button'] = lang('create_').lang('user');
				# This gets all the fields from the DB for the specified table and populates values in the view AFTER validation
				$this->content_data['get_fields'] = $this->db->list_fields($this->tbl);
				$this->content_data['uri'] = current_url();
				$this->data['content'] = $this->load->view('users/create', $this->content_data, true);
			}
		}else{
			$this->page_header = "ACCESS DENIED";
			$this->panel_title = "UNAUTHORIZED ACCESS DETECTED";
			$this->data['content'] = $this->load->view('users/denied', $this->content_data, true);
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
			# Get the countries only for the current region as retreived from the Authority fkidRegion
			$this->content_data['get_dropdown_all_country'] = _get_dropdown_by_id_country($this->content_data['get_record_by_id_user']->fkidRegion);
	        # Get the states by selected Country as retreived from the Authority fkidCountry
			$this->content_data['get_dropdown_all_states'] = _get_dropdown_by_id_state($this->content_data['get_record_by_id_user']->fkidCountry, 'FederalStates');
			$this->data['content'] = $this->load->view('users/create', $this->content_data, true);
		}

		# If there is an id and the FORM action is NOT delete OR disable
		if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
			# Validate the form on create or update
			$this->load->helper('form');
			$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
			# Check if full form is submitted or only password fields
			if($this->content_data['mode'] !== 'p'){
				$this->form_validation->set_rules('fkidTitle',   lang('user').lang('title'), 'required|trim');
			}else{
				$this->form_validation->set_rules('current_password', lang('password'), 'required|trim');
				$this->form_validation->set_rules('password', lang('password'), 'required|trim|matches[passconf]|min_length[10]|max_length[20]|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,20}$/]');
				$this->form_validation->set_rules('passconf', lang('confirm_password'), 'required|trim');	
			}

			# If there is no errors
			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){

				if ($this->action === 'create' || $this->content_data['mode'] === 'p' ){
					# It the mode is 'change password'
					if($this->content_data['mode'] === 'p'){
						# Retreive the hashed password for the current user from the db
						$result=_get_fields_by_id_array('','Users', 'id', $this->id, $out = array('loginPasswordHash','loginPasswordSalt'),',');
						# Hash and salt the supplied password then check the supplied password against the HASH value stored in the db
				        if ($result['loginPasswordHash'] !== hash('sha512', trim($this->form_data['current_password']) . $result['loginPasswordSalt'])){
							# Set and return error if not matched
							$this->session->set_flashdata('error', lang('password_not_match'));
							//redirect( $this->content_data['uri']);
							
							
							
							
							
						}else{
							/*
								//echo $this->form_data['current_password'];
								$email =_get_fields_by_id_array('','Users', 'id', $this->id, $out = array('email'),',');
								echo 'E-mail = '.$email['email'];
								$email = explode("@", $email['email']);
								echo 'Part Email = '.$email[0];;
								$newPassword = trim($this->form_data['password']);
								echo 'Password = '.$newPassword;
								if (preg_match($email[0],$newPassword)){
									echo $email[0];
									$this->session->set_flashdata('error', "here");
								}
							*/
							//$this->session->set_flashdata('error', lang('password_not_match'));
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
							$created_id = $this->crud_model->crud('update', $this->tbl, $this->form_data, $this->id, $this->fkID);
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
							$this->form_data['assignment_mail_sent'] = 0;							
							# Create the user and grab the returned id (new or updated)
							$created_id = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
	
							# Set the assigned_user object by taking the returned id and retreiving details from DB.
							$this->assigned_user = _get_record_by_id_users($created_id);
							# Build the e-mail message for a new user
							$email_subject = "LOGIN DETAILS";
							$email_msg =
								$this->config->item('start_html_email').
								'<p><strong>' . lang('dear_')._get_fields_by_id('Titles', 'id' ,$this->assigned_user->fkidTitle, array('title')).' '.$this->assigned_user->name.' '.$this->assigned_user->surname.'</strong></p>'.
								'<p>'.lang('this_serves_'). lang('in_role_'). _get_fields_by_id('UserRoles', 'id', $this->assigned_user->fkidUserRole, $out = array('role'), ' ') . 
								lang('on_the_') . $this->config->item('application_name').lang('_platform').'.</p>'.
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
		
							$this->load->helper('notify');
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

									/*
									echo '<br>'.$this->config->item('support_from_address').'<br>';
									echo '<br>'.$this->config->item('application_name').lang('_support').lang('_team').'<br>';									
									echo '<br>'.$this->config->item('support_reply_to_address').'<br>';									
									echo '<br>'.$email_subject.'<br>';									
									echo '<br>'.$email_msg.'<br>';	
									*/
					}
				}else{
					# Update the user and grab the returned id (new or updated)
					$created_id = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
				}
				# This redirects after successfull create or update with the encrypted id as returned from the crud function to the Profiles page.
				redirect(base_url('users/profile/?id='.base64_encode($this->encrypt->encode($created_id))));
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