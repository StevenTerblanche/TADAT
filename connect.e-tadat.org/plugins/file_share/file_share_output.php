<?php
// Load the configuration file
require_once(__DIR__ .'/config.php');

function file_share_output($values) {
	$value	= $values['value'];
	$type	= $values['type'];
	$id		= $values['id'];
	global $CONF;

	// Check if the message is a file and there's no type set
	if(substr($value, 0, 5) == 'file:' && !$type) {
		$files = json_decode(str_replace('file:', '', $value), true);
		
		foreach($files['files'] as $file) {
			$output .= '<div class="file-share-element">'.htmlspecialchars($file['name'].'.'.$file['ext']).'<span class="file-share-value">('.fsize($file['size']).') <a href="'.$CONF['url'].'/plugins/'.$GLOBALS['file_share_path'].'/uploads/'.$file['filename'].'" download="'.$file['name'].'" title="Download"><div class="file-share-download"></div></a></span></div>';
		}
		
		$output = '<div class="file-share-container">'.$output.'</div><div class="message-divider"></div>';
		
		return $output;
	}
}
?>