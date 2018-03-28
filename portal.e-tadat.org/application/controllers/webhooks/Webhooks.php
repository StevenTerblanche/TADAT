<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Webhooks extends Core_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('Cm_model');
	}

	function index(){
		$this->load->view('training/workshops/get_current_result');
	}
}