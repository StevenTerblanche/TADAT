<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Portal_dashboard extends Core_Controller {
	public $data, $assets, $content_data;
    function __construct(){
        parent::__construct();
		$this->columns = 12;
		$this->page_header = 'PORTAL DASHBOARD';
		$this->panel_icon = 'fa fa-dashboard';
		$this->panel_title = '';		
		$this->panel_title = lang('welcome_') . $this->session->userdata('name') . ' ' . $this->session->userdata('surname') . lang('_to_'). lang('the_') . $this->config->item('application_name');				
		$this->add_external_js(array(base_url()."/themes/core/js/jquery-jvectormap-1.2.2.min.js",base_url()."/themes/core/js/jquery-jvectormap-world-mill-en.js",base_url()."/themes/core/js/waypoints.js",base_url()."/themes/core/js/jquery.countTo.js",base_url()."/themes/core/js/sweet-alert.js",base_url()."/themes/core/js/views/dashboard.js"));		
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		$this->content_data = ''; 		
		$this->data = $this->includes;
	}

	function index(){
		# Check user object to see if current user has logged in before, if not redirect to change password with custom persistent flashdata message
		# Sets the message from language file - please note that flashdata takes an array (title and heading)
		# Whenever 'persistent-message' is used as flashdata type, it will NOT automatically disappear after a few seconds
		

		//_show_array($this->user);

		if($this->user->loginPasswordChange == 0){
			$this->session->set_flashdata('persistent-message', array('heading'=>lang('password_change_required_heading'), 'message'=>lang('password_change_required_message')));
			$this->columns = 6;
			$this->content_data['uri'] = base_url () . "users/update/?m=p&id=" . base64_encode($this->encrypt->encode($this->session->userdata('id')));
			redirect($this->content_data['uri']);
		}

		if(!$this->session->userdata('termsAcceptedSession')){
			$this->session->set_userdata("termsAcceptedSession",$this->user->termsAccepted);			
		}
		
		if($this->session->userdata('termsAcceptedSession') == 0 && $this->user->termsAccepted == 0){
			$this->columns = 6;
			$this->content_data['uri'] = base_url () . "dashboard/terms";
			$this->data['content'] = $this->load->view('portal/notifications/notifications', $this->content_data, true);
			$this->load->view($this->template, $this->data);
		}else{
			$this->data['content'] = 'bla bla';
			$this->data['content'] = $this->load->view('portal/dashboard/portal_dashboard', $this->content_data, true);
			$this->load->view($this->template, $this->data);
		}
	}


	function terms(){
		$this->load->model('crud_model');		

		$fkidUserID = $this->form_data['fkidUserId'];
		unset($this->form_data['fkidUserId']);


		/* NOW UPDATE THE USER TABLE */		
		$this->crud_model->crud_register_update('Users', $this->form_data, $fkidUserID);
		$this->session->set_userdata("termsAcceptedSession",1);
		$this->data['content'] = $this->load->view('portal/dashboard/portal_dashboard', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}


	function secretariat(){
		if($this->user->loginPasswordChange == 0){
			$this->session->set_flashdata('persistent-message', array('heading'=>lang('password_change_required_heading'), 'message'=>lang('password_change_required_message')));
			$this->columns = 6;
			$this->content_data['uri'] = base_url () . "users/update/?m=p&id=" . base64_encode($this->encrypt->encode($this->session->userdata('id')));
			redirect($this->content_data['uri']);
		}
		$this->data['content'] = 'bla bla';
//		$this->data['content'] = $this->load->view('portal/dashboard/portal_dashboard_panels', $content_data, true);

		$this->data['content'] = $this->load->view('secretariat/secretariat_dashboard', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
	
}