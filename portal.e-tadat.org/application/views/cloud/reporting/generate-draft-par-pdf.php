<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	$scores = _get_scores_by_mission_id_all_tables($mission_id,'1');
	function _convert_score_type($score){
		$strScore = '';
		if($score === 0 || $score === ''){
			$strScore = 0;
			return $strScore;
		}else{
			switch ($score){
				case 'A': $strScore = '7';
				break;
				case 'B+': $strScore = '6';
				break;
				case 'B': $strScore = '5';
				break;
				case 'C+': $strScore = '4';
				break;
				case 'C': $strScore = '3';
				break;		
				case 'D+': $strScore = '2';
				break;		
				case 'D': $strScore = '1';
				break;
			}
		}
		return $strScore;
	}
	
	// This assigns the default (0 ||"") scores to the variable names;
	for($i = 1; $i < 29; $i++){
		$strScore = 'score_'.$i;				
		$$strScore = '';	
		$strField = 'strIndicator_'.$i.'_data';	
		$$strField = 0;
	}

	foreach($scores as $key => $value){
		$strScore = 'score_'.substr($value['table'], 2,3);	
		$strField = 'strIndicator_'.substr($value['table'], 2,3).'_data';	
		$$strScore = $value['score'];	
		$$strField = _convert_score_type($value['score']);
	}
	
	$section_id = 1;
	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}

	$arrMission = _get_par_mission_details_by_id($mission_id);	
	$arrUsers = _get_par_users_by_id_missions($mission_id);
	$assessment_team = '';
	if($arrUsers){
		foreach($arrUsers as $user => $users){
			$assessment_team .= $users['User'].', ';
		}
	}
	$assessment_team = rtrim($assessment_team,', ');	

?>

<div class="pdf-first-page-wrapper">
	<div class="pdf-first-page-logo"><img src="http://www.e-tadat.org/public_assets/reporting/images/par-frontpage-logo.jpg" width="795" height="480"></div>
	<div class="pdf-first-page-wheel">
		<div class="pdf-first-page-title">Performance<br> Assessment Report</div>
		<div class="pdf-first-page-country"><?php echo _get_par_country_by_mission_id($mission_id);?></div>
		<div class="pdf-first-page-team"><?php echo $assessment_team;?></div>
		<div class="pdf-first-page-date"><?php echo  date("F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateStart'))));?></div>		
	</div>
</div>

<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h1>Table of Contents</h1></div>
<ul id="t-o-c">
		<li><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important; margin-top:5px !important"><a href="#">Abbreviations and Acronyms</a></span></li>
		<li><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important; margin-top:5px !important"><a href="#">Preface</a></span></li>
		<li><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important; margin-top:5px !important"><a href="#">Executive Summary</a></span></li>		
		<li><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important; margin-top:5px !important"><a href="#">I. Introduction</a></span></li>
		<li class="no-leader"><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important;"><span>II. Country Background Information</span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd  !important" href="#">A. Country Profile</a></span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd  !important" href="#">B. Data Tables</a></span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd  !important" href="#">C. Economic Situation</a></span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd  !important" href="#">D. Main Taxes</a></span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd  !important" href="#">E. Institutional Framework</a></span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd  !important" href="#">F. International Information Exchange</a></span></li>
		<li class="no-leader"><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important; margin-top:5px !important">III. ASSESSMENT OF PERFORMANCE OUTCOME AREAS</span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 1: Integrity of the Registered Taxpayer Base</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P1-1. Accurate and reliable taxpayer information</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P1-2. Knowledge of the potential taxpayer base</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 2: Effective Risk Management</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P2-3. Identification, assessment, ranking, and quantification of compliance risks</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P2-4. Mitigation of risks through a compliance improvement plan</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P2-5. Monitoring and evaluation of compliance risk mitigation activities</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P2-6. Identification, assessment, and mitigation of institutional risks</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 3: Supporting Voluntary Compliance</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P3-7. Scope, currency, and accessibility of information</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P3-8. Scope of initiatives to reduce taxpayer compliance costs</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P3-9. Obtaining taxpayer feedback on products and services</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 4: Timely Filing of Tax Declarations</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P4-10. On-time filing rate</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P4-11. Use of electronic filing facilities</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 5: Timely Payment of Taxes</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P5-12. Use of electronic payment methods</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P5-13. Use of efficient collection systems</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P5-14. Timeliness of payments</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P5-15. Stock and flow of tax arrears</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 6: Accurate Reporting in Declarations</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P6-16. Scope of verification actions taken to detect and deter inaccurate reporting</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P6-17. Extent of proactive initiatives to encourage accurate reporting</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P6-18. Monitoring the extent of inaccurate reporting</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 7: Effective Tax Dispute Resolution</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P7-19. Existence of an independent, workable, and graduated dispute resolution process</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P7-20. Time taken to resolve disputes</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P7-21. Degree to which dispute outcomes are acted upon</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 8: Efficient Revenue Management</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P8-22. Contribution to government tax revenue forecasting process</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P8-23. Adequacy of the tax revenue accounting system</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P8-24. Adequacy of tax refund processing</a></span></li>
			<li class="no-leader"><span style="padding-left:20px !important; font-weight:600 !important">POA 9: Accountability and Transparency</span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P9-25. Internal assurance mechanisms</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P9-26. External oversight of the tax administration</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P9-27. Public perception of integrity</a></span></li>
				<li><span style="padding-left:40px !important"><a style="color:#0f77bd !important" href="#">P9-28. Publication of activities, results, and plans</a></span></li>
		<li class="no-leader"><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important; margin-top:5px !important">Figures</span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd !important" href="#">1. Distribution of Performance Scores</a></span></li>
		<li class="no-leader"><span style="padding-left:0px !important; font-weight:900 !important; font-size:13px !important; margin-top:5px !important">Attachments</span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd !important" href="#">I. TADAT Framework</a></span></li>				
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd !important" href="#">II. Country Snapshot</a></span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd !important" href="#">III. Data Tables</a></span></li>
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd !important" href="#">IV. Organizational Chart</a></span></li>				
			<li><span style="padding-left:20px !important"><a style="color:#0f77bd !important" href="#">V. Sources of Evidence</a></span></li>
	</ul>


</div>


<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h1>Abbreviations and Acronyms</h1></div>
		<?php
			if($arrParData && $arrParData[0]['abbreviations-data-1'] !== ''){
				echo $arrParData[0]['abbreviations-data-1'];
			}
		?>
</div>

<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h1>Preface</h1></div>
	<p>An assessment of the system of tax administration of <?php echo $arrMission['country'].' ('.$arrMission['region'].')';?> was undertaken during the period <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateStart'))));?> to <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateEnd'))));?> using the Tax Administration Diagnostic Assessment Tool (TADAT). 			TADAT provides an assessment baseline of tax administration performance that can be used to determine reform priorities, and, with subsequent repeat assessments, highlight reform achievements.</p>
	<?php
		if($arrParData && $arrParData[0]['preface-data-1'] !== ''){
			echo $arrParData[0]['preface-data-1'];
		}
	?>
	<?php
		if($arrParData && $arrParData[0]['preface-data-2'] !== ''){
			echo $arrParData[0]['preface-data-2'];
		}
	?>	
</div>

