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
	$arrTrc = _get_fields_by_id_array('db_b', 'pmq_table_1', 'fkidMission', $get_missions[0]['MissionId'], $out = array('a_total_revenue_collections','b_total_revenue_collections','c_total_revenue_collections'));
	$periods = explode("/", $get_missions[0]['period']);
?>
<div class="col-md-12 pl0 pr0 ml0 mr0">
<fieldset <?php echo $strFieldsetStatus; ?>>
<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'form-submit')); ?>
	<table class="table table-striped pmq-table" style="width:98% !important">
		<tr class="dark-blue">
			<td class="bld wp-15"><p>VALUE OF TAX IN DISPUTE CASES<sup>1</sup></p></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td>8.1.1 Cases which relate to objections (TOMU)<sup>2</sup></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_tomu_1', 'name'=>'objections_tomu_1', 'value'=>$objections_tomu_1, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'tabindex'=>'1'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_tomu_2', 'name'=>'objections_tomu_2', 'value'=>$objections_tomu_2, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'tabindex'=>'4'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_tomu_3', 'name'=>'objections_tomu_3', 'value'=>$objections_tomu_3, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'tabindex'=>'7'));?></td>
		</tr>
		<tr>
			<td>8.1.2 Cases which relate to objections (Audit)<sup>2</sup></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_audit_1', 'name'=>'objections_audit_1', 'value'=>$objections_audit_1, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'tabindex'=>'2'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_audit_2', 'name'=>'objections_audit_2', 'value'=>$objections_audit_2, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'tabindex'=>'5'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_audit_3', 'name'=>'objections_audit_3', 'value'=>$objections_audit_3, 'class'=>'form-control pmq-number-input center', 'required'=>'', 'tabindex'=>'8'));?></td>
		</tr>
		<tr class="du">
			<td>8.1.3 Cases which relate to judicial appeals (Legal)<sup>3</sup></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_judicial_1', 'name'=>'dispute_judicial_1', 'value'=>$dispute_judicial_1, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'3'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_judicial_2', 'name'=>'dispute_judicial_2', 'value'=>$dispute_judicial_2, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'6'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_judicial_3', 'name'=>'dispute_judicial_3', 'value'=>$dispute_judicial_3, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'9'));?></td>
		</tr>
		<tr>
			<td align="right"><b>Total tax in dispute at end of fiscal year (A)</b></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_total_1', 'name'=>'dispute_total_1', 'value'=>$dispute_total_1, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_total_2', 'name'=>'dispute_total_2', 'value'=>$dispute_total_2, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_total_3', 'name'=>'dispute_total_3', 'value'=>$dispute_total_3, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		
		<tr class="dark-blue">
			<td class="bld wp-55"><p>8.2 IN PERCENT OF TOTAL TAX COLLECTIONS</p></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td align="right"><strong>Total annual tax revenue collections (from Table 1)</strong></td>
			<td class="center"><?php echo form_input(array('id'=>'id_ttrc_1', 'name'=>'ttrc_1', 'value'=>$arrTrc['a_total_revenue_collections'], 'class'=>'form-control pmq-decimal-input center', 'disabled'=>'disabled'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_ttrc_2', 'name'=>'ttrc_2', 'value'=>$arrTrc['b_total_revenue_collections'], 'class'=>'form-control pmq-decimal-input center', 'disabled'=>'disabled'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_ttrc_3', 'name'=>'ttrc_3', 'value'=>$arrTrc['c_total_revenue_collections'], 'class'=>'form-control pmq-decimal-input center', 'disabled'=>'disabled'));?></td>
		</tr>
		<tr>
			<td>8.2.1 Ratio of (A) to total annual tax revenue collections (from Table 1)<sup>4</sup></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_ratio_1', 'name'=>'dispute_ratio_1', 'value'=>$dispute_ratio_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_ratio_2', 'name'=>'dispute_ratio_2', 'value'=>$dispute_ratio_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_dispute_ratio_3', 'name'=>'dispute_ratio_3', 'value'=>$dispute_ratio_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td colspan="4">
				<p><b>Explanatory notes:</b></p><p><sup>1</sup> 'Tax in dispute' is defined as tax, interest, and penalties disputed by the taxpayer by way of objection or judicial appeal.</p><p><sup>2</sup> An 'objection' refers to the first stage in attempting to resolve a tax dispute; it is handled <i>within</i> the tax administration.</p><p><sup>3</sup> A judicial appeal occurs when a taxpayer is dissatisfied with the tax administration's decision on an objection and subsequently appeals to an independent external tax tribunal or court to review the case.</p><p><sup>4</sup> i.e. 
					<math xmlns='http://www.w3.org/1998/Math/MathML'>
						<mfrac>
							<mrow> <mi>Value of tax in dispute at end of fiscal year</mi> </mrow>
							<mn>Total annual tax revenue collections for fiscal year</mn>
						</mfrac>
						<mi>x</mi><mn>100</mn>
					</math>
				</p>
			</td>
		</tr>

<?php if($this->action !== 'completed'){?>
		<tr><td colspan="4">
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
	echo form_hidden('period_year_1', $periods[0]);
	echo form_hidden('period_year_2', $periods[1]);
	echo form_hidden('period_year_3', $periods[2]);		
	echo form_close(); ?>
</fieldset>
</div>