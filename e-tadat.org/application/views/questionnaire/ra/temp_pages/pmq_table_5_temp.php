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
			<td class="bld wp-25"><p>Tax Type</p></td>
			<td class="center bld wp-25"><p>Number of returns filed on-time<sup>1</sup></p></td>
			<td class="center bld wp-25"><p>Number of returns expected to be filed<sup>2</sup></p></td>
			<td class="center bld wp-25"><p>On-time filing rate<sup>3</sup> (In percent)</p></td>
		</tr>
		<tr>
			<td><b>5.1.1 Number of payments</td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_paid_number', 'id'=>'id_filing_vat_paid_number', 'value'=>$filing_vat_paid_number, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_due_number', 'id'=>'id_filing_vat_due_number', 'value'=>$filing_vat_due_number, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_payment_number', 'id'=>'id_filing_vat_payment_number', 'value'=>$filing_vat_payment_number, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td><b>5.1.2 Value of payments</b></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_paid_value', 'id'=>'id_filing_vat_paid_value', 'value'=>$filing_vat_paid_value, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_due_value', 'id'=>'id_filing_vat_due_value', 'value'=>$filing_vat_due_value, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_vat_payment_value', 'id'=>'id_filing_vat_payment_value', 'value'=>$filing_vat_payment_value, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		<tr>
			<td colspan="4">
				<p><b>Explanatory notes:</b></p><p><sup>1</sup> 'On-time' filing means paid on or before the statutory due date for payment.</p><p><sup>2</sup> 'Payments due' includes all payments due, whether self-assessed or administratively assessed (including as a result of an audit).</p><p><sup>3</sup> The 'on-time payment rate' is the number (or value) of VAT payments made by the statutory due date in percent of the total number (or value) of VAT payments due, i.e. expressed as ratios:
					<ul>
						<li style="margin-top:12px !important;">>The on-time payment rate by number is:
							<math xmlns='http://www.w3.org/1998/Math/MathML'>
								<mfrac>
									<mrow> <mi>Number of VAT payments made by the due date</mi> </mrow>
									<mn>Total number of VAT payments due</mn>
								</mfrac>
								<mi>x</mi><mn>100</mn>
							</math>
						</li>
						<li style="margin-top:20px !important;">The on-time payment rate by value is:
							<math xmlns='http://www.w3.org/1998/Math/MathML'>
								<mfrac>
									<mrow> <mi>Value of VAT payments made by the due date</mi> </mrow>
									<mn>Total value of VAT payments due</mn>
								</mfrac>
								<mi>x</mi><mn>100</mn>
							</math>
						</li>
					</ul>
				</p>
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