<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h1>Executive Summary</h1></div>
	<div class="par-full-width-div">
		<p>The results of the TADAT assessment for <?php echo _get_par_country_by_mission_id($mission_id);?> follow, including the identification of the main strengths and weaknesses.</p>
	</div>		
	<div class="col-md-12">
		<div class="col-md-6 col-md-6-par">			
			<p><b>Strengths</b></p>
			<div id="executive-strengths">
				<?php 
					if($arrParData && $arrParData[0]['executive-strengths'] !== ''){
						echo $arrParData[0]['executive-strengths'];
					}
				?>
			</div>
		</div>
		<div class="col-md-6 col-md-6-par">
			<p><b>Weaknesses</b></p>
			<div id="executive-weaknesses">
				<?php 
					if($arrParData && $arrParData[0]['executive-strengths'] !== ''){
						echo $arrParData[0]['executive-strengths'];
					}
				?>				
			</div>
		</div>
	</div>

	<div class="par-full-width-div">
		<div id="summary-strengths-weaknesses">
			<?php 
				if($arrParData && $arrParData[0]['summary-strengths-weaknesses'] !== ''){
					echo $arrParData[0]['summary-strengths-weaknesses'];
				}
			?>							
		</div>
	</div>

	<div class="par-full-width-div">
		<p>Table 1 provides a summary of performance scores, and Figure 1 a graphical snapshot of the distribution of scores. The scoring is structured around the TADAT framework's nine performance outcome areas (POAs) and 28 high level indicators critical to tax administration performance. An 'ABCD' scale is used to score each indicator, with 'A+' representing the highest level of performance and 'D' the lowest.</p>
	</div>		
</div>	

<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body-wide">
	<div class="par-heading-full-width-div clear"><h2>Table 1. <?php echo _get_par_country_by_mission_id($mission_id);?>: Summary of TADAT Performance Assessment</h2></div>
	<div class="par-full-width-div">
		<table id="table-executive-1">
			<tr>
				<th>Indicator</th>
				<th>Scores</th>
				<th>Summary Explanation of Assessment</th>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">P1-1. Accurate and reliable taxpayer information</td>
			</tr>
			<tr>
				<td width="200">P1-1. Accurate and reliable taxpayer information</td>
				<td class="center"><?php echo $score_1;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-1'] !== ''){echo $arrParData[0]['explanation-1'];}?></td>		
			</tr>
			<tr>
				<td>P1-2. Knowledge of the potential taxpayer base.</td>
				<td class="center"><?php echo $score_2;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-2'] !== ''){echo $arrParData[0]['explanation-2'];}?></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 2: Effective Risk Management</td>
			</tr>
			<tr>
				<td>P2-3. Identification, assessment, ranking, and quantification of compliance risks.</td>
				<td class="center"><?php echo $score_3;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-3'] !== ''){echo $arrParData[0]['explanation-3'];}?></td>		
			</tr>
			<tr>
				<td>P2-4. Mitigation of risks through a compliance improvement plan.</td>
				<td class="center"><?php echo $score_4;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-4'] !== ''){echo $arrParData[0]['explanation-4'];}?></td>		
			</tr>
			<tr>
				<td>P2-5. Monitoring and evaluation of compliance risk mitigation activities.</span></td>
				<td class="center"><?php echo $score_5;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-5'] !== ''){echo $arrParData[0]['explanation-5'];}?></td>		
			</tr>
			<tr>
				<td>P2-6. Identification, assessment, and mitigation of institutional risks.</td>
				<td class="center"><?php echo $score_6;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-6'] !== ''){echo $arrParData[0]['explanation-6'];}?></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 3: Supporting Voluntary Compliance</td>
			</tr>
			<tr>
				<td>P3-7. Scope, currency, and accessibility of information.</td>
				<td class="center"><?php echo $score_7;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-7'] !== ''){echo $arrParData[0]['explanation-7'];}?></td>		
			</tr>
			<tr>
				<td>P3-8. Scope of initiatives to reduce taxpayer compliance costs.</td>
				<td class="center"><?php echo $score_8;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-8'] !== ''){echo $arrParData[0]['explanation-8'];}?></td>		
			</tr>
			<tr>
				<td>P3-9. Obtaining taxpayer feedback on products and services.</td>
				<td class="center"><?php echo $score_9;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-9'] !== ''){echo $arrParData[0]['explanation-9'];}?></td>		
			</tr>
			
			<tr>
				<td colspan="3" class="poa-heading">POA 4: Timely Filing of Tax Declarations</td>
			</tr>
			<tr>
				<td>P4-10. On-time filing rate.</td>
				<td class="center"><?php echo $score_10;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-10'] !== ''){echo $arrParData[0]['explanation-10'];}?></td>		
			</tr>
			<tr>
				<td>P4-11. Use of electronic filing facilities.</td>
				<td class="center"><?php echo $score_11?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-11'] !== ''){echo $arrParData[0]['explanation-11'];}?></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 5: Timely Payment of Taxes</td>
			</tr>
			<tr>
				<td>P5-12. Use of electronic payment methods.</td>
				<td class="center"><?php echo $score_12;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-12'] !== ''){echo $arrParData[0]['explanation-12'];}?></td>		
			</tr>
			<tr>
				<td>P5-13. Use of efficient collection systems.</td>
				<td class="center"><?php echo $score_13;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-13'] !== ''){echo $arrParData[0]['explanation-13'];}?></td>		
			</tr>
			<tr>
				<td>P5-14. Timeliness of payments.</td>
				<td class="center"><?php echo $score_14;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-14'] !== ''){echo $arrParData[0]['explanation-14'];}?></td>		
			</tr>
			<tr>
				<td>P5-15. Stock and flow of tax arrears.</td>
				<td class="center"><?php echo $score_15;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-15'] !== ''){echo $arrParData[0]['explanation-15'];}?></td>		
			</tr>
			
			<tr>
				<td colspan="3" class="poa-heading">POA 6: Accurate Reporting in Declarations</td>
			</tr>
			<tr>
				<td>P6-16. Scope of verification actions taken to detect and deter inaccurate reporting.</td>
				<td class="center"><?php echo $score_16;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-16'] !== ''){echo $arrParData[0]['explanation-16'];}?></td>		
			</tr>
			<tr>
				<td>P6-17. Extent of proactive initiatives to encourage accurate reporting.</td>
				<td class="center"><?php echo $score_17;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-17'] !== ''){echo $arrParData[0]['explanation-17'];}?></td>		
			</tr>
			<tr>
				<td>P6-18. Monitoring the extent of inaccurate reporting.</td>
				<td class="center"><?php echo $score_18;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-18'] !== ''){echo $arrParData[0]['explanation-18'];}?></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 7: Effective Tax Dispute Resolution</td>
			</tr>
			<tr>
				<td>P7-19. Existence of an independent, workable, and graduated dispute resolution process.</td>
				<td class="center"><?php echo $score_19;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-19'] !== ''){echo $arrParData[0]['explanation-19'];}?></td>		
			</tr>
			<tr>
				<td>P7-20. Time taken to resolve disputes.</td>
				<td class="center"><?php echo $score_20;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-20'] !== ''){echo $arrParData[0]['explanation-20'];}?></td>		
			</tr>
			<tr>
				<td>P7-21. Degree to which dispute outcomes are acted upon.</td>
				<td class="center"><?php echo $score_21;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-21'] !== ''){echo $arrParData[0]['explanation-21'];}?></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 8: Efficient Revenue Management</td>
			</tr>
			<tr>
				<td>P8-22. Contribution to government tax revenue forecasting process.</td>
				<td class="center"><?php echo $score_22;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-22'] !== ''){echo $arrParData[0]['explanation-22'];}?></td>		
			</tr>
			<tr>
				<td>P8-23. Adequacy of the tax revenue accounting system.</td>
				<td class="center"><?php echo $score_23;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-23'] !== ''){echo $arrParData[0]['explanation-23'];}?></td>		
			</tr>
			<tr>
				<td>P8-24. Adequacy of tax refund processing.</td>
				<td class="center"><?php echo $score_24;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-24'] !== ''){echo $arrParData[0]['explanation-24'];}?></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 9: Accountability and Transparency</td>
			</tr>
			<tr>
				<td>P9-25. Internal assurance mechanisms.</td>
				<td class="center"><?php echo $score_25;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-25'] !== ''){echo $arrParData[0]['explanation-25'];}?></td>		
			</tr>
			<tr>
				<td>P9-26. External oversight of the tax administration.</td>
				<td class="center"><?php echo $score_26;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-26'] !== ''){echo $arrParData[0]['explanation-26'];}?></td>		
			</tr>
			<tr>
				<td>P9-27. Public perception of integrity.</td>
				<td class="center"><?php echo $score_27;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-27'] !== ''){echo $arrParData[0]['explanation-27'];}?></td>		
			</tr>
			<tr>
				<td>P9-28. Publication of activities, results, and plans.</td>
				<td class="center"><?php echo $score_28;?></td>	
				<td><?php if($arrParData && $arrParData[0]['explanation-28'] !== ''){echo $arrParData[0]['explanation-28'];}?></td>		
			</tr>												
		</table>
	</div>
