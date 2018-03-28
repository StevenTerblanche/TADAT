<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_13';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrTrc = _get_fields_by_id_array('cloud_questions', 'pmq_table_1', 'fkidMission', $mission_id, $out = array('a_total_revenue_collections','b_total_revenue_collections','c_total_revenue_collections'));
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>I. Payment of VAT Refunds</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="3">Table 13. VAT Refunds for <?php echo $periods[2];?></th>
			</tr>
			<tr>
				<td class="poa-heading-small center">&nbsp;</td>
				<td class="poa-heading-medium center"><span class="center"><b>Number of cases</b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>In local currency</b></span></td>
				</tr>
			<tr>
				<td>Total VAT refund claims received (A)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_received_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_received_value'],0);?></td>
			</tr>
			<tr>
				<td>Total VAT refunds paid <sup>1</sup></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['refunds_paid_number_total'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['refunds_paid_value_total'],0);?></td>
			</tr>
			<tr>
				<td style="padding-left:20px !important;">Of which: paid within 30 days (B) <sup>2</sup></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paid_within_30_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paid_within_30_value'],0);?></td>
			</tr>
			<tr>
				<td style="padding-left:20px !important;">Of which: paid outside 30 days</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paid_outside_30_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paid_outside_30_value'],0);?></td>
			</tr>
			<tr>
				<td>VAT refund claims declined <sup>3</sup></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_declined_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_declined_value'],0);?></td>
			</tr>
			<tr>
				<td>VAT refund claims not processed <sup>4</sup></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_unprocessed_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_unprocessed_value'],0);?></td>
			</tr>
			<tr>
				<td style="padding-left:20px !important;">Of which: no decision taken to decline refund</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_undecided_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_undecided_value'],0);?></td>
			</tr>

			<tr>
				<td style="padding-left:20px !important;">Of which: approved but not yet paid or offset</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_received_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['claims_received_value'],0);?></td>
			</tr>
			<tr>
				<td class="center">&nbsp;</td>
				<td colspan="2" class="center"><span class="center"><b>In percent</b></span></td>
			<tr>
				<td><strong>Ratio of (B) to (A) <sup>5</sup></strong></td>
				<td width="175" class="center white-td"><strong><?php echo number_format($arrParData[0]['claims_ratio_number'],1);?>%</strong></td>
				<td width="175" class="center white-td"><strong><?php echo number_format($arrParData[0]['claims_ratio_value'],1);?>%</strong></td>
				</tr>
				
		</table>
		<p style="margin-top:15px !important"><b>Explanatory Note:</b></p>
		<p><sup>1</sup>Include all refunds paid, as well as refunds offset against other tax liabilities.</p>
		<p><sup>2</sup>TADAT measures performance against a 30-day standard.</p>
		<p><sup>3</sup>Include cases where a formal decision has been taken to decline (refuse) the taxpayer's claim for refund (e.g., where the legal requirements for refund have not been met).</p>
		<p><sup>4</sup>Include all cases where refund processing is incomplete—i.e. where (a) the formal decision has not been taken to decline the refund claim; or (b) the refund has been approved but not paid or offset.</p>
<p><sup>5</sup>i.e. (Value of VAT refunds paid within 30 days / Value of all VAT refund claims received) x 100.</p></div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>