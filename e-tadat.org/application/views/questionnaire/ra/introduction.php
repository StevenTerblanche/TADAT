<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
if($get_missions){
	$periods = explode("/", $get_missions[0]['period']);
	$arrDbDates = array('{year-1}','{year-2}','{year-3}');
	$arrPeriods = array($periods[0],$periods[1],$periods[2]);
	foreach($get_missions as $record => $fields){
		$this->session->set_userdata('mission_id',$fields['MissionId']);
		$this->session->set_userdata('indicator_id',0);
		echo $this->load->view('upload/pmq_upload_dialog', '', true);
		echo $this->load->view('upload/uploaded_dialog', '', true);
?>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev">‹</a>
	<a class="next">›</a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
</div>
<p><span class="bld">Dear <?php echo _get_fields_by_id('Titles', 'id' ,$this->user->fkidTitle, array('title')) .' '. $this->user->name .' '. $this->user->surname ;?></span></p>
<p>In preparation  for the TADAT assessment (<a href="<?php echo base_url('missions/profile/?id=') . base64_encode($this->encrypt->encode($fields["MissionId"])); ?>"><?php echo $fields["mission"];?></a>) to be undertaken from <span class="bld"><?php echo date("l jS \of F Y", strtotime($fields['dateStart']));?></span> to <span class="bld"><?php echo date("l jS \of F Y", strtotime($fields['dateEnd']));?></span> it would be  appreciated if the following general information and numerical data could be  provided to the assessment team, led by <span class="bld"><a href="<?php echo base_url('users/profile/?id=') . base64_encode($this->encrypt->encode($fields['mtlId'])); ?>"><?php echo _get_fields_by_id('Titles', 'id' ,$fields['mtlTitle'], array('title')) .' '. $fields['mtlName'] .' '. $fields['mtlSurname'] ;?></a></span> (<?php echo $fields['role'];?>), by <span class="bld"><?php echo date("l jS \of F Y", strtotime($fields['dateStart']));?></span>. </p>
<p>Part I requests numerical data needed to compute a range of performance-related  measures in areas such as filing, payment, collection, etc.</p>
<p>Part II of this  questionnaire requests a number of documents that are commonly prepared by tax  administrations. These documents will assist the assessment team in  familiarizing itself with the system of tax administration operating in  <?php echo $fields["country"]?>.</p>
<div class="col-md-<?php echo $this->columns;?> pl0 pr0 ml0 mr0">
	<div class="panel panel-default panel-blue-margin mb5">
		<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-line-chart"></i><?php echo strtoupper('Part I: Numerical data');?> - Please complete the numerical tables, which are grouped as follows:</h4></div>
		<div class="panel-body pt5">
				<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="w300"><?php echo strtoupper(lang('section'));?></th>
							<th><?php echo strtoupper(lang('requirement'));?></th>
							<th class="center w100"><?php echo strtoupper(lang('type'));?></th>
							<th class="center w150"><?php echo strtoupper(lang('status'));?></th>							
							<th class="w125"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach($get_ra_pmq_questions as $question => $questions){
						# Get type of question from DB
						if($questions['fkidQuestionType'] == 2){
							# Get the table name this question relates to
							if($questions["questionTable"] !== ''){
								# Get the question status
								$strStatusType = _get_status_by_id('db_b', $questions["questionTable"], $fields['MissionId'], 'fkidMission');
								# COMPLETED
								if(!empty($strStatusType) && $strStatusType['status'] == 1){
									$strStatus = '<button class="btn btn-primary disabled dashboard-green-panel m0 mb0 p2 w125" type="button">'.lang('completed').'</button>';
									$strLink = lang('view').lang('_table');									
									$strCss = 'green-text';
									$strUrl = base_url('/ra/pmq/completed/'. base64_encode($this->encrypt->encode($strStatusType['id'])).'/'.$questions["questionTable"]);
								# IN PROGRESS
								}elseif(!empty($strStatusType) && $strStatusType['status'] == 0){
									$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2 w125" type="button">'.lang('in_progress').'</button>';									
									$strLink = lang('complete').lang('_table');
									$strCss = 'orange-text';
									$strUrl = base_url('/ra/pmq/update/'. base64_encode($this->encrypt->encode($strStatusType['id'])).'/'.$questions["questionTable"]);
								}else{
								# NOT STARTED
									$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2 w125" type="button">Not Started</button>';
									$strLink = lang('complete').lang('_table');
									$strCss = 'red-text';
									$strUrl = base_url('/ra/pmq/create/pni/'.$questions["questionTable"]);
								}
							}
						?>
						<tr class='va'>
							<td class='va'><?php echo $questions['sectionName'];?></td>
							<td class='va'><?php echo str_replace($arrDbDates, $arrPeriods, $questions['questionName']);?></td>							
							<td class='va center'><?php echo $questions['questionType']?></td>
							<td class='va bld center p0 m0 <?php echo $strCss; ?>'><?php echo $strStatus; ?></td>
							<td class="va center w125">
								<div class="btn-group mr0 mb0">
									<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i><?php echo lang('action');?></button>
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only"><?php echo lang('toggle_dropdown')?></span></button>
									<ul class="dropdown-menu dropdown-blue-bg">
											<li><a href="<?php echo $strUrl;?>"><i class="fa fa-table"></i><?php echo $strLink;?></a></li>
									</ul>
								</div>
							</td>
						</tr>							
				<?php
				 	}
				}
					?>
					</tbody>
				</table>
				<div class="mt15"><p>Explanatory notes are  provided at the foot of each table to assist completion. If further assistance  or explanation is required in completing the tables, please contact <span class="bld"><a href="<?php echo base_url('users/profile/?id=') . base64_encode($this->encrypt->encode($fields['mtlId'])); ?>"><?php echo $fields['mtlTitle'] .' '. $fields['mtlName'] .' '. $fields['mtlSurname'] ;?></a></span> (<?php echo $fields['role'];?>).</p></div>
		</div>
	</div>
</div>
<div class="col-md-<?php echo $this->columns;?> pl0 pr0 ml0 mr0">
	<div class="panel panel-default panel-blue-margin mb0">
		<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-paste"></i><?php echo strtoupper('Part II: Documents');?> - Please provide the following key documents:</h4></div>
		<div class="panel-body pt5">
				<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><?php echo strtoupper(lang('requirement'));?></th>
							<th class="center w100"><?php echo strtoupper(lang('type'));?></th>
							<th class="center w150"><?php echo strtoupper(lang('status'));?></th>
							<th class="center w125"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach($get_ra_pmq_questions as $question => $questions){
						if($questions['fkidQuestionType'] == 1){
							$strNumberCheck = '';
							$strUploadCount = _get_upload_status_by_id('db_b', 'EvidentiaryDocumentation', $this->user->id, $fields['MissionId'], $questions['QuestionId']);
								if($questions['QuestionId'] == 1){$strNumberCheck = 2;}else{$strNumberCheck = 1;}
								# COMPLETED
								if(!empty($strUploadCount) && $strUploadCount >= $strNumberCheck){
									$strStatus = '<button class="btn btn-primary disabled dashboard-green-panel m0 mb0 p2 w125" type="button">Uploaded</button>';
									$strLink = lang('view').lang('_table');
									$strUploadedLink = '<li><a id="uploaded" class="uploaded" href="#uploaded"><i class="fa fa-cloud-download"></i>View Documents</a></li>';
									$strCss = 'green-text';
									$strUrl = base_url('/ra/pmq/completed/'. base64_encode($this->encrypt->encode($strStatusType['id'])).'/'.$questions["questionTable"]);
								# IN PROGRESS
								}elseif(!empty($strUploadCount) && $strUploadCount == 1){
									$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2 w125" type="button">Some Uploaded</button>';									
									$strLink = lang('complete').lang('_table');
									$strUploadedLink = '<li><a id="uploaded" class="uploaded" href="#uploaded"><i class="fa fa-cloud-download"></i>View Documents</a></li>';
									$strCss = 'orange-text';
									$strUrl = base_url('/ra/pmq/update/'. base64_encode($this->encrypt->encode($strStatusType['id'])).'/'.$questions["questionTable"]);
								}else{
								# NOT STARTED
									$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2 w125" type="button">Not Uploaded</button>';
									$strLink = lang('complete').lang('_table');
									$strUploadedLink = '';
									$strCss = 'red-text';
									$strUrl = base_url('/ra/pmq/create/pni/'.$questions["questionTable"]);
								}
						?>
						<tr class='va'>
							<td class='va'><?php echo $questions['questionName']?></td>
							<td class='va center'><?php echo $questions['questionType']?></td>
							<td class='va bld center p0 m0 <?php echo $strCss; ?>'><?php echo $strStatus; ?></td>
							<td class="va center w125">
								<div class="btn-group mr0 mb0">
									<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i><?php echo lang('action');?></button>
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only"><?php echo lang('toggle_dropdown')?></span></button>
									<ul class="dropdown-menu dropdown-blue-bg">
										<li><a id="<?php echo $questions['QuestionId'];?>" data-toggle="modal" data-target="#modal-style2" href="#"><i class="fa fa-cloud-upload"></i><?php echo lang('upload').lang('_documents');?></a></li>
										<?php echo $strUploadedLink;?>
									</ul>
								</div>
							</td>
						</tr>							
				<?php }}?>
					</tbody>
				</table>
			</div>
	</div>
</div>
<?php 
	}
}else{
	echo '<div class="panel panel-danger panelClose form-error">';
	echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>NO MISSION LINKED</h4></div>';
	echo '<div class="panel-body center">A Mission has not yet been assigned to this Revenue Authority!</div>';
	echo '</div>';				
}
?>