<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="row">
  <div class="col-lg-10" style="margin:auto !important; float:none !important">
    <div class="box dark">
      <header>
        <div class="icons"> <i class="fa fa-desktop"></i> </div>
        <h5><?php echo strtoupper( $action ); ?> TEMPLATE: </h5>
        <div class="toolbar">
          <nav style="padding: 8px;"><a href="#" class="btn btn-default btn-xs full-box"> <i class="fa fa-expand"></i> </a> <a href="<?php echo base_url('/dashboard'); ?>" class="btn btn-danger btn-xs close-box"> <i class="fa fa-times"></i> </a> </nav>
        </div>
      </header>
      <div id="div-1" class="body">

          <div class="body">



<div class="container">
	<div class="row">
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls"> 
                <form role="form" autocomplete="off">
                    <div class="entry input-group col-xs-3">
                        <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                    	<span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>
                </form>
            <br>
            <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>
            </div>
        </div>
	</div>
</div>









<?php

#echo "<pre>";
#print_r ( $user );
#echo "</pre>";
#exit;




	# set field values from db for edit, blank for add
	$arrValues = array ();
	$arrValues['title_user'] = ( $action == "edit" ? $user->titleUser : "" );
	$arrValues['name_user'] = ( $action == "edit" ? $user->nameUser : "" );
	$arrValues['surname_user'] = ( $action == "edit" ? $user->surnameUser : "" );
	$arrValues['description_user'] = ( $action == "edit" ? $user->descriptionUser : "" );
	$arrValues['email_user'] = ( $action == "edit" ? $user->emailUser : "" );
	$arrValues['telephone_user'] = ( $action == "edit" ? $user->telephoneUser : "" );
	$arrValues['mobile_user'] = ( $action == "edit" ? $user->mobileUser : "" );
	$arrValues['role_user'] = ( $action == "edit" ? $user->fkidUserRole : 0 );
	$arrValues['passport_number_user'] = ( $action == "edit" ? $user->passportNumberUser : "" );
	$arrValues['language_user'] = ( $action == "edit" ? $user->fkidUserLanguage : 0 );

### FIXME: lang() calls to be updated in configs...
	if ( $this->session->flashdata('error') || validation_errors() )
	{
		echo '<div class="alert alert-danger center"><button type="button" class="login-close center" data-dismiss="alert">×</button>';
### FIXME: custom error needed for default form error heading (everything is "auth error!")
		echo '<h4 class="login_heading">'.lang('login error authentication_error').'</h4>';
		echo ( $this->session->flashdata('error') ? $this->session->flashdata('error') : "" );
		echo ( validation_errors() ? validation_errors() : "" );
		echo '</div>';

		# on error, overwrite field values with entered values
		$arrValues['title_user'] = set_value( 'title_user' );
		$arrValues['name_user'] = set_value( 'name_user' );
		$arrValues['surname_user'] = set_value( 'surname_user' );
		$arrValues['description_user'] = set_value( 'description_user' );
		$arrValues['email_user'] = set_value( 'email_user' );
		$arrValues['telephone_user'] = set_value( 'telephone_user' );
		$arrValues['mobile_user'] = set_value( 'mobile_user' );
		$arrValues['role_user'] = set_value( 'role_user' );
		$arrValues['passport_number_user'] = set_value( 'passport_number_user' );
		$arrValues['language_user'] = set_value( 'language_user' );
	}


### FIXME: placeholder's should have lang() configs, and button...
	echo form_open( $uri , array('role'=>'form') ); 
	echo form_input(array('name'=>'title_user', 'value'=>$arrValues['title_user'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"User's Title")); 
	echo form_input(array('name'=>'name_user', 'value'=>$arrValues['name_user'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"User's Name")); 
	echo form_input(array('name'=>'surname_user', 'value'=>$arrValues['surname_user'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"User's Surname")); 
	echo form_textarea(array('name'=>'description_user', 'value'=>$arrValues['description_user'], 'class'=>'input-field', 'placeholder'=>"User Description")); 
	echo form_input(array('name'=>'email_user', 'value'=>$arrValues['email_user'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"User's Email")); 
	echo form_input(array('name'=>'telephone_user', 'value'=>$arrValues['telephone_user'], 'class'=>'input-field', 'placeholder'=>"User's Telephone"));
	echo form_input(array('name'=>'mobile_user', 'value'=>$arrValues['mobile_user'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"User's Mobile"));
	echo form_dropdown("role_user", $all_roles, $arrValues['role_user'], array('class'=>'input-field', 'required'=>'', 'placeholder'=>"User's Role") );
	echo form_input(array('name'=>'passport_number_user', 'value'=>$arrValues['passport_number_user'], 'class'=>'input-field', 'required'=>'', 'placeholder'=>"User's Passport Number"));
	echo form_dropdown("language_user", $all_languages, $arrValues['language_user'], array('class'=>'input-field', 'placeholder'=>"User's Language") );
	echo '<button type="submit" name="submit" class="btn btn-login btn-reset">' . "click" . '</button>';
	echo form_close();
?>

          </div>

      </div>
    </div>
  </div>
</div>



