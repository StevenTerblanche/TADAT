<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$arrMission = _get_par_mission_details_by_id($mission_id);
	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}
	
?>
<div class="par-heading-full-width-div"><h1>Country Background Information - International Information Exchange</h1></div>

<?php echo form_open(base_url('/reporting/submit/'), array('role'=>'form', 'class'=>'form-horizontal')); ?>
	<div class="par-full-width-div">
		<div class="<?php echo $editClass[0]; ?>" id="international-information-exchange-1">
			<?php if($arrParData && $arrParData[0]['international-information-exchange-1'] !== ''){echo $arrParData[0]['international-information-exchange-1'];}else{ echo '<p>[Insert 1-2 paragraphs indicating whether the country is a member of the Global Forum on Transparency and Exchange of Information for Tax Purposes, noting any reviews that have been made in this connection, and describing any actions taken to meet its commitments.</p> <p>In this regard, over 100 jurisdictions participate in the work of the Global Forum\'s peer review process that examines both the legal and regulatory aspects of information exchange (Phase 1 reviews) and the exchange of information in practice (Phase 2). All review reports are published once approved by the Global Forum.</p><p> (Further information is at http://www.oecd.org/tax/ transparency/). Also mention the number of double taxation agreements the country has (if any) and mention a few countries that have signed these agreements.]';}?>
		</div>
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