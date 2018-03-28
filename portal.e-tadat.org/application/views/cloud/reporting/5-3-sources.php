<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$arrSources = _get_par_sources_of_evidence_by_id($mission_id);

?>

<div class="par-heading-full-width-div"><h1>Attachment V. Sources of Evidence</h1></div>
	<div class="par-full-width-div" style="margin-bottom:25px !important">

<?php if($arrSources){?>
		<table id="table-poa">
			<tr>
				<th colspan="4">Table 29 - Sources of Evidence by Indicator</th>
			</tr>
			<tr>
				<td class="poa-heading">P1-1: Accurate and reliable taxpayer information.</td>
			<tr>
				<td>
					<ul>
					<?php foreach($arrSources as $key => $value){
							if($value['fkidIndicator'] == 1){
								echo '<li><a href="http://www.e-tadat.org/'.$value['documentPath'].'" target="_blank">'.$value['documentTitle'].'</a></li>';
							}
						}?>
					</ul>
				</td>
			</tr>
			<tr>
				<td class="poa-heading-medium">P1-2: Knowledge of the potential taxpayer base.</td>
			<tr>
				<td>
					<?php 
					$strIndicator_2 = '';
					foreach($arrSources as $key => $value){
							if($value['fkidIndicator'] == 2){
								$strIndicator_2 .= '<li><a href="http://www.e-tadat.org/'.$value['documentPath'].'">'.$value['documentTitle'].'</a></li>';

							}
						}?>
					<ul>
						<?php echo $strIndicator_2 ?>
					</ul>
				</td>
			</tr>
			<tr>
				<td class="poa-heading-medium">P2-3: Identification, assessment, ranking, and quantification of compliance risks.</td>
			<tr>
				<td>
					<?php 
					$strIndicator_3 = '';
					foreach($arrSources as $key => $value){
							if($value['fkidIndicator'] == 3){
								$strIndicator_3 .= '<li><a href="http://www.e-tadat.org/'.$value['documentPath'].'">'.$value['documentTitle'].'</a></li>';

							}
						}?>
					<ul>
						<?php echo $strIndicator_3 ?>
					</ul>
				</td>
			</tr>
            
            
		</table>
		<?php }else{
			
			echo '<p>No sources of evidence found!</p>';
			
			}?>
</div>


<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>