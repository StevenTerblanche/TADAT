<?php
defined('BASEPATH') OR exit('No direct script access allowed');

### reserved routes (local changes MUST go after this!)
$route['default_controller']		= 'dashboard';
$route['404_override'] 		 		= 'errors';
$route['translate_uri_dashes']		= FALSE;

# NB NB NB!!!
# DO NOT USE (:num)  - for some obscure reason it DOES NOT WORK with base64 encode and encrypt!!
# Took me HOURS to figure this out after changing .htaccess and everything else.....

# local application routing
$route['login']              			= 'login/login';
$route['suspended']            			= 'login/suspended';
$route['logout']            			= 'login/logout';
$route['forgot']              			= 'login/forgot';
$route['reset']              			= 'login/reset';

# REVENUE AUTHORITIES
$route['authorities/list']					= 'authorities/read';
$route['authorities/profile']				= 'authorities/read/$1';
$route['authorities/create']				= 'authorities/create';
$route['authorities/update']				= 'authorities/modify/$1';

# MISSIONS
$route['missions/list']						= 'missions/read';
$route['missions/profile']					= 'missions/read/$1';
$route['missions/create']					= 'missions/modify';
//$route['missions/update']					= 'missions/modify/$1';
	// Mission Team Leader
//	$route['missions/list/mtl']					= 'missions/read_mtl';
//	$route['missions/profile/mtl']				= 'missions/read_mtl/$1';
//	$route['missions/manage/mtl']				= 'missions/manage_mtl/$1';


# PAR
$route['reporting/missions']				= 'reporting/missions';
$route['reporting/toc']						= 'reporting/toc';






$route['poa/list']							= 'poa/read/$1';
$route['poa/create']						= 'poa/modify';
//$route['poa/update']						= 'poa/modify/$1';

$route['pi/list']							= 'pi/read/$1';
$route['pi/create']							= 'pi/modify';
//$route['pi/update']							= 'pi/modify/$1';

$route['ev/list']							= 'ev/read/$1';
$route['ev/create']							= 'ev/modify';
//$route['ev/update']							= 'ev/modify/$1';

$route['md/list']							= 'md/read/$1';
$route['md/create']							= 'md/modify';
//$route['md/update']							= 'md/modify/$1';

# ASSIGNMENTS
$route['assignments/create']				= 'assignments/modify';
$route['assignments/list']					= 'assignments/read/$1';
$route['assignments/update/(:any)/(:any)']	= 'assignments/modify/$1';

# PMQ
$route['ra/introduction']					= 'ra/introduction/';
$route['ra/pmq_table_1']					= 'ra/pmq_table_1/$1';
$route['ra/pmq_table_2']					= 'ra/pmq_table_2/$1';
$route['ra/pmq_table_3']					= 'ra/pmq_table_3/$1';
$route['ra/pmq_table_4']					= 'ra/pmq_table_4/$1';
$route['ra/pmq_table_5']					= 'ra/pmq_table_5/$1';
$route['ra/pmq_table_6']					= 'ra/pmq_table_6/$1';
$route['ra/pmq_table_7']					= 'ra/pmq_table_7/$1';
$route['ra/pmq_table_8']					= 'ra/pmq_table_8/$1';
$route['ra/pmq_table_9']					= 'ra/pmq_table_9/$1';
$route['ra/pmq_table_10']					= 'ra/pmq_table_10/$1';
$route['ra/pmq_table_11']					= 'ra/pmq_table_11/$1';

# POA QUESTIONS
$route['questions/introduction']			= 'questions/introduction/';
$route['questions/indicators']				= 'questions/indicators/$1';
$route['data/view']							= 'questions/view_db/$1';

# GENERAL:
$route['notifications']						= 'dashboard/notifications/$1';
$route['glossary/list']						= 'glossary/read/$1';
$route['glossary/create']					= 'glossary/modify';
//$route['glossary/update']					= 'glossary/modify/$1';

$route['scoring/list']						= 'scoring/read/$1';
$route['scoring/create']					= 'scoring/modify';
$route['scoring/update']					= 'scoring/modify/$1';
$route['stats/login']						= 'stats/login';

#USERS
$route['users/list']						= 'users/read';
$route['users/profile']						= 'users/read/$1';
$route['users/create']						= 'users/modify';
$route['users/update']						= 'users/modify/$1';


# TEMPLATES
$route['templates/list']					= 'templates/read';
$route['templates/details']					= 'templates/read/$1';
$route['templates/create']					= 'templates/modify';
$route['templates/update']					= 'templates/modify/$1';