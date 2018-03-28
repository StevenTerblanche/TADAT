<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$arrUsers = _get_par_users_by_id_missions($mission_id);
	$arrMission = _get_par_mission_details_by_id($mission_id);
	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}
	
?>
<div class="par-heading-full-width-div"><h1>Country Background Information - Country Profile</h1></div>
<p>General background information on <?php echo $arrMission['country'].' ('.$arrMission['region'].')';?> and the environment in which its tax system operates are provided in the country snapshot below.</p>

<?php echo form_open(base_url('/reporting/submit/'), array('role'=>'form', 'class'=>'form-horizontal')); ?>

	<div class="par-full-width-div">
		<table id="country-snapshot">
			<tr>
				<th colspan="2"><?php echo $arrMission['country'];?>: Country Snapshot</th>
			</tr>
			<tr>
				<td width="250">Geography</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-1">
					<?php if($arrParData && $arrParData[0]['country-snapshot-1'] !== ''){echo $arrParData[0]['country-snapshot-1'];}else{ echo '&nbsp;';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Population</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?> td-height-30" id="country-snapshot-2">
					<?php if($arrParData && $arrParData[0]['country-snapshot-2'] !== ''){echo $arrParData[0]['country-snapshot-2'];}else{ echo 'X million [year (20xx)]_ census. (Source: _)';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Adult literacy rate</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-3">
					<?php if($arrParData && $arrParData[0]['country-snapshot-3'] !== ''){echo $arrParData[0]['country-snapshot-3'];}else{ echo 'X percent of persons aged 15 and over can read and write. (Source: e.g., UNICEF)';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Gross Domestic Product</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-4">
					<?php if($arrParData && $arrParData[0]['country-snapshot-4'] !== ''){echo $arrParData[0]['country-snapshot-4'];}else{ echo '201_ nominal GDP: _. (Source: e.g., IMF)';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Per capita GDP</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-5">
					<?php if($arrParData && $arrParData[0]['country-snapshot-5'] !== ''){echo $arrParData[0]['country-snapshot-5'];}else{ echo 'US$_. (Source: e.g., IMF)';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Main industries</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-6">
					<?php if($arrParData && $arrParData[0]['country-snapshot-6'] !== ''){echo $arrParData[0]['country-snapshot-6'];}else{ echo '';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Communications</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-7">
					<?php if($arrParData && $arrParData[0]['country-snapshot-7'] !== ''){echo $arrParData[0]['country-snapshot-7'];
					}else{ 
						echo '<ul><li>Internet users per 100 people:</li><li>Mobile phone subscribers per 100 people:</li></ul>';
					}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Main taxes</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-8">
					<?php if($arrParData && $arrParData[0]['country-snapshot-8'] !== ''){echo $arrParData[0]['country-snapshot-8'];}else{ echo '';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Tax-to-GDP</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-9">
					<?php if($arrParData && $arrParData[0]['country-snapshot-9'] !== ''){echo $arrParData[0]['country-snapshot-9'];}else{ echo 'X percent in 201_, excluding Customs tax collections (X percent including customs).';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Number of taxpayers</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-10">
					<?php if($arrParData && $arrParData[0]['country-snapshot-10'] !== ''){echo $arrParData[0]['country-snapshot-10'];
						}else{ 
							echo '<ul><li>CIT:</li><li>PAYE:</li><li>PIT:</li><li>VAT:</li><li>Domestic Excise Taxes:</li></ul>';
						}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Main collection agency</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-11">
					<?php if($arrParData && $arrParData[0]['country-snapshot-11'] !== ''){echo $arrParData[0]['country-snapshot-11'];}else{ echo '';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Number of staff in the main collection agency</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-12">
					<?php if($arrParData && $arrParData[0]['country-snapshot-12'] !== ''){echo $arrParData[0]['country-snapshot-12'];}else{ echo '';}?>
				</div>
				</td>
			</tr>
			<tr>
				<td width="250">Financial Year</td>
				<td class="white-td">
				<div class="<?php echo $editClass[0]; ?>" id="country-snapshot-13">
					<?php if($arrParData && $arrParData[0]['country-snapshot-13'] !== ''){echo $arrParData[0]['country-snapshot-13'];}else{ echo 'E.g., calendar year.';}?>
				</div>
				</td>
			</tr>
			
		</table>
	</div>
	<input type="hidden" name="fkidMission" id="id-mission_id" value="<?php echo $mission_id;?>" />
	<input type="hidden" name="fkidSection" id="section_id" value="<?php echo $section_id;?>" />
	<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button><button style="width:175px !important; margin-left:25px !important" type="submit" id="id_save_button" class="btn btn-success white-text"><i class="fa  fa-save mr5"></i>Submit Changes</button></div>

<?php echo form_close(); ?>
<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>