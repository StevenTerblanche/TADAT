<?php
defined('BASEPATH') OR exit('No direct script access allowed');

### reserved routes (local changes MUST go after this!)
$route['default_controller']		= 'portal/portal_dashboard';
$route['404_override'] 		 		= 'errors';
$route['translate_uri_dashes']		= FALSE;




# NB NB NB!!!
# DO NOT USE (:num)  - for some obscure reason it DOES NOT WORK with base64 encode and encrypt!!
# Took me HOURS to figure this out after changing .htaccess and everything else.....

# local application routing
$route['login']              			= 'portal/login/login';
$route['logout']            			= 'portal/login/logout';
$route['forgot']              			= 'portal/login/forgot';
$route['reset']              			= 'portal/login/reset';


$route['info']              			= 'portal/register/info';


$route['register']              		= 'portal/register';
$route['register/application']     		= 'portal/register/application';


//$route['register/trainee']         		= 'portal/register/trainee';

$route['register/selector']        		= 'portal/register/selector';
$route['register/complete']        		= 'portal/register/register';
$route['register/workshop/complete']	= 'portal/register/register_invitee';

$route['register/resume']         		= 'portal/register/resume';
$route['register/invitation']     		= 'portal/register/resume_invitation';
$route['register/decline']	     		= 'portal/register/decline_invite';
$route['register/workshop/invitation'] 	= 'portal/register/workshop_invitee';

$route['check_mail']              		= 'portal/login/check_mail';
$route['uploads/do_upload']        		= 'portal/uploads/do_upload';




//**************************//
//  MAIN PORTAL DASHBOARDS  //
//**************************//
	# CLOUD
	$route['cloud']					 	= 'cloud/dashboard';


	$route['dashboard/terms']		 	= 'portal/portal_dashboard/terms';

	# TRAINING
	$route['training/dashboard']	 	= 'training/training_dashboard';

	# SECRETARIAT
	$route['secretariat/dashboard']	 	= 'portal/portal_dashboard/secretariat';



		# WORKSHOPS
		$route['workshops/schedule']			= 'training/workshops/workshops/modify';
		$route['workshops/insert']				= 'training/workshops/workshops/insert';		
		$route['workshops/list']				= 'training/workshops/workshops/read';						
		$route['workshops/results']				= 'training/classmarker/classmarker/update_results';			
		$route['workshops/links']				= 'training/classmarker/classmarker/update_links';
		$route['workshops/completed']			= 'training/classmarker/classmarker/update_tests';
		$route['workshops/completed/results']	= 'training/workshops/workshops/test_result_by_id';		
		$route['webhook']						= 'webhooks/webhooks';
		$route['workshops/single-result']		= 'training/workshops/workshops/test_result';								
		$route['workshops/notify-ra']			= 'training/workshops/workshops/notify';
		$route['workshops/test']				= 'training/workshops/workshops/test';
		$route['workshops/invite']				= 'training/workshops/workshops/invite_workshop_attendees_create';
		$route['workshops/invite/register']		= 'training/workshops/workshops/invite_workshop_attendees_register';
		$route['workshops/list/invitees']		= 'training/workshops/workshops/list_workshop_attendees';		
		$route['workshops/select']				= 'training/workshops/workshops/select_workshop';		
		$route['workshops/select/submit']		= 'training/workshops/workshops/select_workshop_submit';
		$route['workshops/select/list/invitees']= 'training/workshops/workshops/list_attendees_by_workshop_select';
		$route['workshops/select/list/invitees/submit']= 'training/workshops/workshops/list_attendees_by_workshop';
		
		# CERTIFICATES
		$route['workshop/certificate']			= 'training/workshops/workshops/pdf_certificate';
		


		# TRAINING USERS
		$route['users/awaiting/approval']				= 'training/users/users/awaiting_approval';
		//$route['users/awaiting/approval']				= 'training/users/users/awaiting_approval';
		$route['users/approved']						= 'training/users/users/approved';		
		$route['users/all']								= 'training/users/users/all';				
		$route['users/imported']						= 'training/users/users/imported';						
		$route['users/imported/connect']				= 'training/users/users/imported_connect';						
		$route['users/awaiting/approval/profile']		= 'training/users/users/awaiting_approval_profile';		
		$route['users/awaiting/approval/profile/edit']	= 'training/users/users/awaiting_approval_profile_edit';				
		$route['users/profile/edit']					= 'training/users/users/awaiting_approval_profile_edit';						
		$route['users/awaiting/approval/submit']		= 'training/users/users/update_applicant';				

	# SURVEYS
		$route['surveys/list']						= 'surveys/surveys';				
		$route['surveys/complete']					= 'surveys/surveys/CompleteSurvey';
	

	# EXAMS / PROCTORU
		$route['exams']								= 'training/exams/exams';				














