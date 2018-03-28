<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$arrMission = _get_par_mission_details_by_id($mission_id);
	$strDateYear = substr($arrMission['dateStart'],0,4);
	
	$strPoa = 'P'.$poa;	
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);

	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}
	
?>
<div class="par-heading-full-width-div"><h1>POA 7: Effective Tax Dispute Resolution</h1></div>
<div class="par-heading-full-width-div"><h2>P7-19: Existence of an independent, workable, and graduated resolution process</h2></div>
<div class="par-full-width-div"><p>For this indicator three measurement dimensions assess: (1) the extent to which a dispute may be escalated to an independent external tribunal or court where a taxpayer is dissatisfied with the result of the tax administration's review process; (2) the extent to which the tax administration's review process is truly independent; and (3) the extent to which taxpayers are informed of their rights and avenues of review. Assessed scores are shown in Table 20 followed by an explanation of reasons underlying the assessment.</p>
	<div class="par-full-width-div" style="margin-bottom:25px !important">
		<table id="table-poa">
			<tr>
				<th colspan="4">Table 20. P7-19 Assessment</th>
			</tr>
			<tr>
				<td class="poa-heading-medium">Measurement dimensions</td>
				<td class="poa-heading-medium center">Scoring Method</td>
				<td colspan="3" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
			</tr>
			<tr>
				<td>P7-19-1. The extent to which an appropriately graduated mechanism of administrative and judicial review is available to, and used by, taxpayers.</td>
				<td width="75" rowspan="3" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
				<td width="35" rowspan="3" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
			</tr>
			<tr>
				<td>P7-19-2. Whether the administrative review mechanism is independent of the audit process.</td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
			</tr>
			<tr>
				<td>P7-19-3. Whether information on the dispute process is published, and whether taxpayers are explicitly made aware of it.</td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_3_final'];?></td>
			</tr>
		</table>
</div>


<?php echo form_open(base_url('/reporting/submit/'), array('role'=>'form', 'class'=>'form-horizontal')); ?>
	<div class="par-full-width-div">
		<div class="<?php echo $editClass[0]; ?>" id="<?php echo $strPoa;?>">
			<?php 
				if($arrParData && $arrParData[0][$strPoa] !== ''){
					echo $arrParData[0][$strPoa];
				}elseif($arrParScores['reportText'] && $arrParScores['reportText'] !== ''){ 
					echo $arrParScores['reportText'];
				}else{
					echo '<p>[Insert a paragraph for each measurement dimension explaining the reason/s for the assessed score (A or B or C or D).</p>';
					echo '<p>Commence each paragraph with a bolded topic sentence that encapsulates the principal reason for the score.</p>';
					echo '<p>Additional sentences should expand on, and support, the key point made in the topic sentence.]</p>';
				}
			?>
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