</div>

<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body-wide">
	<div class="par-heading-full-width-div" style="margin-bottom:15px !important"><h2>Figure 1. <?php echo _get_par_country_by_mission_id($mission_id);?>: Distribution of Performance Scores</h2></div>
	<div id="chart-body">
		<div id="chart"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/data/poa/images/radar/radar_<?php echo $mission_id ?>.jpg"></div>
		<div id="div-legend">
			<table id="table-executive-legend">
				<tr>
					<th colspan="5"><span class="table-executive-legend-heading">TADAT RADAR CHART LEGEND</span></th>
				</tr>
				<tr>
					<td width="15"><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 1: Integrity of the Registered Taxpayer Base</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P1-1</td>
					<td>:&nbsp;<?php echo $score_1; ?></td>
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P1-2</td>
					<td>:&nbsp;<?php echo $score_2; ?></td>
					<td></td>		  		  					
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 2: Effective Risk Management</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-3</td>
					<td>:&nbsp;<?php echo $score_3; ?></td>
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-4</td>
					<td>:&nbsp;<?php echo $score_4; ?></td>
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-5</td>
					<td>:&nbsp;<?php echo $score_5; ?></td>
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-6</td>
					<td>:&nbsp;<?php echo $score_6; ?></td>		  		  
					<td></td>		  		  					
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 3: Supporting Voluntary Compliance</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P3-7</td>
					<td>:&nbsp;<?php echo $score_7; ?></td>		  		  
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P3-8</td>
					<td>:&nbsp;<?php echo $score_8; ?></td>		  		  
					<td></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P3-9</td>
					<td>:&nbsp;<?php echo $score_9; ?></td>		  		  
					<td></td>		  		  					
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 4: Timely Filing of Tax Declarations</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P4-10</td>
					<td>:&nbsp;<?php echo $score_10; ?></td>		  		  
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P4-11</td>
					<td>:&nbsp;<?php echo $score_11; ?></td>		  		  
					<td></td>		  		  					
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 5: Timely Payment of Taxes</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-12</td>
					<td>:&nbsp;<?php echo $score_12; ?></td>		  		  
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-13</td>
					<td>:&nbsp;<?php echo $score_13; ?></td>		  		  
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-14</td>
					<td>:&nbsp;<?php echo $score_14; ?></td>		  		  
					<td></td>		  		  					
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-15</td>
					<td>:&nbsp;<?php echo $score_15; ?></td>		  		  
					<td></td>		  		  				
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 6: Accurate Reporting in Declarations</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P6-16</td>
				<td>:&nbsp;<?php echo $score_16; ?></td>		  		  
					<td></td>		  		  				
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P6-17</td>
					<td>:&nbsp;<?php echo $score_17; ?></td>		
					<td></td>		  		    		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P6-18</td>
					<td>:&nbsp;<?php echo $score_18; ?></td>		  		  
					<td></td>		  		  					
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 7: Effective Tax Dispute Resolution</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P7-19</td>
					<td>:&nbsp;<?php echo $score_19; ?></td>		  		  
					<td></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P7-20</td>
					<td>:&nbsp;<?php echo $score_20; ?></td>		
					<td></td>		  		    		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P7-21</td>
					<td>:&nbsp;<?php echo $score_21; ?></td>		  		  
					<td></td>		  		  
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 8: Efficient Revenue Management</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P8-22</td>
					<td>:&nbsp;<?php echo $score_22; ?></td>		  		  
					<td></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P8-23</td>
					<td>:&nbsp;<?php echo $score_23; ?></td>		  		  
					<td></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P8-24</td>
					<td>:&nbsp;<?php echo $score_24; ?></td>		  		  
					<td></td>		  		  
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 9: Accountability and Transparency</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-25</td>
					<td>:&nbsp;<?php echo $score_25; ?></td>		  		  
					<td></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-26</td>
					<td>:&nbsp;<?php echo $score_26; ?></td>					  
					<td></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-27</td>
					<td>:&nbsp;<?php echo $score_27; ?></td>
					<td></td>		  		  					
				</tr>				  
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-28</td>
					<td>:&nbsp;<?php echo $score_28; ?></td>		
					<td></td>		  		    		  
				</tr>				  
		  </table>

	  </div>	
	</div>
</div>

<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h1>I. Introduction</h1></div>

		<p>This report documents the results of the TADAT assessment conducted in <?php echo $arrMission['country'].' ('.$arrMission['region'].')';?> during the period <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateStart'))));?> to <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateEnd'))));?> and subsequently reviewed by the TADAT Secretariat.</p>
		<p>The report is structured around the TADAT framework of nine POAs and 28 high level indicators critical to tax administration performance that is linked to the POAs. Forty-seven measurement dimensions are taken into account in arriving at each indicator score. </p>
		<p>A four-point 'ABCD' scale is used to score each dimension and indicator: </p>
		<ul class="fa-ul">
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'A' denotes performance that meets or exceeds international good practice. In this regard, for TADAT purposes, a good practice is taken to be a tested and proven approach applied by a majority of leading tax administrations. It should be noted, however, that for a process to be considered 'good practice', it does not need to be at the very forefront or vanguard of technological and other developments. Given the dynamic nature of tax administration, the good practices described throughout the field guide can be expected to evolve over time as technology advances and innovative approaches are tested and gain wide acceptance.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'B' represents sound performance (i.e. a healthy level of performance but a rung below international good practice).</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'C' means weak performance relative to international good practice.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'D' denotes inadequate performance, and is applied when the requirements for a 'C' rating or higher are not met. Furthermore, a 'D' score is given in certain situations where there is insufficient information available to assessors to determine and score the level of performance. For example, where a tax administration is unable to produce basic numerical data for purposes of assessing operational performance (e.g., in areas of filing, payment, and refund processing) a 'D' score is given. The underlying rationale is that the inability of the tax administration to provide the required data is indicative of deficiencies in its management information systems and performance monitoring practices.</li>
		</ul>
		<p>For further details on the TADAT framework, see Attachment I.</p>
		<p>Some points to note about the TADAT diagnostic approach are:</p>
		<ul class="fa-ul">
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT assesses the performance outcomes achieved in the administration of the major direct and indirect taxes critical to central government revenues, specifically corporate income tax (CIT), personal income tax (PIT), value added tax (VAT), and Pay As You Earn (PAYE) amounts withheld by employers (which, strictly speaking, are remittances of PIT). By assessing outcomes in relation to administration of these core taxes, a picture can be developed of the relative strengths and weaknesses of a country's tax administration.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT assessments are evidence based (see Attachment V for the sources of evidence applicable to the assessment of <?php echo $arrMission['country'];?> ).</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT is not designed to assess special tax regimes, such as those applying in the natural resource sector. Nor does it assess customs administration.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT provides an assessment within the existing revenue policy framework in a country, with assessments highlighting performance issues that may be best dealt with by a mix of administrative and policy responses. </li>
		</ul>
		<p>The aim of TADAT is to provide an objective assessment of the health of key components of the system of tax administration, the extent of reform required, and the relative priorities for attention.</p>
		<p>TADAT assessments are particularly helpful in:</p>
		<ul class="fa-ul">
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Identifying the relative strengths and weaknesses in tax administration.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Facilitating a shared view among all stakeholders (country authorities, international organizations, donor countries, and technical assistance providers).</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Setting the reform agenda (objectives, priorities, reform initiatives, and implementation sequencing). </li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Facilitating management and coordination of external support for reforms, and achieving faster and more efficient implementation.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Monitoring and evaluating reform progress by way of subsequent repeat assessments.</li>
		</ul>
