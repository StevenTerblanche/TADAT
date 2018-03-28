<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_2';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>B. Movements in the Taxpayer Register</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="6">Table 2. Movements in the Taxpayer Register for the years <?php echo $periods[0];?>, <?php echo $periods[1];?>, <?php echo $periods[2];?></th>
			</tr>
			<tr>
				<td class="poa-heading-small center">&nbsp;</td>
				<td class="poa-heading-small center"><span class="center"><b>Active<sup>1</sup> [A]</b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>Inactive (not yet deregistered) [B]</b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>Total end-year position [A + B]</b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>Percentage of inactive (not yet deregistered)</b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>Deregistered during the year</b></span></td>
			</tr>
			<tr>
				<td class="poa-heading center">&nbsp;</td>
				<td colspan="5" class="poa-heading-medium center"><span class="center"><b><?php echo $periods[0];?></b></span></td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_1_1_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_1_1_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_1_1_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_1_1_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_1_1_5'],0);?></td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_1_2_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_1_2_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_1_2_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_1_2_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_1_2_5'],0);?></td>
			</tr>
			<tr>
				<td>PAYE withholding (# of employers)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_1_3_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_1_3_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_1_3_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_1_3_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_1_3_5'],0);?></td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_1_4_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_1_4_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_1_4_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_1_4_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_1_4_5'],0);?></td>
			</tr>
			<tr>
				<td>Domestic excise tax</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_1_5_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_1_5_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_1_5_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_1_5_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_1_5_5'],0);?></td>
			</tr>
			<tr>
				<td>Other taxpayers</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_1_6_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_1_6_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_1_6_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_1_6_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_1_6_5'],0);?></td>
			</tr>
			<tr>
				<td class="poa-heading center">&nbsp;</td>
				<td colspan="5" class="poa-heading-medium center"><span class="center"><b><?php echo $periods[1];?></b></span></td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_2_1_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_2_1_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_2_1_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_2_1_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_2_1_5'],0);?></td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_2_2_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_2_2_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_2_2_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_2_2_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_2_2_5'],0);?></td>
			</tr>
			<tr>
				<td>PAYE withholding (# of employers)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_2_3_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_2_3_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_2_3_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_2_3_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_2_3_5'],0);?></td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_2_4_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_2_4_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_2_4_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_2_4_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_2_4_5'],0);?></td>
			</tr>
			<tr>
				<td>Domestic excise tax</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_2_5_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_2_5_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_2_5_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_2_5_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_2_5_5'],0);?></td>
			</tr>
			<tr>
				<td>Other taxpayers</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_2_6_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_2_6_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_2_6_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_2_6_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_2_6_5'],0);?></td>
			</tr>
			<tr>
				<td class="poa-heading center">&nbsp;</td>
				<td colspan="5" class="poa-heading-medium center"><span class="center"><b><?php echo $periods[2];?></b></span></td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_3_1_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_3_1_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_3_1_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_3_1_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['corporate_2_3_1_5'],0);?></td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_3_2_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_3_2_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_3_2_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_3_2_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['personal_2_3_2_5'],0);?></td>
			</tr>
			<tr>
				<td>PAYE withholding (# of employers)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_3_3_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_3_3_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_3_3_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_3_3_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['paye_2_3_3_5'],0);?></td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_3_4_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_3_4_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_3_4_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_3_4_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['vat_2_3_4_5'],0);?></td>
			</tr>
			<tr>
				<td>Domestic excise tax</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_3_5_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_3_5_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_3_5_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_3_5_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['domestic_2_3_5_5'],0);?></td>
			</tr>
			<tr>
				<td>Other taxpayers</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_3_6_1'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_3_6_2'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_3_6_3'],0);?></td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_3_6_4'],1);?>%</td>
				<td width="115" class="center white-td"><?php echo number_format($arrParData[0]['other_2_3_6_5'],0);?></td>
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