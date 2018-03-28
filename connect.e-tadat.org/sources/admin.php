<?php
function PageMain() {
	global $TMPL, $LNG, $CONF, $db, $settings;
	require_once('./includes/countries.php');
	
	if(isset($_POST['login'])) {
		$logInAdmin = new logInAdmin();
		$logInAdmin->db = $db;
		$logInAdmin->url = $CONF['url'];
		$logInAdmin->username = $_POST['username'];
		$logInAdmin->password = $_POST['password'];
		
		$TMPL['message'] = $logInAdmin->in();
	}
	if(isset($_SESSION['usernameAdmin']) && isset($_SESSION['passwordAdmin'])) {
		$loggedInAdmin = new loggedInAdmin();
		$loggedInAdmin->db = $db;
		$loggedInAdmin->url = $CONF['url'];
		$loggedInAdmin->username = $_SESSION['usernameAdmin'];
		$loggedInAdmin->password = $_SESSION['passwordAdmin'];
		$loggedIn = $loggedInAdmin->verify();
		
		if($loggedIn['username']) {
			// Set the content to true, change the $skin to content
			$content = true;
			
			$TMPL_old = $TMPL; $TMPL = array();
			
			$TMPL['url'] = $CONF['url'];
			$TMPL['token_input'] = generateToken($_SESSION['token_id']);
			$TMPL['token_id'] = $_SESSION['token_id'];
			
			if($_GET['b'] == 'security' && !$loggedIn['user_group']) {
				$skin = new skin('admin/security'); $page = '';

				if(!empty($_POST)) {
					$updateSettings = new updateSettings();
					$updateSettings->db = $db;
					$updated = $updateSettings->query_array('admin', $_POST);
					
					header("Location: ".$CONF['url']."/index.php?a=admin&b=security&m=".$updated);
				}
				
				if($_GET['m'] == 1) {
					$TMPL['message'] = notificationBox('success', $LNG['password_changed']);
				} elseif($_GET['m'] == 2) {
					$TMPL['message'] = notificationBox('error', $LNG['wrong_current_password']);
				} elseif($_GET['m'] == 3) {
					$TMPL['message'] = notificationBox('error', $LNG['password_not_match']);
				} elseif($_GET['m'] == 4) {
					$TMPL['message'] = notificationBox('error', $LNG['password_too_short']);
				} elseif($_GET['m'] == 0 && isset($_GET['m'])) {
					$TMPL['message'] = notificationBox('info', $LNG['password_not_changed']);
				}
			} elseif($_GET['b'] == 'stats') { // Security Admin Tab
				$skin = new skin('admin/stats'); $page = '';

				list(
				$TMPL['messages_total'], $TMPL['messages_today'], $TMPL['messages_this_month'], $TMPL['messages_this_year'],
				$TMPL['comments_total'], $TMPL['comments_today'], $TMPL['comments_this_month'], $TMPL['comments_this_year'],
				$TMPL['shared_total'], $TMPL['shared_today'], $TMPL['shared_this_month'], $TMPL['shared_this_year'],
				$TMPL['pages_total'], $TMPL['pages_today'], $TMPL['pages_this_month'], $TMPL['pages_this_year'],
				$TMPL['groups_total'], $TMPL['groups_today'], $TMPL['groups_this_month'], $TMPL['groups_this_year'],
				$TMPL['users_total'], $TMPL['users_today'], $TMPL['users_this_month'], $TMPL['users_this_year'],
				$TMPL['likes_total'], $TMPL['likes_today'], $TMPL['likes_this_month'], $TMPL['likes_this_year']) = admin_stats($db, 0);
			} elseif($_GET['b'] == 'themes' && !$loggedIn['user_group']) {
				$skin = new skin('admin/themes'); $page = '';
				$updateSettings = new updateSettings();
				$updateSettings->db = $db;
				
				$themes = $updateSettings->getThemes();
				
				$TMPL['themes_list'] = $themes[0];
				
				if(isset($_GET['theme'])) {
					// If theme is in array
					if(in_array($_GET['theme'], $themes[1])) {
						$updated = $updateSettings->query_array('settings', array('theme' => $_GET['theme'], 'token_id' => $_GET['token_id']));
						header("Location: ".$CONF['url']."/index.php?a=admin&b=themes");
					}
				}
			} elseif($_GET['b'] == 'plugins' && !$loggedIn['user_group']) {
				global $plugins;
				// Get the current active plugins
				foreach($plugins as $currplugin) {
					$active[] = $currplugin['name'];
				}
				
				$plugin = $_GET['settings'];
				$fp = __DIR__ .'/../'.$CONF['plugin_path'].'/'.$plugin.'/';
				
				// If the plugin exists and has a settings page
				if(isset($plugin) && in_array($plugin, $active) && file_exists($fp.$plugin.'_settings.php')) {
					$skin = new skin('admin/plugin_settings'); $page = '';					
					
					// Get the plugin info
					require_once($fp.'info.php');
					
					$TMPL['plugin'] = '<div class="message-avatar"><img src="'.$CONF['url'].'/'.$CONF['plugin_path'].'/'.$plugin.'/icon.png"></div><div class="message-top"><div class="message-author"><a href="'.$url.'" target="_blank" title="'.$LNG['auhtor_title'].'">'.$name.'</a> '.$version.'</div><div class="message-time">'.$LNG['by'].': <a href="'.$url.'" target="_blank" title="'.$LNG['auhtor_title'].'">'.$author.'</a></div></div>';
					
					// Get the plugin's settings page
					require_once($fp.$plugin.'_settings.php');
					$TMPL['settings'] .= call_user_func($plugin.'_settings');
					
					// If a post request has been sent with a valid token
					if(!empty($_POST) && $_POST['token_id'] == $_SESSION['token_id']) {
						$updated = call_user_func($plugin.'_save', $_POST);
						// If the plugin has successfully saved an action
						if($updated) {
							header("Location: ".$CONF['url']."/index.php?a=admin&b=plugins&settings=".$plugin."&m=s");
						} else {
							header("Location: ".$CONF['url']."/index.php?a=admin&b=plugins&settings=".$plugin."&m=i");
						}
					}
					
					if($_GET['m'] == 's') {
						$TMPL['message'] .= notificationBox('success', $LNG['settings_saved']);
					} elseif($_GET['m'] == 'i') {
						$TMPL['message'] .= notificationBox('info', $LNG['nothing_changed']);
					}
				} else {
					$skin = new skin('admin/plugins'); $page = '';
					$updateSettings = new updateSettings();
					$updateSettings->db = $db;
					
					if(isset($_GET['plugin']) && isset($_GET['plugin_type'])) {
						$updateSettings->activatePlugin($_GET['plugin'], $_GET['plugin_type']);
						header("Location: ".$CONF['url']."/index.php?a=admin&b=plugins");
					}
					
					$plugins = $updateSettings->getPlugins();
					
					$TMPL['plugins_list'] = $plugins[0];
				}
			} elseif($_GET['b'] == 'manage_reports') {
				list($TMPL['total_reports'], $TMPL['pending_reports'], $TMPL['safe_reports'], $TMPL['deleted_reports'], $TMPL['total_message_reports'], $TMPL['pending_message_reports'], $TMPL['safe_message_reports'], $TMPL['deleted_message_reports'], $TMPL['total_comment_reports'], $TMPL['pending_comment_reports'], $TMPL['safe_comment_reports'], $TMPL['deleted_comment_reports']) = admin_stats($db, 1);
				$skin = new skin('admin/manage_reports'); $page = '';
				
				$manageReports = new manageReports();
				$manageReports->db = $db;
				$manageReports->url = $CONF['url'];
				$manageReports->per_page = $settings['uperpage'];
				
				// Save the array returned into a list
				$TMPL['reports'] = $manageReports->getReports(0);				
			} elseif($_GET['b'] == 'manage_pages') {
				$feed = new feed();
				$feed->db = $db;
				$feed->url = $CONF['url'];

				if(isset($_GET['deleted'])) {
					$TMPL['message'] = notificationBox('success', sprintf($LNG['page_deleted'], $_GET['deleted']));
				}
				
				if(!empty($_GET['c'])) {
					$skin = new skin('admin/edit_page'); $page = '';
					$feed->page_data = $feed->pageData($_GET['c']);
					$feed->id = $feed->page_data['by'];
					if(!empty($_POST)) {
						$message = $feed->createPage($_POST, 1);
						$feed->page_data = $feed->pageData($_GET['c']);
					
						// If there's an error during page validation
						if($message[0]) {
							$TMPL['message'] = notificationBox('error', $message[1]);
						} else {
							if($message[1]) {
								$TMPL['message'] = notificationBox('success', $LNG['settings_saved']);
							} else {
								$TMPL['message'] = notificationBox('info', $LNG['nothing_changed']);
							}
						}
					}
					// The disabled attribute for inputs
					$TMPL['disabled'] = ' disabled';
					$TMPL['id'] = $feed->page_data['id'];
					$TMPL['current_name'] = $feed->page_data['name'];
					$TMPL['current_title'] = $feed->page_data['title'];
					$TMPL['current_desc'] = $feed->page_data['description'];
					$TMPL['current_website'] = $feed->page_data['website'];
					$TMPL['current_phone'] = $feed->page_data['phone'];
					$TMPL['current_address'] = $feed->page_data['address'];
					$TMPL['page_'.(isset($_POST['page_category']) ? $_POST['page_category'] : $feed->page_data['category'])] = ' selected="selected"';
					if($feed->page_data['verified']) {
						$TMPL['on_v'] = ' selected="selected"';
					} else {
						$TMPL['off_v'] = ' selected="selected"';
					}
					
					// Get the page author
					$author = $feed->profileData(null, $feed->page_data['by']);
					$TMPL['author'] = $author['username'];
					
					$TMPL['page'] = '<div class="message-avatar"><a href="'.$CONF['url'].'/index.php?a=page&name='.$feed->page_data['name'].'" rel="loadpage"><img src="'.$CONF['url'].'/thumb.php?src='.$feed->page_data['image'].'&t=a&w=48&h=48"></a></div><div class="message-top"><div class="message-author" rel="loadpage"><a href="'.$CONF['url'].'/index.php?a=page&name='.$feed->page_data['name'].'" rel="loadpage">'.$feed->page_data['name'].'</a></div><div class="message-time">'.$feed->countLikes($feed->page_data['id'], 2).' '.$LNG['likes'].'</div></div>';
				} else {
					$skin = new skin('admin/manage_pages'); $page = '';
					
					// Remove a page
					if(!empty($_GET['delete'])) {
						$page = $feed->pageData(null, $_GET['delete']);
						$feed->id = $page['by'];
						$TMPL['message'] = $feed->deletePage($_GET['delete'], null, 1);
					}
					
					$feed->per_page = $settings['uperpage'];
					$TMPL['pages'] = $feed->getPages(0, 0);
				}
			} elseif($_GET['b'] == 'manage_groups') {
				$feed = new feed();
				$feed->db = $db;
				$feed->url = $CONF['url'];

				if(isset($_GET['deleted'])) {
					$TMPL['message'] = notificationBox('success', sprintf($LNG['group_deleted'], $_GET['deleted']));
				}
				
				if(!empty($_GET['c'])) {
					$skin = new skin('admin/edit_group'); $page = '';
					$feed->group_data = $feed->groupData($_GET['c']);
					if(!empty($_POST)) {
						$message = $feed->createGroup($_POST, 1);
						$feed->group_data = $feed->groupData($_GET['c']);
					
						// If there's an error during group validation
						if($message[0]) {
							$TMPL['message'] = notificationBox('error', $message[1]);
						} else {
							if($message[1]) {
								$TMPL['message'] = notificationBox('success', $LNG['settings_saved']);
							} else {
								$TMPL['message'] = notificationBox('info', $LNG['nothing_changed']);
							}
						}
					}
					// The disabled attribute for inputs
					$TMPL['disabled'] = ' disabled';
					$TMPL['id'] = $feed->group_data['id'];
					$TMPL['current_name'] = $feed->group_data['name'];
					$TMPL['current_title'] = $feed->group_data['title'];
					$TMPL['current_desc'] = $feed->group_data['description'];
					if($feed->group_data['privacy'] == 1) {
						$TMPL['privacy_private'] = ' selected="selected"';
					} else {
						$TMPL['privacy_public'] = ' selected="selected"';
					}
					if($feed->group_data['posts'] == 1) {
						$TMPL['posts_admins'] = ' selected="selected"';
					} else {
						$TMPL['posts_members'] = ' selected="selected"';
					}
					$TMPL['group'] = '<div class="message-avatar"><a href="'.$CONF['url'].'/index.php?a=group&name='.$feed->group_data['name'].'" rel="loadpage"><img src="'.$CONF['url'].'/thumb.php?src='.$feed->group_data['cover'].'&t=c&w=48&h=48"></a></div><div class="message-top"><div class="message-author" rel="loadpage"><a href="'.$CONF['url'].'/index.php?a=group&name='.$feed->group_data['name'].'" rel="loadpage">'.$feed->group_data['name'].'</a></div><div class="message-time">'.sprintf($LNG['x_members'], $feed->countGroupMembers($feed->group_data['id'], 0)).'</div></div>';
				} else {
					$skin = new skin('admin/manage_groups'); $page = '';
					
					// Remove a group
					if(!empty($_GET['delete'])) {
						$group = $feed->groupOwner($_GET['delete']);
						$feed->id = $group['user'];
						$TMPL['message'] = $feed->deleteGroup($_GET['delete'], null, 1);
					}
					
					$feed->per_page = $settings['uperpage'];
					$TMPL['groups'] = $feed->getGroups(0, 0);
				}
			} elseif($_GET['b'] == 'users') {
				$manageUsers = new manageUsers();
				$manageUsers->db = $db;
				$manageUsers->url = $CONF['url'];
				$manageUsers->title = $settings['title'];
				$manageUsers->per_page = $settings['uperpage'];
				
				if(!isset($_GET['e'])) {
					$skin = new skin('admin/manage_users'); $page = '';
					
					// Save the array returned into a list
					if($_GET['filter'] == 'suspended') {
						$TMPL['users'] = $manageUsers->getUsers(0, 3);
					} elseif($_GET['filter'] == 'moderators') {
						$TMPL['users'] = $manageUsers->getUsers(0, 2);
					} elseif($_GET['filter'] == 'verified') {
						$TMPL['users'] = $manageUsers->getUsers(0, 1);
					} else {
						$TMPL['users'] = $manageUsers->getUsers(0, 0);
					}
				} else {
					$skin = new skin('admin/edit_user'); $page = '';
					$getUser = $manageUsers->getUser($_GET['e'], $_GET['ef']);
					if(!$getUser) {
						header("Location: ".$CONF['url']."/index.php?a=admin&b=users&m=un");
					}
					// Create the class instance
					$updateUserSettings = new updateUserSettings();
					$updateUserSettings->db = $db;
					$updateUserSettings->id = $getUser['idu'];
					
					$feed = new feed();
					$feed->db = $db;
					$feed->id = $updateUserSettings->id;
					
					$userSettings = $updateUserSettings->getSettings();
					
					if(!empty($_POST)) {
						// Prevent moderators from affecting other moderators
						if($loggedIn['user_group'] == 1 && $userSettings['user_group'] == 1) {
							unset($_POST);
						} elseif($loggedIn['user_group'] == 1) {
							unset($_POST['user_group']);
						}
						$TMPL['message'] = $updateUserSettings->query_array('users', array_map("strip_tags_array", $_POST));
						
						// Reupdate the information
						$userSettings = $updateUserSettings->getSettings();
					}
					
					$TMPL['countries'] = countries(1, $userSettings['country']);
					$date = explode('-', $userSettings['born']);
					
					$TMPL['years'] = generateDateForm(0, $date[0]);
					$TMPL['months'] = generateDateForm(1, $date[1]);
					$TMPL['days'] = generateDateForm(2, $date[2]);
					
					$TMPL['username'] = $userSettings['username']; $TMPL['idu'] = $userSettings['idu']; $TMPL['currentFirstName'] = $userSettings['first_name']; $TMPL['currentLastName'] = $userSettings['last_name']; $TMPL['currentEmail'] = $userSettings['email']; $TMPL['currentLocation'] = $userSettings['location']; $TMPL['currentWebsite'] = $userSettings['website']; $TMPL['currentBio'] = $userSettings['bio']; $TMPL['currentFacebook'] = $userSettings['facebook']; $TMPL['currentTwitter'] = $userSettings['twitter'];  $TMPL['currentGplus'] = $userSettings['gplus']; $TMPL['join_date'] = $userSettings['date'];  $TMPL['currentAddress'] = $userSettings['address']; $TMPL['currentWork'] = $userSettings['work']; $TMPL['currentSchool'] = $userSettings['school'];

					if($userSettings['user_group'] == 0) {
						$TMPL['zero_g'] = 'selected="selected"';
					} else {
						$TMPL['one_g'] = 'selected="selected"';
					}
					
					if($userSettings['verified'] == 0) {
						$TMPL['off_v'] = 'selected="selected"';
					} else {
						$TMPL['on_v'] = 'selected="selected"';
					}
					
					if($userSettings['suspended'] == 0) {
						$TMPL['sus_off'] = 'selected="selected"';
					} else {
						$TMPL['sus_on'] = 'selected="selected"';
					}
					
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
					
					if($userSettings['email_group_invite'] == '0') {
						$TMPL['egioff'] = 'selected="selected"';
					} else {
						$TMPL['egion'] = 'selected="selected"';
					}
					
					$TMPL['user'] = '<div class="message-avatar" id="avatar'.$userSettings['idu'].'"><a href="'.$CONF['url'].'/index.php?a=profile&u='.$userSettings['username'].'" rel="loadpage"><img src="'.$CONF['url'].'/thumb.php?src='.$userSettings['image'].'&t=a&w=50&h=50"></a></div><div class="message-top"><div class="message-author" rel="loadpage"><a href="'.$CONF['url'].'/index.php?a=profile&u='.$userSettings['username'].'" rel="loadpage">'.$userSettings['username'].'</a></div><div class="message-time">'.$userSettings['email'].'</div></div>';
					
					$TMPL['message'] .= ($userSettings['suspended'] ? notificationBox('error', $LNG['account_suspended']) : '');
				}
				
				// If GET delete is set, delete the user
				if($_GET['delete'] && $_GET['token_id'] == $_SESSION['token_id']) {
					// Create the class instance
					$updateUserSettings = new updateUserSettings();
					$updateUserSettings->db = $db;
					$updateUserSettings->id = $_GET['delete'];
					$userSettings = $updateUserSettings->getSettings();
					
					// Prevent moderators from deleting other moderators
					if(($loggedIn['user_group'] == 1 && $userSettings['user_group'] == 0) || $loggedIn['user_group'] == 0) {
						// Delete the profile images
						deleteImages(array($userSettings['image']), 1);
						deleteImages(array($userSettings['cover']), 0);
						
						$manageUsers->deleteUser($_GET['delete']);
						header("Location: ".$CONF['url']."/index.php?a=admin&b=users&m=".$_GET['deleted']);
					} else {
						header("Location: ".$CONF['url']."/index.php?a=admin&b=users");
					}
				}
				
				if($_GET['m'] == 'un') {
					$TMPL['message'] = notificationBox('error', $LNG['user_not_exist']);
				} elseif(!empty($_GET['m'])) {
					$TMPL['message'] = notificationBox('success', sprintf($LNG['user_has_been_deleted'], $_GET['m']));
				}
			} elseif($_GET['b'] == 'manage_ads' && !$loggedIn['user_group']) {
				$skin = new skin('admin/manage_ads'); $page = '';
				
				$TMPL['ad1'] = $settings['ad1']; $TMPL['ad2'] = $settings['ad2']; $TMPL['ad3'] = $settings['ad3']; $TMPL['ad4'] = $settings['ad4']; $TMPL['ad5'] = $settings['ad5']; $TMPL['ad6'] = $settings['ad6']; $TMPL['ad7'] = $settings['ad7'];
				if(!empty($_POST)) {
					// Unset the submit array element
					$updateSettings = new updateSettings();
					$updateSettings->db = $db;
					$updated = $updateSettings->query_array('settings', $_POST);
					if($updated == 1) {
						header("Location: ".$CONF['url']."/index.php?a=admin&b=manage_ads&m=s");
					} else {
						header("Location: ".$CONF['url']."/index.php?a=admin&b=manage_ads&m=i");
					}
				}
				if($_GET['m'] == 's') {
					$TMPL['message'] = notificationBox('success', $LNG['settings_saved']);
				} elseif($_GET['m'] == 'i') {
					$TMPL['message'] = notificationBox('info', $LNG['nothing_saved']);
				}
			} elseif($_GET['b'] == 'site_settings' && !$loggedIn['user_group']) {
				$skin = new skin('admin/site_settings'); $page = '';
				
				$TMPL['current_title'] = $settings['title'];
				$TMPL['format'] = $settings['format'];
				$TMPL['censor'] = $settings['censor'];
				$TMPL['formatmsg'] = $settings['formatmsg'];
				$TMPL['perpage'] = $settings['perpage'];
				$TMPL['cperpage'] = $settings['cperpage'];
				$TMPL['mperpage'] = $settings['mperpage'];
				$TMPL['nperpage'] = $settings['nperpage'];
				$TMPL['current_message'] = $settings['message'];
				$TMPL['climit'] = $settings['climit'];
				$TMPL['chatr'] = $settings['chatr'];
				$TMPL['conline'] = $settings['conline'];
				$TMPL['intervalm'] = $settings['intervalm'] / 1000;
				$TMPL['intervaln'] = $settings['intervaln'] / 1000;
				$TMPL['uperpage'] = $settings['uperpage'];
				$TMPL['sperpage'] = $settings['sperpage'];
				$TMPL['nperwidget'] = $settings['nperwidget'];
				$TMPL['lperpost'] = $settings['lperpost'];
				$TMPL['ilimit'] = $settings['ilimit'];
				$TMPL['aperip'] = $settings['aperip'];
				$TMPL['tracking_code'] = $settings['tracking_code'];
				$TMPL['sizemsg'] = round(($settings['sizemsg'] / 1024) / 1024);
				$TMPL['size'] = round(($settings['size'] / 1024) / 1024, 2);
				$TMPL['fbappid'] = $settings['fbappid'];
				$TMPL['fbappsecret'] = $settings['fbappsecret'];
				$TMPL['smtp_host'] = $settings['smtp_host'];
				$TMPL['smtp_port'] = $settings['smtp_port'];
				$TMPL['smtp_username'] = $settings['smtp_username'];
				$TMPL['smtp_password'] = $settings['smtp_password'];
						
				if($settings['captcha'] == '1') {
					$TMPL['on'] = 'selected="selected"';
				} else {
					$TMPL['off'] = 'selected="selected"';
				}
				
				if($settings['smiles'] == '1') {
					$TMPL['son'] = 'selected="selected"';
				} else {
					$TMPL['soff'] = 'selected="selected"';
				}
				
				if($settings['email_activation'] == '1') {
					$TMPL['aon'] = 'selected="selected"';
				} else {
					$TMPL['aoff'] = 'selected="selected"';
				}
				
				if($settings['time'] == '0') {
					$TMPL['one'] = 'selected="selected"';
				} elseif($settings['time'] == '1') {
					$TMPL['two'] = 'selected="selected"';
				} elseif($settings['time'] == '2') {
					$TMPL['three'] = 'selected="selected"';
				} else {
					$TMPL['four'] = 'selected="selected"';
				}
				
				if($settings['conline'] == '60') {
					$TMPL['conone'] = 'selected="selected"';
				} elseif($settings['conline'] == '300') {
					$TMPL['contwo'] = 'selected="selected"';
				} else {
					$TMPL['conthree'] = 'selected="selected"';
				}
				
				if($settings['mail'] == '1') {
					$TMPL['mailon'] = 'selected="selected"';
				} else {
					$TMPL['mailoff'] = 'selected="selected"';
				}
				
				if($settings['mprivacy'] == '1') {
					$TMPL['pon'] = 'selected="selected"';
				} else {
					$TMPL['poff'] = 'selected="selected"';
				}
				
				if($settings['notificationl'] == '0') {
					$TMPL['loff'] = 'selected="selected"';
				} else {
					$TMPL['lon'] = 'selected="selected"';
				}
				
				if($settings['notificationc'] == '0') {
					$TMPL['coff'] = 'selected="selected"';
				} else {
					$TMPL['con'] = 'selected="selected"';
				}
				
				if($settings['sound_new_notification'] == '0') {
					$TMPL['snnoff'] = 'selected="selected"';
				} else {
					$TMPL['snnon'] = 'selected="selected"';
				}
				
				if($settings['sound_new_chat'] == '0') {
					$TMPL['sncoff'] = 'selected="selected"';
				} else {
					$TMPL['sncon'] = 'selected="selected"';
				}
				
				if($settings['email_comment'] == '0') {
					$TMPL['ecoff'] = 'selected="selected"';
				} else {
					$TMPL['econ'] = 'selected="selected"';
				}
				
				if($settings['email_like'] == '0') {
					$TMPL['eloff'] = 'selected="selected"';
				} else {
					$TMPL['elon'] = 'selected="selected"';
				}
				
				if($settings['email_new_friend'] == '0') {
					$TMPL['enfoff'] = 'selected="selected"';
				} else {
					$TMPL['enfon'] = 'selected="selected"';
				}
				
				if($settings['email_page_invite'] == '0') {
					$TMPL['epioff'] = 'selected="selected"';
				} else {
					$TMPL['epion'] = 'selected="selected"';
				}
				
				if($settings['email_group_invite'] == '0') {
					$TMPL['egioff'] = 'selected="selected"';
				} else {
					$TMPL['egion'] = 'selected="selected"';
				}
				
				if($settings['notifications'] == '0') {
					$TMPL['soff'] = 'selected="selected"';
				} else {
					$TMPL['son'] = 'selected="selected"';
				}
				
				if($settings['notificationd'] == '0') {
					$TMPL['doff'] = 'selected="selected"';
				} else {
					$TMPL['don'] = 'selected="selected"';
				}
				
				if($settings['notificationf'] == '0') {
					$TMPL['foff'] = 'selected="selected"';
				} else {
					$TMPL['fon'] = 'selected="selected"';
				}
				
				if($settings['notificationg'] == '0') {
					$TMPL['goff'] = 'selected="selected"';
				} else {
					$TMPL['gon'] = 'selected="selected"';
				}

				if(empty($settings['fbapp'])) {
					$TMPL['fbappoff'] = ' selected="selected"';
				} else {
					$TMPL['fbappon'] = ' selected="selected"';
				}
				
				if($settings['smtp_email'] == '1') {
					$TMPL['smtpon'] = 'selected="selected"';
				} else {
					$TMPL['smtpoff'] = 'selected="selected"';
				}
				
				if($settings['smtp_auth'] == '1') {
					$TMPL['smtpaon'] = 'selected="selected"';
				} else {
					$TMPL['smtpaoff'] = 'selected="selected"';
				}
				
				if(isset($_POST['submit'])) {
					// Unset the submit array element
					unset($_POST['submit']);
					$updateSettings = new updateSettings();
					$updateSettings->db = $db;
					
					// Transform the user's value in the appropriate format
					$_POST['intervalm'] = $_POST['intervalm'] * 1000;
					$_POST['intervaln'] = $_POST['intervaln'] * 1000;
					$_POST['size'] = ($_POST['size'] * 1024) * 1024;
					$_POST['sizemsg'] = ($_POST['sizemsg'] * 1024) * 1024;
					
					$updated = $updateSettings->query_array('settings', $_POST);
					if($updated == 1) {
						header("Location: ".$CONF['url']."/index.php?a=admin&b=site_settings&m=s");
					} else {
						header("Location: ".$CONF['url']."/index.php?a=admin&b=site_settings&m=i");
					}
				}
				
				if($_GET['m'] == 's') {
					$TMPL['message'] .= notificationBox('success', $LNG['settings_saved']);
				} elseif($_GET['m'] == 'i') {
					$TMPL['message'] .= notificationBox('info', $LNG['nothing_changed']);
				}

				if(!extension_loaded('openssl') && ($settings['fbapp'] || $settings['smtp_email'])) {
					$TMPL['message'] .= notificationBox('error', $LNG['openssl_error']);
				}
				if(!function_exists('curl_exec')) {
					$TMPL['message'] .= notificationBox('info', $LNG['curl_error']);
				}
			} else {
				$skin = new skin('admin/dashboard'); $page = '';

				// Get the Today's Activity
				list(
				$TMPL['users_today'], $TMPL['users_yesterday'], $TMPL['users_two_days'], $TMPL['users_three_days'], $TMPL['users_four_days'], $TMPL['users_five_days'], $TMPL['users_six_days'],
				$TMPL['pages_today'], $TMPL['pages_yesterday'], $TMPL['pages_two_days'], $TMPL['pages_three_days'], $TMPL['pages_four_days'], $TMPL['pages_five_days'], $TMPL['pages_six_days'],
				$TMPL['groups_today'], $TMPL['groups_yesterday'], $TMPL['groups_two_days'], $TMPL['groups_three_days'], $TMPL['groups_four_days'], $TMPL['groups_five_days'], $TMPL['groups_six_days'],
				$TMPL['messages_today'], $TMPL['messages_yesterday'], $TMPL['messages_two_days'], $TMPL['messages_three_days'], $TMPL['messages_four_days'], $TMPL['messages_five_days'], $TMPL['messages_six_days'],
				$TMPL['comments_today'], $TMPL['comments_yesterday'], $TMPL['comments_two_days'], $TMPL['comments_three_days'], $TMPL['comments_four_days'], $TMPL['comments_five_days'], $TMPL['comments_six_days'],
				$TMPL['shares_today'], $TMPL['shares_yesterday'], $TMPL['shares_two_days'], $TMPL['shares_three_days'], $TMPL['shares_four_days'], $TMPL['shares_five_days'], $TMPL['shares_six_days'],
				$TMPL['likes_today'], $TMPL['likes_yesterday'], $TMPL['likes_two_days'], $TMPL['likes_three_days'], $TMPL['likes_four_days'], $TMPL['likes_five_days'], $TMPL['likes_six_days'],
				$TMPL['online_users']) = admin_stats($db, 2, array('conline' => $settings['conline']));
				
				// Stats to generate the graps for
				$stats = array('users', 'pages', 'groups', 'messages', 'comments', 'shares', 'likes');
				
				foreach($stats as $val) {
					// Get the stats values
					$stats_days = array($TMPL[$val.'_today'], $TMPL[$val.'_yesterday'], $TMPL[$val.'_two_days'], $TMPL[$val.'_three_days'], $TMPL[$val.'_four_days'], $TMPL[$val.'_five_days'], $TMPL[$val.'_six_days']);
					
					// Get the maximum value in a day
					$val_max = max($stats_days);
					
					$i = 0;
					foreach($stats_days as $value) {
						// Get the dates
						$date = date('Y-m-d', strtotime("-$i days", strtotime(date('Y-m-d'))));
						$date = explode('-', $date);
						
						$month = intval($date[1]);
						
						// Calculate the percentage
						$percentage = ($value * 100) / $val_max;
						$TMPL[$val.'_stats'] .= '<li title="'.$LNG["month_$month"].' '.$date[2].': '.$value.' '.$LNG[$val].'"><span style="height:'.$percentage.'%"></span></li>';
						$i++;
					}
				}
				
				$TMPL['users_percentage'] = percentage($TMPL['users_today'], $TMPL['users_yesterday']);
				$TMPL['pages_percentage'] = percentage($TMPL['pages_today'], $TMPL['pages_yesterday']);
				$TMPL['groups_percentage'] = percentage($TMPL['groups_today'], $TMPL['groups_yesterday']);
				$TMPL['messages_percentage'] = percentage($TMPL['messages_today'], $TMPL['messages_yesterday']);
				$TMPL['comments_percentage'] = percentage($TMPL['comments_today'], $TMPL['comments_yesterday']);
				$TMPL['shares_percentage'] = percentage($TMPL['shares_today'], $TMPL['shares_yesterday']);
				$TMPL['likes_percentage'] = percentage($TMPL['likes_today'], $TMPL['likes_yesterday']);
				
				// Count the enabled plugins
				$countPlugins = $db->query("SELECT * FROM `plugins`");
				
				// Get the current theme's info
				include(__DIR__ .'/../'.$CONF['theme_path'].'/'.$CONF['theme_name'].'/info.php');
				$TMPL['site_loaded'] = sprintf($LNG['site_loaded'], $CONF['url'].'/index.php?a=admin'.($loggedIn['user_group'] ? '' : '&b=themes'), $name, $CONF['url'].'/index.php?a=admin'.($loggedIn['user_group'] ? '' : '&b=plugins'), $countPlugins->num_rows);
				
				// Get the software's info
				include(__DIR__ .'/../info.php');
				$TMPL['site_version'] = sprintf($LNG['site_version'], $url, $name, $version);
				$TMPL['soft_url'] = $url;
			}
			
			$page .= $skin->make();
			$TMPL = $TMPL_old; unset($TMPL_old);
			$TMPL['settings'] = $page;
			
			if(isset($_GET['logout']) == 1 && $_GET['token_id'] == $_SESSION['token_id']) {
				$loggedInAdmin->logOut();
				header("Location: ".$CONF['url']."/index.php?a=admin");
			}
		} else {
			// Set the content to false, change the $skin to log-in.
			$content = false;
		}
	}
	
	// Bold the current link
	if(isset($_GET['b'])) {
		$LNG["admin_menu_{$_GET['b']}"] = $LNG["admin_menu_{$_GET['b']}"];
		$TMPL['welcome'] = $LNG["admin_ttl_{$_GET['b']}"];
	} else {
		$LNG["admin_menu_dashboard"] = $LNG["admin_menu_dashboard"];
		$TMPL['welcome'] = $LNG["admin_ttl_dashboard"];
	}

	$menu = array(	''											=> array('admin_menu_dashboard', '', 'dashboard'),
					'&b=site_settings'							=> array('admin_menu_site_settings', '', 'settings'),
					'&b=themes' 								=> array('admin_menu_themes', '', 'themes'),
					'&b=plugins'								=> array('admin_menu_plugins', '', 'plugins'),
					'&b=stats'									=> array('admin_menu_stats', '', 'stats'),
					'&b=users'									=> array('admin_menu_users', array('users' => $LNG['list_users'], 'moderators' => $LNG['list_moderators'], 'verified' => $LNG['list_verified'], 'suspended' => $LNG['list_suspended']), 'users'),
					'&b=manage_pages'							=> array('admin_menu_manage_pages', '', 'pages'),
					'&b=manage_groups'							=> array('admin_menu_manage_groups', '', 'groups'),
					'&b=manage_reports'							=> array('admin_menu_manage_reports', adminMenuCounts($db, 0), 'reports'),
					'&b=manage_ads'								=> array('admin_menu_manage_ads', '', 'board'),
					'&b=security'								=> array('admin_menu_security', '', 'security'),
					'&logout=1&token_id='.$_SESSION['token_id']	=> array('admin_menu_logout', '', 'logout'));

	// If the logged-in user is a Moderator, remove menu elements
	if($loggedIn['user_group']) {
		unset($menu['&b=site_settings'], $menu['&b=users_settings'], $menu['&b=social'], $menu['&b=themes'], $menu['&b=plugins'], $menu['&b=manage_ads'], $menu['&b=security'], $menu['&logout=1&token_id='.$_SESSION['token_id']]);
	}

	$i = 1;
	foreach($menu as $link => $title) {
		$class = '';
		if($link == '&b='.$_GET['b'] || $link == $_GET['b']) {
			$class = ' sidebar-link-active';
			$ttl = $LNG[$title[0]];
		}
		
		$is_menu = (is_array($title[1]) ? 1 : 0);
		$collapsed = ($title[1][$_GET['filter']] ? ' sidebar-link-sub-active' : '');
		
		$TMPL['menu'] .= '<div class="sidebar-link'.$class.($is_menu ? ' sidebar-link-sub'.$collapsed.'" id="sub-menu'.$i.'"' : '"').'><a '.($is_menu ? 'onclick="adminSubMenu('.$i.')"' : 'href="'.$CONF['url'].'/index.php?a=admin'.$link.'"').' '.(($title[0] !== 'admin_menu_logout' && !$is_menu) ? 'rel="loadpage"' : '').'><img src="'.$CONF['url'].'/'.$CONF['theme_url'].'/images/icons/settings/'.$title[2].'.png">'.$LNG[$title[0]].' '.($title[1] && !$is_menu ? '<span class="admin-notifications-number">'.$title[1].'</span>' : '').'</a></div>';

		// Start the menu's container
		if($is_menu) {
			$TMPL['menu'] .= '<div id="sub-menu-content'.$i.'" class="sub-menu"'.($title[1][$_GET['filter']] ? '' : ' style="display: none;"').'>';
			foreach($title[1] as $sub_url => $sub_title) {
				$class = '';
				if($sub_url == $_GET['filter']) {
					$class = ' sidebar-link-active';
					$ttl .= ' - '.$LNG['list_'.$_GET['filter']];
				}
				$TMPL['menu'] .= '<div class="sidebar-link'.$class.'"><a href="'.$CONF['url'].'/index.php?a=admin'.$link.'&filter='.$sub_url.'" rel="loadpage">'.$sub_title.'</a></div>';
			}
			$TMPL['menu'] .= '</div>';
		}
		$i++;
	}

	$TMPL['url'] = $CONF['url'];
	$TMPL['localurl'] = $CONF['url'];
	$TMPL['title'] = $LNG['title_admin'].' - '.($loggedIn['username'] ? $ttl : $LNG['login']).' - '.$settings['title'];
	if($content) {
		$skin = new skin('admin/content');
	} else {
		$skin = new skin('admin/login');
	}
	return $skin->make();
}
?>