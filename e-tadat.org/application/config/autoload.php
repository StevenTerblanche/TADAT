<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'form_validation', 'email');
$autoload['drivers'] = array();
$autoload['language'] = array('core');
$autoload['helper'] = array(
							'core', 
							'url', 
							'form', 
							'language', 
							'date', 
							'notify', 
							'_create_user_session_helper',
							'_get_dropdown_all', 	# Populates dropdowns with all records - jquery handles dependant dropdowns
							'_get_dropdown_by_id', 	# Populates dropdowns by ID
							'_get_record_by_id', 	# Get record by ID
							'_get_record_all'		# get all records
							);
							
$autoload['config'] = array('core');