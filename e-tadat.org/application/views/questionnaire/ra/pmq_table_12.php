<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	if(isset($this->action) && ($this->action === 'update' || $this->action === 'save' || $this->action === 'completed')){
		foreach($get_record_by_id as $field => $value){$$field = $value;}
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
	}
	if(isset($this->action) && $this->action === 'completed'){
		$strFieldsetStatus = 'disabled="disabled"';
	}else{
		$strFieldsetStatus = '';
	}
	$periods = explode("/", $get_missions[0]['period']);
?>
<div class="col-md-12 pl0 pr0 ml0 mr0">
<fieldset <?php echo $strFieldsetStatus; ?>>
<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'form-submit')); ?>

	<table class="table table-striped pmq-table" style="width:98% !important">
		<tr class="dark-blue">
				<td class="bld">&nbsp;</td>
				<td colspan="2" class="center bld wp-10">Finalized within 30 days</td>
				<td colspan="2" class="center bld wp-10">Finalized within 60 days</td>
				<td colspan="2" class="center bld wp-10">Finalized within 90 days</td>
				<td class="center bld wp-10">&nbsp;</td>
		</tr>
		<tr class="dark-blue">
			<td class="bld"><p>Month</p></td>
			<td class="center bld wp-10">Number</td>
			<td class="center bld wp-10"><p>Percentage<sup></sup></p></td>
			<td class="center bld wp-10">Number</td>
			<td class="center bld wp-10"><p>Percentage<sup></sup></p></td>
			<td class="center bld wp-10">Number</td>
			<td class="center bld wp-10"><p>Percentage</p></td>
			<td class="center bld wp-10">Total number finalized</td>
		</tr>
		<tr>
			<td><b> Month 1</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_1', 'value'=>$finalized_30_1, 'id'=>'id_finalized_30_1', 'class'=>'form-control pmq-number-input center calculated month_1', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_1', 'value'=>$finalized_30_rate_1, 'id'=>'id_finalized_30_rate_1', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_1', 'value'=>$finalized_60_1, 'id'=>'id_finalized_60_1', 'class'=>'form-control pmq-number-input center calculated month_1', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_1', 'value'=>$finalized_60_rate_1, 'id'=>'id_finalized_60_rate_1', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_1', 'value'=>$finalized_90_1, 'id'=>'id_finalized_90_1', 'class'=>'form-control pmq-number-input center calculated month_1', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_1', 'value'=>$finalized_90_rate_1, 'id'=>'id_finalized_90_rate_1', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_1', 'value'=>$finalized_total_1, 'id'=>'id_finalized_total_1', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 2</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_2', 'value'=>$finalized_30_2, 'id'=>'id_finalized_30_2', 'class'=>'form-control pmq-number-input center month_2', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_2', 'value'=>$finalized_30_rate_2, 'id'=>'id_finalized_30_rate_2', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_2', 'value'=>$finalized_60_2, 'id'=>'id_finalized_60_2', 'class'=>'form-control pmq-number-input center month_2', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_2', 'value'=>$finalized_60_rate_2, 'id'=>'id_finalized_60_rate_2', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_2', 'value'=>$finalized_90_2, 'id'=>'id_finalized_90_2', 'class'=>'form-control pmq-number-input center month_2', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_2', 'value'=>$finalized_90_rate_2, 'id'=>'id_finalized_90_rate_2', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_2', 'value'=>$finalized_total_2, 'id'=>'id_finalized_total_2', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 3</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_3', 'value'=>$finalized_30_3, 'id'=>'id_finalized_30_3', 'class'=>'form-control pmq-number-input center month_3', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_3', 'value'=>$finalized_30_rate_3, 'id'=>'id_finalized_30_rate_3', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_3', 'value'=>$finalized_60_3, 'id'=>'id_finalized_60_3', 'class'=>'form-control pmq-number-input center month_3', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_3', 'value'=>$finalized_60_rate_3, 'id'=>'id_finalized_60_rate_3', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_3', 'value'=>$finalized_90_3, 'id'=>'id_finalized_90_3', 'class'=>'form-control pmq-number-input center month_3', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_3', 'value'=>$finalized_90_rate_3, 'id'=>'id_finalized_90_rate_3', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_3', 'value'=>$finalized_total_3, 'id'=>'id_finalized_total_3', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 4</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_4', 'value'=>$finalized_30_4, 'id'=>'id_finalized_30_4', 'class'=>'form-control pmq-number-input center month_4', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_4', 'value'=>$finalized_30_rate_4, 'id'=>'id_finalized_30_rate_4', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_4', 'value'=>$finalized_60_4, 'id'=>'id_finalized_60_4', 'class'=>'form-control pmq-number-input center month_4', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_4', 'value'=>$finalized_60_rate_4, 'id'=>'id_finalized_60_rate_4', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_4', 'value'=>$finalized_90_4, 'id'=>'id_finalized_90_4', 'class'=>'form-control pmq-number-input center month_4', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_4', 'value'=>$finalized_90_rate_4, 'id'=>'id_finalized_90_rate_4', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_4', 'value'=>$finalized_total_4, 'id'=>'id_finalized_total_4', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 5</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_5', 'value'=>$finalized_30_5, 'id'=>'id_finalized_30_5', 'class'=>'form-control pmq-number-input center month_5', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_5', 'value'=>$finalized_30_rate_5, 'id'=>'id_finalized_30_rate_5', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_5', 'value'=>$finalized_60_5, 'id'=>'id_finalized_60_5', 'class'=>'form-control pmq-number-input center month_5', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_5', 'value'=>$finalized_60_rate_5, 'id'=>'id_finalized_60_rate_5', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_5', 'value'=>$finalized_90_5, 'id'=>'id_finalized_90_5', 'class'=>'form-control pmq-number-input center month_5', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_5', 'value'=>$finalized_90_rate_5, 'id'=>'id_finalized_90_rate_5', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_5', 'value'=>$finalized_total_5, 'id'=>'id_finalized_total_5', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 6</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_6', 'value'=>$finalized_30_6, 'id'=>'id_finalized_30_6', 'class'=>'form-control pmq-number-input center month_6', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_6', 'value'=>$finalized_30_rate_6, 'id'=>'id_finalized_30_rate_6', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_6', 'value'=>$finalized_60_6, 'id'=>'id_finalized_60_6', 'class'=>'form-control pmq-number-input center month_6', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_6', 'value'=>$finalized_60_rate_6, 'id'=>'id_finalized_60_rate_6', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_6', 'value'=>$finalized_90_6, 'id'=>'id_finalized_90_6', 'class'=>'form-control pmq-number-input center month_6', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_6', 'value'=>$finalized_90_rate_6, 'id'=>'id_finalized_90_rate_6', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_6', 'value'=>$finalized_total_6, 'id'=>'id_finalized_total_6', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 7</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_7', 'value'=>$finalized_30_7, 'id'=>'id_finalized_30_7', 'class'=>'form-control pmq-number-input center month_7', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_7', 'value'=>$finalized_30_rate_7, 'id'=>'id_finalized_30_rate_7', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_7', 'value'=>$finalized_60_7, 'id'=>'id_finalized_60_7', 'class'=>'form-control pmq-number-input center month_7', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_7', 'value'=>$finalized_60_rate_7, 'id'=>'id_finalized_60_rate_7', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_7', 'value'=>$finalized_90_7, 'id'=>'id_finalized_90_7', 'class'=>'form-control pmq-number-input center month_7', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_7', 'value'=>$finalized_90_rate_7, 'id'=>'id_finalized_90_rate_7', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_7', 'value'=>$finalized_total_7, 'id'=>'id_finalized_total_7', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 8</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_8', 'value'=>$finalized_30_8, 'id'=>'id_finalized_30_8', 'class'=>'form-control pmq-number-input center month_8', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_8', 'value'=>$finalized_30_rate_8, 'id'=>'id_finalized_30_rate_8', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_8', 'value'=>$finalized_60_8, 'id'=>'id_finalized_60_8', 'class'=>'form-control pmq-number-input center month_8', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_8', 'value'=>$finalized_60_rate_8, 'id'=>'id_finalized_60_rate_8', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_8', 'value'=>$finalized_90_8, 'id'=>'id_finalized_90_8', 'class'=>'form-control pmq-number-input center month_8', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_8', 'value'=>$finalized_90_rate_8, 'id'=>'id_finalized_90_rate_8', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_8', 'value'=>$finalized_total_8, 'id'=>'id_finalized_total_8', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 9</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_9', 'value'=>$finalized_30_9, 'id'=>'id_finalized_30_9', 'class'=>'form-control pmq-number-input center month_9', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_9', 'value'=>$finalized_30_rate_9, 'id'=>'id_finalized_30_rate_9', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_9', 'value'=>$finalized_60_9, 'id'=>'id_finalized_60_9', 'class'=>'form-control pmq-number-input center month_9', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_9', 'value'=>$finalized_60_rate_9, 'id'=>'id_finalized_60_rate_9', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_9', 'value'=>$finalized_90_9, 'id'=>'id_finalized_90_9', 'class'=>'form-control pmq-number-input center month_9', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_9', 'value'=>$finalized_90_rate_9, 'id'=>'id_finalized_90_rate_9', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_9', 'value'=>$finalized_total_9, 'id'=>'id_finalized_total_9', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 10</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_10', 'value'=>$finalized_30_10, 'id'=>'id_finalized_30_10', 'class'=>'form-control pmq-number-input center month_10', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_10', 'value'=>$finalized_30_rate_10, 'id'=>'id_finalized_30_rate_10', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_10', 'value'=>$finalized_60_10, 'id'=>'id_finalized_60_10', 'class'=>'form-control pmq-number-input center month_10', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_10', 'value'=>$finalized_60_rate_10, 'id'=>'id_finalized_60_rate_10', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_10', 'value'=>$finalized_90_10, 'id'=>'id_finalized_90_10', 'class'=>'form-control pmq-number-input center month_10', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_10', 'value'=>$finalized_90_rate_10, 'id'=>'id_finalized_90_rate_10', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_10', 'value'=>$finalized_total_10, 'id'=>'id_finalized_total_10', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> Month 11</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_11', 'value'=>$finalized_30_11, 'id'=>'id_finalized_30_11', 'class'=>'form-control pmq-number-input center month_11', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_11', 'value'=>$finalized_30_rate_11, 'id'=>'id_finalized_30_rate_11', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_11', 'value'=>$finalized_60_11, 'id'=>'id_finalized_60_11', 'class'=>'form-control pmq-number-input center month_11', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_11', 'value'=>$finalized_60_rate_11, 'id'=>'id_finalized_60_rate_11', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_11', 'value'=>$finalized_90_11, 'id'=>'id_finalized_90_11', 'class'=>'form-control pmq-number-input center month_11', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_11', 'value'=>$finalized_90_rate_11, 'id'=>'id_finalized_90_rate_11', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_11', 'value'=>$finalized_total_11, 'id'=>'id_finalized_total_11', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr class="du">
			<td><b> Month 12</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_12', 'value'=>$finalized_30_12, 'id'=>'id_finalized_30_12', 'class'=>'form-control pmq-number-input center month_12', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_30_rate_12', 'value'=>$finalized_30_rate_12, 'id'=>'id_finalized_30_rate_12', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_12', 'value'=>$finalized_60_12, 'id'=>'id_finalized_60_12', 'class'=>'form-control pmq-number-input center month_12', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_60_rate_12', 'value'=>$finalized_60_rate_12, 'id'=>'id_finalized_60_rate_12', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_12', 'value'=>$finalized_90_12, 'id'=>'id_finalized_90_12', 'class'=>'form-control pmq-number-input center month_12', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_90_rate_12', 'value'=>$finalized_90_rate_12, 'id'=>'id_finalized_90_rate_12', 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_12', 'value'=>$finalized_total_12, 'id'=>'id_finalized_total_12', 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr>
			<td><b> 12 Month Total</b></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_30', 'id'=>'id_finalized_total_30', 'value'=>$finalized_total_30, 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_rate_30', 'id'=>'id_finalized_total_rate_30', 'value'=>$finalized_total_rate_30, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_60', 'id'=>'id_finalized_total_60', 'value'=>$finalized_total_60, 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_rate_60', 'id'=>'id_finalized_total_rate_60', 'value'=>$finalized_total_rate_60, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_90', 'id'=>'id_finalized_total_90', 'value'=>$finalized_total_90, 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_rate_90', 'id'=>'id_finalized_total_rate_90', 'value'=>$finalized_total_rate_90, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'finalized_total_all', 'id'=>'id_finalized_total_all', 'value'=>$finalized_total_all, 'class'=>'form-control pmq-number-input notab center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>

	</table>
<?php if($this->action !== 'completed'){?>
			<div class="form-group mt15">
				<div class="col-xs-12" style="text-align:center !important;">
					<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
					<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
				</div>
			</div>
<?php }
	echo form_hidden('fkidMission', $get_missions[0]['MissionId']);
	echo form_close(); ?>
</fieldset>
</div>