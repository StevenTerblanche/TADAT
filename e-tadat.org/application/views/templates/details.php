<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
    if ($get_record_by_id_templates){?>
      <div class="row profile">
        <div class="col-md-12">
          <div class="profile-name">
            <h3 class="mb10"><?php echo lang('?') . ": '" . $get_record_by_id_templates->nameTemplates . "'"; ?></h3>
          </div>
        </div>
      </div>
      <div class="col-md-12 pl0 pr0 ml0 mr0 bt">
        <div class="col-md-4 pl0 pr0 text-muted">
          <h5 class="text-muted mb0 pb5 bld"><?php echo lang('_details');?></h5>
        </div>
        <div class="col-md-4 pl0 pr0 text-muted">
          <div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('date') . ': ' . $get_record_by_id_templates->creationDate;?></div>
<?php ### FIXME?: shouldn't this text be lang()'ed? - taken from missions/profile... ?>
          <div class="col-md-12 pl0 pr0 text-muted">Type: </i><?php echo ($get_record_by_id_templates->ttUIName) ? $get_record_by_id_templates->ttUIName : lang('?');?></div>
          <div class="col-md-12 pl0 pr0 text-muted">Pages: <?php echo ($get_record_by_id_templates->ttPages) ? $get_record_by_id_templates->ttPages : lang('?');?></div>
          <div class="col-md-12 pl0 pr0 text-muted">Due: <?php echo ($get_record_by_id_templates->ttDue) ? $get_record_by_id_templates->ttDue : lang('?');?></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-<?php echo (empty($this->columns))?'10':$this->columns;?>">
  <div class="panel panel-default panel-blue-margin" style="margin-bottom:10px !important">
    <div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-user"></i><?php echo strtoupper(lang('?'));?></h4></div>
    <div class="panel-body pt5">
      <div class="col-md-12 pl0 pr0 ml0 mr0">
        <div class="col-md-4 pl0 pr0 text-muted">
          <h5 class="text-muted mb0 bld pb5"><?php echo lang('personal_').lang('details');?></h5>
          <div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_users->surname) ? $get_record_by_id_users->title . ' ' . $get_record_by_id_users->name . ' ' . $get_record_by_id_users->surname : lang('none_specified');?></div>
          <div class="col-md-12 pl0 pr0 text-muted"><?php echo ($get_record_by_id_users->designation) ? $get_record_by_id_users->designation : lang('none_specified');?></div>
        </div>
        <div class="col-md-4 pl0 pr0 text-muted">
          <h5 class="text-muted mb0 bld pb5"><?php echo lang('contact_details');?></h5>
          <div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('telephone') , ': ' ,  ($get_record_by_id_users->telephone) ? $get_record_by_id_users->telephone : lang('none_specified');?></div>
          <div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('mobile') , ': ' ,  ($get_record_by_id_users->mobile) ? $get_record_by_id_users->mobile : lang('none_specified');?></div>
          <div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('email') , ': ' ,  ($get_record_by_id_users->email)  ? '<a href="mailto:'.$get_record_by_id_users->email . '" target="_blank">'.$get_record_by_id_users->email .'</a>' : lang('none_specified');?></div>
        </div>
      </div>
    </div>
  </div>
</div>

      <div class="col-md-12 mt20 pt30 pb20 bt center"><button type="button" id="back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i><?php echo lang('back_to_').lang('?').lang('_listing'); ?></button></div>         
      <?php
      }else{
        echo '<div class="panel panel-danger panelClose form-error">';
        echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
        echo '<div class="panel-body center">'.lang('no_').lang('?').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('templates/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('?').'</div>';
        echo '</div>';        
      }
      ?>
