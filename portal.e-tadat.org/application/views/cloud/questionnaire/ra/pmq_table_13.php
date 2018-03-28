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
?>
<div class="col-md-12 pl0 pr0 ml0 mr0">
<fieldset <?php echo $strFieldsetStatus; ?>>
<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'form-submit')); ?>
	<table class="table table-striped pmq-table" style="width:98% !important">
		<tr class="dark-blue">
			<td colspan="2">&nbsp;</td>
			<td class="center bld wp-15">NUMBER OF CASES</td>
			<td class="center bld wp-15">IN LOCAL CURRENCY</td>
	
		</tr>
		<tr class="du">
			<td colspan="2">13.1 Total VAT refund claims received (A)</td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_received_number', 'name'=>'claims_received_number', 'value'=>$claims_received_number, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_received_value', 'name'=>'claims_received_value', 'value'=>$claims_received_value, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>

		</tr>
		<tr class="dark-blue">
			<td colspan="4">13.2 VAT REFUNDS PAID<sup>1</sup></td>
		</tr>
		<tr>
			<td style="width:30px !important"></td>
			<td>13.2.1 VAT refunds paid within 30 days (B)<sup>2</sup></td>
			<td class="center"><?php echo form_input(array('id'=>'id_paid_within_30_number', 'name'=>'paid_within_30_number', 'value'=>$paid_within_30_number, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_paid_within_30_value', 'name'=>'paid_within_30_value', 'value'=>$paid_within_30_value, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
		</tr>
		<tr class="du">
			<td style="width:30px !important"></td>
			<td>13.2.2 VAT refunds paid outside 30 days</td>
			<td class="center"><?php echo form_input(array('id'=>'id_paid_outside_30_number', 'name'=>'paid_outside_30_number', 'value'=>$paid_outside_30_number, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_paid_outside_30_value', 'name'=>'paid_outside_30_value', 'value'=>$paid_outside_30_value, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
		</tr>
		<tr>
			<td style="width:30px !important"></td>
			<td> <b>TOTAL VAT REFUNDS PAID<sup>1</sup></b></td>
			<td class="center"><?php echo form_input(array('id'=>'id_refunds_paid_number_total', 'name'=>'refunds_paid_number_total', 'value'=>$refunds_paid_number_total, 'class'=>'form-control pmq-decimal-input center',  'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_refunds_paid_value_total', 'name'=>'refunds_paid_value_total', 'value'=>$refunds_paid_value_total, 'class'=>'form-control pmq-decimal-input center',  'readonly'=>'readonly'));?></td>
		</tr>
	
		
		<tr>
			<td colspan="2">13.3 VAT refund claims declined<sup>3</sup></td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_declined_number', 'name'=>'claims_declined_number', 'value'=>$claims_declined_number, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_declined_value', 'name'=>'claims_declined_value', 'value'=>$claims_declined_value, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>

		</tr>

		<tr class="dark-blue">
			<td colspan="4" class="bld">13.4 VAT REFUND CLAIMS NOT PROCESSED<sup>4</sup></td>
		</tr>
		<tr>
			<td style="width:30px !important"></td>
			<td>13.4.1 Of which: no decision taken to decline refund</td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_undecided_number', 'name'=>'claims_undecided_number', 'value'=>$claims_undecided_number, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_undecided_value', 'name'=>'claims_undecided_value', 'value'=>$claims_undecided_value, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>

		</tr>
		<tr class="du">
			<td style="width:30px !important"></td>
			<td>13.4.2 Of which: approved but not yet paid or offset</td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_not_paid_number', 'name'=>'claims_not_paid_number', 'value'=>$claims_not_paid_number, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_not_paid_value', 'name'=>'claims_not_paid_value', 'value'=>$claims_not_paid_value, 'class'=>'form-control pmq-decimal-input calculate center'));?></td>
		</tr>

		<tr>
			<td style="width:30px !important"></td>		
			<td class="bld">TOTAL VAT REFUND CLAIMS NOT PROCESSED<sup>4</sup></td>
			<td class="center bld wp-15"><?php echo form_input(array('id'=>'id_claims_unprocessed_number', 'name'=>'claims_unprocessed_number', 'value'=>$claims_unprocessed_number, 'class'=>'form-control pmq-decimal-input center',  'readonly'=>'readonly'));?></td>
			<td class="center bld wp-15"><?php echo form_input(array('id'=>'id_claims_unprocessed_value', 'name'=>'claims_unprocessed_value', 'value'=>$claims_unprocessed_value, 'class'=>'form-control pmq-decimal-input center',  'readonly'=>'readonly'));?></td>

		</tr>

		
		<tr>
			<td colspan="2">13.5 Ratio of (B) to (A)<sup>5</sup></td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_ratio_number', 'name'=>'claims_ratio_number', 'value'=>$claims_ratio_number, 'class'=>'form-control pmq-percentage-input center',  'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_claims_ratio_value', 'name'=>'claims_ratio_value', 'value'=>$claims_ratio_value, 'class'=>'form-control pmq-percentage-input center',  'readonly'=>'readonly'));?></td>

		</tr>
		<tr><td colspan="4">
				<p><b>Explanatory notes:</b></p>
				<p><sup>1</sup>Include all refunds paid, as well as refunds offset against other tax liabilities.</p>
				<p><sup>2</sup>TADAT measures performance against a 30-day standard.</p>
				<p><sup>3</sup>Include cases where a formal decision has been taken to decline (refuse) the taxpayer's claim for refund (e.g., where the legal requirements for refund have not been met).</p>
				<p><sup>4</sup>Include all cases where refund processing is incomplete—i.e. where (a) the formal decision has not been taken to decline the refund claim; or (b) the refund has been approved but not paid or offset.</p>
				<p><sup>5</sup>i.e. (Value of VAT refunds paid within 30 days / Value of all VAT refund claims received) x 100.</p>

		</td></tr>

<?php if($this->action !== 'completed'){?>
		<tr><td colspan="5">
			<div class="form-group mt25">
				<div class="col-xs-12" style="text-align:center !important;">
					<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
					<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
				
				</div>
			</div>
		</td></tr>
<?php }?>		
	</table>
					
	<?php 
	echo form_hidden('fkidMission', $get_missions[0]['MissionId']);
	echo form_close(); ?>
</fieldset>
</div>