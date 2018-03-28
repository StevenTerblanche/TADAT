<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
		<?php if ($get_record_by_id_users){?>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb10"><?php echo _global_get_fields_by_id('Titles', 'id' ,$get_record_by_id_users->fkidTitle, array('title')).' ' . $get_record_by_id_users->name . ' ' . $get_record_by_id_users->surname; ?></h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('general_').lang('details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('position') , ': ' , ($get_record_by_id_users->fkidUserRole) ? _global_get_fields_by_id('UserRoles', 'id' ,$get_record_by_id_users->fkidUserRole, array('role')) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('designation'), ': ' , ($get_record_by_id_users->designation) ? $get_record_by_id_users->designation : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('language'), ': ' , ($get_record_by_id_users->fkidLanguage) ? _global_get_fields_by_id('Languages', 'id' ,$get_record_by_id_users->fkidLanguage, array('language')) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('passport'), ': ' , ($get_record_by_id_users->passport) ? $get_record_by_id_users->passport : lang('none_specified');?></div>					
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('contact_details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('telephone') , ': ' ,  ($get_record_by_id_users->telephone) ? $get_record_by_id_users->telephone : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('mobile') , ': ' ,  ($get_record_by_id_users->mobile) ? $get_record_by_id_users->mobile : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('email') , ': ' ,  ($get_record_by_id_users->email)  ? '<a href="mailto:'.$get_record_by_id_users->email . '" target="_blank">'.$get_record_by_id_users->email .'</a>' : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('city') ,': ', ($get_record_by_id_users->city) ? $get_record_by_id_users->city .' '. _global_get_fields_by_id('Countries', 'id' ,$get_record_by_id_users->fkidCountry, array('(country)')) : lang('none_specified');?></div>
				</div>
				<div class="col-md-4 pl0 pr0 text-muted">
					<h5 class="text-muted mb0 bld pb5"><?php echo lang('account').lang('_details');?></h5>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('account'),lang('_status'), ': ' , ($get_record_by_id_users->status === '1')  ? lang('enabled') : lang('disabled');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('date'),lang('_registered') , ': ' , ($get_record_by_id_users->dateCreated) ? date("j F Y", strtotime($get_record_by_id_users->dateCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('time'),lang('_registered') , ': ' , ($get_record_by_id_users->dateCreated) ? date("h:i A", strtotime($get_record_by_id_users->dateCreated)) : lang('none_specified');?></div>
					<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('registered'),lang('_by') , ': ' , ($get_record_by_id_users->fkidUserCreated) ? _global_get_fields_by_id('Users', 'id' ,$get_record_by_id_users->fkidUserCreated, array('name', 'surname'), ' ') : lang('none_specified');?></div>
				</div>
			</div>
			<?php if ($get_record_by_id_users->description != ''){ ?>
			<div class="col-md-12 pl0 pr0 ml0 mr0 pt5 pb0 mt10 bt">
				<div class="profile-info text-muted">
					<p class="paragraph-justified mt5"><?php echo $get_record_by_id_users->description; ?></p>
				</div>
			</div>						
			<?php }?>						
			<div class="col-md-12 pl0 pr0">
				<div class="social bt">
					<h5 class="text-muted bld pb5">Connect via Social Media with <?php echo _global_get_fields_by_id('Titles', 'id' ,$get_record_by_id_users->fkidTitle, array('title')). ' ' . $get_record_by_id_users->name . ' ' . $get_record_by_id_users->surname;?></h5>
					<div class="col-md-12 pl0 pr0 ml0 mr0">
						<?php 
						if ($get_record_by_id_users->email != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0 center"><a href="mailto:<?php echo $get_record_by_id_users->email; ?>" target="_blank" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-envelope"></i> <?php echo lang('contact_via_').lang('email');?></a></div>
						<?php }
						if ($get_record_by_id_users->skype != ''){ ?>
						<div class="col-md-2 pl0 pr0 force-width-20 mlr0 center"><a href="skype:<?php echo $get_record_by_id_users->skype; ?>?chat" class="btn btn-primary btn-sm mr5 mb0 force-width-90 text-left"> <i class="fa fa-skype"></i> <?php echo lang('connect_via_').lang('skype');?></a></div>
						<?php } ?>
					</div>
				</div>
			</div>						

<!--			<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="button" id="back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i><?php echo lang('back_to_').lang('users').lang('_listing'); ?></button></div>					-->
			<?php
			}else{
				echo '<div class="panel panel-danger panelClose form-error">';
				echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
				echo '<div class="panel-body center">'.lang('no_').lang('users').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('users/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('user').'</div>';
				echo '</div>';				
			}
			?>

			</div>
		</div>
	</div>
</div>
							