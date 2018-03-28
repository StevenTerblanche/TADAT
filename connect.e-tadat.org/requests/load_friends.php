﻿<?php
include("../includes/config.php");
session_start();
if($_POST['token_id'] != $_SESSION['token_id']) {
	return false;
}
include("../includes/classes.php");
require_once(getLanguage(null, (!empty($_GET['lang']) ? $_GET['lang'] : $_COOKIE['lang']), 2));
$db = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db->set_charset("utf8");

$db_portal = new mysqli($CONF['host_portal'], $CONF['user_portal'], $CONF['pass_portal'], $CONF['name_portal']);
if ($db_portal->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db_portal->set_charset("utf8");

$resultSettings = $db->query(getSettings()); 
$settings = $resultSettings->fetch_assoc();

// The theme complete url
$CONF['theme_url'] = $CONF['theme_path'].'/'.$settings['theme'];

if(isset($_POST['type']) && isset($_POST['start']) && isset($_POST['id'])) {
	$feed = new feed();
	$feed->db = $db;
	$feed->url = $CONF['url'];
	if(isset($_SESSION['username']) && isset($_SESSION['password']) || isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
		$loggedIn = new loggedIn();
		$loggedIn->db = $db;
		$loggedIn->url = $CONF['url'];
		$loggedIn->username = (isset($_SESSION['username'])) ? $_SESSION['username'] : $_COOKIE['username'];
		$loggedIn->password = (isset($_SESSION['password'])) ? $_SESSION['password'] : $_COOKIE['password'];
		
		$verify = $loggedIn->verify();
		
		
		$feed->username = $verify['username'];
		$feed->id = $verify['idu'];
	}
	$feed->per_page = $settings['perpage'];
	$feed->c_per_page = $settings['cperpage'];
	$feed->c_start = 0;
	$feed->profile = $_POST['profile'];
	$feed->profile_data = $feed->profileData(null, $_POST['id']);
	$feed->s_per_page = $settings['sperpage'];
	$feed->listFriends = $feed->getFriends($feed->profile_data['idu'], $_POST['start']);

	// Check for permissions
	$friendship = $feed->verifyFriendship($feed->id, $feed->profile_data['idu']);
	if(!$feed->profile_data['public'] && !isset($_SESSION['usernameAdmin']) && !isset($_SESSION['passwordAdmin'])) {	
		if($feed->profile_data['private'] == 2 && $friendship['status'] !== '1' || $feed->profile_data['private'] == 1 || $feed->getBlocked($feed->profile_data['idu'], 2)) {
			return false;
		}
	}
	
	echo $feed->listFriends($_POST['type']);
}
mysqli_close($db);
?>