<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'pmq_table_1';
	$arrParData = _get_pmq_table_by_mission_id($mission_id, $tbl);
?>
	<div class="par-heading-full-width-div"><h1>A. Tax Revenue Collections</h1></div>
	<div class="par-full-width-div">
		<table id="table-pmq-1">
			<tr>
				<th colspan="4">Table 1. Tax Revenue Collections for the years <?php echo $arrParData[0]['period_year_1']?>, <?php echo $arrParData[0]['period_year_2']?>, <?php echo $arrParData[0]['period_year_3']?></th>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="150" class="center white-td"><b><?php echo $arrParData[0]['period_year_1']?></b></td>
				<td width="150" class="center white-td"><b><?php echo $arrParData[0]['period_year_2']?></b></td>
				<td width="150" class="center white-td"><b><?php echo $arrParData[0]['period_year_3']?></b></td>
			</tr>
			<tr>
				<td colspan="4" class="poa-heading center">In local currency</td>
			</tr>			
			<tr>
				<td><b>National budgeted tax revenue forecast<sup>2</sup></b></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_budgeted_revenue'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_budgeted_revenue'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_budgeted_revenue'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td><b>Total tax revenue collections</b></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_total_revenue_collections'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_total_revenue_collections'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_total_revenue_collections'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_1'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_1'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_1'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_2'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_2'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_2'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—gross domestic collections</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_3'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_3'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_3'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—collected on imports</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_4'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_4'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_4'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—refunds approved and paid</td>
				<td width="150" class="right white-td">(<?php echo number_format($arrParData[0]['a_1_1_5'], 0, '.', ',');?>)</td>
				<td width="150" class="right white-td">(<?php echo number_format($arrParData[0]['b_1_1_5'], 0, '.', ',');?>)</td>
				<td width="150" class="right white-td">(<?php echo number_format($arrParData[0]['c_1_1_5'], 0, '.', ',');?>)</td>
			</tr>
			<tr>
				<td>Excises on domestic transactions</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_6'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_6'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_6'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Excises—collected on imports</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_7'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_7'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_7'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Social contribution collections</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_8'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_8'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_8'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td>Other domestic taxes</td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['a_1_1_9'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['b_1_1_9'], 0, '.', ',');?></td>
				<td width="150" class="right white-td"><?php echo number_format($arrParData[0]['c_1_1_9'], 0, '.', ',');?></td>
			</tr>
			<tr>
				<td colspan="4" class="poa-heading center">In percent of total tax revenue collections</td>
			</tr>			
			<tr>
			<td><b>Total tax revenue collections</b></td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_total_revenue_collections_percentage'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_total_revenue_collections_percentage'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_total_revenue_collections_percentage'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_1'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_1'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_1'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_2'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_2'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_2'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—gross domestic collections</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_3'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_3'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_3'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—collected on imports</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_4'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_4'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_4'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—refunds approved and paid</td>
				<td width="150" class="center white-td">(<?php echo number_format($arrParData[0]['a_1_2_5'], 1, '.', ',');?>%)</td>
				<td width="150" class="center white-td">(<?php echo number_format($arrParData[0]['b_1_2_5'], 1, '.', ',');?>%)</td>
				<td width="150" class="center white-td">(<?php echo number_format($arrParData[0]['c_1_2_5'], 1, '.', ',');?>%)</td>
			</tr>
			<tr>
				<td>Excises on domestic transactions</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_6'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_6'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_6'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Excises—collected on imports</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_7'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_7'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_7'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Social contribution collections</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_8'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_8'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_8'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Other domestic taxes</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_2_9'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_2_9'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_2_9'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td colspan="4" class="poa-heading center">In percent of GDP</td>
			</tr>			
			<tr>
			<td><b>Total tax revenue collections</b></td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_total_revenue_collections_percentage_gdp'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_total_revenue_collections_percentage_gdp'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_total_revenue_collections_percentage_gdp'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Corporate Income Tax (CIT)</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_1'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_1'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_1'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Personal Income Tax (PIT)</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_2'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_2'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_2'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—gross domestic collections</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_3'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_3'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_3'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—collected on imports</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_4'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_4'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_4'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Value-Added Tax (VAT)—refunds approved and paid</td>
				<td width="150" class="center white-td">(<?php echo number_format($arrParData[0]['a_1_3_5'], 1, '.', ',');?>%)</td>
				<td width="150" class="center white-td">(<?php echo number_format($arrParData[0]['b_1_3_5'], 1, '.', ',');?>%)</td>
				<td width="150" class="center white-td">(<?php echo number_format($arrParData[0]['c_1_3_5'], 1, '.', ',');?>%)</td>
			</tr>
			<tr>
				<td>Excises on domestic transactions</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_6'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_6'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_6'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Excises—collected on imports</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_7'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_7'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_7'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Social contribution collections</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_8'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_8'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_8'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>Other domestic taxes</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['a_1_3_9'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['b_1_3_9'], 1, '.', ',');?>%</td>
				<td width="150" class="center white-td"><?php echo number_format($arrParData[0]['c_1_3_9'], 1, '.', ',');?>%</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="150" class="right white-td">&nbsp;</td>
				<td width="150" class="right white-td">&nbsp;</td>
				<td width="150" class="right white-td">&nbsp;</td>
			</tr>
			<tr>
				<td><b>Nominal GDP in local currency</b></td>
				<td width="150" class="right white-td"><b><?php echo number_format($arrParData[0]['a_gdp'], 0, '.', ',');?></b></td>
				<td width="150" class="right white-td"><b><?php echo number_format($arrParData[0]['b_gdp'], 0, '.', ',');?></b></td>
				<td width="150" class="right white-td"><b><?php echo number_format($arrParData[0]['c_gdp'], 0, '.', ',');?></b></td>
			</tr>
		</table>
	</div>
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>

<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>