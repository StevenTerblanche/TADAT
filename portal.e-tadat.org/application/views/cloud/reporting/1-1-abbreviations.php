<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}
	
?>
	<div class="par-heading-full-width-div"><h1>Abbreviations and Acronyms</h1></div>
	<?php echo form_open(base_url('/reporting/submit/'), array('role'=>'form', 'class'=>'form-horizontal')); ?>

		<div class="<?php echo $editClass[0]; ?>" id="abbreviations-data-1" style="margin-left:40px !important; margin-top:20px !important">
			<?php if($arrParData && $arrParData[0]['abbreviations-data-1'] !== ''){echo $arrParData[0]['abbreviations-data-1'];}else{ ?>
			<table id="id-table-without-border" class="table-without-border" style="width:750px !important; margin-right:40px !important; padding:2px !important">
				<tr>
					<td style="width:100px !important;">ACG</td>
					<td>Acting Commissioner General</td>
				</tr>
				<tr>
					<td style="width:100px !important;">CAG</td>
					<td> Controller and Auditor General </td>
				</tr>
				<tr>
					<td style="width:100px !important;">CIT</td>
					<td> Corporate income tax </td>
				</tr>
				<tr>
					<td style="width:100px !important;">CRMP</td>
					<td> Compliance Risk Management Plan</td>
				</tr>
				<tr>
					<td style="width:100px !important;">DRD</td>
					<td> Domestic Revenue Department</td>
				</tr>
				<tr>
					<td style="width:100px !important;">DTA</td>
					<td> Double Taxation Agreement</td>
				</tr>
				<tr>
					<td style="width:100px !important;">EFD</td>
					<td> Electronic Fiscal Device</td>
				</tr>
				<tr>
					<td style="width:100px !important;">ERMS</td>
					<td> Enterprise-wide Risk Management System </td>
				</tr>
				<tr>
					<td style="width:100px !important;">GDP</td>
					<td> Gross Domestic Product</td>
				</tr>
				<tr>
					<td style="width:100px !important;">ICT</td>
					<td> Information and Communication Technology</td>
				</tr>
				<tr>
					<td style="width:100px !important;">ITAX</td>
					<td> Integrated Tax Administration System</td>
				</tr>
				<tr>
					<td style="width:100px !important;">KPIs</td>
					<td> Key Performance Indicators </td>
				</tr>
				<tr>
					<td style="width:100px !important;">LTD</td>
					<td> Large Taxpayers Department</td>
				</tr>
				<tr>
					<td style="width:100px !important;">PAYE</td>
					<td> Pay-as-you-earn</td>
				</tr>
				<tr>
					<td style="width:100px !important;">PIT</td>
					<td> Personal income tax</td>
				</tr>
				<tr>
					<td style="width:100px !important;">PCCB</td>
					<td> Prevention and Combating of Corruption Bureau</td>
				</tr>
				<tr>
					<td style="width:100px !important;">POA</td>
					<td> Performance outcome area</td>
				</tr>
				<tr>
					<td style="width:100px !important;">RGS</td>
					<td> Revenue Gateway System</td>
				</tr>
				<tr>
					<td style="width:100px !important;">RPD</td>
					<td> Research and Policy Department</td>
				</tr>
				<tr>
					<td style="width:100px !important;">SME</td>
					<td> Small and Medium Enterprise</td>
				</tr>
				<tr>
					<td style="width:100px !important;">SWIFT</td>
					<td> Society for Worldwide Interbank Financial Telecommunications</td>
				</tr>
				<tr>
					<td style="width:100px !important;">TADAT</td>
					<td> Tax Administration Diagnostic Assessment Tool</td>
				</tr>
				<tr>
					<td style="width:100px !important;">TIN</td>
					<td> Taxpayer Identification Number</td>
				</tr>
				<tr>
					<td style="width:100px !important;">VAT</td>
					<td> Value-added tax</td>
				</tr>
			</table>
			<?php } ?>
		</div>
	
		<input type="hidden" name="fkidMission" id="id-mission_id" value="<?php echo $mission_id;?>" />
		<input type="hidden" name="fkidSection" id="section_id" value="<?php echo $section_id;?>" />
	
		<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button><button style="width:175px !important; margin-left:25px !important" type="submit" id="id_save_button" class="btn btn-success white-text"><i class="fa  fa-save mr5"></i>Submit Changes</button></div>

	<?php echo form_close();?>

	<script type="text/javascript">
		document.getElementById("id_back_button").onclick = function () {
			location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
		};
	</script>