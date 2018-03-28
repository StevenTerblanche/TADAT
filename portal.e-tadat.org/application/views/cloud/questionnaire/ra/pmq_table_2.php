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
	$temp = '';
	
?>
<div class="col-md-12 pl0 pr0 ml0 mr0">
<fieldset <?php echo $strFieldsetStatus; ?>>
<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'form-submit')); ?>
	<table class="table table-striped pmq-table" style="width:98% !important">
		<tr class="dark-blue">
			<td class="bld wp-20"><p>Month</p></td>
			<td class="center bld wp-16"><p>Active<sup>1</sup>[A]</p></td>
			<td class="center bld wp-16"><p>Inactive (not yet registered)<sup></sup> [B]</p></td>
			<td class="center bld wp-16">Total end-year position [A + B]</td>
			<td class="center bld wp-16">Percentage of inactive (not yet registered)</td>
			<td class="center bld wp-16"><p>Deregistered during the year</p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="5" class="center"><strong>PERIOD: <?php echo $periods[0];?></strong></td>
		</tr>
		<tr>
			<td><b>2.1.1 Corporate income tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_1_1_1', 'value'=>$corporate_2_1_1_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_1_1_2', 'value'=>$corporate_2_1_1_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_1_1_3', 'value'=>$corporate_2_1_1_3, 'class'=>'form-control pmq-total-input center totalled', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_1_1_4', 'value'=>$corporate_2_1_1_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_1_1_5', 'value'=>$corporate_2_1_1_5, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.1.2 Personal income tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_1_2_1', 'value'=>$personal_2_1_2_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_1_2_2', 'value'=>$personal_2_1_2_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_1_2_3', 'value'=>$personal_2_1_2_3, 'class'=>'form-control pmq-total-input center totalled', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_1_2_4', 'value'=>$personal_2_1_2_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_1_2_5', 'value'=>$personal_2_1_2_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.1.3 PAYE witholding (# of employers)</b></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_1_3_1', 'value'=>$paye_2_1_3_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_1_3_2', 'value'=>$paye_2_1_3_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_1_3_3', 'value'=>$paye_2_1_3_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_1_3_4', 'value'=>$paye_2_1_3_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_1_3_5', 'value'=>$paye_2_1_3_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.1.4 Value Added tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_1_4_1', 'value'=>$vat_2_1_4_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_1_4_2', 'value'=>$vat_2_1_4_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_1_4_3', 'value'=>$vat_2_1_4_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_1_4_4', 'value'=>$vat_2_1_4_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_1_4_5', 'value'=>$vat_2_1_4_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.1.5 Domestic excise tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_1_5_1', 'value'=>$domestic_2_1_5_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_1_5_2', 'value'=>$domestic_2_1_5_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_1_5_3', 'value'=>$domestic_2_1_5_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_1_5_4', 'value'=>$domestic_2_1_5_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_1_5_5', 'value'=>$domestic_2_1_5_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.1.6 Other taxpayers</b></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_1_6_1', 'value'=>$other_2_1_6_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_1_6_2', 'value'=>$other_2_1_6_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_1_6_3', 'value'=>$other_2_1_6_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_1_6_4', 'value'=>$other_2_1_6_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_1_6_5', 'value'=>$other_2_1_6_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td colspan="5" class="center"><strong>PERIOD: <?php echo $periods[1];?></strong></td>
		</tr>
		<tr>
			<td><b>2.2.1 Corporate income tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_2_1_1', 'value'=>$corporate_2_2_1_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_2_1_2', 'value'=>$corporate_2_2_1_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_2_1_3', 'value'=>$corporate_2_2_1_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_2_1_4', 'value'=>$corporate_2_2_1_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_2_1_5', 'value'=>$corporate_2_2_1_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.2.2 Personal income tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_2_2_1', 'value'=>$personal_2_2_2_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_2_2_2', 'value'=>$personal_2_2_2_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_2_2_3', 'value'=>$personal_2_2_2_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_2_2_4', 'value'=>$personal_2_2_2_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_2_2_5', 'value'=>$personal_2_2_2_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.2.3 PAYE witholding (# of employers)</b></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_2_3_1', 'value'=>$paye_2_2_3_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_2_3_2', 'value'=>$paye_2_2_3_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_2_3_3', 'value'=>$paye_2_2_3_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_2_3_4', 'value'=>$paye_2_2_3_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_2_3_5', 'value'=>$paye_2_2_3_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.2.4 Value Added tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_2_4_1', 'value'=>$vat_2_2_4_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_2_4_2', 'value'=>$vat_2_2_4_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_2_4_3', 'value'=>$vat_2_2_4_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_2_4_4', 'value'=>$vat_2_2_4_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_2_4_5', 'value'=>$vat_2_2_4_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.2.5 Domestic excise tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_2_5_1', 'value'=>$domestic_2_2_5_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_2_5_2', 'value'=>$domestic_2_2_5_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_2_5_3', 'value'=>$domestic_2_2_5_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_2_5_4', 'value'=>$domestic_2_2_5_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_2_5_5', 'value'=>$domestic_2_2_5_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.2.6 Other taxpayers</b></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_2_6_1', 'value'=>$other_2_2_6_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_2_6_2', 'value'=>$other_2_2_6_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_2_6_3', 'value'=>$other_2_2_6_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_2_6_4', 'value'=>$other_2_2_6_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_2_6_5', 'value'=>$other_2_2_6_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td colspan="5" class="center"><strong>PERIOD: <?php echo $periods[2];?></strong></td>
		</tr>
		<tr>
			<td><b>2.3.1 Corporate income tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_3_1_1', 'value'=>$corporate_2_3_1_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_3_1_2', 'value'=>$corporate_2_3_1_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_3_1_3', 'value'=>$corporate_2_3_1_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_3_1_4', 'value'=>$corporate_2_3_1_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'corporate_2_3_1_5', 'value'=>$corporate_2_3_1_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.3.2 Personal income tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_3_2_1', 'value'=>$personal_2_3_2_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_3_2_2', 'value'=>$personal_2_3_2_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_3_2_3', 'value'=>$personal_2_3_2_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_3_2_4', 'value'=>$personal_2_3_2_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'personal_2_3_2_5', 'value'=>$personal_2_3_2_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.3.3 PAYE witholding (# of employers)</b></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_3_3_1', 'value'=>$paye_2_3_3_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_3_3_2', 'value'=>$paye_2_3_3_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_3_3_3', 'value'=>$paye_2_3_3_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_3_3_4', 'value'=>$paye_2_3_3_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'paye_2_3_3_5', 'value'=>$paye_2_3_3_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.3.4 Value Added tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_3_4_1', 'value'=>$vat_2_3_4_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_3_4_2', 'value'=>$vat_2_3_4_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_3_4_3', 'value'=>$vat_2_3_4_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_3_4_4', 'value'=>$vat_2_3_4_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'vat_2_3_4_5', 'value'=>$vat_2_3_4_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.3.5 Domestic excise tax</b></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_3_5_1', 'value'=>$domestic_2_3_5_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_3_5_2', 'value'=>$domestic_2_3_5_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_3_5_3', 'value'=>$domestic_2_3_5_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_3_5_4', 'value'=>$domestic_2_3_5_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'domestic_2_3_5_5', 'value'=>$domestic_2_3_5_5, 'class'=>'form-control pmq-number-input center calculate', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>2.3.6 Other taxpayers</b></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_3_6_1', 'value'=>$other_2_3_6_1, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_3_6_2', 'value'=>$other_2_3_6_2, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_3_6_3', 'value'=>$other_2_3_6_3, 'class'=>'form-control pmq-total-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_3_6_4', 'value'=>$other_2_3_6_4, 'class'=>'form-control pmq-percentage-input-center center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'other_2_3_6_5', 'value'=>$other_2_3_6_5, 'class'=>'form-control pmq-number-input center calculated', 'required'=>''));?></td>
		</tr>
		<tr>
			<td colspan="6">
				<p><b>Explanatory notes:</b></p>
				<p><sup>1</sup>'Active' taxpayers means registrants from whom tax declarations (returns) are expected (i.e. 'active' taxpayers exclude those who have not filed a declaration within at least the last year because the case is defunct (e.g., a business taxpayer has ceased trading or an individual is deceased, the taxpayer cannot be located, or the taxpayer is insolvent).</p>
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