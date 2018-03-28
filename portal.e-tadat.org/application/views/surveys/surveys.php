<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
			<?

			if($surveys){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>SURVEY CODE</th>';
							echo '<th>SURVEY TITLE</th>';
							echo '<th>CLOSE DATE</th>';
							echo '<th>SURVEY STATUS</th>';
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($surveys->RetrieveResult as $arrSurveys){
					foreach ($arrSurveys as $obj) {
						$strSurveyURI = base_url('surveys/complete/?id=')  . base64_encode($this->encrypt->encode($obj->WeblinkDetail['1']->URL));
						echo "<tr class='va'>";
							echo "<td class='va'>" . $obj->SurveyCode . "</td>";
							echo "<td class='va'>" . $obj->SurveyTitle . "</td>";							
							echo "<td class='va'>" . $obj->SurveyCloseDate . "</td>";
							echo "<td class='va'>" . $obj->SurveyStatus . "</td>";							
							echo "<td class='va'><a href='" . $strSurveyURI . "'>Complete Survey</a></td>";
						echo '</tr>';
					}

				}
						echo '</tbody>';
						echo '</table>';
			}else{
				echo("No Surveys Found!"); 
			}

//_show_array($arrSurveys);
?>
			</div>
		</div>
	</div>
</div>
