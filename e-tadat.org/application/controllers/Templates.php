<?php defined('BASEPATH') OR exit('No direct script access allowed');
### templating
#   TABLES
#       TemplateTypes: definition of templates (PMQ, PMR, etc.)
#       TemplateStatuses: each type has custom statuses (e.g. PMQ has new, updated, obsolete...)
#       Templates: top-level index, with creator and revisions
#       TemplateFields: custom fields defined per template (to receive input or display output)
#       DataStore: data captured for defined fields (many-to-one, only for input fields)
#
#   FIELDS
#       nameTemplateField: variable name inside template file
#       typeField: input or output
#       inputElement: HTML5 input element (IF typeField is input)
#       inputRequired: field required, validation (IF typeField is input)
#       outputReference: object* attribute assigned to variable (IF typeField is output)
#
# * objects required (for PMQ + PMS):
#       Mission:
#           startMission
#           endMission
#           nameCountry
#           periodYearsAbbr
#           periodYearsAbbrMinus
#           periodYear0
#           periodYear1
#           periodYear2
#           periodYear3
#           Assessor:
#               name
#               surname
#               email
#               telephone
#               mobile
#
#
#   TODO
#   0. display() & submit() need to be HTML/CSS/JS templified...
#   1. link to all revisions of current (via idParentTemplate chain)
#   2. modify() to allow create/update(/disable/delete?) of template (in templates/{details,list})
#   3. add custom status of each template (via TemplateStatuses)
#   4. bug in Data Tables (see: https://github.com/Screenworx/e-tadat.org/issues/1)
#   5. submit() to inject data POSTed from display() forms into DataStore (template pages need form URI...)
#   6. template field-to-pages separation (include "next" facility, perhaps additional column in Field or Type table)
#   7. in v2+ the object fields required to be loaded will need to be dynamic (defined through the template editor)
#   8. all potential form fields must be catered for inside _get_field_form() (and validation related...)



class Templates extends Core_Controller {

    function __construct(){
        parent::__construct();
		### zsh: tbc - might be loaders only
		#        $this->load->model('templates_model');

        # Load specific js files here for the relevant section e.g. Mission, User, Authority etc.
        $this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js","/themes/core/js/bootstrap-datepicker.js", "/themes/core/js/views/missions.js"));
        # A CRUD model has been created that should handle most form crud operations but may be extended in future
		### zsh: use for submissions?
		#        $this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		### zsh: do we need this here?
        $this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		#        $this->form_data = ($this->input->post()) ? $this->input->post() : null;
        # Table operations are performed on
        $this->tbl = 'Templates';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
        # The database field that the id above corresponds to
		### zsh: um
		#        $this->fkID = 'id';
        $this->data = $this->includes;
        $this->page_header = strtoupper(lang('manage_').lang('?'));
        $this->columns = 10;
        $this->panel_icon = 'fa fa-globe';
        $this->panel_title = lang('?').lang('_listing');
        $this->content_data['submit_button'] = lang('action');
        $this->output->enable_profiler(false);

    }



