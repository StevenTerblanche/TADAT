<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ev extends Core_Controller {

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
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js","/themes/core/js/tinymce/tinymce.min.js", "/themes/core/js/views/ev_examples.js"));
		# The encrypt library is loaded to allow for id obfuscation. Usage =  $this->encrypt->decode(base64_decode(var_name))
		$this->load->library('encrypt');
		$this->load->helper('url');		
		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# Table operations are performed on
		$this->tbl = 'EvidentiaryExamples';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->data = $this->includes;
		$this->columns = 12;
		$this->page_header = strtoupper(lang('manage_').lang('evidentiary_documentation'));
		$this->panel_icon = 'fa fa-file-text';
		$this->panel_title = strtoupper(lang('performance_indicator') . lang('_listing'));		
		$this->content_data['submit_button'] = lang('action');
		//$this->output->enable_profiler(TRUE);		
	}

	function read(){
		if(!$this->id){
			$this->panel_title = strtoupper(lang('evidentiary_documentation').lang('_example') . lang('_listing'));
			$this->content_data['get_record_all'] = _get_record_all_ev('','db_b');
			$this->data['content'] = $this->load->view('ev_examples/list', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}

	function modify(){
		#** CREATE ** 
		# This shows the 'create view' for a NEW record if no ID OR action 
	        $this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages();
			$this->content_data['get_dropdown_all_mds'] = _get_dropdown_all_mds();			
		if(!$this->id && !$this->action){
			# Tell the crud function what to do.
			$this->action = 'create';
			# Populate view variables according to type
			$this->panel_title = lang('create_').lang('evidentiary_documentation').lang('_example');
			$this->content_data['submit_button'] = lang('create_').lang('evidentiary_documentation').lang('_example');
			# This gets all the fields from the DB for the specified table and populates values in the view AFTER validation
			$this->content_data['get_fields'] = $this->db_b->list_fields($this->tbl);
			$this->content_data['uri'] = current_url();
			$this->data['content'] = $this->load->view('ev_examples/create', $this->content_data, true);
		}
		
		# ** EDIT **
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && !$this->action){
			# Tell the crud function what to do.
			$this->action = 'update';
			# Populate view variables according to type			
			$this->panel_title = lang('update_').lang('evidentiary_documentation').lang('_example');
			$this->content_data['submit_button'] = lang('update_').lang('evidentiary_documentation').lang('_example');
			# Encrypts and encodes the id and sets URL
		    $this->content_data['uri'] = current_url () . "?id=" . base64_encode($this->encrypt->encode($this->id));
			# Get the entire row as specified by the id
			$this->content_data['get_record_by_id'] = _get_record_by_id_ev($this->id, '', 'db_b');
	        $this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages();			
			# Get the countries only for the current region as retreived from the Authority fkidRegion
			$this->data['content'] = $this->load->view('ev_examples/create', $this->content_data, true);
		}

		# If there is an action and it is NOT delete OR disable run form validation
		if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
			$this->load->helper('form');
			$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
			$this->form_validation->set_rules('evidence', lang('performance_indicator').lang('_name'), 'required|trim');

			# If there is no errors and form validation passed
			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
				unset($this->form_data['files']);
			
				$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'db_b');
				# This redirects after successfull create or update. 
				redirect(base_url('ev/list/'));
			}		
		}
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && ($this->action ==='enable' ||$this->action ==='disable' || $this->action ==='delete')){
			# Call crud function with relevant action
			$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'db_b');
			#redirect to listings View
				redirect(base_url('ev/list'));
		}
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }
}