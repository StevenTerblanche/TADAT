<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Chart extends Core_Controller {
	public $id, $content_data;
	function __construct(){
		parent::__construct();
		 $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
	}
	function index(){
		$this->add_external_js(array("/themes/core/js/d3.v3.min.js","/themes/core/js/RadarChart.js","/themes/core/js/views/chart.js"));
		$this->add_external_css(array("/themes/core/css/par.css"));
		$data = $this->includes;
        $this->content_data['mission_id'] = $this->id;
        $data['content'] = $this->load->view('chart/chart', $this->content_data, true);
		$this->load->view($this->template, $data);
	}
}