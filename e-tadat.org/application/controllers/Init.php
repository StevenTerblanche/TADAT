<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Init extends Core_Controller {

    # load assets
    function __construct()
    {
        parent::__construct();

        $this->load->model( 'init_model' );
        $this->lang->load( 'init' );
        $this->load->model( 'users_model' );
        $this->lang->load( 'users' );

#		$this->add_external_css(array("/themes/core/css/login.css","/themes/core/css/login-animate.css"));
#		$this->add_external_js(array("/themes/core/js/login/login.js", "/themes/core/js/login/placeholder-shim.js"));
    }


    ### default:
    #		- check if we have: RA, RAM, Mission
    #		- get user level
    #		- redirect appropiately
    function index ()
    {
    	if ( !$this->init_model->check_for_RA() )
    	{
            $this->session->set_flashdata( 'error', sprintf( lang('init msg not_exist'), lang('init subject ra') ) );
            redirect ( base_url( "init/ra" ) );
    	}

    	if ( !$this->init_model->check_for_RAM() )
    	{
            $this->session->set_flashdata( 'error', sprintf( lang('init msg not_exist'), lang('init subject ram') ) );
            redirect ( base_url( "init/ram" ) );
    	}

    	if ( !$this->init_model->check_for_Mission() )
    	{
            $this->session->set_flashdata( 'error', sprintf( lang('init msg not_exist'), lang('init subject m') ) );
            redirect ( base_url( "init/m" ) );
    	}

        redirect ( base_url( '/dashboard' ) );
    }


    ### revenue authority:
    #		- display RA form
    #		- validate until user successfully submits
    #		- insert RA into db, and redirect
    function ra ()
    {
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));


### FIXME: field labels should have lang() configs
#			best to reuse same used for revenue authority creation forms,
#			to avoid duplication
        $this->form_validation->set_rules('authority_name', "Authority Name", 'required|trim');
        $this->form_validation->set_rules('authority_contact_name', "Contact Name", 'required|trim');
        $this->form_validation->set_rules('authority_contact_surname', "Contact Surname", 'required|trim');
        $this->form_validation->set_rules('authority_address_street', "Street Address", 'trim');
        $this->form_validation->set_rules('authority_address_suburb', "Suburb", 'required|trim');
        $this->form_validation->set_rules('authority_address_city', "City", 'trim');
        $this->form_validation->set_rules('region', "Region", 'required|trim');
        $this->form_validation->set_rules('country', "Country", 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            $arrModDB = array (
                                'authority_name'=>$this->input->post('authority_name'),
                                'authority_contact_name'=>$this->input->post('authority_contact_name'),
                                'authority_contact_surname'=>$this->input->post('authority_contact_surname'),
                                'authority_address_street'=>$this->input->post('authority_address_street'),
                                'authority_address_suburb'=>$this->input->post('authority_address_suburb'),
                                'authority_address_city'=>$this->input->post('authority_address_city'),
                                'authority_region'=>$this->input->post('region'),
                                'authority_country'=>$this->input->post('country')
                            );
            $intModDB = $this->init_model->create_RA( $arrModDB );

            if ( !$intModDB )
            {
### FIXME: lang()
                $this->session->set_flashdata( 'error', "Creating/Updating the mission profile failed." );
                redirect ( base_url( 'init' ) );
            }

            $_SESSION['initdata'] = array ('ra_region'=>$this->input->post('region'), 'ra_country'=>$this->input->post('country') );
### FIXME: lang()
            $this->session->set_flashdata( 'message', "RA successfully created." );
            redirect( base_url( "init" ) );
        }

        $content['regions'] = $this->init_model->get_all_regions();
        if ( !$content['regions'] )
        {
        	$this->session->set_flashdata( 'error', sprintf( lang( 'init fail not_exist' ), lang( 'init subject c' ) ) );
            redirect ( base_url( "init/ra" ) );
        }

        $data = $this->includes;
        $this->load->helper('form');

        $data['content'] = $this->load->view('init/0_RA', $content, TRUE);
        $this->load->view($this->template, $data);
    }


    ### revenue authority management:
    #		- display RAM (User) form
    #		- validate until user successfully submits
    #		- insert RA into db, and redirect
    function ram()
    {
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));

        $this->form_validation->set_rules('title_user', lang('users input name_client'), 'required|trim');
        $this->form_validation->set_rules('name_user', lang('users input name_client_contact'), 'required|trim');
        $this->form_validation->set_rules('surname_user', lang('users input surname_client_contact'), 'required|trim');
        $this->form_validation->set_rules('email_user', "User email address", 'required|trim|callback__check_email_exists');
        $this->form_validation->set_rules('telephone_user', lang('users input address_suburb_client'), 'trim');
        $this->form_validation->set_rules('mobile_user', lang('users input address_city_client'), 'required|trim');
        $this->form_validation->set_rules('passport_number_user', lang('users input address_city_client'), 'required|trim|callback__check_passport_exists');

        if ( !isset( $this->session->userdata['initdata'] ) )
        {
            $this->form_validation->set_rules('region', lang('users input region'), 'trim');
            $this->form_validation->set_rules('country', lang('users input country'), 'trim');             

        }

        $this->form_validation->set_rules('city_user', lang('users input city'), 'trim');
        $this->form_validation->set_rules('language_user', lang('users input address_city_client'), 'trim');

        if ($this->form_validation->run() == TRUE)
        {
            $arrModDB = array (
                                'title_user'=>$this->input->post('title_user'),
                                'name_user'=>$this->input->post('name_user'),
                                'surname_user'=>$this->input->post('surname_user'),
                                'email_user'=>$this->input->post('email_user'),
                                'telephone_user'=>$this->input->post('telephone_user'),
                                'mobile_user'=>$this->input->post('mobile_user'),
                                'role_user'=>5,
                                'passport_number_user'=>$this->input->post('passport_number_user'),
                                'description_user'=>$this->input->post('description_user'),
                                'city_user'=>$this->input->post('city_user'),
                                'region_user'=>(!isset($this->session->userdata['initdata'])?$this->input->post('region'):$this->session->userdata['initdata']['ra_region']),
                                'country_user'=>(!isset($this->session->userdata['initdata'])?$this->input->post('country'):$this->session->userdata['initdata']['ra_country']),
                                'language_user'=>$this->input->post('language_user')
                            );

            $intModDB = $this->users_model->create_user( $arrModDB);

            if ( !$intModDB )
            {
### FIXME: lang()
                $this->session->set_flashdata( 'error', "Creating/Updating the RAM failed." );
                redirect ( base_url( 'init' ) );
            }

            if ( isset ( $this->session->userdata['initdata'] ) )
            {
                $_SESSION['initdata']['ra_region'] = $arrModDB['region_user'];
                $_SESSION['initdata']['ra_country'] = $arrModDB['country_user'];
            }
            else $_SESSION['initdata'] = array ('ra_region'=>$arrModDB['region_user'], 'ra_country'=>$arrModDB['country_user'] );

### FIXME: lang()
            $this->session->set_flashdata( 'message', "RAM successfully created." );
            redirect( base_url( 'init' ) );
        }

        $this->load->helper('form');
        $data = $this->includes;

        $content_data['all_languages'] = $this->users_model->get_all_languages();

        if ( !isset($this->session->userdata['initdata']) ) $content_data['all_regions'] = $this->users_model->get_all_regions();

        $data['content'] = $this->load->view('init/1_RAM', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    ### mission:
    #       - display Mission form
    #       - validate until user successfully submits
    #       - insert Mission into db, and redirect
    function m()
    {
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));

