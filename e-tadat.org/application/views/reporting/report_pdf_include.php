<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
echo 'asdf';
echo $section_id;
$mission_id = 14;
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
	
	$chartData = '[
					[
						{axis:"P9-28",value:'.$strIndicator_28_data.'}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
						{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
						{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:'.$strIndicator_2_data.'},	{axis:"P1-1",value:'.$strIndicator_1_data.'}				
					],
					[
						{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
						{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
						{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:'.$strIndicator_6_data.'},	{axis:"P2-5",value:'.$strIndicator_5_data.'},	{axis:"P2-4",value:'.$strIndicator_4_data.'},	{axis:"P2-3",value:'.$strIndicator_3_data.'},
						{axis:"P1-2",value:'.$strIndicator_2_data.'},	{axis:"P1-1",value:0}				
					],
					[
						{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
						{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
						{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:'.$strIndicator_9_data.'},	{axis:"P3-8",value:'.$strIndicator_8_data.'},	{axis:"P3-7",value:'.$strIndicator_7_data.'},
						{axis:"P2-6",value:'.$strIndicator_6_data.'},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
					],
					[
						{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
						{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
						{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:'.$strIndicator_11_data.'},	{axis:"P4-10",value:'.$strIndicator_10_data.'},
						{axis:"P3-9",value:'.$strIndicator_9_data.'},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
					],
					[
						{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
						{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
						{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:'.$strIndicator_15_data.'},	{axis:"P5-14",value:'.$strIndicator_14_data.'}, {axis:"P5-13",value:'.$strIndicator_13_data.'}, {axis:"P5-12",value:'.$strIndicator_12_data.'},
						{axis:"P4-11",value:'.$strIndicator_11_data.'},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
					],
					[	
						{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
						{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
						{axis:"P6-18",value:'.$strIndicator_18_data.'},	{axis:"P6-17",value:'.$strIndicator_17_data.'},	{axis:"P6-16",value:'.$strIndicator_16_data.'},	
						{axis:"P5-15",value:'.$strIndicator_15_data.'},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
					],
					[	
						{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
						{axis:"P7-21",value:'.$strIndicator_21_data.'},	{axis:"P7-20",value:'.$strIndicator_20_data.'},	{axis:"P7-19",value:'.$strIndicator_19_data.'},
						{axis:"P6-18",value:'.$strIndicator_18_data.'},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
					],
					[
						{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
						{axis:"P8-24",value:'.$strIndicator_24_data.'}, {axis:"P8-23",value:'.$strIndicator_23_data.'}, {axis:"P8-22",value:'.$strIndicator_22_data.'},
						{axis:"P7-21",value:'.$strIndicator_21_data.'},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
						{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:0},	{axis:"P1-1",value:0}
					],		
					[
						{axis:"P9-28",value:'.$strIndicator_28_data.'}, {axis:"P9-27",value:'.$strIndicator_27_data.'}, {axis:"P9-26",value:'.$strIndicator_26_data.'}, {axis:"P9-25",value:'.$strIndicator_25_data.'},
						{axis:"P8-24",value:'.$strIndicator_24_data.'}, {axis:"P8-23",value:0},	{axis:"P8-22",value:0},	
						{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},	
						{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
						{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
						{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
						{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
						{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
						{axis:"P1-2",value:0},	{axis:"P1-1",value:0}
					]			
				]';
				

				$tbl = 'par_section_'.$section_id;
				$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
				$arrParData = null;
				if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}

?>
	<div class="par-heading-full-width-div"><h1>Executive Summary</h1></div>
	<div class="par-full-width-div">
		<p>The results of the TADAT assessment for <?php echo _get_par_country_by_mission_id($mission_id);?> follow, including the identification of the main strengths and weaknesses.</p>
	</div>		
<?php echo form_open(base_url('/reporting/submit/'), array('role'=>'form', 'class'=>'form-horizontal')); ?>
	<div class="col-md-12">
		<div class="col-md-6 col-md-6-par">			
			<p><b>Strengths</b></p>

			<div class="editable" id="executive-strengths">
				<?php 
					if($arrParData && $arrParData[0]['executive-strengths'] !== ''){
						echo $arrParData[0]['executive-strengths'];
					}else{
				?>			
				<ul class="fa-ul">
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>[6-8 bullet points of the main strengths of the tax administration].</li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>					
				</ul>
				<?php }?>
			</div>
		</div>
		<div class="col-md-6 col-md-6-par">
			<p><b>Weaknesses</b></p>
			<div class="editable" id="executive-weaknesses">
				<?php 
					if($arrParData && $arrParData[0]['executive-strengths'] !== ''){
						echo $arrParData[0]['executive-strengths'];
					}else{
				?>			
				<ul class="fa-ul">
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>[6-8 bullet points of the main weaknesses of the tax administration].</li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>
					<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i></li>					
				</ul>
				<?php }?>				
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="editable" id="summary-strengths-weaknesses">
			<?php 
				if($arrParData && $arrParData[0]['summary-strengths-weaknesses'] !== ''){
					echo $arrParData[0]['summary-strengths-weaknesses'];
				}else{
			?>			
			<p>[Insert a summary paragraph of the major issues impacting tax administration performance but do not recommend solutions.]</p>
			<?php }?>							
		</div>
	</div>
	
	<div class="par-full-width-div">
		<p>Table 1 provides a summary of performance scores, and Figure 1 a graphical snapshot of the distribution of scores. The scoring is structured around the TADAT framework's nine performance outcome areas (POAs) and 28 high level indicators critical to tax administration performance. An 'ABCD' scale is used to score each indicator, with 'A+' representing the highest level of performance and 'D' the lowest.</p>
	</div>		

<script type="text/javascript" >var d = <? echo $chartData; ?>;</script>
	<div class="par-heading-half-width-div"><h1>Figure 1. <?php echo _get_par_country_by_mission_id($mission_id);?>: Distribution of Performance Scores</h1></div>
	<div id="chart-body">
		<div id="chart"></div>
		<div id="div-legend">
			<table id="table-executive-legend">
				<tr><th colspan="5"><span class="table-executive-legend-heading">TADAT RADAR CHART LEGEND</span></th>
				</tr>
				<tr>
					<td width="15"><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 1: Integrity of the Registered Taxpayer Base</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P1-1</td>
					<td>:</td>					  
				<td><?php echo $score_1; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P1-2</td>
					<td>:</td>					  
					<td><?php echo $score_2; ?></td>		  		  
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 2: Effective Risk Management</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-3</td>
					<td>:</td>					  
					<td><?php echo $score_3; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-4</td>
					<td>:</td>					  
					<td><?php echo $score_4; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-5</td>
					<td>:</td>					  
					<td><?php echo $score_5; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P2-6</td>
					<td>:</td>					  
					<td><?php echo $score_6; ?></td>		  		  
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 3: Supporting Voluntary Compliance</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P3-7</td>
					<td>:</td>					  
					<td><?php echo $score_7; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P3-8</td>
					<td>:</td>					  
					<td><?php echo $score_8; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P3-9</td>
					<td>:</td>					  
					<td><?php echo $score_9; ?></td>		  		  
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 4: Timely Filing of Tax Declarations</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P4-10</td>
					<td>:</td>					  
					<td><?php echo $score_10; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P4-11</td>
					<td>:</td>					  
					<td><?php echo $score_11; ?></td>		  		  
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 5: Timely Payment of Taxes</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-12</td>
					<td>:</td>					  
					<td><?php echo $score_12; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-13</td>
					<td>:</td>					  
					<td><?php echo $score_13; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-14</td>
					<td>:</td>					  
					<td><?php echo $score_14; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P5-15</td>
					<td>:</td>					  
					<td><?php echo $score_15; ?></td>		  		  
				</tr>
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 6: Accurate Reporting in Declarations</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P6-16</td>
					<td>:</td>					  
					<td><?php echo $score_16; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P6-17</td>
					<td>:</td>					  
					<td><?php echo $score_17; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P6-18</td>
					<td>:</td>					  
					<td><?php echo $score_18; ?></td>		  		  
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 7: Effective Tax Dispute Resolution</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P7-19</td>
					<td>:</td>					  
					<td><?php echo $score_19; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P7-20</td>
					<td>:</td>					  
					<td><?php echo $score_20; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P7-21</td>
					<td>:</td>					  
					<td><?php echo $score_21; ?></td>		  		  
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 8: Efficient Revenue Management</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P8-22</td>
					<td>:</td>					  
					<td><?php echo $score_22; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P8-23</td>
					<td>:</td>					  
					<td><?php echo $score_23; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P8-24</td>
					<td>:</td>					  
					<td><?php echo $score_24; ?></td>		  		  
				</tr>				  
				<tr>
					<td><div class="table-executive-small-legend"></div></td>
					<td colspan="4"><span class="legend-poa-heading">POA 9: Accountability and Transparency</span></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-25</td>
					<td>:</td>					  
					<td><?php echo $score_25; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-26</td>
					<td>:</td>					  
					<td><?php echo $score_26; ?></td>		  		  
				</tr>
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-27</td>
					<td>:</td>					  
					<td><?php echo $score_27; ?></td>		  		  
				</tr>				  
				<tr>
					<td></td>
					<td><div class="table-executive-small-legend"></div></td>
					<td>P9-28</td>
					<td>:</td>					  
					<td><?php echo $score_28; ?></td>		  		  
				</tr>				  
		  </table>
	  </div>	
	</div>
	
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
				<td>P1-1. Accurate and reliable taxpayer information</td>
				<td class="center"><?php echo $score_1;?></td>	
				<td>
					<div class="<?php echo $editClass; ?>" id="explanation-1">
						<?php 
							if($arrParData && $arrParData[0]['explanation-1'] !== ''){
								echo $arrParData[0]['explanation-1'];
							}else{
						?>			
						<p>[Insert a short one-sentence explanation.]</p>
						<?php }?>							
					</div>
				</td>		
			</tr>
			<tr>
				<td>P1-2. Knowledge of the potential taxpayer base.</td>
				<td class="center"><?php echo $score_2;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-2">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 2: Effective Risk Management</td>
			</tr>
			<tr>
				<td>P2-3. Identification, assessment, ranking, and quantification of compliance risks.</td>
				<td class="center"><?php echo $score_3;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-3">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P2-4. Mitigation of risks through a compliance improvement plan.</td>
				<td class="center"><?php echo $score_4;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-4">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P2-5. Monitoring and evaluation of compliance risk mitigation activities.</span></td>
				<td class="center"><?php echo $score_5;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-5">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P2-6. Identification, assessment, and mitigation of institutional risks.</td>
				<td class="center"><?php echo $score_6;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-6">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 3: Supporting Voluntary Compliance</td>
			</tr>
			<tr>
				<td>P3-7. Scope, currency, and accessibility of information.</td>
				<td class="center"><?php echo $score_7;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-7">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P3-8. Scope of initiatives to reduce taxpayer compliance costs.</td>
				<td class="center"><?php echo $score_8;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-8">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P3-9. Obtaining taxpayer feedback on products and services.</td>
				<td class="center"><?php echo $score_9;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-9">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			
			<tr>
				<td colspan="3" class="poa-heading">POA 4: Timely Filing of Tax Declarations</td>
			</tr>
			<tr>
				<td>P4-10. On-time filing rate.</td>
				<td class="center"><?php echo $score_10;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-10">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P4-11. Use of electronic filing facilities.</td>
				<td class="center"><?php echo $score_11?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-11">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 5: Timely Payment of Taxes</td>
			</tr>
			<tr>
				<td>P5-12. Use of electronic payment methods.</td>
				<td class="center"><?php echo $score_12;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-12">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P5-13. Use of efficient collection systems.</td>
				<td class="center"><?php echo $score_13;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-13">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P5-14. Timeliness of payments.</td>
				<td class="center"><?php echo $score_14;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-14">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P5-15. Stock and flow of tax arrears.</td>
				<td class="center"><?php echo $score_15;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-15">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			
			<tr>
				<td colspan="3" class="poa-heading">POA 6: Accurate Reporting in Declarations</td>
			</tr>
			<tr>
				<td>P6-16. Scope of verification actions taken to detect and deter inaccurate reporting.</td>
				<td class="center"><?php echo $score_16;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-16">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P6-17. Extent of proactive initiatives to encourage accurate reporting.</td>
				<td class="center"><?php echo $score_17;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-17">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P6-18. Monitoring the extent of inaccurate reporting.</td>
				<td class="center"><?php echo $score_18;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-18">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 7: Effective Tax Dispute Resolution</td>
			</tr>
			<tr>
				<td>P7-19. Existence of an independent, workable, and graduated dispute resolution process.</td>
				<td class="center"><?php echo $score_19;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-19">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P7-20. Time taken to resolve disputes.</td>
				<td class="center"><?php echo $score_20;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-20">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P7-21. Degree to which dispute outcomes are acted upon.</td>
				<td class="center"><?php echo $score_21;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-21">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 8: Efficient Revenue Management</td>
			</tr>
			<tr>
				<td>P8-22. Contribution to government tax revenue forecasting process.</td>
				<td class="center"><?php echo $score_22;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-22">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P8-23. Adequacy of the tax revenue accounting system.</td>
				<td class="center"><?php echo $score_23;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-23">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P8-24. Adequacy of tax refund processing.</td>
				<td class="center"><?php echo $score_24;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-24">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td colspan="3" class="poa-heading">POA 9: Accountability and Transparency</td>
			</tr>
			<tr>
				<td>P9-25. Internal assurance mechanisms.</td>
				<td class="center"><?php echo $score_25;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-25">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P9-26. External oversight of the tax administration.</td>
				<td class="center"><?php echo $score_26;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-26">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P9-27. Public perception of integrity.</td>
				<td class="center"><?php echo $score_27;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-27">[Insert a short one-sentence explanation.]</div></td>		
			</tr>
			<tr>
				<td>P9-28. Publication of activities, results, and plans.</td>
				<td class="center"><?php echo $score_28;?></td>	
				<td><div class="<?php echo $editClass; ?>" id="explanation-28">[Insert a short one-sentence explanation.]</div></td>		
			</tr>												
		</table>
	</div>

<input type="hidden" name="fkidMission" id="id-mission_id" value="<?php echo $mission_id;?>" />
<input type="hidden" name="fkidSection" id="section_id" value="<?php echo $section_id;?>" />
		<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button><button style="width:175px !important; margin-left:25px !important" type="submit" id="id_save_button" class="btn btn-success white-text"><i class="fa  fa-save mr5"></i>Submit Changes</button></div>

<?php echo form_close(); ?>
<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>/*

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('TADAT Secretariat');
    $pdf->SetTitle('PERFORMANCE ASSESSMENT REPORT');
    $pdf->SetSubject('TADAT DRAFT PAR');
    $pdf->SetKeywords('TADAT, PAR');   
  
    // set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, 210, '', '', array(255,255,255), array(255,255,255));
    $pdf->setFooterData(array(255,255,255), array(255,255,255)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(0, PDF_MARGIN_TOP, 0);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
  
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
  
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
  
 
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('dejavusans', '', 10, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
  

    $html = <<<EOD
<style>
.t-o-c {
	list-style: none;
	margin-bottom: 20px;
}
.t-o-c li {
	background: url("images/dot.gif") repeat-x bottom left;
	overflow: hidden;
	padding-bottom: 2px;
}
.t-o-c a,
.t-o-c span {
	display: inline-block;
	background: #fff;
	position: relative;
	bottom: -4px;
}
.t-o-c a {
	float: right;
	padding: 0 0 3px 2px;
}
.t-o-c span {
	float: left;
	padding: 0 2px 3px 0;
}
</style>	
	
<div style="width:695px !important; height:842px !important; border:1px solid #999; margin:auto !important">

			<table id="id-table-without-border" class="table-without-border" style="width:750px !important; margin-right:40px !important; padding:2px !important">
				<tr>
					<td style="width:100px !important;">ACG</td>
					<td>Acting Commissioner General</td>
				</tr>
				<tr>
					<td style="width:100px !important;">CAG</td>
					<td> Controller and Auditor General </td>
				</tr>
				<tr>
					<td style="width:100px !important;">CIT</td>
					<td> Corporate income tax </td>
				</tr>
				<tr>
					<td style="width:100px !important;">CRMP</td>
					<td> Compliance Risk Management Plan</td>
				</tr>
				<tr>
					<td style="width:100px !important;">DRD</td>
					<td> Domestic Revenue Department</td>
				</tr>
				<tr>
					<td style="width:100px !important;">DTA</td>
					<td> Double Taxation Agreement</td>
				</tr>
				<tr>
					<td style="width:100px !important;">EFD</td>
					<td> Electronic Fiscal Device</td>
				</tr>
				<tr>
					<td style="width:100px !important;">ERMS</td>
					<td> Enterprise-wide Risk Management System </td>
				</tr>
				<tr>
					<td style="width:100px !important;">GDP</td>
					<td> Gross Domestic Product</td>
				</tr>
				<tr>
					<td style="width:100px !important;">ICT</td>
					<td> Information and Communication Technology</td>
				</tr>
				<tr>
					<td style="width:100px !important;">ITAX</td>
					<td> Integrated Tax Administration System</td>
				</tr>
				<tr>
					<td style="width:100px !important;">KPIs</td>
					<td> Key Performance Indicators </td>
				</tr>
				<tr>
					<td style="width:100px !important;">LTD</td>
					<td> Large Taxpayers Department</td>
				</tr>
				<tr>
					<td style="width:100px !important;">PAYE</td>
					<td> Pay-as-you-earn</td>
				</tr>
				<tr>
					<td style="width:100px !important;">PIT</td>
					<td> Personal income tax</td>
				</tr>
				<tr>
					<td style="width:100px !important;">PCCB</td>
					<td> Prevention and Combating of Corruption Bureau</td>
				</tr>
				<tr>
					<td style="width:100px !important;">POA</td>
					<td> Performance outcome area</td>
				</tr>
				<tr>
					<td style="width:100px !important;">RGS</td>
					<td> Revenue Gateway System</td>
				</tr>
				<tr>
					<td style="width:100px !important;">RPD</td>
					<td> Research and Policy Department</td>
				</tr>
				<tr>
					<td style="width:100px !important;">SME</td>
					<td> Small and Medium Enterprise</td>
				</tr>
				<tr>
					<td style="width:100px !important;">SWIFT</td>
					<td> Society for Worldwide Interbank Financial Telecommunications</td>
				</tr>
				<tr>
					<td style="width:100px !important;">TADAT</td>
					<td> Tax Administration Diagnostic Assessment Tool</td>
				</tr>
				<tr>
					<td style="width:100px !important;">TIN</td>
					<td> Taxpayer Identification Number</td>
				</tr>
				<tr>
					<td style="width:100px !important;">VAT</td>
					<td> Value-added tax</td>
				</tr>
			</table>

</div>
     
EOD;
  
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  
    // ---------------------------------------------------------    
  
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
//   $pdf->Output('example_001.pdf', 'I');    

	?>

