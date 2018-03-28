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
			<td class="bld wp-55">NUMBER OF UNFINALIZED CASES</td>
			<td class="center bld wp-15"><?php echo $periods[0]-1;?></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td><b>9.1.1 Cases which relate to objections (TOMU)</b></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_tomu_0', 'name'=>'objections_tomu_0', 'value'=>$objections_tomu_0, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_tomu_1', 'name'=>'objections_tomu_1', 'value'=>$objections_tomu_1, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_tomu_2', 'name'=>'objections_tomu_2', 'value'=>$objections_tomu_2, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_tomu_3', 'name'=>'objections_tomu_3', 'value'=>$objections_tomu_3, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>9.1.2 Cases which relate to objections (Audit)</b></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_audit_0', 'name'=>'objections_audit_0', 'value'=>$objections_audit_0, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_audit_1', 'name'=>'objections_audit_1', 'value'=>$objections_audit_1, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_audit_2', 'name'=>'objections_audit_2', 'value'=>$objections_audit_2, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_objections_audit_3', 'name'=>'objections_audit_3', 'value'=>$objections_audit_3, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
		</tr>		
		<tr class="du">
			<td><b>9.1.3 Cases which relate to judicial appeals (Legal)</b></td>
			<td class="center"><?php echo form_input(array('id'=>'id_judicial_appeals_0', 'name'=>'judicial_appeals_0', 'value'=>$judicial_appeals_0, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_judicial_appeals_1', 'name'=>'judicial_appeals_1', 'value'=>$judicial_appeals_1, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_judicial_appeals_2', 'name'=>'judicial_appeals_2', 'value'=>$judicial_appeals_2, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_judicial_appeals_3', 'name'=>'judicial_appeals_3', 'value'=>$judicial_appeals_3, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
		</tr>				
		<tr>
			<td align="right"><b>Total number of unfinalized cases at end of fiscal year</b></td>
			<td class="center"><?php echo form_input(array('id'=>'id_unfinalized_cases_0', 'name'=>'unfinalized_cases_0', 'value'=>$unfinalized_cases_0, 'class'=>'form-control pmq-number-input center', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_unfinalized_cases_1', 'name'=>'unfinalized_cases_1', 'value'=>$unfinalized_cases_1, 'class'=>'form-control pmq-number-input center', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_unfinalized_cases_2', 'name'=>'unfinalized_cases_2', 'value'=>$unfinalized_cases_2, 'class'=>'form-control pmq-number-input center', 'readonly'=>'readonly'));?></td>
			<td class="center"><?php echo form_input(array('id'=>'id_unfinalized_cases_3', 'name'=>'unfinalized_cases_3', 'value'=>$unfinalized_cases_3, 'class'=>'form-control pmq-number-input center', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr><td colspan="5"><p><b>Explanatory notes:</b></p>
		<p><sup>1</sup> Data in this table will be used to examine movements in tax dispute case volumes over time to assess whether caseloads are increasing, decreasing, or stable.</p></td></tr>
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
	echo form_hidden('period_year_0', $periods[0]-1);
	echo form_hidden('period_year_1', $periods[0]);
	echo form_hidden('period_year_2', $periods[1]);
	echo form_hidden('period_year_3', $periods[2]);		
	echo form_close(); ?>
</fieldset>
</div>