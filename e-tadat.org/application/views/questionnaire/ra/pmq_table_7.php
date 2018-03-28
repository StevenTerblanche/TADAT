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
			<td class="bld wp-25"><p>Month</p></td>
			<td class="center bld wp-25"><p>Number of returns filed on-time<sup>1</sup></p></td>
			<td class="center bld wp-25"><p>Number of returns expected to be filed<sup>2</sup></p></td>
			<td class="center bld wp-25"><p>On-time filing rate<sup>3</sup> (In percent)</p></td>
		</tr>
		<tr>
			<td><b>7.1.1 Month 1</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_1', 'value'=>$filing_vat_large_filed_1, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_1', 'value'=>$filing_vat_large_expected_1, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_1', 'value'=>$filing_vat_large_rate_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.2 Month 2</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_2', 'value'=>$filing_vat_large_filed_2, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_2', 'value'=>$filing_vat_large_expected_2, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_2', 'value'=>$filing_vat_large_rate_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.3 Month 3</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_3', 'value'=>$filing_vat_large_filed_3, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_3', 'value'=>$filing_vat_large_expected_3, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_3', 'value'=>$filing_vat_large_rate_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.4 Month 4</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_4', 'value'=>$filing_vat_large_filed_4, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_4', 'value'=>$filing_vat_large_expected_4, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_4', 'value'=>$filing_vat_large_rate_4, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.5 Month 5</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_5', 'value'=>$filing_vat_large_filed_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_5', 'value'=>$filing_vat_large_expected_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_5', 'value'=>$filing_vat_large_rate_5, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.6 Month 6</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_6', 'value'=>$filing_vat_large_filed_6, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_6', 'value'=>$filing_vat_large_expected_6, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_6', 'value'=>$filing_vat_large_rate_6, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.7 Month 7</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_7', 'value'=>$filing_vat_large_filed_7, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_7', 'value'=>$filing_vat_large_expected_7, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_7', 'value'=>$filing_vat_large_rate_7, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.8 Month 8</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_8', 'value'=>$filing_vat_large_filed_8, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_8', 'value'=>$filing_vat_large_expected_8, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_8', 'value'=>$filing_vat_large_rate_8, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.9 Month 9</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_9', 'value'=>$filing_vat_large_filed_9, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_9', 'value'=>$filing_vat_large_expected_9, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_9', 'value'=>$filing_vat_large_rate_9, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.10 Month 10</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_10', 'value'=>$filing_vat_large_filed_10, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_10', 'value'=>$filing_vat_large_expected_10, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_10', 'value'=>$filing_vat_large_rate_10, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.11 Month 11</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_11', 'value'=>$filing_vat_large_filed_11, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_11', 'value'=>$filing_vat_large_expected_11, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_11', 'value'=>$filing_vat_large_rate_11, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr class="du">
			<td><b>7.1.12 Month 12</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_12', 'value'=>$filing_vat_large_filed_12, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_12', 'value'=>$filing_vat_large_expected_12, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_12', 'value'=>$filing_vat_large_rate_12, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>7.1.13 Full Year Total</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_filed_total', 'id'=>'id_filing_vat_large_filed_total', 'value'=>$filing_vat_large_filed_total, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_expected_total', 'id'=>'id_filing_vat_large_expected_total', 'value'=>$filing_vat_large_expected_total, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_large_rate_total', 'id'=>'id_filing_vat_large_rate_total', 'value'=>$filing_vat_large_rate_total, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>										
			<td colspan="4">
				<p><b>Explanatory notes:</b></p>
				<p><sup>1</sup>'On-time' filing means declarations filed by the statutory due date for filing (plus any 'days of grace' applied by the tax administration as a matter of administrative policy).</p>
				<p><sup>2</sup>'Expected declarations' means the number of VAT declarations that the tax administration expected to receive from large taxpayers that were required by law to file VAT declarations.</p>
				<p><sup>3</sup>The 'on-time filing rate' is the number of VAT declarations filed by large taxpayers by the statutory due date as a percentage of the total number of VAT declarations expected from large taxpayers, expressed as a ratio.</p>
			</td>
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