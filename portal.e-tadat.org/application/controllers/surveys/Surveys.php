<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Surveys extends Core_Controller {

	public $action, $form_data, $id, $fkID, $tbl, $data, $content_data, $RESULTS_PER_PAGE;


	function __construct(){
		parent::__construct();

		$this->RESULTS_PER_PAGE = 200;
		# The encrypt library is loaded to allow for id obfuscation. Usage =  $this->encrypt->decode(base64_decode(var_name))
		$this->load->library('CventClient');
		$this->load->library('SoapDebugClient');
		$this->load->helper('url');		
		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# Table operations are performed on
		$this->tbl = 'UsersLogins';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->data = $this->includes;
		$this->columns = 12;
		$this->page_header = "SURVEYS";
		$this->panel_icon = 'fa fa-bar-chart-o';
		$this->panel_title = "CURRENT OPEN SURVEYS";
		$this->content_data['submit_button'] = lang('action');
	}


	function index(){

//$client = new SoapClient('http://www.webservicex.net/geoipservice.asmx?WSDL');
//$result = $client->GetGeoIP(array('IPAddress' => '8.8.8.8'));

//print_r($result);


		$accountName = 'IMFDC001';
		$userName = 'IMFDC001Api6';
		$accountPassword = 'AKBCYvXw7Ox';

		if($this->cventclient->Login($accountName, $userName, $accountPassword) != false){
			

		//'Greater than'
		/* CONTACT GROUP STATIC DATA*/
		$object = 'ContactGroup';
		$field = 'Name';
		$operator = 'Equals';
		$value = '11.17';
		$contactGroupIds = $this->cventclient->GetIdsByType($object, $field, $operator, $value);
		$arrContactGroupIds = array($contactGroupIds);
//		_show_array($arrContactGroupIds,'CONTACT GROUP ID');
//		_show_array($this->cventclient->client->Retrieve(array('ObjectType' => $object, 'Ids' => $arrContactGroupIds)),'CONTACT GROUP DETAILS');

		/*
		_show_array(htmlspecialchars($this->cventclient->client->__getLastRequestHeaders()),'__getLastRequestHeaders');
		_show_array(htmlspecialchars($this->cventclient->client->__getLastRequest()),'__getLastRequest');
		_show_array(htmlspecialchars($this->cventclient->client->__getLastResponseHeaders()),'__getLastResponseHeaders');
		_show_array(htmlspecialchars($this->cventclient->client->__getLastResponse()),'__getLastResponse');
		*/

		/* CONTACT GROUP STATIC DATA*/
		$object = 'Survey';
		$field = 'SurveyLaunchDate';
		$operator = 'Greater than';
		$value = date('Y-m-d', strtotime('-2 days')).'T00:00:00'; // '2011-10-31T00:00:00';
		$arrsurveyIds = $this->cventclient->GetIdsByType($object, $field, $operator, $value);
		//_show_array($arrsurveyIds, 'SURVEY ID\'S');
		
		$this->content_data['surveys'] = $this->cventclient->client->Retrieve(array('ObjectType' => $object, 'Ids' => $arrsurveyIds));
		
		/* DESCRIBE GLOBAL */
		//$this->cventclient->DescribeGlobal();
		
		/* DESCRIBE OBJECT */
		//$this->cventclient->DescribeCvObject(array('Survey'));

		/* RETREIVE FUNCTIONS */
		//_show_array($this->cventclient->client->__getFunctions());

		/* GET SURVEY ID'S BY DATE*/
		$launchDate = date('Y-m-d', strtotime('-2 days')).'T00:00:00'; // '2011-10-31T00:00:00';
		$arrSurveyIds = $this->cventclient->GetUpcomingSurveysByLaunchDate($launchDate);
		//_show_array($arrSurveyIds,'SURVEY ID\'s FOR PAST 2 DAYS');
		
		//DistributionList


		/* RETREIVE SURVEY DETAILS BY SURVEY ID'S*/
		//_show_array($this->cventclient->RetrieveSurveys($arrSurveyIds),'SURVEY DETAILS');

		$strSearchItem = 'Survey'; 
		$strSearchField = 'SurveyTitle';		
		$strSearchTerm = 'Developers ID Test on Surveys';
		$strSearchType = 'AndSearch';

		$this->data['content'] = $this->load->view('surveys/surveys', $this->content_data, true);
        $this->content_data['get_dropdown_all_registration_roles'] = '';
		}else{
			$this->content_data['surveys'] = null;
			$this->data['content'] = $this->load->view('surveys/surveys', $this->content_data, true);
		}			
        $this->load->view($this->template, $this->data);		
	}



	function GetSurveyById($surveyId) {
		$surveys = $this->RetrieveAllPages('Survey', $surveyId);
		if(sizeof($surveys) != 1) throw new Exception('CventClient::GetSurveyById: SurveyId '.$surveyId.' not found');
		return $surveys[0];
	}
	function CompleteSurvey(){
		$this->content_data['survey_url'] = $this->id; 
		$this->data['content'] = $this->load->view('surveys/iframe', $this->content_data, true);
        $this->load->view($this->template, $this->data);		

	}
	
}	