﻿<?php
include("../includes/config.php");
session_start();
if($_POST['token_id'] != $_SESSION['token_id']) {
	return false;
}
include("../includes/classes.php");
include(getLanguage(null, (!empty($_GET['lang']) ? $_GET['lang'] : $_COOKIE['lang']), 2));
$db = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL - LIKE: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db->set_charset("utf8");

$db_portal = new mysqli($CONF['host_portal'], $CONF['user_portal'], $CONF['pass_portal'], $CONF['name_portal']);
if ($db_portal->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db_portal->set_charset("utf8");


$resultSettings = $db->query(getSettings()); 
$settings = $resultSettings->fetch_assoc();

if(isset($_POST['id'])) {
	if(isset($_SESSION['username']) && isset($_SESSION['password']) || isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
		$loggedIn = new loggedIn();
		$loggedIn->db = $db;
		$loggedIn->url = $CONF['url'];
		$loggedIn->username = (isset($_SESSION['username'])) ? $_SESSION['username'] : $_COOKIE['username'];
		$loggedIn->password = (isset($_SESSION['password'])) ? $_SESSION['password'] : $_COOKIE['password'];
		
		$verify = $loggedIn->verify();

		if($verify['username']) {
			$feed = new feed();
			$feed->db = $db;
			$feed->url = $CONF['url'];
			$feed->title = $settings['title'];
			$feed->email = $CONF['email'];
			$feed->id = $verify['idu'];
			$feed->username = $verify['username'];
			$feed->user_email = $verify['email'];
			$feed->l_per_post = $settings['lperpost'];
			$feed->email_like = $settings['email_like'];
			
			if($_POST['type'] == 2) {
				$feed->page_data = $feed->pageData(null, $_POST['id']);
				if(empty($feed->page_data['id'])) {
					return false;
				}
				$result = $feed->likePage(1);
				
				// Update the notifications after liking the page if the page owner (prevents showing [1] notification when self-liking a page)
				if($feed->id == $feed->page_data['by']) {
					// Update the notifications
					$feed->pageActivity(1, $feed->page_data['id']);
				}
			} else {
				$result = $feed->like($_POST['id'], $_POST['type']);
			}
			
			echo $result;
		}
	}
}
mysqli_close($db);
?>