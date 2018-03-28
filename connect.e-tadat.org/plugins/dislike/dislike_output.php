<?php
require_once(__DIR__ .'/functions.php');

function dislike_output($values) {
	$value	= $values['value'];
	$type	= $values['type'];
	$id		= $values['id'];
	global $CONF, $db, $settings;
	
	$query = sprintf("SELECT * FROM `dislikes`,`users` WHERE `post` = '%s' and `dislikes`.`by` = `users`.`idu` ORDER BY `dislikes`.`id` DESC", $db->real_escape_string($id));
	$result = $db->query($query);
	
	// If the table exist
	$i = 0;
	while($row = $result->fetch_assoc()) {
		// If the counter hits the site's settings limitation
		if($i == $settings['lperpost']) {
			break;
		}
		$array[] = $row;
		$i++;
	}
	$counter = $result->num_rows;
	
	// Verify the dislike state
	$dislike = verifyDislike($db, $id, $values['user_id']);

	if($dislike) {
		$state = 'Disliked';
	} else {
		$state = 'Dislike';
	}
	
	// Define the $people who disliked variable
	if(is_array($array)) {
		$people = '<span class="likes-container">';
		foreach($array as $row) {
			$people .= '<a href="'.$CONF['url'].'/index.php?a=profile&u='.$row['username'].'" rel="loadpage"><img src="'.$CONF['url'].'/thumb.php?src='.$row['image'].'&w=25&h=25&t=a" title="'.realName($row['username'], $row['first_name'], $row['last_name']).' disliked this"></a> ';
		}
		$people .= '</span>';
	}
	
	// Output the social buttons
	$output = '<div class="message-actions"><div class="message-actions-content" id="message-action-dislike'.$id.'"><a onclick="doDislike('.$id.', 1)" id="doDislike'.$id.'">'.$state.'</a> <div class="dislike_btn" id="dislike_btn'.$id.'"> '.$people.$counter.'</div></div></div>';
	return $output;
}
?>