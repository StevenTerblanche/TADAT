<?php
class Dislike extends Feed {
	function getDislikes($id) {
		global $settings;
		
		// Get the message information
		$query = $this->db->query(sprintf("SELECT `idu`,`username`,`private`,`public` FROM `messages`, `users` WHERE `messages`.`id` = '%s' AND `messages`.`uid` = `users`.`idu`", $this->db->real_escape_string($id)));
		$result = $query->fetch_assoc();
		
		// If the current user is not the owner of the message
		if($result['idu'] !== $this->id) {			
			$friendship = $this->verifyFriendship($this->id, $result['idu']);

			// Verify if the message
			if(!$result['public']) {
				$private = 1;
			} elseif($result['public'] == 2 && $friendship['status'] !== '1') {
				$private = 1;
			}
		}
		
		// If the message can be disliked
		if(!$private) {
			$dislike = verifyDislike($this->db, $id, $this->id);
			
			if($dislike) {
				// Remove the dislike
				$this->db->query(sprintf("DELETE FROM `dislikes` WHERE `post` = '%s' AND `by` = '%s'", $this->db->real_escape_string($id), $this->id));
				$state = 'Dislike';
			} else {
				// Add the Dislike
				$this->db->query(sprintf("INSERT INTO `dislikes` (`post`, `by`) VALUES ('%s', '%s')", $this->db->real_escape_string($id), $this->id));
				$state = 'Disliked';
			}
			
			// Get the dislikes
			$query = sprintf("SELECT * FROM `dislikes`,`users` WHERE `post` = '%s' and `dislikes`.`by` = `users`.`idu` ORDER BY `dislikes`.`id` DESC", $this->db->real_escape_string($id));
			$result = $this->db->query($query);
			
			$i = 0;
			while($row = $result->fetch_assoc()) {
				if($i == $settings['lperpost']) {
					break;
				}
				$array[] = $row;
				$i++;
			}
			
			// Define the $people who disliked variable
			if(is_array($array)) {
				$people = '<span class="likes-container">';
				foreach($array as $row) {
					$people .= '<a href="'.$this->url.'/index.php?a=profile&u='.$row['username'].'" rel="loadpage"><img src="'.$this->url.'/thumb.php?src='.$row['image'].'&w=25&h=25&t=a" title="'.realName($row['username'], $row['first_name'], $row['last_name']).' disliked this"></a> ';
				}
				$people .= '</span>';
			}
			
			// Output the social buttons
			$output = '<a onclick="doDislike('.$id.')" id="doDislike'.$id.'">'.$state.'</a> <div class="dislike_btn" id="dislike_btn'.$id.'"> '.$people.$result->num_rows.'</div>';
			return $output;
		}
	}
}
function verifyDislike($db, $id, $uid) {
	$result = $db->query(sprintf("SELECT * FROM `dislikes` WHERE `post` = '%s' AND `by` = '%s'", $db->real_escape_string($id), $db->real_escape_string($uid)));

	// If there is a Dislike
	return ($result->num_rows) ? 1 : 0;
}
?>