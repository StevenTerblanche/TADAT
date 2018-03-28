<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_5';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
	$arrPeriods = _get_par_mission_period_by_id($mission_id, $tbl);
	$periods = explode("/", $arrPeriods['period']);
?>
	<div class="par-heading-full-width-div"><h1>D. Filing of Tax Declarations</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="4">Table 5. On-time Filing of PIT Declarations for the most recently completed year</th>
			</tr>
			<tr>
				<td class="poa-heading-small center"><span class="center"><b>Number of declarations filed on-time <sup>1</sup></b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>Number of declarations expected to be filed on-time <sup>2</sup></b></span></td>
				<td class="poa-heading-small center"><span class="center"><b>On-time filing rate <sup>3</sup></b></span></td>				
			</tr>
			<tr>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_pit_paid_all'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_pit_due_all'],0);?></td>
				<td width="175" class="center white-td"><?php echo number_format($arrParData[0]['filing_pit_percentage_all'],1);?>%</td>
			</tr>
			
		</table>
<p style="margin-top:15px !important"><b>Explanatory Note:</b></p>
<p><b><sup>1</sup></b>'On-time' filing means declarations (also known as 'returns') filed by the statutory due date for filing (plus any 'days of grace' applied by the tax administration as a matter of administrative policy).</p>
<p><b><sup>2</sup></b>'Expected declarations' means the number of PIT declarations that the tax administration expected to receive from registered PIT taxpayers that were required by law to file declarations.</p>
<p><b><sup>3</sup></b>The 'on-time filing rate' is the number of declarations filed by the statutory due date as a percentage of the total number of declarations expected from registered taxpayers, i.e. expressed as a ratio.</p>

</div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>