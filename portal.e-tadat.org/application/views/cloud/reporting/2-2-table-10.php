<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_10';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>F. Payments</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="4">Table 10. VAT Payments Made During <?php echo $periods[2];?></th>
			</tr>
			<tr>
				<td class="poa-heading-small center">&nbsp;</td>
				<td class="poa-heading-medium center"><span class="center"><b>VAT payments made on-time <sup>1</sup></b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>VAT payments due <sup>2</sup></b></span></td>
				<td class="poa-heading-medium center"><span class="center"><b>On-time payment rate <sup>3</sup></b></span></td>
			</tr>
			<tr>
				<td>Number of Payments</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_paid_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_due_number'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_payment_number'],1);?>%</td>
			</tr>
			<tr>
				<td>Value of Payments</td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_paid_value'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_due_value'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_vat_payment_value'],1);?>%</td>
			</tr>
		</table>
		<p style="margin-top:15px !important"><b>Explanatory Note:</b></p>
		<p><b><sup>1</sup></b>'On-time' payment means paid on or before the statutory due date for payment (plus any 'days of grace' applied by the tax administration as a matter of administrative policy).</p>
		<p><b><sup>2</sup></b>'Payments due' include all payments due, whether self-assessed or administratively assessed (including as a result of an audit).</p>
		<p><b><sup>3</sup></b>The 'on-time payment rate' is the number (or value) of VAT payments made by the statutory due date in percent of the total number (or value) of VAT payments due, expressed as ratios.</p></div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>