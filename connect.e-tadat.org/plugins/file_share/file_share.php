<?php
// Load the configuration file
require_once(__DIR__ .'/config.php');

function file_share($values) {
	$value	= $values['value'];
	$type 	= $values['type'];
	
	$files = $_FILES['file-share-files'];
	// If there's no type set
	if(!$type && $files['name'][0]) {
		// Get the settings
		$max_files = $GLOBALS['file_share_max_files'];
		$max_size = $GLOBALS['file_share_max_size'];
		$max_file_size = $GLOBALS['file_share_max_file_size'];
		$all_ext = $GLOBALS['file_share_all_ext'];
		
		// If the number of files selected is higher than allowed
		if(count($files['name']) > $max_files) {
			return array('You can only upload '.$max_files.' files at once.');
		}
		
		foreach($files['error'] as $key => $val) {
			if($files['error'][$key] == 0) {
				// Store the file infos
				$file_name = pathinfo($files['name'][$key], PATHINFO_FILENAME);
				$file_ext = pathinfo($files['name'][$key], PATHINFO_EXTENSION);
				$file_size = $files['size'][$key];
				$file_temp = $files['tmp_name'][$key];
				
				// If the file_size exceeds the allowed size per file limitation
				if($file_size < 1 || $file_size > $max_file_size) {
					$err_size[] = $file_name.' <strong>('.fsize($file_size).'</strong>)';
				}
				
				// If the file extension does not match the allowed file extensions
				if(empty($file_ext) || !in_array(strtolower($file_ext), $all_ext)) {
					$err_ext[] = $file_name.' <strong>('.$file_ext.'</strong>)';
				}
				
				// Generate the files
				$size[] = $file_size;
				$ext[] = $file_ext;
				$orig_name[] = $file_name;
				$tmp_name[] = $file_temp;
				$final_name[] = mt_rand().'_'.mt_rand().'_'.mt_rand().'.'.$file_ext;
			} else {
				return array('Error code: '.$files['error'][$key]);
			}
		}
		
		// If there's any error registered
		if($err_size || $err_ext) {
			if($err_size) {
				$err .= 'The file '.implode(', ', $err_size).' exceeds the maximum size per file allowed: <strong>'.fsize($max_file_size).'</strong>.';
			}
			if($err_ext) {
				$err .= 'The '.implode(', ', $err_ext).' file format is not allowed, upload <strong>'.implode(', ', $all_ext).'</strong> file formats.';
			}
			return array($err);
		}
		
		// Get the total size of the uploaded files
		foreach($size as $count) {
			$total = $total+$count;
		}
		
		// If the total size of the uploaded files exceed the total amount of size allowed
		if($total > $max_size) {
			return array('The total size you\'re trying to upload <strong>'.fsize($total).'</strong> is higher than allowed: <strong>'.fsize($max_size).'</strong>.');
		}
		
		// Store the files
		foreach($final_name as $key => $name) {
			if(move_uploaded_file($tmp_name[$key], __DIR__ .'/uploads/'.$name)) {
				$store[] = array('name' => $orig_name[$key], 'filename' => $name, 'size' => $size[$key], 'ext' => $ext[$key]);
			}
		}
		
		$array = array('files' => $store);
		
		// Return the formatted result (prefix:{json_value})
		return 'file:'.json_encode($array);
	}
}
?>