</div>

<?php
	$section_id = 2;
	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}

?>

<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h1>II. Country Background Information</h1></div>
	<div class="par-heading-full-width-div"><h2>A. Country Profile</h2></div>
	<p>General background information on <?php echo $arrMission['country'];?>  and the environment in which its tax system operates are provided in the country snapshot in Attachment II.</p>
	<div class="par-heading-full-width-div"><h2>B. Data Tables</h2></div>
	<p>Numerical data gathered from the authorities and used in this TADAT performance assessment is contained in the tables comprising Attachment III.</p>
	<div class="par-heading-full-width-div"><h2>C. Economic Situation</h2></div>
	<?php 
		if($arrParData && $arrParData[0]['economic-situation-1'] !== ''){
			echo $arrParData[0]['economic-situation-1'];
		}
	?>
	<div class="par-heading-full-width-div"><h2>D. Main Taxes</h2></div>
	<?php 
		if($arrParData && $arrParData[0]['main-taxes-1'] !== ''){
			echo $arrParData[0]['main-taxes-1'];
		}
	?>	
	<div class="par-heading-full-width-div"><h2>E. Institutional Framework</h2></div>
	<?php 
		if($arrParData && $arrParData[0]['institutional-framework-1'] !== ''){
			echo $arrParData[0]['institutional-framework-1'];
		}
	?>	
	<div class="par-heading-full-width-div"><h2>F. International Information Exchange</h2></div>
	<?php 
		if($arrParData && $arrParData[0]['international-information-exchange-1'] !== ''){
			echo $arrParData[0]['international-information-exchange-1'];
		}
	?>	
</div>

<?php 
	$section_id = 3;
	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}
	$strDateYear = substr($arrMission['dateStart'],0,4);
?>

<!-- ***************************************************** POA 1.1  ******************************************************************* -->
<?php 
	$strPoa = 'P1-1';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h1>III. ASSESSMENT OF PERFORMANCE OUTCOME AREAS</h1></div>
	<div class="par-heading-full-width-div"><h3>POA 1: Integrity of the Registered Taxpayer Base</h3></div>
	<p>A fundamental initial step in administering taxes is taxpayer registration and numbering. Tax administrations must compile and maintain a complete database of businesses and individuals that are required by law to register; these will include taxpayers in their own right, as well as others such as employers with PAYE withholding responsibilities. Registration and numbering of each taxpayer underpins key administrative processes associated with filing, payment, assessment, and collection.</p>
	<p>Two performance indicators are used to assess POA 1:</p>
		<ul>
			<li>P1-1—Accurate and reliable taxpayer information.</li>
			<li>P1-2—Knowledge of the potential taxpayer base.</li>
		</ul>
	<div class="par-heading-full-width-div"><h2>P1-1: Accurate and reliable taxpayer information</h2></div>
	<div class="par-full-width-div"><p>For this indicator two measurement dimensions assess: (1) the adequacy of information held in the tax administration's registration database and the extent to which it supports effective interactions with taxpayers and tax intermediaries (i.e. tax advisors and accountants); and (2) the accuracy of information held in the database. Assessed scores are shown in Table 2 followed by an explanation of reasons underlying the assessment.</p></div>
	<div class="par-full-width-div" style="margin-bottom:5px !important">
		<table id="table-poa">
			<tr>
				<th colspan="4">Table 2. P1-1 Assessment</th>
			</tr>
			<tr>
				<td class="poa-heading-medium">Measurement dimensions</td>
				<td class="poa-heading-medium center">Scoring Method</td>
				<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
			</tr>
			<tr>
				<td>P1-1-1. The adequacy of information held in respect of registered taxpayers and the extent to which the registration database supports effective interactions with taxpayers and tax intermediaries.</td>
				<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
				<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
			</tr>
			<tr>
				<td>P1-1-2. The accuracy of information held in the registration database.</td>
				<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
				</tr>
			
		</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>
<!-- ***************************************************** POA 1.2  ******************************************************************* -->
<?php 
	$strPoa = 'P1-2';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);

?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P1-2: Knowledge of the potential taxpayer base</h2></div>
	<div class="par-full-width-div"><p>This indicator measures the extent of tax administration efforts to detect unregistered businesses and individuals. The assessed score is shown in Table 3 followed by an explanation of reasons underlying the assessment.</p></div>
	
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 3. P1-2 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P1-2. The extent of initiatives to detect businesses and individuals who are required to register but fail to do so.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
					</tr>
				
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>		
</div>

<!-- ***************************************************** POA 2.3  ******************************************************************* -->
<?php 
	$strPoa = 'P2-3';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 2: Effective Risk Management</h3></div>
	<p>Tax administrations face numerous risks that have the potential to adversely affect revenue and/or tax administration operations. For convenience, these risks can be classified as:</p>
		<ul>
			<li>Compliance risks—where revenue may be lost if businesses and individuals fail to meet the four main taxpayer obligations (i.e. registration in the tax system; filing of tax declarations; payment of taxes on time; and complete and accurate reporting of information in declarations); and</li>
			<li>Institutional risks—where tax administration functions may be interrupted if certain external or internal events occur, such as natural disasters, sabotage, loss or destruction of physical assets, failure of IT system hardware or software, strike action by employees, and administrative breaches (e.g., leakage of confidential taxpayer information which results in loss of community confidence and trust in the tax administration).</li>
		</ul>
	<p>Risk management is essential to effective tax administration and involves a structured approach to identifying, assessing, prioritizing, and mitigating risks. It is an integral part of multi-year strategic and annual operational planning.</p>	
	<p>Four performance indicators are used to assess POA 2:</p>	
		<ul>
			<li>P2-3—Identification, assessment, ranking, and quantification of compliance risks.</li>
			<li>P2-4—Mitigation of risks through a compliance improvement plan.</li>
			<li>P2-5—Monitoring and evaluation of compliance risk mitigation activities.</li>						
			<li>P2-6—Identification, assessment, and mitigation of institutional risks.</li>
		</ul>
	
	<div class="par-heading-full-width-div"><h2>P2-3: Identification, assessment, ranking, and quantification of compliance risks</h2></div>
	<div class="par-full-width-div"><p>For this indicator two measurement dimensions assess: (1) the scope of intelligence gathering and research to identify risks to the tax system; and (2) the process used to assess, rank, and quantify compliance risks. Assessed scores are shown in Table 4 followed by an explanation of reasons underlying the assessment.</p></div>
	
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 4. P2-3 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P2-3-1. The extent of intelligence gathering and research to identify compliance risks in respect of the main tax obligations.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P2-3-2. The process used to assess, rank, and quantify taxpayer compliance risks.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
					</tr>
				
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 2.4  ******************************************************************* -->
<?php 
	$strPoa = 'P2-4';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P2-4: Mitigation of risks through a compliance improvement plan</h2></div>
	<div class="par-full-width-div"><p>This indicator examines the extent to which the tax administration has formulated a compliance improvement plan to address identified risks. The assessed score is shown in Table 5 followed by an explanation of reasons underlying the assessment.</p></div>
	<div class="par-full-width-div" style="margin-bottom:5px !important">
		<table id="table-poa">
			<tr>
				<th colspan="3">Table 5. P2-4 Assessment</th>
			</tr>
			<tr>
				<td class="poa-heading-medium">Measurement dimensions</td>
				<td class="poa-heading-medium center">Scoring Method</td>
				<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
			</tr>
			<tr>
				<td>P2-4. The degree to which the tax administration mitigates assessed risks to the tax system through a compliance improvement plan.</td>
				<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
				<td class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			
		</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 2.5  ******************************************************************* -->