    # Checks if id then show template details else shows listing
    function read()
    {
        # id exists, show specific template
        if ( $this->id && !$this->action )
        {
            $this->columns = 8;
            $this->panel_title = lang('?').lang('?');

            $this->content_data['get_record_by_id_templates'] = _get_record_by_id_templates($this->id);
            $this->content_data['get_record_by_id_users'] = _get_record_by_id_users($this->content_data['get_record_by_id_templates']->fkidCreator);

            $this->data['content'] = $this->load->view('templates/details', $this->content_data, true);
        }
        # no id, show all templates
        elseif ( !$this->id && !$this->action )
        {
            $this->panel_title = lang('?').lang('_listing');
            $this->content_data['get_record_all_templates'] = ($this->user->fkidUserRole < 4) ?  _get_record_all_templates() : _get_record_all_templates(1);
### zsh: is this a dupe call? (from Missions @ 20150726)
#            $this->content_data['get_record_all_missions'] = _get_record_all_missions();
            $this->data['content'] = $this->load->view('templates/list', $this->content_data, true);
        }
        $this->load->view( $this->template, $this->data );
    }




### zsh: TODO #2
###     not needed yet as templates
###     are statically defined in db
###     version 2+
###     (copy from Missions controller @ 20150726)

/*    function modify(){
        # Used in Create and Update
        # This populates the Missions
        $this->content_data['get_dropdown_all_rev_auth'] = _get_dropdown_all_rev_auth();
        $this->content_data['get_dropdown_all_team_leaders'] = _get_dropdown_all_team_leaders();
        
        # This populates the Revenue Authorities
        $this->content_data['get_dropdown_all_period'] = _get_dropdown_all_period();
        $this->content_data['get_dropdown_all_status'] = _get_dropdown_all_status();        

        #** CREATE ** 
        # This shows the 'create view' for a NEW record if no ID OR action 
        if(!$this->id && !$this->action){
            # Tell the crud function what to do.
            $this->action = 'create';
            # Populate view variables according to type
            $this->panel_title = lang('create_').lang('mission');;
            $this->content_data['submit_button'] = lang('create_').lang('mission');
            # This gets all the fields from the DB for the specified table and populates values in the view AFTER validation
            $this->content_data['get_fields'] = $this->db->list_fields($this->tbl);
            $this->content_data['uri'] = current_url();
            $this->data['content'] = $this->load->view('missions/create', $this->content_data, true);
        }
        
        # ** EDIT **
        # This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
        if($this->id && !$this->action){
            # Tell the crud function what to do.
            $this->action = 'update';
            # Populate view variables according to type         
            $this->panel_title = lang('update_').lang('mission');
            $this->content_data['submit_button'] = lang('update_').lang('mission');
            # Encrypts and encodes the id and sets URL
            $this->content_data['uri'] = current_url () . "?id=" . base64_encode($this->encrypt->encode($this->id));
            # Get the entire row as specified by the id
            $this->content_data['get_record_by_id'] = _get_record_by_id_missions($this->id);
            # Get the countries only for the current region as retreived from the Authority fkidRegion
            $this->data['content'] = $this->load->view('missions/create', $this->content_data, true);
        }

        # If there is an action and it is NOT delete OR disable run form validation
        if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
            $this->load->helper('form');
            $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
            $this->form_validation->set_rules('mission',   lang('mission').lang('_name'), 'required|trim');

            # If there is no errors and form validation passed
            if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
                # This redirects after successfull create or update with the encrypted id as returned from the crud function to the Profiles page.
                redirect(base_url('missions/profile/?id='.base64_encode($this->encrypt->encode($this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID)))));
            }       
        }
        # This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
        if($this->id && ($this->action ==='enable' ||$this->action ==='disable' || $this->action ==='delete')){
            # Call crud function with relevant action
            $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
            #redirect to listings View
            redirect(base_url('missions/list'));
        }
        # Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }*/









