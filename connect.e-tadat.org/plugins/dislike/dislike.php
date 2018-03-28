<?php
require_once(__DIR__ .'/../../includes/config.php');
session_start();
if($_POST['token_id'] != $_SESSION['token_id']) {
	return false;
}
require_once(__DIR__ .'/../../includes/classes.php');
require_once(__DIR__ .'/functions.php');

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

if(isset($_POST['id'])) {
	if(isset($_SESSION['username']) && isset($_SESSION['password']) || isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
		$loggedIn = new loggedIn();
		$loggedIn->db = $db;
		$loggedIn->url = $CONF['url'];
		$loggedIn->username = (isset($_SESSION['username'])) ? $_SESSION['username'] : $_COOKIE['username'];
		$loggedIn->password = (isset($_SESSION['password'])) ? $_SESSION['password'] : $_COOKIE['password'];
		
		$verify = $loggedIn->verify();

		if($verify['username']) {
			$feed = new Dislike();
			$feed->db = $db;
			$feed->url = $CONF['url'];
			$feed->title = $settings['title'];
			$feed->id = $verify['idu'];
			$feed->username = $verify['username'];
			$feed->l_per_post = $settings['lperpost'];

			$result = $feed->getDislikes($_POST['id']);
			echo $result;
		}
	}
}
mysqli_close($db);
?>