<?php 
	$strPoa = 'P2-5';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P2-5: Monitoring and evaluation of compliance risk mitigation activities</h2></div>
	<div class="par-full-width-div"><p>This indicator looks at the process used to monitor and evaluate mitigation activities. The assessed score is shown in Table 6 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:25px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 6. P2-5 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P2-5. The process used to monitor and evaluate the impact of compliance risk mitigation activities.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
					</tr>
				
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 2.6  ******************************************************************* -->
<?php 
	$strPoa = 'P2-6';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P2-6: Identification, assessment, and mitigation of institutional risks</h2></div>
	<div class="par-full-width-div"><p>This indicator examines how the tax administration manages institutional risks. The assessed score is shown in Table 7 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 7. P2-6 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P2-6. The process used to identify, assess, and mitigate institutional risks.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
					</tr>
				
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 3.7  ******************************************************************* -->
<?php 
	$strPoa = 'P3-7';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 3: Supporting Voluntary Compliance</h3></div>
	<p>To promote voluntary compliance and public confidence in the tax system, tax administrations must adopt a service-oriented attitude toward taxpayers, ensuring that taxpayers have the information and support they need to meet their obligations and claim their entitlements under the law. Because few taxpayers use the law itself as a primary source of information, assistance from the tax administration plays a crucial role in bridging the knowledge gap. Taxpayers expect that the tax administration will provide summarized, understandable information on which they can rely.</p>
	<p>Efforts to reduce taxpayer costs of compliance are also important. Small businesses, for example, gain from simplified record keeping and reporting requirements. Likewise, individuals with relatively simple tax obligations (e.g., employees, retirees, and passive investors) benefit from simplified filing arrangements and systems that eliminate the need to file.</p>	
	<p>Three performance indicators are used to assess POA 3:</p>	
		<ul>
			<li>P3-7—Scope, currency, and accessibility of information.</li>
			<li>P3-8—Scope of initiatives to reduce taxpayer compliance costs.</li>
			<li>P3-9—Obtaining taxpayer feedback on products and services.</li>
		</ul>
	
	<div class="par-heading-full-width-div"><h2>P3-7: Scope, currency, and accessibility of information</h2></div>
	<div class="par-full-width-div"><p>For this indicator four measurement dimensions assess:</p>
	<ol>
		<li>Whether taxpayers have the information they need to meet their obligations.</li>
		<li>Whether the information available to taxpayers reflects the current law and administrative policy.</li>
		<li>How easy it is for taxpayers to obtain information.</li>
		<li>How quickly the tax administration responds to requests by taxpayers and tax intermediaries for information (for this dimension, waiting time for telephone enquiry calls is used as a proxy for measuring a tax administration's performance in responding to information requests generally). </li>
	</ol>
	<p>Assessed scores are shown in Table 8 followed by an explanation of reasons underlying the assessment.</p></div>
	
		<div class="par-full-width-div" style="margin-bottom:5px !important">
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
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 3.8  ******************************************************************* -->
<?php 
	$strPoa = 'P3-8';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P3-8: Scope of initiatives to reduce taxpayer compliance costs</h2></div>
	<div class="par-full-width-div"><p>This indicator examines the tax administration's efforts to reduce taxpayer compliance costs. Assessed scores are shown in Table 9 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 9. P3-8 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P3-8. The extent of initiatives to reduce taxpayer compliance costs.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
					</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>
<!-- ***************************************************** POA 3.9  ******************************************************************* -->
<?php 
	$strPoa = 'P3-9';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P3-9: Obtaining taxpayer feedback on products and services</h2></div>
	<div class="par-full-width-div"><p>For this indicator, two measurement dimensions assess: (1) the extent to which the tax administration seeks taxpayer and other stakeholder views of service delivery; and (2) the degree to which taxpayer feedback is taken into account in the design of administrative processes and products. Assessed scores are shown in Table 10 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 10. P3-9 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P3-9-1. The use and frequency of methods to obtain performance feedback from taxpayers on the standard of services provided.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P3-9-2. The extent to which taxpayer input is taken into account in the design of administrative processes and products.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
				</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>




<!-- ***************************************************** POA 4.10  ******************************************************************* -->
<?php 
	$strPoa = 'P4-10';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 4: Timely Filing of Tax Declarations</h3></div>
	<p>Filing of tax declarations (also known as tax returns) remains a principal means by which a taxpayer's tax liability is established and becomes due and payable. As noted in POA 3, however, there is a trend towards streamlining preparation and filing of declarations of taxpayers with relatively uncomplicated tax affairs (e.g., through pre-filling tax declarations).</p>
	<p>Moreover, several countries treat income tax withheld at source as a final tax, thereby eliminating the need for large numbers of PIT taxpayers to file annual income tax declarations. There is also a strong trend towards electronic filing of declarations for all core taxes. Declarations may be filed by taxpayers themselves or via tax intermediaries.</p>	
	<p>It is important that all taxpayers who are required to file do so, including those who are unable to pay the tax owing at the time a declaration is due (for these taxpayers, the first priority of the tax administration is to obtain a declaration from the taxpayer to confirm the amount owed, and then secure payment through enforcement if necessary).</p>	
	<p>The following performance indicators are used to assess POA 4:</p>		
		<ul>
			<li>P4-10—On-time filing rate.</li>
			<li>P4-11—Use of electronic filing facilities.</li>
		</ul>
	<div class="par-heading-full-width-div"><h2>P4-10: On-time filing rate</h2></div>
	<div class="par-full-width-div"><p>A single performance indicator, with 4 measurement dimensions, is used to assess POA 4. Within this framework the aim is to measure the on-time filing rate for CIT, PIT, VAT, and PAYE withholding declarations. A high on-time filing rate is indicative of effective compliance management including, for example, provision of convenient means to file declarations (especially electronic filing facilities), simplified declarations forms, and enforcement action against those who fail to file on time. Assessed scores are shown in Table 11 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 11. P4-10 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P4-10-1. The number of CIT declarations filed by the statutory due date as a percentage of the number of declarations expected from registered CIT taxpayers.</td>
					<td width="75" rowspan="4" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="4" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P4-10-2. The number of PIT declarations filed by the statutory due date as a percentage of the number of declarations expected from registered PIT taxpayers.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
				</tr>
				<tr>
						<td>P4-10-3. The number of VAT declarations filed by the statutory due date as a percentage of the number of declarations expected from registered VAT taxpayers.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_3_final'];?></td>
					</tr>
				<tr>
						<td>P4-10-4. The number of PAYE withholding declarations filed by employers by the statutory due date as a percentage of the number of PAYE declarations expected from registered employers.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_4_final'];?></td>
					</tr>
				
			</table>
	</div>
	
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 4.11  ******************************************************************* -->
<?php 
	$strPoa = 'P4-11';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P4-11: Use of electronic filing facilities</h2></div>
	<div class="par-full-width-div"><p>This indicator measures the extent to which declarations, for all core taxes, are filed electronically. Assessed scores are shown in Table 12 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 12. P4-11 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P4-11. The extent to which tax declarations are filed electronically.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 5.12  ******************************************************************* -->
<?php 
	$strPoa = 'P5-12';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 5: Timely Payment of Taxes</h3></div>
	<p>Taxpayers are expected to pay taxes on time. Tax laws and administrative procedures specify payment requirements, including deadlines (due dates) for payment, who is required to pay, and payment methods. </p>
	<p>Depending on the system in place, payments due will be either self-assessed or administratively assessed. Failure by a taxpayer to pay on time results in imposition of interest and penalties and, for some taxpayers, legal debt recovery action. The aim of the tax administration should be to achieve high rates of voluntary on-time payment and low incidence of tax arrears.</p>	
	<p>Four performance indicators are used to assess POA 5:</p>	
		<ul>
			<li>P5-12—Use of electronic payment methods.</li>
			<li>P5-13—Use of efficient collection systems.</li>			
			<li>P5-14—Timeliness of payments</li>
			<li>P5-15—Stock and flow of tax arrears.</li>
		</ul>
	<div class="par-heading-full-width-div"><h2>P5-12: Use of electronic payment methods</h2></div>
	<div class="par-full-width-div"><p>This indicator examines the degree to which core taxes are paid by electronic means, including through electronic funds transfer (where money is electronically transferred via the Internet from a taxpayer's bank account to the Government's account), credit cards, and debit cards. For TADAT measurement purposes, payments made in-person by a taxpayer to a third party agent (e.g., a bank or post office) that are then electronically transferred by the agent to the Government's account are accepted as electronic payments. Assessed scores are shown in Table 13 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 13. P5-12 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P5-12. The extent to which core taxes are paid electronically.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="65" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>
		
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 5.13  ******************************************************************* -->
<?php 
	$strPoa = 'P5-13';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P5-13: Use of efficient collection systems</h2></div>
	<div class="par-full-width-div"><p>This indicator assesses the extent to which acknowledged efficient collection systems—especially withholding at source and advance payment regimes—are used. Assessed scores are shown in Table 14 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 14. P5-13 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P5-13. The extent to which withholding at source and advance payment systems are used.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="65" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 5.14  ******************************************************************* -->
<?php 
	$strPoa = 'P5-14';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P5-14: Timeliness of payments</h2></div>
	<div class="par-full-width-div"><p>This indicator assesses the extent to which payments are made on time (by number and by value). For TADAT measurement purposes, VAT payment performance is used as a proxy for on-time payment performance of core taxes generally. A high on-time payment percentage is indicative of sound compliance management including, for example, provision of convenient payment methods and effective follow-up of overdue amounts. Assessed scores are shown in Table 15 followed by an explanation of reasons underlying the assessment.</p></div>
	
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 15. P5-11 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P5-14-1. The number of VAT payments made by the statutory due date in percent of the total number of payments due.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P5-14-2. The value of VAT payments made by the statutory due date in percent of the total value of VAT payments due.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
					</tr>
				
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>
<!-- ***************************************************** POA 5.15  ******************************************************************* -->
<?php 
	$strPoa = 'P5-15';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P5-15: Stock and flow of tax arrears</h2></div>
	<div class="par-full-width-div"><p>This indicator examines the extent of accumulated tax arrears. Two measurement dimensions are used to gauge the size of the administration's tax arrears inventory: (1) the ratio of end-year tax arrears to the denominator of annual tax collections; and (2) the more refined ratio of end-year 'collectible tax arrears' to annual collection1 A third measurement dimension looks at the extent of unpaid tax liabilities that are more than a year overdue (a high percentage may indicate poor debt collection practices and performance given that the rate of recovery of tax arrears tends to decline as arrears get older). Assessed scores are shown in Table 16 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 16. P5-15 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P5-15-1. The value of total core tax arrears at fiscal year-end as a percentage of total core tax revenue collections for the fiscal year.</td>
					<td width="75" rowspan="3" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="3" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P5-15-2. The value of collectible core tax arrears at fiscal year-end as a percentage of total core tax revenue collections for the fiscal year.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
				</tr>
				<tr>
					<td>P5-15-3. The value of core tax arrears more than 12 months' old as a percentage of the value of all core tax arrears.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_3_final'];?></td>
					</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>