    # Checks if id then show template details else shows listing
    function display()
    {
        $this->idt = ($this->input->get('idt') ? $this->input->get('idt') : null);
        $this->idm = ($this->input->get('idm') ? $this->input->get('idm') : null);
        $this->ida = ($this->input->get('ida') ? $this->input->get('ida') : null);

        # id of template, id of mission, id of assessor MUST exist
        if ( !$this->idt || !$this->idm || !$this->ida )
        {
            # these aren't the droids you're looking for 
            $this->session->set_flashdata('error', array('heading'=>lang('?'), 'message'=>lang('?')));
            redirect( base_url ('/dashboard') );
        }

        # all fields linked to this template
        $arrFields = _get_record_by_id_fields($this->idt);

        # all template and type data
        $objTemplate = _get_record_by_id_templates($this->idt);

        # all mission data
        $objMission = _get_record_by_id_missions($this->idm);

        # all assessor data
        $objAssessor = _get_record_by_id_users($this->ida);


### zsh: TODO #6
        # loop through all template pages
        for ( $i = 1; $i <= $objTemplate->ttPages; $i++ )
        {
### FIXME: temp separator for visibility
            echo "<h1>PAGE " . $i . "</h1><br /><br /><br />";

            # build path to template file
            $strFileName = FCPATH . "data/templates/" . $this->idt . ".page" . $i . ".html";

            # test if file is readable
            $arrFileInfo = get_file_info( $strFileName, array( 'readable' )  );

### FIXME: should probably set error and redirect if not readable?
            echo ( ($arrFileInfo['readable'] == 1) ? $this->_get_content( $strFileName, $arrFields, $objMission, $objAssessor ) : "File not readable!" );

### FIXME: temp separator for visibility
            echo "<hr width='100%' />";

        }




### zsh: TODO #0
#       $this->columns = 8;
#       $this->panel_title = lang('?').lang('?');
#
#       $this->content_data['get_record_by_id_templates'] = _get_record_by_id_templates($this->id);
#       $this->content_data['get_record_by_id_users'] = _get_record_by_id_users($this->content_data['get_record_by_id_templates']->fkidCreator);
#       $this->data['content'] = $this->load->view('templates/details', $this->content_data, true);
#       $this->load->view( $this->template, $this->data );
    }




### zsh: TODO #5

# store template submission:

#   - inputs only, required object (fkidMission)
#   - insert each template field into DataStore (fkidTemplateField, storeField, dataField)

#    function submit()
#    {
#
#    }








    # get content of $strFile template, and substitute each 'nameTemplateField' {variable} 
    function _get_content( $strFile, $arrData, $objMission, $objAssessor )
    {
        # read template file
        $strTemplate = file_get_contents( $strFile );

        # loop through db array of arrays
        foreach ( $arrData as $arrField )
        {
            # input fields created from
            if ( $arrField['typeField'] == "input" ) $strTemplate = str_replace( '{' . $arrField['nameTemplateField'] . '}', $this->_get_field_form($arrField['idTemplateFields'],$arrField['nameTemplateField'],$arrField['inputElement'],$arrField['inputRequired']), $strTemplate );
            else $strTemplate = str_replace( '{' . $arrField['nameTemplateField'] . '}', $this->_get_field_reference($arrField['outputReference'], $objMission, $objAssessor), $strTemplate );

        }

       return $strTemplate;
    }


    # generate form elements from template fields
    function _get_field_form($intID,$strName,$strElement,$booRequired)
    {
        switch ( $strElement )
        {
### zsh: TODO #8
            case "textarea":
            case "text":
            case "checkbox":
            case "radio":
            case "select":
            case "file":
            case "email":
            case "url":
            case "range":
            case "date":
            case "datetime":
            case "number":
                $strReturn = "<input type='number' id='" . $intID . "' name='" . $strName . "' " . ( $booRequired?" required":"") . ">";

        }

        return $strReturn;
    }



    # swap reference for output data
    function _get_field_reference($strReference,$objMission,$objAssessor){
        $strReturn = "";
### zsh: TODO #7
        switch ( $strReference )
        {
            case "Mission:startMission":
                $strReturn = $objMission->dateStart;
                break;
            case "Mission:endMission":
                $strReturn = $objMission->dateEnd;
                break;
#            case "TemplateType:typeDueTime":
#            case "Mission:nameCountry":
            case "Mission:Assessor:name":
                $strReturn = $objAssessor->name;
                break;
            case "Mission:Assessor:surname":
                $strReturn = $objAssessor->surname;
                break;
            case "Mission:Assessor:email":
                $strReturn = $objAssessor->email;
                break;
            case "Mission:Assessor:telephone":
                $strReturn = $objAssessor->telephone;
                break;
            case "Mission:Assessor:mobile":
                $strReturn = $objAssessor->mobile;
                break;
#            case "Mission:periodYearsAbbr":
#            case "Mission:periodYear1":
#            case "Mission:periodYear2":
#            case "Mission:periodYear3":
#            case "Mission:periodYear0":
#            case "Mission:periodYearsAbbrMinus":
        }

        return $strReturn;
    }

}