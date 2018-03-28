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
		<tr class="dark-blue du">
			<td>&nbsp;</td>
			<td class="center"><?php echo $periods[0];?></td>
			<td class="center"><?php echo $periods[1];?></td>
			<td class="center"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td class="bld wp-55">&nbsp;</td>
			<td colspan="3" align="center" class="center bld wp-15"><p><strong>Electronic filing<sup>2</sup></strong><br>(In percent of all returns filed)</p></td>
			</tr>		
		<tr>
			<td>11.1.1 Company Income Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_filing_percent_1', 'value'=>$cit_electronic_filing_percent_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_filing_percent_2', 'value'=>$cit_electronic_filing_percent_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_filing_percent_3', 'value'=>$cit_electronic_filing_percent_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.1.2 Personal Income Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_filing_percent_1', 'value'=>$pit_electronic_filing_percent_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_filing_percent_2', 'value'=>$pit_electronic_filing_percent_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_filing_percent_3', 'value'=>$pit_electronic_filing_percent_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.1.3 Value Added Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_filing_percent_1', 'value'=>$vat_electronic_filing_percent_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_filing_percent_2', 'value'=>$vat_electronic_filing_percent_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_filing_percent_3', 'value'=>$vat_electronic_filing_percent_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.1.4 Pay as you Earn withholding (returns filed by employers)</td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_filing_percent_1', 'value'=>$paye_electronic_filing_percent_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_filing_percent_2', 'value'=>$paye_electronic_filing_percent_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_filing_percent_3', 'value'=>$paye_electronic_filing_percent_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td colspan="3" align="center" class="center"><p><strong>Electronic  payments<sup>3</sup></strong> <br>(In percent of total <strong>number</strong> of payments received)</p></td>
				</tr>
		<tr>
			<td>11.2.1 Company Income Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_payments_number_1', 'value'=>$cit_electronic_payments_number_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_payments_number_2', 'value'=>$cit_electronic_payments_number_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_payments_number_3', 'value'=>$cit_electronic_payments_number_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.2.2 Personal Income Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_payments_number_1', 'value'=>$pit_electronic_payments_number_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_payments_number_2', 'value'=>$pit_electronic_payments_number_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_payments_number_3', 'value'=>$pit_electronic_payments_number_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.2.3 Value Added Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_payments_number_1', 'value'=>$vat_electronic_payments_number_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_payments_number_2', 'value'=>$vat_electronic_payments_number_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_payments_number_3', 'value'=>$vat_electronic_payments_number_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.2.4 Pay as you Earn withholding (remitted by employers)</td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_payments_number_1', 'value'=>$paye_electronic_payments_number_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_payments_number_2', 'value'=>$paye_electronic_payments_number_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_payments_number_3', 'value'=>$paye_electronic_payments_number_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td colspan="3" align="center" class="center"><p><strong>Electronic  payments<sup>3</sup></strong><br>(In percent of total <strong>value</strong> of payments received)</p></td>
				</tr>
		<tr>
			<td>11.3.1 Company Income Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_payments_value_1', 'value'=>$cit_electronic_payments_value_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_payments_value_2', 'value'=>$cit_electronic_payments_value_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'cit_electronic_payments_value_3', 'value'=>$cit_electronic_payments_value_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.3.2 Personal Income Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_payments_value_1', 'value'=>$pit_electronic_payments_value_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_payments_value_2', 'value'=>$pit_electronic_payments_value_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'pit_electronic_payments_value_3', 'value'=>$pit_electronic_payments_value_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.3.3 Value Added Tax</td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_payments_value_1', 'value'=>$vat_electronic_payments_value_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_payments_value_2', 'value'=>$vat_electronic_payments_value_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_electronic_payments_value_3', 'value'=>$vat_electronic_payments_value_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td>11.3.4 Pay as you Earn withholding (remitted by employers)</td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_payments_value_1', 'value'=>$paye_electronic_payments_value_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_payments_value_2', 'value'=>$paye_electronic_payments_value_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_electronic_payments_value_3', 'value'=>$paye_electronic_payments_value_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr><td colspan="4">
			<p><b>Explanatory notes:</b></p><p><sup>1</sup> Data in this table will provide an indicator of the extent to which the tax administration is using modern technology to transform operations, namely in areas of filing and payment.</p><p><sup>2</sup> For purposes of this table, electronic filing involves facilities that enable taxpayers to complete tax returns on-line and file those returns via the Internet.</p><p><sup>3</sup> Electronic payment methods include Internet payments, phone banking, and direct debit.</p>		
		</td></tr>
<?php if($this->action !== 'completed'){?>
		<tr><td colspan="4">
			<div class="form-group">
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
	echo form_hidden('period_year_1', $periods[0]);
	echo form_hidden('period_year_2', $periods[1]);
	echo form_hidden('period_year_3', $periods[2]);		
	echo form_close(); ?>
</fieldset>
</div>