<!-- ***************************************************** POA 6.16  ******************************************************************* -->
<?php 
	$strPoa = 'P6-16';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 6: Accurate Reporting in Declarations</h3></div>
	<p>Tax systems rely heavily on complete and accurate reporting of information by taxpayers in tax declarations. Tax administrations therefore need to regularly monitor tax revenue losses from inaccurate reporting, especially by business taxpayers, and take a range of actions to ensure compliance. These actions fall into two broad groups: verification activities (e.g., tax audits, investigations, and income matching against third party information sources) and proactive initiatives (e.g., taxpayer assistance and education as covered in POA 3, and cooperative compliance approaches).</p>
	<p>If well designed and managed, tax audit programs can have far wider impact than simply raising additional revenue from discrepancies detected by tax audits. Detecting and penalizing serious offenders serve to remind all taxpayers of the consequences of inaccurate reporting.</p>	
	<p>Also prominent in modern tax administration is high-volume automated crosschecking of amounts reported in tax declarations with third party information. Because of the high cost and relative low coverage rates associated with traditional audit methods, tax administrations are increasingly using technology to screen large numbers of taxpayer records to detect discrepancies and encourage correct reporting.</p>
	<p>Proactive initiatives also play an important role in addressing risks of inaccurate reporting. Increasingly, these include adopting cooperative compliance approaches to build collaborative and trust-based relationships with taxpayers (especially large taxpayers) and intermediaries to resolve tax issues and bring certainty to companies' tax positions in advance of a tax declaration being filed, or before a transaction is actually entered into. A system of binding tax rulings can play an important role here.</p>	
	<p>Finally, on the issue of monitoring the extent of inaccurate reporting across the taxpayer population generally, a variety of approaches are being used, including: use of tax compliance gap estimating models, both for direct and indirect taxes; advanced analytics using large data sets (e.g., predictive models, clustering techniques, and scoring models) to determine the likelihood of taxpayers making full and accurate disclosures of income; and surveys to monitor taxpayer attitudes towards accurate reporting of income.</p>		
	<p>Against this background, three performance indicators are used to assess POA 6:</p>	
		<ul>
			<li>P6-16—Scope of verification actions taken to detect and deter inaccurate reporting.</li>
			<li>P6-17—Extent of proactive initiatives to encourage accurate reporting.</li>
			<li>P6-18—Monitoring the extent of inaccurate reporting.</li>
		</ul>
	<div class="par-heading-full-width-div"><h2>P6-16: Scope of verification actions taken to detect and deter inaccurate reporting</h2></div>
	<div class="par-full-width-div"><p>For this indicator, two measurement dimensions provide an indication of the nature and scope of the tax administration's verification program. Assessed scores are shown in Table 17 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 17. P6-16 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P6-16-1. The nature and scope of the tax audit program in place to detect and deter inaccurate reporting.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P6-16-2. The extent of large-scale automated crosschecking to verify information in tax declarations.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
				</tr>
			</table>
	</div>
	
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 6.17  ******************************************************************* -->
<?php 
	$strPoa = 'P6-17';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P6-17: Extent of proactive initiatives to encourage accurate reporting</h2></div>
	<div class="par-full-width-div"><p>This indicator assesses the nature and scope of cooperative compliance and other proactive initiatives undertaken to encourage accurate reporting. Assessed scores are shown in Table 18 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 18. P6-17 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P6-17. The nature and scope of cooperative compliance and other proactive initiatives undertaken to encourage accurate reporting.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
					</tr>
				
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 6.18  ******************************************************************* -->
<?php 
	$strPoa = 'P6-18';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P6-18: Monitoring the extent of inaccurate reporting</h2></div>
	<div class="par-full-width-div"><p>This indicator examines the soundness of methods used by the tax administration to monitor the extent of inaccurate reporting in declarations. The assessed score is shown in Table 19 followed by an explanation of reasons underlying theassessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 19. P6-18 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P6-18. The soundness of the method/s used by the tax administration to monitor the extent of inaccurate reporting.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
					</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 7.19  ******************************************************************* -->
