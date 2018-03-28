<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
		if ($get_record_by_id_mission){?>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb10"><?php echo $get_record_by_id_mission->mission; ?></h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 pb5 bld"><?php echo lang('mission').lang('_details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('status'), ': ', ($get_record_by_id_mission->status !== '') ? _get_fields_by_id('MissionStatus', 'id', $get_record_by_id_mission->fkidMissionStatus, array('status')) : lang('none_specified'); ?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('federal') , lang('_regime') ,  ': ' , ($get_record_by_id_rev_auth->fkidState !== '0') ? lang('yes'). ', ' . _get_fields_by_id('FederalStates', 'id', $get_record_by_id_rev_auth->fkidState, array('state')) : lang('no');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('country') . ': ' .   $get_record_by_id_rev_auth->country; ?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 pb5 bld"><?php echo lang('mission').lang('_dates');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('assessment').lang('_period'), ': ', ($get_record_by_id_mission->fkidAssessmentPeriod !== '') ? _get_fields_by_id('AssessmentPeriod', 'id', $get_record_by_id_mission->fkidAssessmentPeriod, array('period')) : lang('none_specified'); ?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('start_').lang('date') . ': ' . $get_record_by_id_mission->dateStart;?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('end_').lang('date') . ': ' . $get_record_by_id_mission->dateEnd;?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 pb5 bld"><?php echo lang('creation_').lang('details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted">Date: <?php echo lang('date_created') , ($get_record_by_id_mission->dateCreated) ? date("j F Y", strtotime($get_record_by_id_mission->dateCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted">Created by: </i><?php echo lang('created_by') , (_get_fields_by_id('Titles', 'id' ,$get_record_by_id_mission->mTitle, array('title')) || $get_record_by_id_mission->mName ||$get_record_by_id_mission->mSurname) ?  _get_fields_by_id('Titles', 'id' ,$get_record_by_id_mission->mTitle, array('title')) . ' ' . $get_record_by_id_mission->mName . ' ' .$get_record_by_id_mission->mSurname : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted">Position: <?php echo lang('created_by_position') , ($get_record_by_id_mission->mRole) ? $get_record_by_id_mission->mRole : lang('none_specified');?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-<?php echo (empty($this->columns))?'10':$this->columns;?>">
	<div class="panel panel-default panel-blue-margin" style="margin-bottom:10px !important">
		<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-bank"></i><?php echo strtoupper(lang('revenue_authority'));?></h4></div>		
		<div class="panel-body">
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb10"><?php echo $get_record_by_id_rev_auth->authority; ?></h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('physical_').lang('address');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo $get_record_by_id_rev_auth->address;?></div>
					<div class="col-md-12 pl0 pr0 text-muted"></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo $get_record_by_id_rev_auth->city;?>, <?php echo $get_record_by_id_rev_auth->code;?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php 
					echo $get_record_by_id_rev_auth->country; 
					echo ($get_record_by_id_rev_auth->fkidState !== '0') ? ', '. _get_fields_by_id('FederalStates', 'id', $get_record_by_id_rev_auth->fkidState, array('state')) . ', ' : ', '; 
					echo $get_record_by_id_rev_auth->region;?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('office').lang('_contact_details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('telephone') , ': ' , ($get_record_by_id_rev_auth->telephone) ? $get_record_by_id_rev_auth->telephone : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('fax') , ': ' , ($get_record_by_id_rev_auth->fax) ? $get_record_by_id_rev_auth->fax : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('email') , ': ' , ($get_record_by_id_rev_auth->email)  ? '<a href="mailto:'.$get_record_by_id_rev_auth->email . '" target="_blank">'.$get_record_by_id_rev_auth->email .'</a>' : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('website') , ': ' , ($get_record_by_id_rev_auth->website) ? '<a href="http://'.$get_record_by_id_rev_auth->website . '" target="_blank">'.$get_record_by_id_rev_auth->website .'</a>' : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('creation_').lang('details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted">Date: <?php echo lang('date_created') , ($get_record_by_id_rev_auth->dateCreated) ? date("j F Y", strtotime($get_record_by_id_rev_auth->dateCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted">Time: <?php echo lang('time_created') , ($get_record_by_id_rev_auth->dateCreated) ? date("h:i A", strtotime($get_record_by_id_rev_auth->dateCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted">Created by: </i><?php echo lang('created_by') , (_get_fields_by_id('Titles', 'id' ,$get_record_by_id_rev_auth->fkidTitle, array('title')) || $get_record_by_id_rev_auth->name ||$get_record_by_id_rev_auth->surname) ? _get_fields_by_id('Titles', 'id' ,$get_record_by_id_rev_auth->fkidTitle, array('title'))  . ' ' . $get_record_by_id_rev_auth->name . ' ' .$get_record_by_id_rev_auth->surname : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted">Position: <?php echo lang('created_by_position') , ($get_record_by_id_rev_auth->role) ? $get_record_by_id_rev_auth->role : lang('none_specified');?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- COUNTERPART -->
<?php 
if($get_record_by_id_rev_auth_counterpart){
?>
<div class="col-md-<?php echo (empty($this->columns))?'10':$this->columns;?>">
	<div class="panel panel-default panel-blue-margin" style="margin-bottom:10px !important">
		<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-user"></i><?php echo strtoupper(lang('revenue_authority_counterpart'));?></h4></div>
		<div class="panel-body pt5">
			<div class="col-md-12 pl0 pr0 ml0 mr0">
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('personal_').lang('details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_rev_auth_counterpart->raSurname) ? _get_fields_by_id('Titles', 'id' ,$get_record_by_id_rev_auth_counterpart->raTitle, array('title')) . ' ' . $get_record_by_id_rev_auth_counterpart->raName . ' ' . $get_record_by_id_rev_auth_counterpart->raSurname : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_rev_auth_counterpart->raDesignation) ? $get_record_by_id_rev_auth_counterpart->raDesignation : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_rev_auth_counterpart->raCountry)  ? $get_record_by_id_rev_auth_counterpart->raCity . ', ' . $get_record_by_id_rev_auth_counterpart->raCountry : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('contact_details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('telephone') , ': ' ,  ($get_record_by_id_rev_auth_counterpart->raTelephone) ? $get_record_by_id_rev_auth_counterpart->raTelephone : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('mobile') , ': ' ,  ($get_record_by_id_rev_auth_counterpart->raMobile) ? $get_record_by_id_rev_auth_counterpart->raMobile : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('email') , ': ' ,  ($get_record_by_id_rev_auth_counterpart->raEmail)  ? '<a href="mailto:'.$get_record_by_id_rev_auth_counterpart->raEmail . '" target="_blank">'.$get_record_by_id_rev_auth_counterpart->raEmail .'</a>' : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('further_').lang('information');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('language'), ': ' , ($get_record_by_id_rev_auth_counterpart->raLanguage) ? $get_record_by_id_rev_auth_counterpart->raLanguage: lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('date'),lang('_registered'), ': ' , ($get_record_by_id_rev_auth_counterpart->raCreated) ? date("j F Y", strtotime($get_record_by_id_rev_auth_counterpart->raCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('status'), ': ' , ($get_record_by_id_rev_auth_counterpart->raStatus === '1')  ? lang('enabled') : lang('disabled');?></div>
				</div>
			</div>
			<?php if ($get_record_by_id_rev_auth_counterpart->raDescription != ''){ ?>
			<div class="col-md-12 pl0 pr0 ml0 mr0 pt5 pb0 mt10 bt">
				<div class="profile-info text-muted">
					<p class="paragraph-justified mt5"><?php echo $get_record_by_id_rev_auth_counterpart->raDescription; ?></p>
				</div>
			</div>						
			<?php }?>						
			<?php if ($get_record_by_id_rev_auth_counterpart->raSkype != '' || $get_record_by_id_rev_auth_counterpart->raEmail != ''){ ?>
			<div class="col-md-12 pl0 pr0">
				<div class="social bt">
					<h5 class="text-muted bld pb5"><?php echo lang('contact').lang('_the_').lang('revenue_authority').lang('_manager') . ', ' . _get_fields_by_id('Titles', 'id' ,$get_record_by_id_rev_auth_counterpart->raTitle, array('title')) . ' ' . $get_record_by_id_rev_auth_counterpart->raName . ' ' . $get_record_by_id_rev_auth_counterpart->raSurname . ', ' . lang('_via_').lang('social_media');?></h5>
					<div class="col-md-12 pl0 pr0 ml0 mr0">
						<?php 
						if ($get_record_by_id_rev_auth_counterpart->raEmail != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0"><a href="mailto:<?php echo $get_record_by_id_rev_auth_counterpart->raEmail; ?>" target="_blank" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-envelope"></i> <?php echo lang('contact_via_').lang('email');?></a></div>
						<?php }
						if ($get_record_by_id_rev_auth_counterpart->raSkype != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0"><a href="skype:<?php echo $get_record_by_id_rev_auth_counterpart->raSkype; ?>?chat" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-skype"></i> <?php echo lang('connect_via_').lang('skype');?></a></div>
						<?php }	?>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>

<?php }?>

<!-- CONTACT -->
<?php 
if($get_record_by_id_rev_auth_ram){
?>
<div class="col-md-<?php echo (empty($this->columns))?'10':$this->columns;?>">
	<div class="panel panel-default panel-blue-margin" style="margin-bottom:10px !important">
		<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-user"></i><?php echo strtoupper(lang('revenue_authority_contact'));?></h4></div>
		<div class="panel-body pt5">
			<div class="col-md-12 pl0 pr0 ml0 mr0">
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('personal_').lang('details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_rev_auth_ram->raSurname) ? _get_fields_by_id('Titles', 'id' ,$get_record_by_id_rev_auth_ram->raTitle, array('title')) . ' ' . $get_record_by_id_rev_auth_ram->raName . ' ' . $get_record_by_id_rev_auth_ram->raSurname : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_rev_auth_ram->raDesignation) ? $get_record_by_id_rev_auth_ram->raDesignation : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_rev_auth_ram->raCountry)  ? $get_record_by_id_rev_auth_ram->raCity . ', ' . $get_record_by_id_rev_auth_ram->raCountry : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('contact_details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('telephone') , ': ' ,  ($get_record_by_id_rev_auth_ram->raTelephone) ? $get_record_by_id_rev_auth_ram->raTelephone : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('mobile') , ': ' ,  ($get_record_by_id_rev_auth_ram->raMobile) ? $get_record_by_id_rev_auth_ram->raMobile : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('email') , ': ' ,  ($get_record_by_id_rev_auth_ram->raEmail)  ? '<a href="mailto:'.$get_record_by_id_rev_auth_ram->raEmail . '" target="_blank">'.$get_record_by_id_rev_auth_ram->raEmail .'</a>' : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('further_').lang('information');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('language'), ': ' , ($get_record_by_id_rev_auth_ram->raLanguage) ? $get_record_by_id_rev_auth_ram->raLanguage: lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('date'),lang('_registered'), ': ' , ($get_record_by_id_rev_auth_ram->raCreated) ? date("j F Y", strtotime($get_record_by_id_rev_auth_ram->raCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('status'), ': ' , ($get_record_by_id_rev_auth_ram->raStatus === '1')  ? lang('enabled') : lang('disabled');?></div>
				</div>
			</div>
			<?php if ($get_record_by_id_rev_auth_ram->raDescription != ''){ ?>
			<div class="col-md-12 pl0 pr0 ml0 mr0 pt5 pb0 mt10 bt">
				<div class="profile-info text-muted">
					<p class="paragraph-justified mt5"><?php echo $get_record_by_id_rev_auth_ram->raDescription; ?></p>
				</div>
			</div>						
			<?php }?>						
			<?php if ($get_record_by_id_rev_auth_ram->raSkype != '' || $get_record_by_id_rev_auth_ram->raEmail != ''){ ?>
			<div class="col-md-12 pl0 pr0">
				<div class="social bt">
					<h5 class="text-muted bld pb5"><?php echo lang('contact').lang('_the_').lang('revenue_authority').lang('_manager') . ', ' . _get_fields_by_id('Titles', 'id' ,$get_record_by_id_rev_auth_ram->raTitle, array('title')) . ' ' . $get_record_by_id_rev_auth_ram->raName . ' ' . $get_record_by_id_rev_auth_ram->raSurname . ', ' . lang('_via_').lang('social_media');?></h5>
					<div class="col-md-12 pl0 pr0 ml0 mr0">
						<?php 
						if ($get_record_by_id_rev_auth_ram->raEmail != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0"><a href="mailto:<?php echo $get_record_by_id_rev_auth_ram->raEmail; ?>" target="_blank" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-envelope"></i> <?php echo lang('contact_via_').lang('email');?></a></div>
						<?php }
						if ($get_record_by_id_rev_auth_ram->raSkype != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0"><a href="skype:<?php echo $get_record_by_id_rev_auth_ram->raSkype; ?>?chat" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-skype"></i> <?php echo lang('connect_via_').lang('skype');?></a></div>
						<?php }	?>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>

<?php }?>

<div class="col-md-<?php echo (empty($this->columns))?'10':$this->columns;?>">
	<div class="panel panel-default panel-blue-margin">
		<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-user"></i><?php echo strtoupper(lang('mission_').lang('team_leader'));?></h4></div>
		<div class="panel-body pt5">
			<div class="col-md-12 pl0 pr0 ml0 mr0">
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('personal_').lang('details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_team_leader->tlSurname) ? _get_fields_by_id('Titles', 'id' ,$get_record_by_id_team_leader->tlTitle, array('title')) . ' ' . $get_record_by_id_team_leader->tlName . ' ' . $get_record_by_id_team_leader->tlSurname : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_team_leader->tlDesignation) ? $get_record_by_id_team_leader->tlDesignation : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_team_leader->tlCountry)  ? $get_record_by_id_team_leader->tlCity . ', ' . $get_record_by_id_team_leader->tlCountry : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('contact_details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('telephone') , ': ' ,  ($get_record_by_id_team_leader->tlTelephone) ? $get_record_by_id_team_leader->tlTelephone : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('mobile') , ': ' ,  ($get_record_by_id_team_leader->tlMobile) ? $get_record_by_id_team_leader->tlMobile : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('email') , ': ' ,  ($get_record_by_id_team_leader->tlEmail)  ? '<a href="mailto:'.$get_record_by_id_team_leader->tlEmail . '" target="_blank">'.$get_record_by_id_team_leader->tlEmail .'</a>' : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('further_').lang('information');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('language'), ': ' , ($get_record_by_id_team_leader->tlLanguage) ? $get_record_by_id_team_leader->tlLanguage: lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('date'),lang('_registered'), ': ' , ($get_record_by_id_team_leader->tlCreated) ? date("j F Y", strtotime($get_record_by_id_team_leader->tlCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('status'), ': ' , ($get_record_by_id_team_leader->tlStatus === '1')  ? lang('enabled') : lang('disabled');?></div>
				</div>
			</div>
			<?php if ($get_record_by_id_team_leader->tlDescription != ''){ ?>
			<div class="col-md-12 pl0 pr0 ml0 mr0 pt5 pb0 mt10 bt">
				<div class="profile-info text-muted">
					<p class="paragraph-justified mt5"><?php echo $get_record_by_id_team_leader->tlDescription; ?></p>
				</div>
			</div>						
			<?php }?>						
			<?php if ($get_record_by_id_team_leader->tlSkype != '' || $get_record_by_id_team_leader->tlEmail != ''){ ?>
			<div class="col-md-12 pl0 pr0">
				<div class="social bt">
					<h5 class="text-muted bld pb5">Contact the Mission Team Leader, <?php echo _get_fields_by_id('Titles', 'id' ,$get_record_by_id_team_leader->tlTitle, array('title')) . ' ' . $get_record_by_id_team_leader->tlName . ' ' . $get_record_by_id_team_leader->tlSurname . ', ' . lang('_via_').lang('social_media');?></h5>
					<div class="col-md-12 pl0 pr0 ml0 mr0">
						<?php 
						if ($get_record_by_id_team_leader->tlEmail != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0"><a href="mailto:<?php echo $get_record_by_id_team_leader->tlEmail; ?>" target="_blank" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-envelope"></i> <?php echo lang('contact_via_').lang('email');?></a></div>
						<?php }
						if ($get_record_by_id_team_leader->tlSkype != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0"><a href="skype:<?php echo $get_record_by_id_team_leader->tlSkype; ?>?chat" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-skype"></i> <?php echo lang('connect_via_').lang('skype');?></a></div>
						<?php }	?>
			</div>
				</div>
			</div>						
			<?php }?>
			<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="button" id="back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i><?php echo lang('back_to_').lang('mission').lang('_listing'); ?></button></div>					
			<?php
			}else{
				echo '<div class="panel panel-danger panelClose form-error">';
				echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
				echo '<div class="panel-body center">'.lang('no_').lang('missions').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('missions/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('mission').'</div>';
				echo '</div>';				
			}
			?>
