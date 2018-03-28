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
			<td class="center bld wp-25"><p><b>Processing standard</b> (In calendar days)<sup>2</sup></p></td>
			<td class="center bld wp-25"><p><b>Actual result</b> (Percentage of total cases where 30-day standard was met)<sup>3</sup></p></td>

		</tr>
		<tr>
			<td><b>10.1.1 Processing of VAT refunds</b></td>
			<td align="center" class="center">30</td>
			<td class="center"><?php echo form_input(array('name'=>'process_refunds', 'value'=>$process_refunds, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		</tr>
		<tr>
			<td><b>10.1.2 Processing of CIT returns</b></td>
			<td align="center" class="center">30</td>
			<td class="center"><?php echo form_input(array('name'=>'process_returns', 'value'=>$process_returns, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		<tr>
		<tr>
			<td><b>10.1.3 Processing of objections </b></td>
			<td align="center" class="center">90/30</td>
			<td class="center"><?php echo form_input(array('name'=>'process_objections', 'value'=>$process_objections, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		<tr>
		<tr>
			<td><b>10.1.4 Processing of correspondence<sup>4</sup></b></td>
			<td align="center" class="center">30</td>
			<td class="center"><?php echo form_input(array('name'=>'process_correspond', 'value'=>$process_correspond, 'class'=>'form-control pmq-percentage-input center', 'required'=>''));?></td>
		<tr>
		
			<td colspan="3">
				<p><b>Explanatory notes:</b></p>
					<p><sup>1</sup> Data in this table will be used to assess processing efficiency of VAT refund claims and CIT returns.</p>
					<p><sup>2</sup> For purposes of TAD assessments the time-based standard applied by a tax administration for processing VAT refund claims and CIT returns will be either:</p>
					<ul>
			<li>A statutory deadline (if the country's tax laws provide for one); or</li>
			<li>A processing standard set by the tax administration; or</li>
			<li>30 calendar days (this will be used as a default standard where neither a statutory deadline nor time-based standard set by the tax administration exists).</li>
					</ul>
	
	<p><sup>3</sup> For example, the tax administration may process 92 percent of VAT refund claims within the time-based standard set for processing.</p>
	<p><sup>4</sup> Processing correspondence relates to the sending of a substantive reply to a letter or email enquiry from a taxpayer seeking information or advice on a routine matter (e.g., the deductibility of a work-related expense).</p>
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