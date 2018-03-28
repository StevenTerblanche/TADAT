<?php
defined('BASEPATH') OR exit('No direct script access allowed');

# Application Details
$config['application_name'] 		= 'e-Tadat Cloud';
$config['base_url'] 				= 'https://e-tadat.org/';
$config['application_version']  	= "1.2.1";
$config['description']  			= "automating the process and documents of a Tadat assessment";

# Meta Tags
$config['keywords']  				= "";
$config['author']  					= "Phezulu Business Solutions";
$config['robots']  					= "noindex, nofollow";
$config['revisit-after']  			= "28 days";

# E-mail 
$config['start_html_email']			= "<html><head><style>body{background: #fff; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#333;}</style></head><body>";
$config['end_html_email']			= "</body></html>";
$config['support_from_address']		= "support@e-tadat.org";
$config['support_reply_to_address']	= "support@e-tadat.org";
$config['robots']  					= "noindex, nofollow";
$config['revisit-after']  			= "28 days";

# SMS Aggregator API
$config['sms_api_url']      		= "http://www.amicellsms.co.za/singlesms.php?";
$config['sms_api_user']         	= "007";
$config['sms_api_serial']       	= "300100001";
$config['sms_api_silent']       	= "NO";

# Layout and Design
$config['base_theme']        		= "Core";

# Miscellaneous
$config['profiler']              	= true;
$config['error_delimeter_left']  	= "";
$config['error_delimeter_right'] 	= "<br />";
