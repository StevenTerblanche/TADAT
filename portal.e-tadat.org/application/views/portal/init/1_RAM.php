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
	<div class="col-lg-4" style="margin:auto !important; float:none !important">
    	<div class="box dark">
			<header>
		        <div class="icons"><i class="fa fa-desktop"></i></div>
		        <h5><?php echo strtoupper( sprintf ( lang( 'init title not_exist' ),  lang( 'init subject ram' ) )  ); ?></h5>
		        <div class="toolbar">
					<nav style="padding: 8px;"><a href="#" class="btn btn-default btn-xs full-box"> <i class="fa fa-expand"></i> </a> <a href="<?php echo base_url('/init'); ?>" class="btn btn-danger btn-xs close-box"> <i class="fa fa-times"></i> </a> </nav>
		        </div>
			</header>
	        <div id="div-1" class="body">
		        <div class="body">

<?php

$arrValues = array ();

$arrValues['title_user'] = "";
$arrValues['name_user'] = "";
$arrValues['surname_user'] = "";
$arrValues['description_user'] = "";
$arrValues['email_user'] = "";
$arrValues['telephone_user'] = "";
$arrValues['mobile_user'] = "";
$arrValues['passport_number_user'] = "";
$arrValues['region_user'] = "";
$arrValues['country_user'] = "";    
$arrValues['city_user'] = "";
$arrValues['language_user'] = "";


if ( $this->session->flashdata('error') || validation_errors() )
{
    $arrValues['title_user'] = set_value('title_user');
    $arrValues['name_user'] = set_value('name_user');
    $arrValues['surname_user'] = set_value('surname_user');
    $arrValues['description_user'] = set_value('description_user');
    $arrValues['email_user'] = set_value('email_user');
    $arrValues['telephone_user'] = set_value('telephone_user');
    $arrValues['mobile_user'] = set_value('mobile_user');
    $arrValues['passport_number_user'] = set_value('passport_number_user');

    if ( !isset( $this->session->userdata['initdata'] ) )
    {
        $arrValues['region_user'] = set_value('region');
        $arrValues['country_user'] = set_value('country');    
    }

    $arrValues['city_user'] = set_value('city_user'); 
    $arrValues['language_user'] = $this->input->post('language_user');


    echo '<div class="alert alert-danger center"><button type="button" class="login-close center" data-dismiss="alert">×</button>';
    echo '<h4 class="login_heading">'.lang('init title error').'</h4>';
    echo ( $this->session->flashdata('error') ? $this->session->flashdata('error') : "" );
    echo ( validation_errors() ? validation_errors() : "" );
    echo '</div>';
}
echo form_open( current_url() , array('role'=>'form', 'class'=>'form-horizontal') ); 
?>

                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input title');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <?php echo form_input(array('name'=>'title_user', 'value'=>$arrValues['title_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder title'))); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input name');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <?php echo form_input(array('name'=>'name_user', 'value'=>$arrValues['name_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder name'))); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input surname');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <?php echo form_input(array('name'=>'surname_user', 'value'=>$arrValues['surname_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder surname'))); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input designation');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <?php echo form_input(array('name'=>'description_user', 'value'=>$arrValues['description_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder designation'))); ?>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input passport');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
                                    <?php echo form_input(array('name'=>'passport_number_user', 'value'=>$arrValues['passport_number_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder passport'))); ?>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input email');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <?php echo form_input(array('name'=>'email_user', 'value'=>$arrValues['email_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder email'))); ?>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input telephone');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                    <?php echo form_input(array('name'=>'telephone_user', 'value'=>$arrValues['telephone_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder telephone'))); ?>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input mobile');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                    <?php echo form_input(array('name'=>'mobile_user', 'value'=>$arrValues['mobile_user'], 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('users placeholder mobile'))); ?>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input language');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
                                    <?php echo form_dropdown("language_user", $all_languages, $arrValues['language_user'], array('class'=>'form-control light-select', 'required'=>'', 'placeholder'=>lang('users placeholder language'))); ?>
                                </div>
                            </div>
                        </div>

<?php
if ( !isset($this->session->userdata['initdata']) )
{
?>

                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input region');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
                                    <?php echo form_dropdown("region", $all_regions, $arrValues['region_user'], 'id="region" class="form-control" required placeholder="' . lang('users placeholder region') . '" onchange="loadCountry($(\'#country\'), this.value)"' ); ?>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input country');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                    <?php echo form_dropdown("country", array('0'=>'...'), $arrValues['country_user'], 'id="country" class="form-control" required placeholder="' . lang('users placeholder country') . '"' ); ?>
                                </div>
                            </div>
                        </div>

<?php
}
?>

                        <div class="form-group">
                            <label class="col-xs-3 control-label"><?php echo lang('users input city');?></label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                                    <?php echo form_input(array('name'=>'city_user', 'value'=>$arrValues['city_user'],'class'=>'form-control', 'placeholder'=>lang('users placeholder city'))); ?>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <div class="col-xs-12" style="text-align:center !important;">
                                <button type="submit" class="btn btn-primary white"><?php echo lang('users button register_user'); ?></button>
                            </div>
                        </div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>