<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Core_Controller {
	public $data, $assets, $CombinedMission_RA;
    function __construct(){
        parent::__construct();
		$this->columns = 12;
		$this->page_header = 'DASHBOARD';
		$this->panel_icon = 'fa fa-dashboard';
		$this->panel_title = '';		
		$this->panel_title = lang('welcome_') . $this->session->userdata('name') . ' ' . $this->session->userdata('surname') . lang('_to_'). lang('the_') . $this->config->item('application_name');				
		$this->add_external_js(array("/themes/core/js/jquery-jvectormap-1.2.2.min.js","/themes/core/js/jquery-jvectormap-world-mill-en.js","/themes/core/js/waypoints.js","/themes/core/js/jquery.countTo.js","/themes/core/js/sweet-alert.js","/themes/core/js/views/dashboard.js"));		
 		$this->data = $this->includes;		
	}

	function index(){
		# Check user object to see if current user has logged in before, if not redirect to change password with custom persistent flashdata message
		# Sets the message from language file - please note that flashdata takes an array (title and heading)
		# Whenever 'persistent-message' is used as flashdata type, it will NOT automatically disappear after a few seconds
		if($this->user->loginPasswordChange == 0){
			$this->session->set_flashdata('persistent-message', array('heading'=>lang('password_change_required_heading'), 'message'=>lang('password_change_required_message')));
			$this->columns = 6;
			$this->content_data['uri'] = base_url () . "users/update/?m=p&id=" . base64_encode($this->encrypt->encode($this->session->userdata('id')));
			redirect($this->content_data['uri']);
		}

		# Check if Developer
		if($this->user->fkidUserRole == 1) $this->dashboard_developer();

		# Check if Secretariat		
		if($this->user->fkidUserRole == 2) $this->dashboard_sec();

		# Check if Mission Team Leader				
		if($this->user->fkidUserRole == 4) $this->dashboard_mtl();

		# Check if Assessor
		if($this->user->fkidUserRole == 5) $this->dashboard_assessor();
		
		# Check if RAM Counterpart or RAM Contact
		if($this->user->fkidUserRole == 6 || $this->user->fkidUserRole == 7) $this->dashboard_ram();
	}

	


	function dashboard_developer(){
		$content_data['missions_count'] = $this->get_count('Missions');
		$content_data['authorities_count'] = $this->get_count('RevenueAuthorities');
		$content_data['users_count'] = $this->get_count('Users');
		$content_data['logins_count'] = $this->get_count('UserLogins');
		$this->data['content'] = $this->load->view('dashboard/dashboard', $content_data, true);
		$this->load->view($this->template, $this->data);
	}
	function dashboard_sec(){
		
		//$missions_count = $this->get_count('Missions','fkidUserCreated',$this->user->id);
		$missions_count = $this->get_count('Missions');
		$content_data['missions_count'] = $missions_count;
		//$content_data['authorities_count'] = $this->get_count('RevenueAuthorities','fkidUserCreated',$this->user->id);
		$content_data['authorities_count'] = $this->get_count('RevenueAuthorities');
		$content_data['users_count'] = $this->get_count('Users','tester','0');
		$content_data['logins_count'] = $this->get_count('UserLogins','tester','0');
		$this->data['content'] = $this->load->view('dashboard/dashboard_sect', $content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function dashboard_mtl(){
		$content_data['missions_count'] = 0;
		$content_data['poa_count'] = 0;		
		$content_data['assessors_count'] = 0;
		if(isset($this->user->assignedMission)) {
			$missions_count = $this->get_count_assigned_missions($this->user->assignedMission);
			if ($missions_count >= 1){
				$content_data['missions_count'] = $missions_count;
				$content_data['poa_count'] = count($this->get_assigned_poa($this->user->id,$this->user->assignedMission));
				$content_data['assessors_count'] = $this->get_count_assigned_assessors($this->user->id);				
			}
		}
		$this->data['content'] = $this->load->view('dashboard/dashboard_mtl', $content_data, true);
		$this->load->view($this->template, $this->data);
	}
	
	function dashboard_assessor(){
		redirect(base_url('missions/list'));
	}
	
	function dashboard_ram(){
		redirect(base_url('ra/introduction'));
	}
	
	# Future Notifications function
	function notifications(){		
		$content_data['page_title'] = strtoupper(lang('notifications'));
        $this->data['content'] = $this->load->view('notifications/notifications', $content_data, true);
		$this->load->view($this->template, $this->data);
	}
		
	function get_count($table = null, $query_field = null, $query_id = null, $database = null){
		if(!$table) return false;
		if($database != null){$this->db = get_instance()->load->database('db_b', true);}
		if(!is_null($query_field) && !is_null($query_id)){
			$this->db->from($table);
			$this->db->where($query_field,$query_id);
			if($table === 'RevenueAuthorities'){
				$this->db->where('status','1');
			}
			$query = $this->db->count_all_results();
		}else{
			$query = $this->db->count_all($table);
		}
		if ($query)return $query;
		return false; 
	}

	function get_count_assigned_assessors($id = null){
		if(!$id) return false;
		$this->db->from('RightsAssignmentsIndicators');
		$this->db->where('fkidUserCreated',$id);
		$this->db->where('status','1');			
		$query = $this->db->count_all_results();

		if ($query)return $query;
		return false; 
	}
	
	function get_count_assigned_missions($missions_id = array()){
		if(empty($missions_id)) return false;
		$this->db->from('Missions');
		$this->db->where_in('id',$missions_id);
		$this->db->where('status','1');			
		$query = $this->db->count_all_results();
		if ($query)return $query;
		return false; 
	}	

	function get_assigned_poa($userId = null, $missionId = array()){
	
		// Assign the arrPoaAssigned array to indicate responsibility
		$arrPoaAssigned = array();

		// Check if user is MTL or Assessor to change status of arrPoaAssigned; else set as default for Secretariat
		if($this->user->fkidUserRole == 4 || $this->user->fkidUserRole == 5){
			$p1 = array('P1-1', 'P1-2');
			$p2 = array('P2-3', 'P2-4', 'P2-5', 'P2-6');
			$p3 = array('P3-7', 'P3-8', 'P3-9');
			$p4 = array('P4-10', 'P4-11');
			$p5 = array('P5-12', 'P5-13', 'P5-14', 'P5-15');
			$p6 = array('P6-16', 'P6-17', 'P6-18');
			$p7 = array('P7-19', 'P7-20', 'P7-21');
			$p8 = array('P8-22', 'P8-23', 'P8-24');
			$p9 = array('P9-25', 'P9-26', 'P9-27', 'P9-28');
			
			$checkedPOAnumber = '';
			$checkedPOA_1 = '';
			$checkedPOA_2 = '';
			$checkedPOA_3 = '';
			$checkedPOA_4 = '';
			$checkedPOA_5 = '';
			$checkedPOA_6 = '';
			$checkedPOA_7 = '';
			$checkedPOA_8 = '';
			$checkedPOA_9 = '';
	
			get_instance()->db->select('`P1-1`, `P1-2`, `P2-3`, `P2-4`, `P2-5`, `P2-6`, `P3-7`, `P3-8`, `P3-9`, `P4-10`, `P4-11`, `P5-12`, `P5-13`, `P5-14`, `P5-15`, `P6-16`, `P6-17`, `P6-18`, `P7-19`, `P7-20`, `P7-21`, `P8-22`, `P8-23`, `P8-24`, `P9-25`, `P9-26`, `P9-27`, `P9-28`');
			get_instance()->db->from('RightsAssignmentsIndicators');
			get_instance()->db->where_in('RightsAssignmentsIndicators.fkidMission', $missionId);
			get_instance()->db->where('RightsAssignmentsIndicators.fkidUser', $this->user->id);	
			$query = get_instance()->db->get();
			if ($query->num_rows()){
				$arrIndicatorsAssigned = $query->row_array();
				foreach($arrIndicatorsAssigned as $key => $value){
					if(in_array($key,$p1) && $value === '1') $checkedPOA_1 = '1,';
					if(in_array($key,$p2) && $value === '1') $checkedPOA_2 = '2,';
					if(in_array($key,$p3) && $value === '1') $checkedPOA_3 = '3,';	
					if(in_array($key,$p4) && $value === '1') $checkedPOA_4 = '4,';	
					if(in_array($key,$p5) && $value === '1') $checkedPOA_5 = '5,';	
					if(in_array($key,$p6) && $value === '1') $checkedPOA_6 = '6,';	
					if(in_array($key,$p7) && $value === '1') $checkedPOA_7 = '7,';	
					if(in_array($key,$p8) && $value === '1') $checkedPOA_8 = '8,';	
					if(in_array($key,$p9) && $value === '1') $checkedPOA_9 = '9,';						
				}			
				$checkedPOAnumber = rtrim($checkedPOA_1.$checkedPOA_2.$checkedPOA_3.$checkedPOA_4.$checkedPOA_5.$checkedPOA_6.$checkedPOA_7.$checkedPOA_8.$checkedPOA_9,',');
				$arrPoaAssigned = explode(',',$checkedPOAnumber);			
			}
		}else{
			$arrPoaAssigned = array(0);
		}
		//print_r($arrPoaAssigned);
		return($arrPoaAssigned);
	}

	
}