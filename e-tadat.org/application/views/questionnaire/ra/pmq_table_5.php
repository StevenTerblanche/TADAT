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
			<td class="center bld wp-33"><p>Number of declarations filed on-time<sup>1</sup></p></td>
			<td class="center bld wp-33"><p>Number of declarations expected to be filed<sup>2</sup></p></td>
			<td class="center bld wp-33"><p>On-time filing rate<sup>3</sup> (In percent)</p></td>
		</tr>
		<tr>
			<td class="center"><?php echo form_input(array('name'=>'filing_pit_paid_all', 'id'=>'id_filing_pit_paid_all', 'value'=>$filing_pit_paid_all, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_pit_due_all', 'id'=>'id_filing_pit_due_all', 'value'=>$filing_pit_due_all, 'class'=>'form-control pmq-number-input center', 'required'=>''));?></td>
			<td class="center"><?php echo form_input(array('name'=>'filing_pit_percentage_all', 'id'=>'id_filing_pit_percentage_all', 'value'=>$filing_pit_percentage_all, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>'readonly'));?></td>
		</tr>
		<tr>
			<td colspan="3">
				<p><b>Explanatory notes:</b></p>
				<p><sup>1</sup>'On-time' filing means declarations (also known as 'returns') filed by the statutory due date for filing (plus any 'days of grace' applied by the tax administration as a matter of administrative policy).</p>
				<p><sup>2</sup>'Expected declarations' means the number of CIT declarations that the tax administration expected to receive from registered CIT taxpayers that were required by law to file declarations.</p>
				<p><sup>3</sup>The 'on-time filing rate' is the number of declarations filed by the statutory due date as a percentage of the total number of declarations expected from registered taxpayers, expressed as a ratio.</p>
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