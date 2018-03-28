<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_11';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrTrc = _get_fields_by_id_array('cloud_questions', 'pmq_table_1', 'fkidMission', $mission_id, $out = array('a_total_revenue_collections','b_total_revenue_collections','c_total_revenue_collections'));
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>G. Domestic Tax Arrears</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="4">Table 11. Value of Tax Arrears for the years <?php echo $periods[0];?>, <?php echo $periods[1];?>, <?php echo $periods[2];?> <b><sup>1</sup></b></th>
			</tr>
			<tr>
				<td class="poa-heading-small center">&nbsp;</td>
				<td class="poa-heading-medium center"><span class="center"><b><?php echo $periods[0];?></b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b><?php echo $periods[1];?></b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b><?php echo $periods[2];?></b></span></td>
			</tr>
			<tr>
				<td class="center">&nbsp;</td>
				<td colspan="3" class="center"><span class="center"><b>In local currency</b></span></td>
			</tr>
			<tr>
				<td>Total tax revenue collections (from Table 1) (A)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrTrc['a_total_revenue_collections']);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrTrc['b_total_revenue_collections']);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrTrc['c_total_revenue_collections']);?></td>
			</tr>
			<tr>
				<td>Total tax arrears at end of fiscal year <sup>2</sup> (B)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_collect_1'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_collect_2'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_collect_3'],0);?></td>
			</tr>
			<tr>
				<td style="padding-left:20px !important;">Of which: Collectible <sup>3</sup> (C)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_old_1'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_old_2'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_old_3'],0);?></td>
			</tr>
			<tr>
				<td style="padding-left:20px !important;">Of which: More than 12 months' old (D)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_total_1'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_total_2'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_total_3'],0);?></td>
			</tr>
			<tr>
				<td class="center">&nbsp;</td>
				<td colspan="3" class="center"><span class="center"><b>In percent</b></span></td>
			</tr>
			<tr>
				<td>Ratio of (B) to (A)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_a_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_a_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_a_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Ratio of (C) to (A)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_b_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_b_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_b_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Ratio of (D) to (B)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_c_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_c_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['arrears_ratio_c_3'],1);?>%</td>
			</tr>
		</table>
		<p style="margin-top:15px !important"><b>Explanatory Note:</b></p>
		<p><b><sup>1</sup></b>Data in this table will be used in assessing the value of tax arrears relative to annual collections, and examining the extent to which unpaid tax liabilities are significantly overdue (i.e. older than 12 months).</p>
		<p><b><sup>2</sup></b>'Total tax arrears' include tax, penalties, and accumulated interest.</p>
		<p><b><sup>3</sup></b>'Collectible' tax arrears is defined as the total amount of domestic tax, including interest and penalties, that is overdue for payment and which is not subject to collection impediments. Collectible tax arrears therefore generally exclude: </p>
		<ul>
			<li>amounts formally disputed by the taxpayer and for which collection action has been suspended pending the outcome</li>
			<li>amounts that are not legally recoverable (e.g., debt foregone through bankruptcy)</li>
			<li>arrears otherwise uncollectible (e.g., the debtor has no funds or other assets).</li>
		</ul>
</div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>