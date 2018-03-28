<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



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


<div class="row">
  <div class="col-lg-10" style="margin:auto !important; float:none !important">
    <div class="box dark">
      <header>
        <div class="icons"> <i class="fa fa-desktop"></i> </div>
        <h5><?php echo strtoupper( sprintf ( lang( 'init title not_exist' ),  lang( 'init subject ra' ) )  ); ?></h5>
        <div class="toolbar">
          <nav style="padding: 8px;"><a href="#" class="btn btn-default btn-xs full-box"> <i class="fa fa-expand"></i> </a> <a href="<?php echo base_url('/init'); ?>" class="btn btn-danger btn-xs close-box"> <i class="fa fa-times"></i> </a> </nav>
        </div>
      </header>
      <div id="div-1" class="body">

          <div class="body">

<?php
$arrValues = array ();

$arrValues['authority_name'] = "";
$arrValues['authority_contact_name'] = "";
$arrValues['authority_contact_surname'] = "";
$arrValues['authority_address_street'] = "";
$arrValues['authority_address_suburb'] = "";
$arrValues['authority_address_city'] = "";
$arrValues['authority_region'] = "";
$arrValues['authority_country'] = "";


if ( $this->session->flashdata('error') || validation_errors() )
{
	echo '<div class="alert alert-danger center"><button type="button" class="login-close center" data-dismiss="alert">×</button>';
	echo '<h4 class="login_heading">' . lang( 'init title error' ) . '</h4>';
	echo ( $this->session->flashdata('error') ? $this->session->flashdata('error') : "" );
	echo ( validation_errors() ? validation_errors() : "" );
	echo '</div>';

	# on error, overwrite field values with entered values
	$arrValues['authority_name'] = set_value( 'authority_name' );
	$arrValues['authority_contact_name'] = set_value( 'authority_contact_name' );
	$arrValues['authority_contact_surname'] = set_value( 'authority_contact_surname' );
	$arrValues['authority_address_street'] = set_value( 'authority_address_street' );
	$arrValues['authority_address_suburb'] = set_value( 'authority_address_suburb' );
	$arrValues['authority_address_city'] = set_value( 'authority_address_city' );
	$arrValues['authority_region'] = set_value( 'region' );
	$arrValues['authority_country'] = set_value( 'country' );
}


### FIXME: placeholder's should have lang() configs, and button...
#			best to reuse same used for revenue authority creation forms,
#			to avoid duplication
echo form_open( current_url() , array('role'=>'form') ); 

echo form_input(array('name'=>'authority_name', 'value'=>$arrValues['authority_name'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"Authority Name"));
echo form_input(array('name'=>'authority_contact_name', 'value'=>$arrValues['authority_contact_name'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"Contact Name"));
echo form_input(array('name'=>'authority_contact_surname', 'value'=>$arrValues['authority_contact_surname'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"Contact Surname"));
echo form_input(array('name'=>'authority_address_street', 'value'=>$arrValues['authority_address_street'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"Authority Street Address"));
echo form_input(array('name'=>'authority_address_suburb', 'value'=>$arrValues['authority_address_suburb'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"Authority Suburb"));
echo form_input(array('name'=>'authority_address_city', 'value'=>$arrValues['authority_address_city'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"Authority City"));

echo form_dropdown("region", $regions, $arrValues['authority_region'], 'id="region" class="form-control" required placeholder="' . lang('users placeholder region') . '" onchange="loadCountry($(\'#country\'), this.value)"' );
echo form_dropdown("country", array('0'=>'...'), $arrValues['authority_country'], 'id="country" class="form-control" required placeholder="' . lang('users placeholder country') . '"' );

echo '<button type="submit" name="submit" class="btn btn-login btn-reset">' . "Create" . '</button>';
echo form_close();
?>

          </div>

      </div>
    </div>
  </div>
</div>

