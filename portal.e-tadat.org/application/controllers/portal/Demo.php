<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Demo extends Core_Controller {
	function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	}

	function index(){
		$data = $this->includes;
        $content_data = "";
		$content_data['error'] = '';
        $data['content'] = $this->load->view('demo/demo', $content_data, true);
		$this->load->view($this->template, $data);
	}

	function do_upload(){
		$content_data = '';
		$data = $this->includes;
		$config['upload_path'] = './data/files/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()){
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
        $content_data = array('upload_data' => $this->upload->data());
   	    $data['content'] = $this->load->view('demo/success', $content_data, true);
		$this->load->view($this->template, $data);
	}
}