# REVENUE AUTHORITIES
$route['authorities/list']					= 'cloud/authorities/read';
$route['authorities/profile']				= 'cloud/authorities/read/$1';
$route['authorities/create']				= 'cloud/authorities/create';
$route['authorities/update']				= 'cloud/authorities/modify/$1';
$route['authorities/counterpart']			= 'cloud/authorities/counterpart/$1';


# MISSIONS
$route['missions/list']						= 'cloud/missions/read';
$route['missions/profile']					= 'cloud/missions/read/$1';
$route['missions/create']					= 'cloud/missions/modify';
$route['missions/update']					= 'cloud/missions/modify/$1';

// Mission Team Leader
//	$route['missions/list/mtl']					= 'cloud/missions/read_mtl';
//	$route['missions/profile/mtl']				= 'cloud/missions/read_mtl/$1';
//	$route['missions/manage/mtl']				= 'cloud/missions/manage_mtl/$1';


# PAR
$route['reporting/missions']				= 'cloud/reporting/missions';
$route['reporting/toc']						= 'cloud/reporting/toc';






$route['poa/list']							= 'cloud/poa/read/$1';
$route['poa/create']						= 'cloud/poa/modify';
$route['poa/update']						= 'cloud/poa/modify/$1';

$route['pi/list']							= 'cloud/pi/read/$1';
$route['pi/create']							= 'cloud/pi/modify';
$route['pi/update']							= 'cloud/pi/modify/$1';

$route['ev/list']							= 'cloud/ev/read/$1';
$route['ev/create']							= 'cloud/ev/modify';
$route['ev/update']							= 'cloud/ev/modify/$1';

$route['md/list']							= 'cloud/md/read/$1';
$route['md/create']							= 'cloud/md/modify';
$route['md/update']							= 'cloud/md/modify/$1';

# ASSIGNMENTS
$route['assignments/create']				= 'cloud/assignments/modify';
$route['assignments/list']					= 'cloud/assignments/read/$1';
$route['assignments/update/(:any)/(:any)']	= 'cloud/assignments/modify/$1';

# PMQ
$route['ra/introduction']					= 'cloud/ra/introduction/';
$route['ra/pmq_table_1']					= 'cloud/ra/pmq_table_1/$1';
$route['ra/pmq_table_2']					= 'cloud/ra/pmq_table_2/$1';
$route['ra/pmq_table_3']					= 'cloud/ra/pmq_table_3/$1';
$route['ra/pmq_table_4']					= 'cloud/ra/pmq_table_4/$1';
$route['ra/pmq_table_5']					= 'cloud/ra/pmq_table_5/$1';
$route['ra/pmq_table_6']					= 'cloud/ra/pmq_table_6/$1';
$route['ra/pmq_table_7']					= 'cloud/ra/pmq_table_7/$1';
$route['ra/pmq_table_8']					= 'cloud/ra/pmq_table_8/$1';
$route['ra/pmq_table_9']					= 'cloud/ra/pmq_table_9/$1';
$route['ra/pmq_table_10']					= 'cloud/ra/pmq_table_10/$1';
$route['ra/pmq_table_11']					= 'cloud/ra/pmq_table_11/$1';

# POA QUESTIONS
$route['questions/introduction']			= 'cloud/questions/introduction/';
$route['questions/indicators']				= 'cloud/questions/indicators/$1';

# GENERAL:
$route['notifications']						= 'portal/dashboard/notifications/$1';
$route['glossary/list']						= 'cloud/glossary/read/$1';
$route['glossary/create']					= 'cloud/glossary/modify';
$route['glossary/update']					= 'cloud/glossary/modify/$1';

$route['scoring/list']						= 'cloud/scoring/read/$1';
$route['scoring/create']					= 'cloud/scoring/modify';
$route['scoring/update']					= 'cloud/scoring/modify/$1';
$route['stats/login']						= 'stats/login';

#USERS
$route['users/list']						= 'portal/users/read';
$route['users/profile']						= 'portal/users/read/$1';
$route['users/create']						= 'portal/users/modify';
$route['users/update']						= 'portal/users/modify/$1';


