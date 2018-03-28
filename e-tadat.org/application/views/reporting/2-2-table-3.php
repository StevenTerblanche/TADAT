<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_3';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>C. Telephone Enquiries</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="4">Table 3. Telephone Enquiry Call Waiting Time
						(for most recent 12-month period)</th>
			</tr>
			<tr>
				<td rowspan="2" class="poa-heading-small center">Month</td>
				<td rowspan="2" class="poa-heading-small center"><span class="center"><b>Total number of telephone enquiry calls received</b></span></td>
				<td colspan="2" class="poa-heading-small center"><span class="center"><b>Telephone enquiry calls answered within 6 minutes' waiting time</b></span></td>
			</tr>
			<tr>
				<td class="poa-heading-small center"><span class="center"><b>Number</b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>In percent of total calls</b></span></td>				
			</tr>
			<tr>
				<td>Month 1</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_1'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_1'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_1'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 2</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_2'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_2'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_2'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 3</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_3'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_3'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 4</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_4'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_4'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_4'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 5</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_5'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_5'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_5'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 6</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_6'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_6'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_6'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 7</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_7'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_7'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_7'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 8</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_8'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_8'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_8'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 9</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_9'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_9'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_9'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 10</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_10'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_10'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_10'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 11</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_11'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_11'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_11'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 12</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_12'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['calls_received_within_12'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['call_received_rate_12'],1);?>%</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
				<td class="center white-td">&nbsp;</td>
			</tr>
			<tr>
				<td><b>12-month total</b></td>
				<td width="175" class="center white-td"><b><?php echo number_format($arrParData[0]['calls_received_total'],0);?></b></td>
				<td width="175" class="center white-td"><b><?php echo number_format($arrParData[0]['calls_received_within_total'],0);?></b></td>
				<td width="175" class="center white-td"><b><?php echo number_format($arrParData[0]['call_received_rate_total'],1);?>%</b></td>
			</tr>
			
		</table>
</div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>