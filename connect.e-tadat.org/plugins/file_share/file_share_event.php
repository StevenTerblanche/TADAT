<?php
// Load the configuration file
require_once(__DIR__ .'/config.php');

function file_share_event($values) {
	$form = '
	<div id="file-share-location" style="display: none;">
		<div class="file-share-input-container">
			<div id="file-share-info">
				<label for="file-share-files" class="plugin-button-normal file-share-button">Select files</label>
				<input name="file-share-files[]" id="file-share-files" size="27" type="file" multiple="multiple">
				<div id="file-share-details">Up to '.$GLOBALS['file_share_max_files'].' files, '.fsize($GLOBALS['file_share_max_file_size']).' per file and '.fsize($GLOBALS['file_share_max_size']).' in total.</div>
			</div>
			<div id="file-share-list"></div>
		</div>
	</div>';
	
	$button = '<input type="radio" name="type" value="plugin" id="file-share" class="input_hidden"><label for="file-share" id="file-share-button" class="plugin-button" title="Upload files"><img src="'.$values['site_url'].'/plugins/'.$GLOBALS['file_share_path'].'/icons/icon.png"></label>';
	
	return $form.$button;
}
?>