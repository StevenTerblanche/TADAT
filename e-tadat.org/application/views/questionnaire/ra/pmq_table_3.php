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
				<td class="bld wp-25">&nbsp;</td>
				<td class="center bld wp-25">&nbsp;</td>
				<td colspan="2" class="center bld wp-25"><p>Telephone enquiry calls answered within 6 minutes' waiting time</p></td>
				</tr>
		<tr class="dark-blue">
			<td class="bld wp-25"><p>Month</p></td>
			<td class="center bld wp-25"><p>Total number of telephone enquiry calls received</p></td>
			<td class="center bld wp-25"><p>Number</p></td>
			<td class="center bld wp-25"><p>In percent of total calls</p></td>
		</tr>
		<tr>
			<td><b>3.1.1 Month 1</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_1', 'value'=>$calls_received_1, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_1', 'value'=>$calls_received_within_1, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_1', 'value'=>$call_received_rate_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.2 Month 2</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_2', 'value'=>$calls_received_2, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_2', 'value'=>$calls_received_within_2, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_2', 'value'=>$call_received_rate_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.3 Month 3</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_3', 'value'=>$calls_received_3, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_3', 'value'=>$calls_received_within_3, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_3', 'value'=>$call_received_rate_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.4 Month 4</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_4', 'value'=>$calls_received_4, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_4', 'value'=>$calls_received_within_4, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_4', 'value'=>$call_received_rate_4, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.5 Month 5</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_5', 'value'=>$calls_received_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_5', 'value'=>$calls_received_within_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_5', 'value'=>$call_received_rate_5, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.6 Month 6</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_6', 'value'=>$calls_received_6, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_6', 'value'=>$calls_received_within_6, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_6', 'value'=>$call_received_rate_6, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.7 Month 7</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_7', 'value'=>$calls_received_7, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_7', 'value'=>$calls_received_within_7, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_7', 'value'=>$call_received_rate_7, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.8 Month 8</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_8', 'value'=>$calls_received_8, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_8', 'value'=>$calls_received_within_8, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_8', 'value'=>$call_received_rate_8, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.9 Month 9</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_9', 'value'=>$calls_received_9, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_9', 'value'=>$calls_received_within_9, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_9', 'value'=>$call_received_rate_9, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.10 Month 10</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_10', 'value'=>$calls_received_10, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_10', 'value'=>$calls_received_within_10, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_10', 'value'=>$call_received_rate_10, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.11 Month 11</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_11', 'value'=>$calls_received_11, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_11', 'value'=>$calls_received_within_11, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_11', 'value'=>$call_received_rate_11, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr class="du">
			<td><b>3.1.12 Month 12</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_12', 'value'=>$calls_received_12, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_12', 'value'=>$calls_received_within_12, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_12', 'value'=>$call_received_rate_12, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>3.1.13 12 Month Total</b></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_total', 'id'=>'id_calls_received_total', 'value'=>$calls_received_total, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'calls_received_within_total', 'id'=>'id_calls_received_within_total', 'value'=>$calls_received_within_total, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'call_received_rate_total', 'id'=>'id_call_received_rate_total', 'value'=>$call_received_rate_total, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
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