<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Core_Controller {
    function __construct(){
        parent::__construct();
		$this->add_external_css(array("/themes/core/css/login.css","/themes/core/css/login-animate.css"));
		$this->add_external_js(array("/themes/core/js/login/login.js", "/themes/core/js/login/placeholder-shim.js"));
        $this->load->model('login_model');	
//        $this->load->helper('login_model');			
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;		
    }
/* Notes
	When logging in  run form validation
	If validation true load the users library
	Populate the objUser object if the e-mail found in the Users table
	If status = 1 (enabled user) $this->users->objUser->status == 1
	Use the portal/set_user_session_by_id() helper to populate $this->session->userdata with all the users details
*/

    function login(){
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        $this->form_validation->set_rules('username', lang('email_address'), 'required|trim|valid_email');
        $this->form_validation->set_rules('password', lang('password'), 'required|trim');
        if ($this->form_validation->run() == true){
			# Prepare the 'parameters' array (which will be passed to the Users Library Class) with the table to be queried as well as an array of fields to query
			$parameters = array('table' => 'Users', 'fields'=>array('email' => $this->input->post('username', true)));
			# Load the Users library with populated parameters array
			$this->load->library('users',$parameters);
			# If the e-mail is found then it returns objUser with all details for the specific e-mail address in the Users table
			if ($this->users->objUser){
				# If the e-mail is found and the user account is enabled 
				if($this->users->objUser->status == 1){
					# Check the password against the hash and salt
					if (_check_hash($this->users->objUser->loginPasswordHash, $this->input->post('password', true), $this->users->objUser->loginPasswordSalt)){
						# Build the userdata session from the portal/create_user_session_helper
						_set_user_session_by_id(get_instance()->users->objUser->id);
						$this->login_model->update_stats(get_instance()->users->objUser->id);
						redirect(base_url());
					}else{
						$this->session->set_userdata('logged_in', 0);
						$this->session->set_flashdata('error', lang('incorrect_password'));	
					}
				}else{
					$this->session->set_userdata('logged_in', 0);
					$this->session->set_flashdata('error', lang('account_disabled'));
				}
			}else{
				# If the e-mail is not found then it returns an error message
				$this->session->set_flashdata('error', lang('email_not_exist'));
			}
		}
        $data = $this->includes;
        
		$data['content'] = $this->load->view('portal/login/login', null, true);
       $this->load->view($this->registration_template, $data);
	}


    function register(){
		unset($this->form_data['submit']);
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        $this->form_validation->set_rules('email', lang('email_address'), 'required|trim|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('surname', 'Surname', 'required|trim');
				
        if ($this->form_validation->run() == true){
			$this->load->model('crud_model');
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
			$this->form_data['fkidRegion'] = 1;
			$this->form_data['fkidCountry'] = 1;			

			$this->form_data['loginPasswordHash'] = $tmp_hash;
			$this->form_data['mailSent'] = 1;
			$this->form_data['assignment_mail_sent'] = 0;							
//			print_r($this->form_data);
			# Create the user and grab the returned id (new or updated)
			$created_id = $this->crud_model->crud_register($this->form_data);
			
			# Set the assigned_user object by taking the returned id and retreiving details from DB.
			$this->assigned_user = _get_temp_record_by_id_users($created_id);
			# Build the e-mail message for a new user
			$email_subject = "LOGIN DETAILS";
			$email_msg =
				$this->config->item('start_html_email').
				'<p><strong>' . lang('dear_').$this->assigned_user->name.' '.$this->assigned_user->surname.'</strong></p>'.
				'<p>'.lang('this_serves_'). lang('in_role_'). _global_get_fields_by_id('UserRoles', 'id', $this->assigned_user->fkidUserRole, $out = array('role'), ' ') . 
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

					# Update the user and grab the returned id (new or updated)
//					$created_id = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
				# This redirects after successfull create or update with the encrypted id as returned from the crud function to the Profiles page.
				redirect(base_url('check_mail'));
			}				


		$data = $this->includes;
		$data['content'] = $this->load->view('portal/login/register', null, true);
		$this->load->view($this->registration_template, $data);		
	}


function check_mail(){
	 $data = $this->includes;
        
		$data['content'] = $this->load->view('portal/login/check_mail', null, true);
       $this->load->view($this->registration_template, $data);
	
	}

    function forgot(){
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        $this->form_validation->set_rules('username', lang('email_address'), 'required|trim|valid_email');
		$this->form_validation->set_message('valid_email', lang('invalid_email_address'));
		//	The E-mail address field must contain a valid email address.
        if ($this->form_validation->run() == true){
			# Prepare the 'parameters' array (which will be passed to the Users Library Class) with the table to be queried as well as an array of fields to query
			$parameters = array('table' => 'Users', 'fields'=>array('email' => $this->input->post('username', true)));
			# Load the Users library with populated parameters array
			$this->load->library('users',$parameters);
			# If the e-mail is found then it returns objUser with all details for the specific e-mail address in the Users table
			if ($this->users->objUser){
				# If the e-mail is found and the user account is enabled 
				if($this->users->objUser->status == 1){
					# Generate a new random password 
					$newPass = _generate_random_password();
					$newPin = _generate_random_pin();
					$newSalt = _generate_salt();
					$newPassHash = _generate_hash($newPass, $newSalt);
					$newPinHash = _generate_hash($newPin, $newSalt);
					$loginPasswordChange = 0;
					if (!$newPass || !$newPassHash || !$newPin || !$newPinHash || !$newSalt){
						 $this->session->set_flashdata('system_error', lang('password_reset_failed').'<br><br>'.lang('problem_persists').'<br>'.'<a class="white-link pt5" href="mailto:'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>');
					}else{
						# Now update the db with the relevant details
						if($this->login_model->update($newPassHash, $newPinHash, $newSalt, $this->users->objUser->id, $loginPasswordChange)){
								# Call the notification function
								if($this->notify($newPin, $newPass, $newPinHash)){
									# Show success message and redirect
									$this->session->set_flashdata('message', lang('password_reset_success'));
								}else{
									# Show error message
									$this->session->set_flashdata('system_error', lang('password_reset_failed').'<br><br>'.lang('problem_persists').'<br>'.'<a class="white-link pt5" href="mailto:'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>');																	
								}
						}else{
							$this->session->set_flashdata('system_error', lang('password_reset_failed').'<br><br>'.lang('problem_persists').'<br>'.'<a class="white-link pt5" href="mailto:'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>');
						}
				 	}
				}else{$this->session->set_flashdata('error', lang('account_disabled'));}
			}
		}

        $data = $this->includes;
        $data['content'] = $this->load->view('portal/login/forgot', null, true);
        $this->load->view($this->registration_template, $data);
	}
	
	function notify($newPin, $newPass, $newPinHash){
		$this->load->helper('portal/notify');
		/* SMS NOTIFY REMOVED FOR LATER INCLUSION*/
/*		if (!_send_sms($this->users->objUser->mobile, lang("your_sms_pin_is_") . $newPin . ". " . lang("queries_contact_") .$this->config->item('support_from_address'). '.')){
			$this->session->set_flashdata('error', lang("failed_sending_pin"));
			redirect(base_url("forgot"));
		}
*/		
		$email_subject = lang('password_reset_for_').$this->config->item('application_name');
		$email_msg = $this->config->item('start_html_email').
//						'<p><strong>' . $newPin . '<- This is temp till SMS Aggregator received our RICA documents!!!!</strong></p>'.

						'<p><strong>' . lang('dear_').$this->users->objUser->name.' '.$this->users->objUser->surname.'</strong></p>'.
						'<p>'.lang('your_temp_password_for_the_').lang('_platform').lang('_is').':</p>'.
						'<p>'.lang('password_').$newPass.' (<i>'.lang('case_sensitive').'</i>)</p>'.
						'<p>'.lang('click_').'<a href="'.base_url().'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.
//						'<p>'.lang('click_').'<a href="'.base_url('reset?h=' . $newPinHash).'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.
						'<p>'.lang('you_will_be_').'</p>'.
						'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>'.
						'<p>'.lang('kind_regards').'</p>'.
						'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
						'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
						$this->config->item('end_html_email');

		# Send the e-mail message from the notify helper
		if (!_send_email($this->config->item('support_from_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->config->item('support_reply_to_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->users->objUser->email, $email_subject, $email_msg)){
			$this->session->set_flashdata('message', lang('failed_sending_via_email'));
			redirect(base_url("forgot"));				
		}
		return true;
	}
	
	function reset(){
		$this->session->set_flashdata('message', '');
		# Check query string for Hash
		$strHash = $this->input->get('h');

		# If no hash in URI redirect to base url (login)
		if (!$strHash) redirect(base_url());

		# Set the redirect URL to reset view if HASH found but possible future errors encountered
		$strRedirect = "portal/login/reset?h=" . $strHash;

		# Prepare the 'parameters' array (which will be passed to the Users Library Class) with the table to be queried as well as an array of fields to query
		$parameters = array('table' => 'Users', 'fields'=>array('loginResetPasswordPINHash' => $strHash));

		# Load the Users library with populated parameters array if the loginResetPasswordPINHash matches with the db.
		$this->load->library('users', $parameters);
		
		if ($this->users->objUser){
				if (strtotime($this->users->objUser->loginResetPasswordTill) < time())	$this->_redirect('fatal_error', 'password_reset_fail', $strRedirect);	
			}else{
				$this->session->set_flashdata('fatal_error', lang('token_invalid'));
			}
		# If we got this far, setup the form validation rules from core language
		$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
		$this->form_validation->set_rules('sent_password', lang('password_reset_password'), 'required|trim|exact_length[8]');
		$this->form_validation->set_rules('sent_pin', lang('password_reset_pin'), 'required|trim|exact_length[5]');
		$this->form_validation->set_rules('new_password', lang('password_reset_new'), 'required|trim|matches[new_password_confirm]');
		$this->form_validation->set_rules('new_password_confirm', lang('password_reset_confirm'), 'required|trim');
		if ($this->form_validation->run() == true){
			# Check the supplied password against the salted hash
			if(!check_hash ($this->users->objUser->loginPasswordHash, $this->input->post('sent_password', true), $this->users->objUser->loginPasswordSalt)) $this->_redirect('error', 'incorrect_password', $strRedirect);

			# Check the supplied pin against the salted hash
			if(!check_hash ($this->users->objUser->loginResetPasswordPINHash, $this->input->post('sent_pin', true), $this->users->objUser->loginPasswordSalt)) $this->_redirect('error', 'password_reset_failpin', $strRedirect);

			# Try to update the user password hash and salt, if not valid set message and redirect
			if($this->login_model->update_password($this->input->post('new_password'), $this->users->objUser->id)) $this->_redirect('error', 'password_reset_fail', $strRedirect);
				
			# Rebuild the objUser object with new details
			# Prepare the 'parameters' array (which will be passed to the Users Library Class) with the table to be queried as well as an array of fields to query
			$parameters = array('table' => 'Users', 'fields'=>array('id' => $this->users->objUser->id));
			# Load the Users library with populated parameters array if the loginResetPasswordPINHash matches with the db.
			if (!$this->load->library('users',$parameters)) $this->_redirect('fatal_error', 'validate_failed', $strRedirect);
			# Log the user in by populating $this->session->userdata with all the users details and setting session->set_userdata('logged_in', 1);
			set_user_session_by_id(get_instance()->users->objUser->id);
			# Re-direct to dashboard.
			redirect(base_url());
		}
		$data = $this->includes;
		$content_data = array('cancel_url' => base_url(), 'user' => null, 'hash' => base_url($strRedirect));
		$data['content'] = $this->load->view('login/reset', $content_data, true);
		$this->load->view($this->registration_template, $data);
	}

	function _redirect($message_type, $message, $strRedirect){
		$this->session->set_flashdata($message_type, lang($message));
		redirect(base_url($strRedirect));
	}
	
	function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login');
	}
}