<?php 
	$strPoa = 'P7-19';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 7: Effective Tax Dispute Resolution</h3></div>
	<p>This POA deals with the process by which a taxpayer seeks an independent review, on grounds of facts or interpretation of the law, of a tax assessment resulting from an audit. Above all, a tax dispute process must safeguard a taxpayer's right to challenge a tax assessment and get a fair hearing. The process should be based on a legal framework, be known and understood by taxpayers, be easily accessible, guarantee transparent independent decision-making, and resolve disputed matters in a timely manner.</p>
	<p>Three performance indicators are used to assess POA 7:</p>	
		<ul>
			<li>P7-19—Existence of an independent, workable, and graduated dispute resolution process.</li>
			<li>P7-20—Time taken to resolve disputes.</li>
			<li>P7-21—Degree to which dispute outcomes are acted upon.</li>
		</ul>
	<div class="par-heading-full-width-div"><h2>P7-19: Existence of an independent, workable, and graduated resolution process</h2></div>
	<div class="par-full-width-div"><p>For this indicator three measurement dimensions assess: (1) the extent to which a dispute may be escalated to an independent external tribunal or court where a taxpayer is dissatisfied with the result of the tax administration's review process; (2) the extent to which the tax administration's review process is truly independent; and (3) the extent to which taxpayers are informed of their rights and avenues of review. Assessed scores are shown in Table 20 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 20. P7-19 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
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
	
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 7.20  ******************************************************************* -->
<?php 
	$strPoa = 'P7-20';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P7-20: Time taken to resolve disputes</h2></div>
	<div class="par-full-width-div"><p>This indicator assesses how responsive the tax administration is in completing administrative reviews. Assessed scores are shown in Table 21 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 21. P7-20 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P7-20. The time taken to complete administrative reviews.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="65" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 7.21  ******************************************************************* -->
<?php 
	$strPoa = 'P7-21';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P7-21: Degree to which dispute outcomes are acted upon</h2></div>
	<div class="par-full-width-div"><p>This indicator looks at the extent to which dispute outcomes are taken into account in determining policy, legislation, and administrative procedure. The assessed score is shown in Table 22 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 22. P7-21 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P7-21. The extent to which the tax administration responds to dispute outcomes.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="65" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 8.22  ******************************************************************* -->
<?php 
	$strPoa = 'P8-22';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 8: Efficient Revenue Management</h3></div>
	<p>This POA focuses on three key activities performed by tax administrations in relation to revenue management:</p>
		<ul>
			<li>Providing input to government budgeting processes of tax revenue forecasting and tax revenue estimating. (As a general rule, primary responsibility for advising government on tax revenue forecasts and estimates rests with the Ministry of Finance. The tax administration provides data and analytical input to the forecasting and estimating processes. Ministries of finance often set operational revenue collection targets for the tax administration based on forecasts of revenue for different taxes.)</li>
			<li>Maintaining a system of revenue accounts.</li>
			<li>Paying tax refunds.</li>
		</ul>
	<p>Three performance indicators are used to assess POA 8:</p>	
		<ul>
			<li>P8-22—Contribution to government tax revenue forecasting process.</li>
			<li>P8-23—Adequacy of the tax revenue accounting system.</li>
			<li>P8-24—Adequacy of tax refund processing.</li>
		</ul>
	<div class="par-heading-full-width-div"><h2>P8-22: Contribution to government tax revenue forecasting process</h2></div>
	<div class="par-full-width-div"><p>This indicator assesses the extent of tax administration input to government tax revenue forecasting and estimating. The assessed score is shown in Table 23 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 23. P8-22 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P8-22. The extent of tax administration input to government tax revenue forecasting and estimating.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="65" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>
	
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 8.23  ******************************************************************* -->
<?php 
	$strPoa = 'P8-23';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P8-23: Adequacy of the tax revenue accounting system</h2></div>
	<div class="par-full-width-div"><p>This indicator examines the adequacy of the tax revenue accounting system. Assessed scores are shown in Table 24 followed by an explanation of reasons underlying the assessment.</p> </div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 24. P8-23 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P8-23. Adequacy of the tax administration's revenue accounting system.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="65" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 8.24  ******************************************************************* -->
<?php 
	$strPoa = 'P8-24';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P8-24: Adequacy of tax refund processing</h2></div>
	<div class="par-full-width-div"><p>For this indicator, two measurement dimensions assess the tax administration's system of processing VAT refund claims. Assessed scores are shown in Table 25 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 25. P8-24 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P8-24-1. Adequacy of the VAT refund system.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P8-24-2. The time taken to pay (or offset) VAT refunds.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
					</tr>
				
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 9.25  ******************************************************************* -->
<?php 
	$strPoa = 'P9-25';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h3>POA 9: Accountability and Transparency</h3></div>
	<p>Accountability and transparency are central pillars of good governance. Their institutionalization reflects the principle that tax administrations should be answerable for the way they use public resources and exercise authority. To enhance community confidence and trust, tax administrations should be openly accountable for their actions within a framework of responsibility to the minister, government, legislature, and the general public.</p>
	<p>Four performance indicators are used to assess POA 9:</p>	
		<ul>
			<li>P9-25—Internal assurance mechanisms.</li>
			<li>P9-26—External oversight of the tax administration.</li>
			<li>P9-27—Public perception of integrity.</li>
			<li>P9-28—Publication of activities, results, and plans.</li>			
		</ul>
	<div class="par-heading-full-width-div"><h2>P9-25: Internal assurance mechanisms</h2></div>
	<div class="par-full-width-div"><p>For this indicator, two measurement dimensions assess the internal assurance mechanisms in place to protect the tax administration from loss, error, and fraud. Assessed scores are shown in Table 26 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 26. P9-25 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P9-25-2. Assurance provided by internal audit.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P9-25-3. Staff integrity assurance mechanisms.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
					</tr>
			</table>
	</div>
	
	
	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 9.26  ******************************************************************* -->
<?php 
	$strPoa = 'P9-26';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P9-26: External oversight of the tax administration</h2></div>
	<div class="par-full-width-div"><p>Two measurement dimensions of this indicator assess: (1) the extent of independent external oversight of the tax administration's operations and financial performance; and (2) the investigation process for suspected wrongdoing and maladministration. Assessed scores are shown in Table 27 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 27. P9-26</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P9-26-1. The extent of independent external oversight of the tax administration's operations and financial performance.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P9-26-2. The investigation process for suspected wrongdoing and maladministration.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
					</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 9.27  ******************************************************************* -->
