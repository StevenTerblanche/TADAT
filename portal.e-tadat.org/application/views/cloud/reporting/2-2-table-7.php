<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_7';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>D. Filing of Tax Declarations</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="4">Table 7. On-time Filing of VAT Declarations – Large taxpayers only, for the most recent 12-month period</th>
			</tr>
			<tr>
				<td class="poa-heading-small center"><span class="center"><b>Month</b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>Number of declarations filed on-time <sup>1</sup></b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>Number of declarations expected to be filed on-time <sup>2</sup></b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>On-time filing rate <sup>3</sup></b></span></td>				
			</tr>
			<tr>
				<td>Month 1</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_1'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_1'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_1'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 2</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_2'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_2'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_2'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 3</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_3'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_3'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 4</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_4'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_4'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_4'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 5</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_5'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_5'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_5'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 6</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_6'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_6'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_6'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 7</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_7'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_7'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_7'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 8</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_8'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_8'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_8'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 9</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_9'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_9'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_9'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 10</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_10'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_10'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_10'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 11</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_11'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_11'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_11'],1);?>%</td>
			</tr>
			<tr>
				<td>Month 12</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_12'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_12'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_12'],1);?>%</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="175" class="center white-td">&nbsp;</td>
				<td width="175" class="center white-td">&nbsp;</td>
				<td width="175" class="center white-td">&nbsp;</td>
			</tr>
			<tr>
				<td><b>12-month total</b></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_filed_total'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_expected_total'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_large_rate_total'],1);?>%</td>
			</tr>
			
			
		</table>
<p style="margin-top:15px !important"><b>Explanatory Note:</b></p>
<p><b><sup>1</sup></b>'On-time' filing means declarations (also known as 'returns') filed by the statutory due date for filing (plus any 'days of grace' applied by the tax administration as a matter of administrative policy).</p>
<p><b><sup>2</sup></b>'Expected declarations' means the number of VAT declarations that the tax administration expected to receive from registered VAT taxpayers that were required by law to file declarations.</p>
<p><b><sup>3</sup></b>The 'on-time filing rate' is the number of declarations filed by the statutory due date as a percentage of the total number of declarations expected from registered taxpayers, i.e. expressed as a ratio.</p>

</div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>