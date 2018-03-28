<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Scores extends Core_Controller {
	public $id, $tbl, $data, $content_data;	
    function __construct(){
        parent::__construct();
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js","/themes/core/js/tinymce/tinymce.min.js", "/themes/core/js/views/scores.js"));
		$this->load->library('encrypt');
		$this->data = $this->includes;
		$this->columns = 12;
		$this->page_header = strtoupper('tadat'.lang('_assessments'));
		$this->output->enable_profiler(false);		
	}

	function authorities(){
		$this->panel_icon = 'fa fa-bank';
		$this->panel_title = strtoupper(lang('active_') . lang('revenue_authorities') . lang('_listing'));		
 		$data = $this->includes;
		$content_data['get_record_all_authorities'] = _get_record_all_authorities();
        $data['content'] = $this->load->view('scores/authorities', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}
	function missions(){
		$this->panel_icon = 'fa fa-globe';
		$this->panel_title = strtoupper(lang('registered_') . lang('missions') . lang('_listing'));		
		$this->session->set_userdata('mission_id', $this->encrypt->decode(base64_decode($this->uri->segment('3'))));
 		$data = $this->includes;
		$content_data['get_record_all_missions'] = _get_all_fields_by_id_array('db','Missions','id',$this->session->userdata('mission_id'));
        $data['content'] = $this->load->view('scores/missions', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}
	function poas(){
		$this->panel_icon = 'fa fa-sliders';
		$this->panel_title = strtoupper(lang('performance_outcome_areas') . lang('_status'));	
 		$data = $this->includes;
		$content_data['get_record_all_poas'] = _get_record_all_poa('1','cloud_questions');
        $data['content'] = $this->load->view('scores/poas', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}
	function pis(){
		$this->panel_icon = 'fa fa-list';
		$this->panel_title = strtoupper(lang('performance_indicator') . lang('_listing'));	
 		$this->session->set_userdata('pi_id', $this->encrypt->decode(base64_decode($this->uri->segment('3'))));
		$data = $this->includes;
		$content_data['get_record_all_pis'] = _get_all_fields_by_id_array('cloud_questions','PerformanceIndicators','fkidPoa',$this->session->userdata('pi_id'));
        $data['content'] = $this->load->view('scores/pis', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}			
	function dimensions(){
		$this->panel_icon = 'fa fa-bar-chart-o';
		$this->panel_title = strtoupper('ASSESSMENT OF PERFORMANCE OUTCOME AREAS');	
 		$this->session->set_userdata('tbl', $this->encrypt->decode(base64_decode($this->uri->segment('3'))));
 		$this->session->set_userdata('pi_id', $this->encrypt->decode(base64_decode($this->uri->segment('4'))));		
		$data = $this->includes;
		$content_data['get_record_table'] = _get_score_by_id_all('cloud_questions','PerformanceIndicators','id',$this->session->userdata('pi_id'));
        $data['content'] = $this->load->view('scores/scores', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}			
	
}