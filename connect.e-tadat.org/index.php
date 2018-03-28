<?php
session_start();
/*
	header("Cache-Control: no-store, no-cache, must-revalidate, private"); // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header('X-Powered-By:');
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header("Pragma: no-cache"); // HTTP/1.0
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header('X-Frame-Options: DENY');
	header('X-Content-Type-Options: nosniff');
	header("X-XSS-Protection: 1; mode=block");
	header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');

	$headerCSP = "Content-Security-Policy:".
		"default-src 'self';".
        "script-src 'self' 'unsafe-inline' 'unsafe-eval'; ". // vaid sources for Javascript
		"style-src 'self' 'unsafe-inline' fonts.googleapis.com; ". // vaid sources for CSS
		"media-src 'self'; ". // vaid sources for media (audio and video html tags src)		
		"object-src 'none'; ". // valid object embed and applet tags src
		"font-src 'self' fonts.gstatic.com fonts.googleapis.com;". 
		"frame-ancestors 'self' ;". //allow parent framing - this one blocks click jacking and ui redress
		"worker-src 'none';". // vaid sources for frames
		"report-uri https://portal.e-tadat.org/report.php;"; 
	header($headerCSP);

error_reporting(1);
*/


require_once('./includes/config.php');
require_once('./includes/skins.php');
require_once('./includes/classes.php');
//require_once('info.php');
require_once(getLanguage(null, (!empty($_GET['lang']) ? $_GET['lang'] : $_COOKIE['lang']), null));
$db = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db->set_charset("utf8");





if(isset($_GET['a']) && isset($action[$_GET['a']])) {
	$page_name = $action[$_GET['a']];
} else {
	$page_name = 'welcome';
}

$TMPL['token_id'] = generateToken();

// Extra class for the content [main and sidebar]
$TMPL['content_class'] = ' content-'.$page_name;

$resultSettings = $db->query(getSettings());

// Verify whether the user imported the database or not
if($resultSettings) {
	$settings = $resultSettings->fetch_assoc();
} else {
	echo "Error: ".$db->error;
}

require_once("./sources/{$page_name}.php");

// Store the theme path and theme name into the CONF and TMPL
$TMPL['theme_path'] = $CONF['theme_path'];
$TMPL['theme_name'] = $CONF['theme_name'] = $settings['theme'];
$TMPL['theme_url'] = $CONF['theme_url'] = $CONF['theme_path'].'/'.$CONF['theme_name'];

if(isset($_SESSION['username']) && isset($_SESSION['password']) || isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
	$loggedIn = new loggedIn();
	$loggedIn->db = $db;
	$loggedIn->url = $CONF['url'];
	$loggedIn->username = (isset($_SESSION['username'])) ? $_SESSION['username'] : $_COOKIE['username'];
	$loggedIn->password = (isset($_SESSION['password'])) ? $_SESSION['password'] : $_COOKIE['password'];
	
	$verify = $loggedIn->verify();
	
	// If the user is a moderator
	if($verify['user_group'] == 1) {
		$_SESSION['usernameAdmin'] = $loggedIn->username;
		$_SESSION['passwordAdmin'] = $loggedIn->password;
	}
}

$plugins = loadPlugins($db);

// Load the head plugins
foreach($plugins as $plugin) {
	if(array_intersect(array("8"), str_split($plugin['type']))) {
		$TMPL['styles'] .= "\n<link href=\"".$CONF['url']."/plugins/".$plugin['name']."/".$plugin['name'].".css\" rel=\"stylesheet\" type=\"text/css\">";
	}
}

foreach($plugins as $plugin) {
	if(array_intersect(array("9"), str_split($plugin['type']))) {
		$TMPL['scripts'] .= "\n<script type=\"text/javascript\" src=\"".$CONF['url']."/plugins/".$plugin['name']."/".$plugin['name'].".js\"></script>";
	}
}

$TMPL['content'] = PageMain();

if(!empty($verify['username'])) {
	$TMPL['menu'] = menu($verify);
	$TMPL['url_logo'] = $CONF['url'].'/index.php?a=feed';
} else {
	$TMPL['menu'] = menu(false);
	$TMPL['url_logo'] = $CONF['url'].'/index.php?a=welcome';
}

$TMPL['url'] = $CONF['url'];
$TMPL['footer'] = $settings['title'];
$TMPL['year'] = date('Y');
$TMPL['powered_by'] = 'Powered by <a href="'.$url.'" target="_blank">'.$name.'</a>.';
$TMPL['language'] = getLanguage($CONF['url'], null, 1);
$TMPL['tracking_code'] = $settings['tracking_code'];

$skin = new skin('wrapper');

echo $skin->make();

mysqli_close($db);
?>