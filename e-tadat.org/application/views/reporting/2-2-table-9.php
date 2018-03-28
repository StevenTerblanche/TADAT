<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_9';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>E. Electronic Services</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="4">Table 9. Use of Electronic Services for the years <?php echo $periods[0];?>, <?php echo $periods[1];?>, <?php echo $periods[2];?></th>
			</tr>
			<tr>
				<td class="poa-heading-small center">&nbsp;</td>
				<td class="poa-heading-medium center"><span class="center"><b><?php echo $periods[0];?></b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b><?php echo $periods[1];?></b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b><?php echo $periods[2];?></b></span></td>
			</tr>
			<tr>
				<td class="poa-heading center">&nbsp;</td>
				<td colspan="3" class="poa-heading-medium center"><span class="center"><b>Electronic filing <sup>2</sup> (In percent of all declarations filed for each tax type)</b></span></td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_filing_percent_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_filing_percent_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_filing_percent_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_filing_percent_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_filing_percent_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_filing_percent_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_filing_percent_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_filing_percent_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_filing_percent_3'],1);?>%</td>
			</tr>
			<tr>
				<td>PAYE withholding (declarations filed by employers)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_filing_percent_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_filing_percent_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_filing_percent_3'],1);?>%</td>
			</tr>
			<tr>
				<td class="poa-heading center">&nbsp;</td>
				<td colspan="3" class="poa-heading-medium center"><span class="center"><b>Electronic payments <sup>3</sup> (In percent of total number of payments received for each tax type)</b></span></td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_payments_number_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_payments_number_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_payments_number_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_payments_number_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_payments_number_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_payments_number_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_payments_number_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_payments_number_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_payments_number_3'],1);?>%</td>
			</tr>
			<tr>
				<td>PAYE withholding (remitted by employers)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_payments_number_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_payments_number_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_payments_number_3'],1);?>%</td>
			</tr>
			<tr>
				<td class="poa-heading center">&nbsp;</td>
				<td colspan="3" class="poa-heading-medium center"><span class="center"><b>Electronic payments (In percent of total value of payments received for each tax type)</b></span></td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_payments_value_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_payments_value_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['cit_electronic_payments_value_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_payments_value_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_payments_value_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['pit_electronic_payments_value_3'],1);?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_payments_value_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_payments_value_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['vat_electronic_payments_value_3'],1);?>%</td>
			</tr>
			<tr>
				<td>PAYE withholding (remitted by employers)</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_payments_value_1'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_payments_value_2'],1);?>%</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['paye_electronic_payments_value_3'],1);?>%</td>
			</tr>						
		</table>
		<p style="margin-top:15px !important"><b>Explanatory Note:</b></p>
		<p><b><sup>1</sup></b>Data in this table will provide an indicator of the extent to which the tax administration is using modern technology to transform operations, namely in areas of filing and payment.</p>
		<p><b><sup>2</sup></b>For purposes of this table, electronic filing involves facilities that enable taxpayers to complete tax declarations online and file those declarations via the Internet.</p>
		<p><b><sup>3</sup></b>Methods of electronic payment include credit cards, debit cards, and electronic funds transfer (where money is electronically transferred via the Internet from a taxpayer's bank account to the Treasury account). Electronic payments may be made, for example, by mobile telephone where technology is used to turn mobile phones into an Internet terminal from which payments can be made. For TADAT measurement purposes, payments made in-person by a taxpayer to a third party agent (e.g., a bank or post office) that are then electronically transferred by the agent to the Treasury account are accepted as electronic payments.</p>
</div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>