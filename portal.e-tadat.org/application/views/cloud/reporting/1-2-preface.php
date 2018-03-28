<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$arrUsers = _get_par_users_by_id_missions($mission_id);
	$arrMission = _get_par_mission_details_by_id($mission_id);
	
	$assessment_team = '';

	if($arrUsers){
		foreach($arrUsers as $user => $users){
			$assessment_team .= '<li>'.$users['User'].' - '.$users['Designation'].'</li>';
		}
	}
	$assessment_team = '<ul>'.$assessment_team.'</ul>';
	
	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}
	
	
?>
	<div class="par-heading-full-width-div"><h1>Preface</h1></div>
<p>An assessment of the system of tax administration of <?php echo $arrMission['country'].' ('.$arrMission['region'].')';?> was undertaken during the period <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateStart'))));?> to <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateEnd'))));?> using the Tax Administration Diagnostic Assessment Tool (TADAT). 
TADAT provides an assessment baseline of tax administration performance that can be used to determine reform priorities, and, with subsequent repeat assessments, highlight reform achievements.</p>

<?php echo form_open(base_url('/reporting/submit/'), array('role'=>'form', 'class'=>'form-horizontal')); ?>

<div class="<?php echo $editClass[0]; ?>" id="preface-data-1">
<?php 
	if($arrParData && $arrParData[0]['preface-data-1'] !== ''){
		echo $arrParData[0]['preface-data-1'];
	}else{
?>
	<p>The assessment team comprised the following:</p><?php echo $assessment_team;?>
	<?php }?>
</div>

<div class="<?php echo $editClass[1]; ?>" id="preface-data-2">
<?php 
	if($arrParData && $arrParData[0]['preface-data-2'] !== 'incomplete'){
		echo $arrParData[0]['preface-data-2'];
	}else{
?>
	<div id="par-attention-text"><p>Insert the following paragraph into the final PAR in situations where the country has provided written comments on the draft report to the assessment team following completion of an in-country assessment.</p></div>
	<p>A draft performance assessment report was presented to the <?php echo $arrMission['authority'];?> at the close of the in-country assessment. Written comments since received from the <?php echo $arrMission['authority'];?> on the draft report have been considered by the assessment team and, as appropriate, reflected in this final version of the report.</p>
	<?php }?>	
</div>

<input type="hidden" name="fkidMission" id="id-mission_id" value="<?php echo $mission_id;?>" />
<input type="hidden" name="fkidSection" id="section_id" value="<?php echo $section_id;?>" />
		<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button><button style="width:175px !important; margin-left:25px !important" type="submit" id="id_save_button" class="btn btn-success white-text"><i class="fa  fa-save mr5"></i>Submit Changes</button></div>

<?php echo form_close(); ?>
<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>