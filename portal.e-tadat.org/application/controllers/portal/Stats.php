<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Stats extends Core_Controller {

	public $action, $form_data, $id, $fkID, $tbl, $data, $content_data;
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
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js","/themes/core/js/bootstrap-datepicker.js", "/themes/core/js/views/stats_logins.js"));
		# The encrypt library is loaded to allow for id obfuscation. Usage =  $this->encrypt->decode(base64_decode(var_name))
		$this->load->library('encrypt');
		$this->load->helper('url');		
		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# Table operations are performed on
		$this->tbl = 'UsersLogins';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->data = $this->includes;
		$this->columns = 12;
		$this->page_header = strtoupper(lang('view_').lang('statistics'));
		$this->panel_icon = 'fa fa-bar-chart-o';
		$this->panel_title = lang('usage_').lang('statistics');
		$this->content_data['submit_button'] = lang('action');
//		$this->output->enable_profiler(TRUE);		
	}

	function read(){
		if(!$this->id){
			$this->panel_title = strtoupper(lang('assignment') . lang('_listing'));
			$this->content_data['get_record_all'] = _get_record_all_assignments();
			$this->data['content'] = $this->load->view('assignments/list', $this->content_data, true);
			$this->load->view($this->template, $data);						
		}
	}
	function login(){
 		$data = $this->includes;
		$this->panel_icon = 'fa fa-bar-chart-o';
		$this->panel_title = lang('usage_').lang('statistics');		

		if($this->user->fkidUserRole == 1){
			$this->content_data['get_record_all'] = _get_record_all_logins('tester',array(0,1));
		}else{
			$this->content_data['get_record_all'] = _get_record_all_logins('tester','0');
		}

		

		$this->data['content'] = $this->load->view('stats/logins/list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
		
}