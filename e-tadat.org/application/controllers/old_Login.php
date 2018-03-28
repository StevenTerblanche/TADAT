<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Core_Controller {
    function __construct(){
        parent::__construct();
		$this->add_external_css(array("/themes/core/css/login.css","/themes/core/css/login-animate.css"));
		$this->add_external_js(array("/themes/core/js/login/login.js", "/themes/core/js/login/placeholder-shim.js"));
        $this->load->model('login_model');
		$this->page_header = strtoupper(lang('?'));
		$this->output->enable_profiler(true);
    }
	/* 
		STATUS 		= IN-PROGRESS
		LANGUAGE 	= IN-PROGRESS
		NORMALISE 	= IN-PROGRESS
		COMMENTS	= IN-PROGRESS
		TO DO	 	= # lock after x attempts to login, AND forgot
					  # should enforce minimum password length
	 */

	/*
		Flow:
		User hits the base_url and if $this->session->userdata('logged_in') is false login() gets called
		This loads login/login view
		if validation passed do_login gets called in login_model
		if validation false, message loaded from core_language file and redirected to login/login
		if successfull user details written to UserLogins, user object gets created and redirected to dashboard
	*/
    # LOGIN THE USER
	# STATUS - COMPLETE
	# TESTED - YES
    function login(){
        # if logged in, redirect to Dashboard
        if ($this->session->userdata('logged_in')) redirect(base_url());

        # validation rules
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        $this->form_validation->set_rules('username', lang('email_address'), 'required|trim');
        $this->form_validation->set_rules('password', lang('password'), 'required|trim');

        # check if we've successfully validated
        if ($this->form_validation->run() == true){
            # Check the provided login details against do_login function in login_model - redirect back to login if incorrect else proceed to base_url
			$message =& $this->login_model->do_login($this->input->post('username', true), $this->input->post('password', true));
            if ($message){
				$this->session->set_flashdata('error', lang($message));
				 redirect(base_url("login"));
			}else{ 
				redirect(base_url());
			}
        }
        # Not yet validated, so set up view
        $data = $this->includes;
        $data['content'] = $this->load->view('login/login', null, true);
        $this->load->view($this->template, $data);
	}

	# LOGOUT
	# STATUS - COMPLETE
	# TESTED - YES	
	function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login');
	}

    # FORGOT PASSWORD
	function forgot(){
	# STATUS - TESTING
	# TESTED - NO
		# STEPS
		/*
		1. Validate Form, checking for valid email address 
		2. Validate e-mail as existing and account status as not suspended in db and return true or error message
		3. create the UserLogin object, generate a new password (and hash and salt) and return the variable $newpass back for use in e-mail.
		*/
		# Setup form validation delimiters and rules
		$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
		$this->form_validation->set_rules('email', strtolower(lang('email_address')), 'required|trim|valid_email');

		# If form validation not passed show view
		if ($this->form_validation->run() == false){
			# form not validated, so let's create the view
			$data = $this->includes;
			$content_data = array('cancel_url' => base_url());
			$data['content'] = $this->load->view('login/forgot', $content_data, true);
			$this->load->view($this->template, $data);
		}else{

			# Confirm that the email is valid
			# If e-mail not valid send a message and redirect
			if (!$this->login_model->validate_email($this->input->post('email'))){
				$this->session->set_flashdata('error', lang('forgot_password_not_exists'));
				redirect(base_url("forgot"));
			}else{
				
				
				
				}
	
			# Start the reset process
			# Generate a new password for the supplied VALID e-mail address
			$newPass = $this->login_model->reset_password($this->input->post('email'));
			# If the password was reset successfully and the HASHED password and new SALT was updated in the Users db.
			if (!$newPass){
				$this->session->set_flashdata('message', lang('password_reset_failed'));
				redirect(base_url("forgot"));					
			}
	
			# Load the notify helper
			$this->load->helper('notify');
	
			# Generate the PIN to be sent via SMS from the core helper
			$strPIN = _generate_random_pin();
			# Generate the HASH for the link from the generated PIN and the users NEW salt to be used as the hashed link in the e-mail message
			$strPINHash = _generate_hash($strPIN, $this->login_model->LoginUser->loginPasswordSalt);
			# Build the SMS string from the core language file, including the UNHASHED pin
			$strSMSText = lang("your_sms_pin_is_") . $strPIN . ". " . lang("queries_contact_") .$this->config->item('support_from_address'). '.';
	
			# Send the SMS message 
			if (!_send_sms($this->LoginUser->mobile, $strSMSText)){
				$this->session->set_flashdata('message', lang("failed_sending_pin"));
				redirect(base_url("forgot"));
			}
	
			# Update the UserPasswordResets table with the sent SMS details
			$this->login_model->_resetTracking("send_sms");
			# Build the e-mail message from language and core config files
			$email_subject = lang('password_reset_for_').$this->config->item('application_name');
			$email_msg = $this->config->item('start_html_email').
							'<p><strong>' . $strPIN . '<- This is temp till SMS Aggregator received our RICA documents!!!!</strong></p>'.
							'<p><strong>' . lang('dear_').$this->login_model->LoginUser->title.' '.$this->login_model->LoginUser->name.' '.$this->login_model->LoginUser->surname.'</strong></p>'.
							'<p>'.lang('your_temp_password_for_the_').lang('_platform').lang('_is').':</p>'.
							'<p>'.lang('password_').$newPass.' (<i>'.lang('case_sensitive').'</i>)</p>'.
							'<p>'.lang('you_will_need_the_pin').'</p>'.
							'<p>'.lang('click_').'<a href="'.base_url('reset?h=' . $strPINHash).'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.
							'<p>'.lang('you_will_be_').'</p>'.
							'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>'.
							'<p>'.lang('kind_regards').'</p>'.
							'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
							'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
							$this->config->item('end_html_email');
	
			# Send the e-mail message from the notify helper
			if (!_send_email($this->config->item('support_from_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->config->item('support_reply_to_address'), $this->config->item('application_name').lang('_support').lang('_team'), $this->login_model->LoginUser->email, $email_subject, $email_msg)){
				$this->session->set_flashdata('message', lang('failed_sending_via_email'));
				redirect(base_url("forgot"));				
			}
	
			# Update the UserPasswordResets table with relevant details
			$this->login_model->_resetTracking("send_email");					
	
			# Check if PIN set correctly
			if (!$this->login_model->set_pin($strPIN)){
				$this->session->set_flashdata('message', lang("failed_setting_pin"));
				redirect(base_url("forgot"));
			}
	
			# Inform the user
			$this->session->set_flashdata('message', lang('password_reset_success'));
			redirect(base_url("forgot"));
		}
	}

	# This is called from the Users reset password e-mail link
	function reset(){
		# Check query string for Hash
		$strUHash = $this->input->get('h');
		# If no hash in URI redirect to base url (login)
//		if (!$strUHash) redirect(base_url());

		# Set the redirect URL to reset view if HASH found but possible future errors encountered
		$strURedirect = "reset?h=" . $strUHash;						
	
		# Check the supplied hash for validity and expiry date
		$strUserEmail = $this->login_model->validate_hash($strUHash);
		# If the HASH does not validate, redirect
//		if (!$strUserEmail) redirect(base_url());

		# If we got this far, setup the form validation rules from core language
		$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
		$this->form_validation->set_rules('sent_password', lang('password_reset_password'), 'required|trim|exact_length[8]');
		$this->form_validation->set_rules('sent_pin', lang('password_reset_pin'), 'required|trim|exact_length[5]');
		$this->form_validation->set_rules('new_password', lang('password_reset_new'), 'required|trim|matches[new_password_confirm]');
		$this->form_validation->set_rules('new_password_confirm', lang('password_reset_confirm'), 'required|trim');
		
		if ($this->form_validation->run() == true){
			# Validate the PIN and temp Password against the database, else redirect
			$message =& $this->login_model->validate_reset($strUserEmail, $this->input->post('sent_pin'), $this->input->post('sent_password'));
			# If not valid send a message and redirect
			if ($message){
				$this->session->set_flashdata('error', lang($message));
				redirect(base_url($strURedirect));
			}
			# Try to update the user password hash and salt, if not valid set message and redirect
			$message =& $this->login_model->change_password($this->input->post('new_password'));
			if ($message){
				$this->session->set_flashdata('error', lang($message));
				redirect(base_url($strURedirect));
			}
			
			# Inform the user of success status and redirect
			$this->session->set_flashdata('message', lang('password_change_success'));
			redirect(base_url("login"));
		}
		
		$data = $this->includes;
		$content_data = array('cancel_url' => base_url(), 'user' => null, 'hash' => base_url($strURedirect));
		$data['content'] = $this->load->view('login/reset', $content_data, true);
		$this->load->view($this->template, $data);
	}
}