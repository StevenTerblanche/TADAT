<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
# This class creates an object 'objUser' if the passed $fields evaluate to true
class Users{
	protected $CI;
	public $objUser = null;
	public function __construct($parameters){
		// Set the super object to a local variable for use later
		// The objUser can be accessed from a controller by: $this->users->objUser
		$this->CI =& get_instance();
		$query = $this->CI->db->get_where($parameters['table'], $parameters['fields'], 1);
		if ($query->num_rows()){
			$this->objUser = $query->row(); 
			return true;
		}
		return false;
	}
}