<?php 
	$strPoa = 'P9-27';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P9-27: Public perception of integrity</h2></div>
	<div class="par-full-width-div"><p>This indicator examines measures taken to gauge public confidence in the tax administration. The assessed score is shown in Table 28 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="3">Table 28. P9-27 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P9-27. The mechanism for monitoring public confidence in the tax administration.</td>
					<td width="75" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="65" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>

<!-- ***************************************************** POA 9.28  ******************************************************************* -->
<?php 
	$strPoa = 'P9-28';
	$arrIndicatorDetails = _get_par_performance_inidcators_details_by_id($strPoa);	
	$table = $arrIndicatorDetails['questionTable'];
	$arrParScores = _get_par_indicator_score_by_id($mission_id, $table);
?>
<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body">
	<div class="par-heading-full-width-div"><h2>P9-28: Publication of activities, results, and plans</h2></div>
	<div class="par-full-width-div"><p>Two measurement dimensions of this indicator assess the extent of: (1) public reporting of financial and operational performance; and (2) publication of future directions and plans. Assessed scores are shown in Table 29 followed by an explanation of reasons underlying the assessment.</p></div>
		<div class="par-full-width-div" style="margin-bottom:5px !important">
			<table id="table-poa">
				<tr>
					<th colspan="4">Table 29. P9-28 Assessment</th>
				</tr>
				<tr>
					<td class="poa-heading-medium">Measurement dimensions</td>
					<td class="poa-heading-medium center">Scoring Method</td>
					<td colspan="2" class="poa-heading-medium center">Score <?php echo $strDateYear;?></td>
				</tr>
				<tr>
					<td>P9-28-1. The extent to which the financial and operational performance of the tax administration is made public, and the timeliness of publication.</td>
					<td width="75" rowspan="2" class="center">M<?php echo $arrIndicatorDetails['fkidScoringMethod'];?></td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_1_final'];?></td>
					<td width="35" rowspan="2" class="center"><?php echo $arrParScores['score_symbol_overall_final'];?></td>
				</tr>
				<tr>
					<td>P9-28-2. The extent to which there is publication of the tax administration's future directions and plans are made public, and the timeliness of publication.</td>
					<td width="35" class="center"><?php echo $arrParScores['score_symbol_dimension_2_final'];?></td>
					</tr>
			</table>
	</div>

	<div class="par-full-width-div">
		<?php 
			if($arrParData && $arrParData[0][$strPoa] !== ''){
				echo $arrParData[0][$strPoa];
			}
		?>
	</div>	
</div>



<div class="pdf-header-image"><img src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_coloured_header_blocks.jpg"></div>
<div class="pdf-body" style="font-size:11px !important">
	<div class="par-heading-full-width-div"><h1>Attachment I. TADAT Framework</h1></div>
	<div class="par-heading-full-width-div" style="margin-bottom:0px !important"><h3>Performance outcome areas</h3></div>
	<p>TADAT assesses the performance of a country's tax administration system by reference to nine outcome areas:</p>
	<table>
		<tr>
			<td style="width:340px !important">
				<ol style="margin-top:0px !important; padding-top:0px !important; margin-bottom:0px !important; padding-bottom:0px !important">
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Integrity of the registered taxpayer base:</b></span> Registration of taxpayers and maintenance of a complete and accurate taxpayer database is fundamental to effective tax administration.</li>
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Effective risk management:</b></span> Performance improves when risks to revenue and tax administration operations are identified and systematically managed.</li>
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Support given to taxpayers to help them comply:</b></span> Usually, most taxpayers will meet their tax obligations if they are given the necessary information and support to enable them to comply voluntarily.</li>
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> On-time filing of declarations:</b></span> Timely filing is essential because the filing of a tax declaration is a principal means by which a taxpayer's tax liability is established and becomes due and payable.</li>
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> On-time payment of taxes:</b></span> Non-payment and late payment of taxes can have a detrimental effect on government budgets and cash management. Collection of tax arrears is costly and time consuming.</li>
				</ol>
			</td>
			<td><img style="float:right !important; margin:0px !important; padding:0px !important" src="<?php echo $_SERVER["../../etadat/reporting/DOCUMENT_ROOT"]?>/public_assets/reporting/images/tadat_wheel_small.jpg"></td>	
		</tr>
		<tr>
			<td colspan="2">
				<ol style="margin-top:0px !important; padding-top:0px !important" start="6">
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Accuracy of information reported in tax declarations:</b></span> Tax systems rely heavily on complete and accurate reporting of information in tax declarations. Audit and other verification activities, and proactive initiatives of taxpayer assistance, promote accurate reporting and mitigate tax fraud.</li>
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Adequacy of dispute resolution processes:</b></span> Independent, accessible, and efficient review mechanisms safeguard a taxpayer's right to challenge a tax assessment and get a fair hearing in a timely manner.</li>
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Efficient revenue management:</b></span> Tax revenue collections must be fully accounted for, monitored against budget expectations, and analyzed to inform government revenue forecasting. Legitimate tax refunds to individuals and businesses must be paid promptly.</li>
					<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Accountability and transparency:</b></span> As public institutions, tax administrations are answerable for the way they use public resources and exercise authority. Community confidence and trust are enhanced when there is open accountability for administrative actions within a framework of responsibility to the minister, legislature, and general community.</li>
				</ol>
			</td>
		</tr>
	</table>
	<div class="par-heading-full-width-div"><h3 style="padding-top:0px !important; margin-top:0px !important; margin-bottom:0px !important; padding-bottom:0px !important">Indicators and associated measurement dimensions</h3></div>
	<p>A set of 28 high-level indicators critical to tax administration performance are linked to the performance outcome areas. It is these indicators that are scored and reported on. A total of 47 measurement dimensions are taken into account in arriving at the indicator scores. Each indicator has between one and four measurement dimensions.</p>
	<p>The indicators are oriented towards assessing performance outcomes, although in some cases outputs are used as proxies for outcomes. As far as possible, TADAT avoids measuring inputs and enabling factors that contribute to outcomes (e.g., organizational structures, human resources, administrative budgets, information technology (IT), and legislation).</p>
	<p>Repeated assessments will provide information on the extent to which a country's tax administration is improving.</p>
	<div class="par-heading-full-width-div"><h3 style="padding-top:0px !important; margin-top:0px !important; margin-bottom:0px !important; padding-bottom:0px !important">Scoring methodology</h3></div>
	<p>The assessment of indicators follows the same approach followed in the Public Expenditure and Financial Accountability (PEFA) diagnostic tool so as to aid comparability where both tools are used.</p>
	<p>Each of TADAT's 47 measurement dimensions is assessed separately. The overall score for an indicator is based on the assessment of the individual dimensions of the indicator. Combining the scores for dimensions into an overall score for an indicator is done using one of two methods: Method 1 (M1) or Method 2 (M2). For both M1 and M2, the four-point 'ABCD' scale is used to score each dimension and indicator.</p>
	<p><b>Method M1</b> is used for all single dimensional indicators and for multi-dimensional indicators where poor performance on one dimension of the indicator is likely to undermine the impact of good performance on other dimensions of the same indicator (in other words, by the weakest link in the connected dimensions of the indicator).		</p>
	<p><b>Method M2</b> is based on averaging the scores for individual dimensions of an indicator. It is used for selectedmulti-dimensional indicators where a low score on one dimension of the indicator does not necessarily undermine the impact of higher scores on other dimensions for the same indicator.</p>
</div>