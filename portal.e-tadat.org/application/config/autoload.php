<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'form_validation', 'email');
$autoload['drivers'] = array();
$autoload['language'] = array('core');
$autoload['helper'] = array(
							'url', 
							'form', 
							'language', 
							'date', 
							'global/global', 							
							'portal/core', 							
							'portal/notify', 
							'portal/create_user_session',
							'cloud/get_dropdown_all', 	# Populates dropdowns with all records - jquery handles dependant dropdowns
							'cloud/get_dropdown_by_id', 	# Populates dropdowns by ID
							'cloud/get_record_by_id', 	# Get record by ID
							'cloud/get_record_all'		# get all records
							);
							
$autoload['config'] = array('core');