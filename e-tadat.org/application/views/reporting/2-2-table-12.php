<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_12';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>H. Tax Dispute Resolution</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="8">Table 12. Finalization of Administrative Reviews for <?php echo $periods[2];?></th>
			</tr>
			<tr>
					<td rowspan="2" class="poa-heading-medium center"><span class="center"><b>Month</b></span></td>
					<td rowspan="2" class="poa-heading-medium center"><span class="center"><b>Total number finalized</b></span></td>
					<td colspan="2" class="poa-heading-medium center"><span class="center"><b>Finalized within 30 days</b></span></td>
					<td colspan="2" class="poa-heading-medium center"><span class="center"><b>Finalized within 60 days</b></span></td>
					<td colspan="2" class="poa-heading-medium center"><span class="center"><b>Finalized within 90 days</b></span></td>
				</tr>
			<tr>
				<td class="poa-heading-medium center"><span class="center"><b>Number</b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>In percent of total</b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>Number</b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>In percent of total</b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>Number</b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>In percent of total</b></span></td>
			</tr>
			<tr>
				<td>Month 1</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_1'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_1'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_1'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_1'],0);?></td>								
			</tr>
			<tr>
				<td>Month 2</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_2'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_2'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_2'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_2'],0);?></td>								
			</tr>
			<tr>
				<td>Month 3</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_3'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_3'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_3'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_3'],0);?></td>								
			</tr>
			<tr>
				<td>Month 4</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_4'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_4'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_4'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_4'],0);?></td>								
			</tr>
			<tr>
				<td>Month 5</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_5'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_5'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_5'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_5'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_5'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_5'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_5'],0);?></td>								
			</tr>
			<tr>
				<td>Month 6</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_6'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_6'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_6'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_6'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_6'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_6'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_6'],0);?></td>								
			</tr>
			<tr>
				<td>Month 7</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_7'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_7'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_7'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_7'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_7'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_7'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_7'],0);?></td>								
			</tr>
			<tr>
				<td>Month 8</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_8'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_8'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_8'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_8'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_8'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_8'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_8'],0);?></td>								
			</tr>
			<tr>
				<td>Month 9</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_9'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_9'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_9'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_9'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_9'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_9'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_9'],0);?></td>								
			</tr>
			<tr>
				<td>Month 10</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_10'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_10'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_10'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_10'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_10'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_10'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_10'],0);?></td>								
			</tr>
			<tr>
				<td>Month 11</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_11'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_11'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_11'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_11'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_11'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_11'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_11'],0);?></td>								
			</tr>
			<tr>
				<td>Month 12</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_12'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_30_rate_12'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_12'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_60_rate_12'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_12'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_90_rate_12'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_12'],0);?></td>								
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
			</tr>
			<tr>
				<td>12-month total</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_30'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_rate_30'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_60'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_rate_60'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_90'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_rate_90'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['finalized_total_all'],0);?></td>								
			</tr>
			
		</table>
<p style="margin-top:15px !important"><b>Explanatory Note:</b></p>
<p><b><sup>1</sup></b>'Active' taxpayers means registrants from whom tax declarations (returns) are expected (i.e. 'active' taxpayers exclude those who have not filed a declaration within at least the last year because the case is defunct (e.g., a business taxpayer has ceased trading or an individual is deceased, the taxpayer cannot be located, or the taxpayer is insolvent).</p>
</div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>