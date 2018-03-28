<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	
	$scores = _get_scores_by_mission_id_all_tables($mission_id,'1');
	// This assigns the scores to the variable names from the Scores array;
	$strIndicator_1_data = 0;
	$strIndicator_2_data = 0;
	$strIndicator_3_data = 0;
	$strIndicator_4_data = 0;
	$strIndicator_5_data = 0;
	$strIndicator_6_data = 0;
	$strIndicator_7_data = 0;
	$strIndicator_8_data = 0;
	$strIndicator_9_data = 0;
	$strIndicator_10_data = 0;
	$strIndicator_11_data = 0;
	$strIndicator_12_data = 0;
	$strIndicator_13_data = 0;
	$strIndicator_14_data = 0;
	$strIndicator_15_data = 0;
	$strIndicator_16_data = 0;
	$strIndicator_17_data = 0;
	$strIndicator_18_data = 0;
	$strIndicator_19_data = 0;
	$strIndicator_20_data = 0;
	$strIndicator_21_data = 0;
	$strIndicator_22_data = 0;
	$strIndicator_23_data = 0;
	$strIndicator_24_data = 0;
	$strIndicator_25_data = 0;
	$strIndicator_26_data = 0;
	$strIndicator_27_data = 0;
	$strIndicator_28_data = 0;
	
	// This assigns the default (0 ||"") scores to the variable names;
	for($i = 1; $i < 29; $i++){
		$strScore = 'score_'.$i;				
		$$strScore = '';	
	}	
	
if($scores){

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
			$$strScore = $value['score'];				
			$strField = 'strIndicator_'.substr($value['table'], 2,3).'_data';	
			$$strField = _convert_score_type($value['score']);
	}
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
?>
<script type="text/javascript" >var d = <? echo $chartData; ?>;</script>
<div id="body">
	  <div style="float:left" id="chart"></div>
	  	<div id="chart-body">
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

	

</div>
