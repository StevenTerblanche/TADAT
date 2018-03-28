<?php
defined('BASEPATH') OR exit('No direct script access allowed');

# Application Details
$config['application_name'] 		= 'Tadat Portal';
$config['base_url'] 				= 'https://portal.e-tadat.org/';
$config['application_version']  	= "1.1.1";
$config['description']  			= "automating the process and documents of a Tadat assessment";

# Meta Tags
$config['keywords']  				= "";
$config['author']  					= "Phezulu Business Solutions";
$config['robots']  					= "noindex, nofollow";
$config['revisit-after']  			= "28 days";

# E-mail 
$config['start_html_email']			= "<html><head><style>body{background: #fff; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#333;}</style></head><body>";
$config['end_html_email']			= "</body></html>";
$config['support_from_address']		= "support@portal.e-tadat.org";
$config['support_reply_to_address']	= "support@portal.e-tadat.org";
$config['robots']  					= "noindex, nofollow";
$config['revisit-after']  			= "28 days";

# SMS Aggregator API
$config['sms_api_url']      		= "http://www.amicellsms.co.za/singlesms.php?";
$config['sms_api_user']         	= "007";
$config['sms_api_serial']       	= "300100001";
$config['sms_api_silent']       	= "NO";

# Layout and Design
$config['base_theme']        		= "core";

# Miscellaneous
$config['profiler']              	= true;
$config['error_delimeter_left']  	= "";
$config['error_delimeter_right'] 	= "<br />";

# ClassMarker API
$config['cm_api_version']  		= 1;
$config['cm_api_base_url'] 		= "https://api.classmarker.com/";
$config['cm_api_url']      		= "https://api.classmarker.com/v1.json?";
$config['cm_api_key']         	= "WkMcbHsQKMfIHtIRp8p0ePDxMrWQxvwu";
$config['cm_api_secret']    	= "Fj3mVTCggMuSgCK2G0aPUInhak76FzWqiyceRJP6";
$config['cm_api_timestamp']     = time();
$config['cm_api_signature']		= md5($config['cm_api_key'] . $config['cm_api_secret'] . $config['cm_api_timestamp']);
$config['cm_full_api_url'] 	= $config['cm_api_url'].'api_key='.$config['cm_api_key'].'&amp;signature='.$config['cm_api_signature'].'&amp;timestamp='.$config['cm_api_timestamp'];

# ClassMarker API
$config['pu_api_version']  		= 1;
$config['pu_api_base_url'] 		= "https://api.classmarker.com/";
$config['pu_api_url']      		= "https://api.classmarker.com/v1.json?";
$config['pu_api_key']         	= "WkMcbHsQKMfIHtIRp8p0ePDxMrWQxvwu";
$config['pu_api_secret']    	= "Fj3mVTCggMuSgCK2G0aPUInhak76FzWqiyceRJP6";
$config['pu_api_timestamp']     = time();
$config['pu_api_signature']		= md5($config['pu_api_key'] . $config['pu_api_secret'] . $config['pu_api_timestamp']);
$config['pu_full_api_url'] 		= $config['pu_api_url'].'api_key='.$config['pu_api_key'].'&amp;signature='.$config['pu_api_signature'].'&amp;timestamp='.$config['pu_api_timestamp'];


