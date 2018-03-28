<?php defined('BASEPATH') OR exit('No direct script access allowed');

	if (!function_exists('form_check_status')){
		function form_check_status($field){
		if(!empty($field_value) && $field_value !== 0){$statusClass = 'question-green-panel';}else{$statusClass = 'question-red-panel';}
			echo $statusClass;
		}
	}

	if (!function_exists('start_accordion_panel')){
		function start_accordion_panel($fieldset_status, $field_value, $field_name, $accordion, $anchor, $question){
		if(!empty($field_value) && $field_value !== 0){$statusClass = 'question-green-panel';}else{$statusClass = 'question-red-panel';}
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading '.$statusClass.'">';
			echo '<h5 class="panel-title panel-title hangingindent">';
			echo '<a class="accordion-toggle black-status" data-toggle="collapse" data-parent="#accordion-'.$accordion.'" href="#'.$anchor.'">'.$question.'</a>';
			echo '</h5>';
			echo '</div>';
			echo '<div id="'.$anchor.'" class="panel-collapse collapse">';
			echo '<div class="m0 mt10 p0">';
			echo '<fieldset '.$fieldset_status.'>';						
		}
	}

	if (!function_exists('end_accordion_panel')){
		function end_accordion_panel(){
			echo '</fieldset>';
			echo '</div></div></div>';
		}
	}


	if (!function_exists('form_create_memo_tadat')){
		function form_create_memo_tadat($field_value, $field_name, $accordion, $anchor, $question, $validateClass = null){		
			if(!empty($field_value)){$statusClass = 'question-green-panel';}else{$statusClass = 'question-red-panel';}
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading '.$statusClass.'">';
			echo '<h5 class="panel-title">';
			echo '<a class="accordion-toggle black-status" data-toggle="collapse" data-parent="#accordion-'.$accordion.'" href="#'.$anchor.'">'.$question.'</a>';
			echo '</h5>';
			echo '</div>';
			echo '<div id="'.$anchor.'" class="panel-collapse collapse">';
			echo '<div class="m0 p0">';
			$strClass = (!is_null($validateClass)) ? 'form-control required-textarea-reason_tiny_mce '.$validateClass : 'form-control required-textarea-reason_tiny_mce';
			echo form_textarea(array('name'=>$field_name, 'value'=>$field_value, 'class'=>$strClass, 'id'=>'id_'.$field_name));
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}
	
	if (!function_exists('form_create_notes_tadat')){
		function form_create_notes_tadat($field_value, $field_name, $comments_notes = null){
			echo '<div class="answer-wrapper pt10">';
			if ($comments_notes == null){$notes = lang('comments_notes');}else{$notes = $comments_notes;}			
			echo '<span class="comments-notes pb10 mt0 lh20">'.$notes.'</span>';
			echo '<div class="p0 mb10 bag">';
			echo form_textarea(array('name'=>$field_name, 'value'=>$field_value, 'class'=>'form-control tadat-notes'));
			echo '</div>';
			echo '</div>';
		}
	}

	if (!function_exists('form_create_notes_tadat_validate')){
		function form_create_notes_tadat_validate($field_value, $field_name, $validateClass = null, $comments_notes = null){
			echo '<div class="answer-wrapper pt10">';
			if ($comments_notes == null){$notes = lang('comments_notes');}else{$notes = $comments_notes;}
			echo '<span class="comments-notes pb10 mt0 lh20">'.$notes.'</span>';
			echo '<div class="p0 mb10 bag">';
			$strClass = (!is_null($validateClass)) ? 'form-control required-textarea-reason_tiny_mce '.$validateClass : 'form-control required-textarea-reason_tiny_mce';			
			echo form_textarea(array('name'=>$field_name, 'value'=>$field_value, 'class'=>$strClass, 'id'=>'id_'.$field_name));
			echo '</div>';
			echo '</div>';
		}
	}


	if (!function_exists('form_create_reason_tadat')){
		function form_create_reason_tadat($field_value, $field_name, $comments_notes = null){
			if ($comments_notes == null){$notes = lang('comments_notes');}else{$notes = $comments_notes;}			
			echo '<span class="comments-notes pb10 mt0 lh20">'.$notes.'</span>';
			echo form_textarea(array('name'=>$field_name, 'value'=>$field_value, 'class'=>'form-control required-textarea-reason'));

		}
	}

	
	if (! function_exists('set_radio_tadat')){
		function set_radio_tadat($field, $value = ''){
			return ($field === (string) $value) ? ' checked="checked"' : '';}
	}
	
	if (!function_exists('form_create_radio_tadat')){
		function form_create_radio_tadat($field_value, $field_name, $check_value, $label, $class = ''){
			$strChecked = ($field_value === (string) $check_value) ? ' checked="checked"' : '';
			$strClass = ($class !== '') ? 'required-radio inline-radio '.$class : 'inline-radio required-radio';
			$strRequired = '';
			echo '<input type="radio" '.$strRequired.' class="'.$strClass.'" name="'.$field_name.'" value="'.$check_value.'" id="id-'.$field_name.'" '. $strChecked.'><label class="inline-label">'.$label.'</label>';
		}
	}
	if (!function_exists('form_create_radio_tadat_reverse')){
		function form_create_radio_tadat_reverse($field_value, $field_name, $check_value, $label, $class = ''){
			$strChecked = ($field_value === (string) $check_value) ? ' checked="checked"' : '';
			$strClass = ($class !== '') ? 'inline-radio '.$class : 'inline-radio';
			echo '<input type="radio" class="'.$strClass.'" name="'.$field_name.'" value="'.$check_value.'" id="id-'.$field_name.'" '. $strChecked.'><label class="inline-label">'.$label.'</label>';
		}
	}
