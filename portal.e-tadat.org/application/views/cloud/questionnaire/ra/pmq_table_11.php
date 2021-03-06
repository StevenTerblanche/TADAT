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

	$arrTrc = _get_fields_by_id_array('cloud_questions', 'pmq_table_1', 'fkidMission', $get_missions[0]['MissionId'], $out = array('a_total_revenue_collections','b_total_revenue_collections','c_total_revenue_collections'));
?>
<div class="col-md-12 pl0 pr0 ml0 mr0">
<fieldset <?php echo $strFieldsetStatus; ?>>
<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'form-submit')); ?>
	<table class="table table-striped pmq-table" style="width:98% !important">
		<tr class="dark-blue">
			<td class="bld wp-55"><p>11.1 IN LOCAL CURRENCY</p></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr class="du">
			<td><strong>Total annual tax revenue collections (A)</strong> (Figures derived from from Table 1 - Tax Revenue Collections)</td>
			<td class="center"><?php echo form_input(array('id'=>'id_ttrc_1', 'name'=>'ttrc_1', 'value'=>$arrTrc['a_total_revenue_collections'], 'class'=>'form-control pmq-decimal-input center', 'disabled'=>'disabled'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_ttrc_2', 'name'=>'ttrc_2', 'value'=>$arrTrc['b_total_revenue_collections'], 'class'=>'form-control pmq-decimal-input center', 'disabled'=>'disabled'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_ttrc_3', 'name'=>'ttrc_3', 'value'=>$arrTrc['c_total_revenue_collections'], 'class'=>'form-control pmq-decimal-input center', 'disabled'=>'disabled'));?></td>
		</tr>
		<tr>
			<td>11.1.1 Total collectible<sup>3</sup> tax arrears at end of fiscal year (C)</td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_collect_1', 'name'=>'arrears_collect_1', 'value'=>$arrears_collect_1, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'1'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_collect_2', 'name'=>'arrears_collect_2', 'value'=>$arrears_collect_2, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'3'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_collect_3', 'name'=>'arrears_collect_3', 'value'=>$arrears_collect_3, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'5'));?></td>
		</tr>
		<tr class="du">
			<td>11.1.2 Tax arrears that are more than 12 months old (D)</td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_old_1', 'name'=>'arrears_old_1', 'value'=>$arrears_old_1, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'2'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_old_2', 'name'=>'arrears_old_2', 'value'=>$arrears_old_2, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'4'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_old_3', 'name'=>'arrears_old_3', 'value'=>$arrears_old_3, 'class'=>'form-control pmq-decimal-input center', 'required'=>'', 'tabindex'=>'6'));?></td>
		</tr>
		
		<tr>
			<td><strong>Total tax arrears at end of fiscal year<sup>3</sup> (B)</strong></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_total_1', 'name'=>'arrears_total_1', 'value'=>$arrears_total_1, 'class'=>'form-control pmq-decimal-input center', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_total_2', 'name'=>'arrears_total_2', 'value'=>$arrears_total_2, 'class'=>'form-control pmq-decimal-input center', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_total_3', 'name'=>'arrears_total_3', 'value'=>$arrears_total_3, 'class'=>'form-control pmq-decimal-input center', 'readonly'=>'readonly'));?></td>
		</tr>

		<tr class="dark-blue">
			<td class="bld wp-55"><p>11.2 IN PERCENT OF TOTAL TAX ARREARS</p></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td>11.2.1 Ratio of (B) to (A)</td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_a_1', 'name'=>'arrears_ratio_a_1', 'value'=>$arrears_ratio_a_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_a_2', 'name'=>'arrears_ratio_a_2', 'value'=>$arrears_ratio_a_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_a_3', 'name'=>'arrears_ratio_a_3', 'value'=>$arrears_ratio_a_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td>11.2.2 Ratio of (C) to (A)</td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_b_1', 'name'=>'arrears_ratio_b_1', 'value'=>$arrears_ratio_b_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_b_2', 'name'=>'arrears_ratio_b_2', 'value'=>$arrears_ratio_b_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_b_3', 'name'=>'arrears_ratio_b_3', 'value'=>$arrears_ratio_b_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td>11.2.3 Ratio of (D) to (B)</td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_c_1', 'name'=>'arrears_ratio_c_1', 'value'=>$arrears_ratio_c_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_c_2', 'name'=>'arrears_ratio_c_2', 'value'=>$arrears_ratio_c_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_arrears_ratio_c_3', 'name'=>'arrears_ratio_c_3', 'value'=>$arrears_ratio_c_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr><td colspan="4">
				<p><b>Explanatory notes:</b></p>
				<p><sup>1</sup>Data in this table will be used in assessing the value of tax arrears relative to annual collections, and examining the extent to which unpaid tax liabilities are significantly overdue (i.e. older than 12 months).</p>
				<p><sup>2</sup>'Total tax arrears' include tax, penalties, and accumulated interest.</p>
				<p><sup>3</sup>'Collectible' tax arrears is defined as the total amount of domestic tax, including interest and penalties, that is overdue for payment and which is not subject to collection impediments. Collectible tax arrears therefore generally exclude: </p>
				<ul>
					<li>amounts formally disputed by the taxpayer and for which collection action has been suspended pending the outcome</li>
					<li>amounts that are not legally recoverable (e.g., debt foregone through bankruptcy)</li>
					<li>arrears otherwise uncollectible (e.g., the debtor has no funds or other assets).</li>
				</ul>

		</td></tr>

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