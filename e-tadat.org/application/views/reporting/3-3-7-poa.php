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
<div class="par-heading-full-width-div"><h1>POA 3: Supporting Voluntary Compliance</h1></div>
<div class="par-heading-full-width-div"><h2>P3-7: Scope, currency, and accessibility of information</h2></div>
<div class="par-full-width-div"><p>For this indicator four measurement dimensions assess:</p>
<ol>
	<li>Whether taxpayers have the information they need to meet their obligations.</li>
	<li>Whether the information available to taxpayers reflects the current law and administrative policy.</li>
	<li>How easy it is for taxpayers to obtain information.</li>
	<li>How quickly the tax administration responds to requests by taxpayers and tax intermediaries for information (for this dimension, waiting time for telephone enquiry calls is used as a proxy for measuring a tax administration's performance in responding to information requests generally). </li>
</ol>
<p>Assessed scores are shown in Table 8 followed by an explanation of reasons underlying the assessment.</p></div>

	<div class="par-full-width-div" style="margin-bottom:25px !important">
		<table id="table-poa">
			<tr>
				<th colspan="4">Table 8. P3-7 Assessment</th>
			</tr>
			<tr>
				<td class="poa-heading-medium">Measurement dimensions</td>
				<td class="poa-heading-medium center">Scoring Method</td>
				<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
			</tr>
			<tr>
				<td>P3-7-1. The range of information available to taxpayers to explain, in clear terms, what their obligations and entitlements are in respect of each core tax.</td>
				<td width="75" rowspan="4" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
				<td width="35" rowspan="4" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
			</tr>
			<tr>
				<td>P3-7-2. The degree to which information is current in terms of the law and administrative
						policy.</td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
			</tr>
			<tr>
				<td>P3-7-3. The ease by which taxpayers obtain information from the tax administration.</td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_3_final'];?></td>
			</tr>
			<tr>
				<td>P3-7-4. The time taken to respond to taxpayer and intermediary requests for information.</td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_4_final'];?></td>
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