### FIXME: lang() for field descriptions...
        if ( !isset( $this->session->userdata['initdata'] ) )
        {
            $this->form_validation->set_rules('region', "Mission Region", 'required|trim');
            $this->form_validation->set_rules('country', "Mission Country", 'required|trim');             

        }

        $this->form_validation->set_rules('mission_authority', "Mission Authority", 'required|trim');
        $this->form_validation->set_rules('mission_start', "Start Date", 'trim');
        $this->form_validation->set_rules('mission_end', "End Date", 'required|trim|callback__dates_not_invalid');
        $this->form_validation->set_rules('assessment_period', "Assessment Period", 'trim');
        $this->form_validation->set_rules('mission_status', "Mission Status", 'required|trim');

        if ($this->form_validation->run() == TRUE)
        {
            $arrModDB = array (
                                'mission_region'=>(!isset($this->session->userdata['initdata'])?$this->input->post('region'):$this->session->userdata['initdata']['ra_region']),
                                'mission_country'=>(!isset($this->session->userdata['initdata'])?$this->input->post('country'):$this->session->userdata['initdata']['ra_country']),
                                'mission_authority'=>$this->input->post('mission_authority'),
                                'mission_start'=>$this->input->post('mission_start'),
                                'mission_end'=>$this->input->post('mission_end'),
### FIXME: on db insert, needs to be string, not integer index into select option
                                'assessment_period'=>$this->input->post('assessment_period'),
                                'mission_status'=>$this->input->post('mission_status')
                            );
            $intModDB = $this->init_model->create_mission( $arrModDB );

            if ( !$intModDB )
            {
### FIXME: lang()
                $this->session->set_flashdata( 'error', "Creating/Updating the mission profile failed." );
                redirect ( base_url( 'init' ) );
            }


### FIXME: lang()
            $this->session->set_flashdata( 'message', "Mission successfully created." );
            redirect( base_url( "/dashboard" ) );
        }

        $this->load->helper('form');
        $this->load->model( 'missions_model' );
        $data = $this->includes;

        if ( !isset($this->session->userdata['initdata']) ) $content_data['regions'] = $this->users_model->get_all_regions();
        $content_data['authorities'] = $this->missions_model->get_all_authorities();
        $content_data['statuses'] = $this->missions_model->get_all_statuses();

        $data['content'] = $this->load->view('init/2_mission', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    function populateCountryForm ( $intRegion = NULL )
    {
        $this->load->helper('form');
        $arrCountries = $this->users_model->get_countries_in_region ( $intRegion );
        echo form_dropdown( 'country', $arrCountries, NULL, 'id="country" class="form-control"' );
    }


    function _dates_not_invalid ()
    {
        if ( strtotime($this->input->post('mission_start')) < strtotime($this->input->post('mission_end')) ) return TRUE;
        $this->form_validation->set_message('_dates_not_invalid', 'The end date cannot be before the start date.');
        return FALSE;
    }


    function _check_email_exists ( $strEmail )
    {
        if ( $this->users_model->_check_email_exists ( $strEmail ) )
        {
            $this->form_validation->set_message('_check_email_exists', 'Email address entered already exists.');
            return FALSE;
        }
        return TRUE;
    }


    function _check_passport_exists ( $strPassport )
    {
        if ( $this->users_model->_check_passport_exists ( $strPassport ) )
        {
            $this->form_validation->set_message('_check_passport_exists', 'Passport number entered already exists.');
            return FALSE;
        }
        return TRUE;
    }



}  