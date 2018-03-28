<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<?php
if ( !isset( $this->session->userdata['initdata'] ) )
{
?>


<script type="text/javascript">
    function loadCountry(field_dropdown, selected_value)
    {
        var result = $.ajax({
            'url' : '<?php echo site_url('init/populateCountryForm'); ?>/' + selected_value,
            'async' : false
        }).responseText;
        field_dropdown.replaceWith(result);
    }
</script>


<?php
}
?>



<div class="row">
  <div class="col-lg-10" style="margin:auto !important; float:none !important">
    <div class="box dark">
      <header>
        <div class="icons"> <i class="fa fa-desktop"></i> </div>
        <h5><?php echo strtoupper( sprintf ( lang( 'init title not_exist' ),  lang( 'init subject m' ) )  ); ?></h5>
        <div class="toolbar">
          <nav style="padding: 8px;"><a href="#" class="btn btn-default btn-xs full-box"> <i class="fa fa-expand"></i> </a> <a href="<?php echo base_url('/init'); ?>" class="btn btn-danger btn-xs close-box"> <i class="fa fa-times"></i> </a> </nav>
        </div>
      </header>
      <div id="div-1" class="body">

          <div class="body">

<?php
$arrValues = array ();

$arrValues['mission_region'] = "";
$arrValues['mission_country'] = "";
$arrValues['mission_authority'] = "";
$arrValues['mission_start'] = "";
$arrValues['mission_end'] = "";
$arrValues['assessment_period'] = "";
$assessment_period_select = 0;
$arrValues['mission_status'] = "";

for ( $stepYears = (date('Y') - 10), $i = 0; $stepYears < date('Y'); $stepYears++, $i++ ) $arrValues['assessment_period'][$i] = ($stepYears - 1) . " : " . $stepYears . " : " . ($stepYears + 1);

if ( $this->session->flashdata('error') || validation_errors() )
{
  echo '<div class="alert alert-danger center"><button type="button" class="login-close center" data-dismiss="alert">×</button>';
  echo '<h4 class="login_heading">'.lang('init title error').'</h4>';
  echo ( $this->session->flashdata('error') ? $this->session->flashdata('error') : "" );
  echo ( validation_errors() ? validation_errors() : "" );
  echo '</div>';

  if ( !isset( $this->session->userdata['initdata'] ) )
  {
      $arrValues['mission_region'] = set_value('region');
      $arrValues['mission_country'] = set_value('country');    
  }

  $arrValues['mission_authority'] = set_value( 'mission_authority' );
  $arrValues['mission_start'] = set_value( 'mission_start' );
  $arrValues['mission_end'] = set_value( 'mission_end' );

  $assessment_period_select = set_value( 'assessment_period' );
  $arrValues['mission_status'] = set_value( 'mission_status' );
}


### FIXME: placeholder's should have lang() configs, and button...
#     best to reuse same used for mission modification forms,
#     to avoid duplication
echo form_open( current_url() , array('role'=>'form') ); 


if ( !isset($this->session->userdata['initdata']) )
{
  echo form_dropdown("region", $regions, $arrValues['mission_region'], 'id="region" class="form-control" required placeholder="Mission Region" onchange="loadCountry($(\'#country\'), this.value)"' );
  echo form_dropdown("country", array('0'=>'...'), $arrValues['mission_country'], 'id="country" class="form-control" required placeholder="Mission Country"' );
}


echo form_dropdown("mission_authority", $authorities, $arrValues['mission_authority'], array('class'=>'input-field', 'placeholder'=>"Mission Authority") );

echo form_input(array('name'=>'mission_start', 'value'=>$arrValues['mission_start'], 'class'=>'input-field', 'placeholder'=>"Mission Start", 'type'=>'date') );
echo form_input(array('name'=>'mission_end', 'value'=>$arrValues['mission_end'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"Mission End", 'type'=>'date') );

echo form_dropdown("assessment_period", $arrValues['assessment_period'], $assessment_period_select, array('class'=>'input-field', 'placeholder'=>"Assessment Period") );

echo form_dropdown("mission_status", $statuses, $arrValues['mission_status'], array('class'=>'input-field', 'placeholder'=>"Mission Status") );

echo '<button type="submit" name="submit" class="btn btn-login btn-reset">' . "Create" . '</button>';
echo form_close();
?>

          </div>

      </div>
    </div>
  </div>
</div>



