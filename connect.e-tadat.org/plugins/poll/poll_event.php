<?php
function poll_event($values) {
	$form = '
	<div id="answers-list" style="display: none;">
		<div class="polls-input-container">
			<input type="text" class="polls-input" placeholder="Answer 1" name="poll-answer[]" maxlength="64"></div>
			<div class="polls-input-container"><input type="text" class="polls-input" placeholder="Answer 2" name="poll-answer[]" maxlength="64">
		</div>
	</div>
	<div class="polls-input-container" id="polls-options" style="display: none;">
		<input type="text" class="polls-input polls-half" placeholder="Duration (number of days)" name="poll-stop"><div class="polls-input polls-half poll-text-right" id="polls-add">
			<a href="javascript:;"onclick="addAnswer(\'Answer\')" id="polls-add-answer">+ Add answer</a>
		</div>
	</div>';
	
	$button = '<input type="radio" name="type" value="" id="poll" class="input_hidden"><label for="poll" id="polls-button" class="plugin-button" title="Create a poll"><img src="'.$values['site_url'].'/plugins/poll/icons/polls.png"></label>';
	
	return $form.$button;
}
?>