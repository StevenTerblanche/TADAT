<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Training_dashboard extends Core_Controller {
	public $data, $assets, $content_data;
    function __construct(){
        parent::__construct();
		$this->columns = 12;
		$this->page_header = 'TRAINING DASHBOARD';
		$this->panel_icon = 'fa fa-dashboard';
		$this->panel_title = '';		
		$this->panel_title = lang('welcome_') . $this->session->userdata('name') . ' ' . $this->session->userdata('surname') . lang('_to_'). lang('the_') . $this->config->item('application_name');				
		$this->add_external_js(array("/themes/core/js/jquery-jvectormap-1.2.2.min.js","/themes/core/js/jquery-jvectormap-world-mill-en.js","/themes/core/js/waypoints.js","/themes/core/js/jquery.countTo.js","/themes/core/js/sweet-alert.js","/themes/core/js/views/dashboard.js"));		
		$this->content_data = ''; 		
 		$this->data = $this->includes;		
	}

	
	function index(){
		if (!_groupMembership('Training','Read'))_invalid();

		$this->add_external_js(array("/themes/core/js/test.js"));	
		$this->data = $this->includes;	
//		$this->data['content'] = $this->load->view('portal/dashboard/portal_dashboard_panels', $this->content_data, true);
		$this->data['content'] = $this->load->view('training/training_dashboard', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}	

	function workshops(){
		if (!_groupMembership('Workshops','Read'))_invalid();
		$this->page_header = 'WORKSHOPS DASHBOARD';
		$this->add_external_js(array("/themes/core/js/test.js"));	
		$this->data = $this->includes;	
//		$this->data['content'] = $this->load->view('portal/dashboard/portal_dashboard_panels', $this->content_data, true);
		$this->data['content'] .= $this->load->view('training/workshops/workshops_dashboard', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}	
	
	

}