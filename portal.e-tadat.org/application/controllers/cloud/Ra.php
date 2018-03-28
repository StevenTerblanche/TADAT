<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ra extends Core_Controller {

	public $action, $form_data, $id, $fkID, $tbl, $database, $data, $content_data;
	function __construct(){
		parent::__construct();
		$this->add_external_css(array("/themes/core/css/questionnaires/pmq.css", "/themes/core/css/blue_imp/blueimp-gallery.min.css", "/themes/core/css/blue_imp/jquery.fileupload-ui.css", "/themes/core/css/blue_imp/jquery.fileupload.css"));
		$this->load->model('crud_model');
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		$this->database = 'cloud_questions';
		$this->action = ($this->uri->segment('3')) ? $this->uri->segment('3') : 'pna';
        $this->id = ($this->uri->segment('4') && $this->uri->segment('4') !== 'pni') ? $this->encrypt->decode(base64_decode($this->uri->segment('4'))) : (($this->input->post('id')) ? $this->input->post('id') : 'pni');
		$this->tbl = ($this->uri->segment('5')) ? $this->uri->segment('5') : 'pnt';
		$this->fkID = 'id';
		$this->content_data['submit_button'] = lang('action');
		$this->page_header = strtoupper(lang('mission').lang('_introduction'));
		$this->columns = 10;
		$this->panel_icon = 'fa fa-globe';
		$this->panel_title = lang('revenue_authorities').lang('_listing');
		$this->output->enable_profiler(false);		
	}

	#** VIEW INTRODUCTION **
	function introduction(){
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/jquery.inputmask.bundle.js","/themes/core/js/blue_imp/tmpl.min.js", "/themes/core/js/blue_imp/load-image.all.min.js", "/themes/core/js/blue_imp/canvas-to-blob.min.js", "/themes/core/js/blue_imp/jquery.blueimp-gallery.min.js", "/themes/core/js/blue_imp/jquery.iframe-transport.js", "/themes/core/js/blue_imp/jquery.fileupload.js", "/themes/core/js/blue_imp/jquery.fileupload-process.js", "/themes/core/js/blue_imp/jquery.fileupload-image.js", "/themes/core/js/blue_imp/jquery.fileupload-audio.js", "/themes/core/js/blue_imp/jquery.fileupload-video.js", "/themes/core/js/blue_imp/jquery.fileupload-validate.js", "/themes/core/js/blue_imp/jquery.fileupload-ui.js", "/themes/core/js/blue_imp/main.js", "/themes/core/js/views/questionnaires/ra.js"));
		$this->data = $this->includes;
		$this->columns = 12;			
		$this->panel_title = lang('mission').lang('_introduction');
		$this->content_data['get_missions'] = _get_current_missions_by_id($this->user->id, $this->user->fkidUserRole);
		$this->content_data['get_ra_pmq_questions'] = _get_ra_pmq_questions();
		$this->data['content'] = $this->load->view('questionnaire/ra/introduction', $this->content_data, true);
        $this->load->view($this->template, $this->data);
	}


	function pmq(){
		# GLOBAL
		$strView = $this->tbl;
		$this->columns = 12;
		$this->page_header = strtoupper(_get_fields_by_id('QuestionsPmq', 'questionTable', $this->tbl, array('sectionName'), '', $this->database));
		$this->panel_icon = 'fa fa-table';
		$this->content_data['uri'] = current_url();	
		$this->content_data['get_missions'] = _get_current_missions_by_id($this->user->id, $this->user->fkidUserRole);

		$get_missions = _get_current_missions_by_id($this->user->id, $this->user->fkidUserRole);
		$periods = explode("/", $get_missions[0]['period']);
		$arrDbDates = array('{year-0}','{year-1}','{year-2}','{year-3}');
		$arrPeriods = array($periods[0]-1,$periods[0],$periods[1],$periods[2]);
		# Set Panel Title by getting the name and substituting the {year-} variables with values in the $periods array
		$this->panel_title = strtoupper(str_replace($arrDbDates, $arrPeriods, _get_fields_by_id('QuestionsPmq', 'questionTable', $this->tbl, array('questionName'), '', $this->database)));
		$this->content_data['get_missions'] = $get_missions;
		$this->content_data['get_ra_pmq_questions'] = _get_ra_pmq_questions();
		$this->content_data['get_fields'] = $this->cloud_questions->list_fields($this->tbl);
		$this->content_data['submit_button'] = lang('submit_progress');
		$this->content_data['save_button'] = lang('save_progress');

		# Build js filename from uri segment and table name
		$file_js = '/themes/core/js/views/questionnaires/ra/'.$this->uri->segment('5').'.js';
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/jquery.inputmask.bundle.js", "/themes/core/js/views/questionnaires/ra.js",$file_js));
		$this->data = $this->includes;

		$this->load->helper('form');
		$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));

		$mystatus = '';

		# RETURN TO SAVED FORM
		if($this->id !== 'pni'){
			$this->content_data['get_record_by_id'] = _get_all_fields_by_id('cloud_questions', $this->tbl, 'id', $this->id);
			# Populate view variables according to type
			$mystatus = 'RETURN TO SAVED FORM<br>';		
		}

		# SAVE PROGRESS FIRST CHECK FOR SAVE ACTION
		if($this->action !== 'pna' && $this->action === 'save'){
			$this->load->helper('form');	
			# FIRST SAVE WITHOUT ID
			# NOW CHECK IF THERE IS AN ID
			if($this->id !== 'pni'){
				$mystatus = 'SAVE PROGRESS WITH ID<br>';		
				$this->action = 'update';
				$this->form_data['status'] = 0;
			}else{
				$mystatus = 'SAVE PROGRESS WITHOUT ID<br>';		
				$this->action = 'create';
				$this->form_data['status'] = 0;
			}
			$updateId = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'cloud_questions');
			$this->content_data['get_record_by_id'] = _get_all_fields_by_id('cloud_questions', $this->tbl, 'id', $updateId);							
			redirect(base_url());
		}

		# SUBMIT AND FINALISE
		if($this->action && ($this->action !=='disable' || $this->action !=='delete' || $this->action !=='save')){
			foreach($_POST as $fields => $values){
			if($fields !== 'fkidMission'){
		    	$this->form_validation->set_rules($fields, form_label($fields, $fields), 'required|trim');
				//$this->form_validation->set_rules($fields, form_label($fields, $fields), 'required|trim|decimal|greater_than[0]');				
			}
} 
			
//			$this->form_validation->set_rules('a_1_1_1', lang('?'), 'required|trim|decimal|greater_than[0]');			

			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
			$this->form_data['status'] = 1;
			$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'cloud_questions');
			redirect(base_url());
			}
		}

			$mystatus .= 'The id is:'.$this->id.'<br>';
			$mystatus .= 'The action is:'.$this->action.'<br>';		
	//		$this->session->set_flashdata('persistent-message', array('heading'=>'HEADING', 'message'=>$mystatus));
			$this->data['content'] = $this->load->view('questionnaire/ra/'.$strView, $this->content_data, true);
	        $this->load->view($this->template, $this->data);
	}
}