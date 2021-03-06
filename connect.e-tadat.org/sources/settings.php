<?php
function PageMain() {
	global $TMPL, $LNG, $CONF, $db, $loggedIn, $settings;
	require_once('./includes/countries.php');
	// Prevent user adding himself to a group
	unset($_POST['user_group'], $_POST['suspended'], $_POST['verified']);
	if(isset($_SESSION['username']) && isset($_SESSION['password']) || isset($_COOKIE['username']) && isset($_COOKIE['password'])) {	
		$verify = $loggedIn->verify();
		
		if($verify['username']) {
			
			$TMPL_old = $TMPL; $TMPL = array();
			
			$TMPL['url'] = $CONF['url'];
			$TMPL['token_input'] = generateToken($_SESSION['token_id']);
				
			// Create the class instance
			$updateUserSettings = new updateUserSettings();
			$updateUserSettings->db = $db;
			$updateUserSettings->url = $CONF['url'];
			$updateUserSettings->id = $verify['idu'];
			
			if($_GET['b'] == 'security') {
				$skin = new skin('settings/security'); $page = '';
				
				if(!empty($_POST)) {	
					$TMPL['message'] = $updateUserSettings->query_array('users', $_POST);
				}
				
				$userSettings = $updateUserSettings->getSettings();
			} elseif($_GET['b'] == 'avatar') {
				$skin = new skin('settings/avatar'); $page = '';
				
				$TMPL['image'] = $CONF['url'].'/thumb.php?src='.$verify['image'].'&t=a';
				$TMPL['cover'] = $CONF['url'].'/thumb.php?src='.$verify['cover'].'&t=c&w=900&h=200';
				
				$maxsize = $settings['size'];

				if(isset($_FILES['avatarselect']['name'])) {
					foreach ($_FILES['avatarselect']['error'] as $key => $error) {
					$ext = pathinfo($_FILES['avatarselect']['name'][$key], PATHINFO_EXTENSION);
					$size = $_FILES['avatarselect']['size'][$key];
					$extArray = explode(',', $settings['format']);
					
					// Get the image size
					list($width, $height) = getimagesize($_FILES['avatarselect']['tmp_name'][0]);
					$ratio = ($width / $height);
						if(in_array(strtolower($ext), $extArray) && $size < $maxsize && $size > 0 && !empty($width) && !empty($height)) {
							$rand = mt_rand();
							$tmp_name = $_FILES['avatarselect']['tmp_name'][$key];
							$name = pathinfo($_FILES['avatarselect']['name'][$key], PATHINFO_FILENAME);
							$fullname = $_FILES['avatarselect']['name'][$key];
							$size = $_FILES['avatarselect']['size'][$key];
							$type = pathinfo($_FILES['avatarselect']['name'][$key], PATHINFO_EXTENSION);
							$finalName = mt_rand().'_'.mt_rand().'_'.mt_rand().'.'.$db->real_escape_string($ext);
							
							// Fix the image orientation if possible
							imageOrientation($tmp_name);
							
							// Move the file into the uploaded folder
							move_uploaded_file($tmp_name, 'uploads/avatars/'.$finalName);
							
							// Delete the old image
							deleteImages(array($verify['image']), 1);
							
							// Send the image name in array format to the function
							$image = array('image' => $finalName, 'token_id' => $_POST['token_id']);
							$updateUserSettings->query_array('users', $image);
							
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=s");
						} elseif($_FILES['avatarselect']['name'][$key] == '') { 
							// If there's no file selected
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=nf");
						} elseif($size > $maxsize || $size == 0) { 
							// If the file size is higher than allowed or empty
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=fs");
						} else { 
							// If the files does not have a valid format
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=wf");
						}
					}
				}
				
				if(isset($_FILES['coverselect']['name'])) {
					foreach ($_FILES['coverselect']['error'] as $key => $error) {
					$ext = pathinfo($_FILES['coverselect']['name'][$key], PATHINFO_EXTENSION);
					$size = $_FILES['coverselect']['size'][$key];
					$extArray = explode(',', $settings['format']);
					
					// Get the image size
					list($width, $height) = getimagesize($_FILES['coverselect']['tmp_name'][0]);
					$ratio = ($width / $height);
						if(in_array(strtolower($ext), $extArray) && $size < $maxsize && $size > 0 && !empty($width) && !empty($height)) {
							$rand = mt_rand();
							$tmp_name = $_FILES['coverselect']['tmp_name'][$key];
							$name = pathinfo($_FILES['coverselect']['name'][$key], PATHINFO_FILENAME);
							$fullname = $_FILES['coverselect']['name'][$key];
							$size = $_FILES['coverselect']['size'][$key];
							$type = pathinfo($_FILES['coverselect']['name'][$key], PATHINFO_EXTENSION);
							$finalName = mt_rand().'_'.mt_rand().'_'.mt_rand().'.'.$db->real_escape_string($ext);
							
							// Fix the image orientation if possible
							imageOrientation($tmp_name);
							
							// Move the file into the uploaded folder
							move_uploaded_file($tmp_name, 'uploads/covers/'.$finalName);
							
							// Delete the old image
							deleteImages(array($verify['cover']), 0);

							// Send the image name in array format to the function
							$image = array('cover' => $finalName, 'token_id' => $_POST['token_id']);
							$updateUserSettings->query_array('users', $image);
							
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=s");
						} elseif($_FILES['coverselect']['name'][$key] == '') { 
							// If there's no file selected
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=nf");
						} elseif($size > $maxsize || $size == 0) { 
							// If the file size is higher than allowed or empty
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=fs");
						} else { 
							// If the files does not have a valid format
							header("Location: ".$CONF['url']."/index.php?a=settings&b=avatar&m=wf");
						}
					}
				}

				if($_GET['m'] == 's') {
					$TMPL['message'] = notificationBox('success', $LNG['image_saved']);
				} elseif($_GET['m'] == 'nf') {
					$TMPL['message'] = notificationBox('error', $LNG['no_file']);
				} elseif($_GET['m'] == 'fs') {
					$TMPL['message'] = notificationBox('error', sprintf($LNG['file_exceeded'], round($maxsize / 1048576, 2)));
				} elseif($_GET['m'] == 'wf') {
					$TMPL['message'] = notificationBox('error', sprintf($LNG['file_format'], $settings['format']));
				} elseif($_GET['m'] == 'de') {
					$TMPL['message'] = notificationBox('success', $LNG['image_removed']);
				}
			} elseif($_GET['b'] == 'notifications') {
				$skin = new skin('settings/notifications'); $page = '';
				
				if(!empty($_POST)) {
					$TMPL['message'] = $updateUserSettings->query_array('users', array_map("strip_tags_array", $_POST));
				}
				
				$userSettings = $updateUserSettings->getSettings();
				
				if($userSettings['notificationl'] == '0') {
					$TMPL['loff'] = 'selected="selected"';
				} else {
					$TMPL['lon'] = 'selected="selected"';
				}
				
				if($userSettings['notificationc'] == '0') {
					$TMPL['coff'] = 'selected="selected"';
				} else {
					$TMPL['con'] = 'selected="selected"';
				}
				
				if($userSettings['notifications'] == '0') {
					$TMPL['soff'] = 'selected="selected"';
				} else {
					$TMPL['son'] = 'selected="selected"';
				}
				
				if($userSettings['notificationd'] == '0') {
					$TMPL['doff'] = 'selected="selected"';
				} else {
					$TMPL['don'] = 'selected="selected"';
				}
				
				if($userSettings['notificationf'] == '0') {
					$TMPL['foff'] = 'selected="selected"';
				} else {
					$TMPL['fon'] = 'selected="selected"';
				}
				
				if($userSettings['notificationg'] == '0') {
					$TMPL['goff'] = 'selected="selected"';
				} else {
					$TMPL['gon'] = 'selected="selected"';
				}
				
				if($userSettings['notificationx'] == '0') {
					$TMPL['xoff'] = 'selected="selected"';
				} else {
					$TMPL['xon'] = 'selected="selected"';
				}
				
				if($userSettings['notificationp'] == '0') {
					$TMPL['poff'] = 'selected="selected"';
				} else {
					$TMPL['pon'] = 'selected="selected"';
				}
				
				if($userSettings['sound_new_notification'] == '0') {
					$TMPL['snnoff'] = 'selected="selected"';
				} else {
					$TMPL['snnon'] = 'selected="selected"';
				}
				
				if($userSettings['sound_new_chat'] == '0') {
					$TMPL['sncoff'] = 'selected="selected"';
				} else {
					$TMPL['sncon'] = 'selected="selected"';
				}
				
				if($userSettings['email_comment'] == '0') {
					$TMPL['ecoff'] = 'selected="selected"';
				} else {
					$TMPL['econ'] = 'selected="selected"';
				}
				
				if($userSettings['email_like'] == '0') {
					$TMPL['eloff'] = 'selected="selected"';
				} else {
					$TMPL['elon'] = 'selected="selected"';
				}
				
				if($userSettings['email_new_friend'] == '0') {
					$TMPL['enfoff'] = 'selected="selected"';
				} else {
					$TMPL['enfon'] = 'selected="selected"';
				}
				
				if($userSettings['email_page_invite'] == '0') {
					$TMPL['epioff'] = 'selected="selected"';
				} else {
					$TMPL['epion'] = 'selected="selected"';
				}
				
				if($userSettings['email_group_invite'] == '0') {
					$TMPL['egioff'] = 'selected="selected"';
				} else {
					$TMPL['egion'] = 'selected="selected"';
				}
			} elseif($_GET['b'] == 'privacy') {
				$skin = new skin('settings/privacy'); $page = '';
				
				if(!empty($_POST)) {
					$TMPL['message'] = $updateUserSettings->query_array('users', array_map("strip_tags_array", $_POST));
				}
				
				$userSettings = $updateUserSettings->getSettings();
				
				if($userSettings['private'] == '1') {
					$TMPL['on'] = 'selected="selected"';
				} elseif($userSettings['private'] == '2') {
					$TMPL['semi'] = 'selected="selected"';
				} else {
					$TMPL['off'] = 'selected="selected"';
				}
				
				if($userSettings['privacy'] == '0') {
					$TMPL['pon'] = 'selected="selected"';
				} elseif($userSettings['privacy'] == '2') {
					$TMPL['psemi'] = 'selected="selected"';
				} else {
					$TMPL['poff'] = 'selected="selected"';
				}
				
				if($userSettings['offline'] == '1') {
					$TMPL['con'] = 'selected="selected"';
				} else {
					$TMPL['coff'] = 'selected="selected"';
				}
			} elseif($_GET['b'] == 'blocked') {
				$skin = new skin('settings/blocked'); $page = '';
				
				$TMPL['blocked_users'] = $updateUserSettings->getBlockedUsers();
			} else {
				$skin = new skin('settings/general'); $page = '';
				
				if(!empty($_POST)) {
					$TMPL['message'] = $updateUserSettings->query_array('users', array_map("strip_tags_array", $_POST));
				}
				
				$userSettings = $updateUserSettings->getSettings();
				
				$date = explode('-', $userSettings['born']);
				
				$TMPL['countries'] = countries(1, $userSettings['country']);
				
				$TMPL['years'] = generateDateForm(0, $date[0]);
				$TMPL['months'] = generateDateForm(1, $date[1]);
				$TMPL['days'] = generateDateForm(2, $date[2]);
				
				$TMPL['currentFirstName'] = $userSettings['first_name']; $TMPL['currentLastName'] = $userSettings['last_name']; $TMPL['currentEmail'] = $userSettings['email']; $TMPL['currentLocation'] = $userSettings['location']; $TMPL['currentWebsite'] = $userSettings['website']; $TMPL['currentBio'] = $userSettings['bio']; $TMPL['currentFacebook'] = $userSettings['facebook']; $TMPL['currentTwitter'] = $userSettings['twitter'];  $TMPL['currentGplus'] = $userSettings['gplus']; $TMPL['currentAddress'] = $userSettings['address']; $TMPL['currentWork'] = $userSettings['work']; $TMPL['currentSchool'] = $userSettings['school'];
				
				if($userSettings['gender'] == '0') {
					$TMPL['ngender'] = 'selected="selected"';
				} elseif($userSettings['gender'] == '1') {
					$TMPL['mgender'] = 'selected="selected"';
				} else {
					$TMPL['fgender'] = 'selected="selected"';
				}
				
				if($userSettings['interests'] == '0') {
					$TMPL['ninterests'] = 'selected="selected"';
				} elseif($userSettings['interests'] == '1') {
					$TMPL['minterests'] = 'selected="selected"';
				} else {
					$TMPL['winterests'] = 'selected="selected"';
				}
			}
			$page .= $skin->make();
			$TMPL = $TMPL_old; unset($TMPL_old);
			$TMPL['settings'] = $page;
			
		} else {
			// If fake cookies are set, or they are set wrong, delete everything and redirect to home-page
			$loggedIn->logOut();
			header("Location: ".$CONF['url']."/index.php?a=welcome");
		}
	} else {
		// If the session or cookies are not set, redirect to home-page
		header("Location: ".$CONF['url']."/index.php?a=welcome");
	}
	
	// Start the sidebar menu
	if(isset($_GET['b'])) {
		$TMPL['welcome'] = $LNG["user_ttl_{$_GET['b']}"];
	} else {
		$TMPL['welcome'] = $LNG["user_ttl_general"];
	}
	
/* 	$menu = array(	''					=> array('user_menu_general', 'settings'),*/
/* 					'&b=security'		=> array('user_menu_security', 'security'),*/
	$menu = array(	'&b=avatar'			=> array('user_menu_avatar', 'themes'),
					'&b=notifications'	=> array('user_menu_notifications', 'notification'),
					'&b=privacy'		=> array('user_menu_privacy', 'privacy'),
					'&b=blocked'		=> array('user_menu_blocked', 'blocked'));
	
	foreach($menu as $link => $title) {
		$class = '';
		if($link == '&b='.$_GET['b'] || $link == $_GET['b']) {
			$class = ' sidebar-link-active';
			$ttl = $LNG[$title[0]];
		}
		$TMPL['menu'] .= '<div class="sidebar-link'.$class.'"><a href="'.$CONF['url'].'/index.php?a=settings'.$link.'" rel="loadpage"><img src="'.$CONF['url'].'/'.$CONF['theme_url'].'/images/icons/settings/'.$title[1].'.png">'.$LNG[$title[0]].'</a></div>';
	}

	$TMPL['title'] = $LNG['title_settings'].' - '.$settings['title'];
	
	$skin = new skin('settings/content');
	return $skin->make();
}
?>