<?
class CventClient extends SoapClient {
	public $client;
	public $ServerURL;
	public $CventSessionHeader;
	public $debug = false;
	public $MAX_FILTER_SIZE = 100; # 256 doesn't seem to work.
	public $RESULTS_PER_PAGE = 200;
	
	public function __construct(){}
	public function CventClient(){}

	public function Login($acct, $username, $password) {
		$this->client = new SoapClient("https://api.cvent.com/soap/V200611.ASMX?WSDL", array('soap_version' => SOAP_1_1, 'trace' => 1));
		$cache = false;
		$file = __DIR__.'/cvent_api_session.txt';
		if($cache && file_exists($file) && time() <= strtotime("+1 hour", $last = filemtime($file))) {
			# a valid session is cached, use it
			$data = file_get_contents($file);
			$arr_response = array();
			$arr_response = explode(',', $data);
			$this->ServerURL = $arr_response[0];
			$this->CventSessionHeader = $arr_response[1];
		} else { # sessions expire 1hr after CREATION
			$params = array();
			$params['AccountNumber'] = $acct;
			$params['UserName']		= $username;
			$params['Password']		= $password;
			$response = $this->client->Login($params);
			if(!$response->LoginResult->LoginSuccess) {
				return false;
				//throw new Exception("CventClient:: Login unsuccessful");
			}

			$arr_response = array();
			$arr_response[] = $response->LoginResult->ServerURL;
			$arr_response[] = $response->LoginResult->CventSessionHeader;
			$data = implode(',', $arr_response);
			file_put_contents($file, $data);
			$this->ServerURL = $arr_response[0];
			$this->CventSessionHeader = $arr_response[1];
		}

		$this->client->__setLocation($this->ServerURL);
		$header_body = array('CventSessionValue' => $this->CventSessionHeader);
		$header = new SoapHeader('http://api.cvent.com/2006-11', 'CventSessionHeader', $header_body);
		$this->client->__setSoapHeaders($header);
		//print 'CventClient:: ServerURL: '.$this->ServerURL.', CventSessionHeader: '.$this->CventSessionHeader.'<br/>';

	}
	public function DescribeGlobal() {
		$response = $this->client->DescribeGlobal();
		_show_array($response,'$strDescribeGlobal');
	}
	public function DescribeCvObject($objectTypes) {
		$params = new StdClass;
		$params->ObjectTypes = $objectTypes;
		$response = $this->client->DescribeCvObject($params);
		_show_array($response,'$strDescribeCvObject');
	}
	
	public function GetUpcomingSurveysByLaunchDate($launchDate) {
		$response = $this->SearchByFilter('Survey', 'AndSearch', array((object) array('Field' => 'SurveyLaunchDate', 'Operator' => 'Greater than', 'Value' => $launchDate)));
		if(isset($response->SearchResult->Id)) return $response->SearchResult->Id;
		return false;
	}


	public function GetIdsByType($object, $field, $operator, $value) {
		$response = $this->SearchByFilter($object, 'AndSearch', array((object) array('Field' => $field, 'Operator' => $operator, 'Value' => $value)));
		if(isset($response->SearchResult->Id)) return $response->SearchResult->Id;
		return false;
	}




	public function GetSurveyById($eventId) {
		$events = $this->RetrieveSurveys($eventId);
		if(sizeof($events) != 1) throw new Exception('CventClient::GetSurveyById: SurveyId '.$eventId.' not found');
		return $events[0];
	}
	
	
	# Retrieve
	public function RetrieveSurveys($ids) {
		return $this->RetrieveAllPages('Survey', $ids);
	}
	public function RetrieveContacts($ids) {
		return $this->RetrieveAllPages('Contact', $ids);
	}
	public function RetrieveDistributionLists($ids) {
		return $this->RetrieveAllPages('DistributionList', $ids);
	}
	public function RetrieveContactBySourceId($remaxid) {
		$result = $this->SearchContactBySourceId($remaxid);
		if($result === false) throw new Exception("CventClient::RetrieveContactBySourceId::$remaxid not found, cannot retrieve");
		$ids[] = $result->SearchResult->Id;
		$result = $this->RetrieveContacts($ids);
		return $result;
	}


	public function GetNumberOfRegistrations($eventId) {
		// needs to be tested
		$response = $this->SearchByFilter('Registration', 'AndSearch', array((object) array('Field' => 'SurveyId', 'Operator' => 'Equals', 'Value' => $eventId)));
		if(isset($response->SearchResult->Id)) return count($response->SearchResult->Id);
		return false;
	}
	public function GetNumberOfGuests($eventId) {
		// needs to be tested
		$response = $this->SearchByFilter('Guest', 'AndSearch', array((object) array('Field' => 'SurveyId', 'Operator' => 'Equals', 'Value' => $eventId)));
		if(isset($response->SearchResult->Id)) return count($response->SearchResult->Id);
		return false;
	}
	public function SearchAllDistributionLists() {
		$response = $this->SearchByFilter('DistributionList', 'OrSearch', array(
							(object) array('Field' => 'DistributionListName', 'Operator' => 'Equals', 'Value' => 'Something'),
							(object) array('Field' => 'DistributionListName', 'Operator' => 'Not Equal to', 'Value' => 'Something')));
		if(isset($response->SearchResult->Id)) return $response->SearchResult->Id;
		return false;
	}
	public function SearchContactBySourceId($remaxId) {
		$response = $this->SearchByFilter('Contact', 'AndSearch', array((object) array('Field' => 'SourceId', 'Operator' => 'Equals', 'Value' => $remaxId)));
		if(isset($response->SearchResult->Id)) return $response->SearchResult->Id;
		return false;
	}
	public function SearchContactsByGroupId($groupId) {
		$response = $this->SearchByFilter('Contact', 'AndSearch', array((object) array('Field' => 'GroupId', 'Operator' => 'Equals', 'Value' => $groupId)));
		if(isset($response->SearchResult->Id)) return $response->SearchResult->Id;
		return false;
	}
	public function SearchContactsByDistributionListId($distId) {
		$response = $this->SearchByFilter('Contact', 'AndSearch', array((object) array('Field' => 'DistId', 'Operator' => 'Equals', 'Value' => $distId)));
		if(isset($response->SearchResult->Id)) return $response->SearchResult->Id;
		return false;
	}
	public function SearchContactByDistributionListIdAndEmail($distId, $email) {
		// name implies email is unique
		$response = $this->SearchByFilter('Contact', 'AndSearch', array(
							(object) array('Field' => 'DistId', 'Operator' => 'Equals', 'Value' => $distId),
							(object) array('Field' => 'EmailAddress', 'Operator' => 'Equals', 'Value' => $email)));
		if(isset($response->SearchResult->Id)) return $response->SearchResult->Id;
		return false;
	}



	public function RetrieveContactIdsBySourceIds($sourceIds) {
		// needs to be tested
		// this returns Ids, not Objects, for consistency should be renamed SearchContactsBySourceIds($sourceIds)
		$total = count($sourceIds);
		$contactIds = array();
		for($i = 0; $i < count($sourceIds); $i += $this->MAX_FILTER_SIZE) {
			if ($this->debug) print "CventClient::RetrieveContactIdsBySourceIds:: retrieving contactIds from $i to ".($i + $this->MAX_FILTER_SIZE)."<br/>";
			$batch = array_slice($sourceIds, $i, $i + $this->MAX_FILTER_SIZE);
			$criteria = NULL;
			$criteria->ObjectType = 'Contact';
			$criteria->CvSearchObject->SearchType = 'OrSearch';
			for($j=0; $j < sizeof($batch); $j++) {
				$criteria->CvSearchObject->Filter[$j]->Field = 'SourceId';
				$criteria->CvSearchObject->Filter[$j]->Operator = 'Equals';
				$criteria->CvSearchObject->Filter[$j]->Value = $batch[$j];
			}
			$tmp = $this->client->Search($criteria);
			$tmp = $tmp->SearchResult->Id;
			if(is_array($tmp)) {
				$contactIds = array_merge($contactIds, $tmp);
			} else {
				$contactIds = array_merge($contactIds, array($tmp));
			}
		}
		return $contactIds;
	}
	# Create or Updates
	public function AddContactsToDistributionList($distId, $contactIds) {
		if(!is_array($contactIds)) $contactIds = array($contactIds); // safety measure, contactId must be CvObject type
		$response = $this->client->ManageDistributionListMembers((object) array('DistListId' => $distId, 'Action' => 'Add', 'CvObjects' => $contactIds));
		if(isset($response->ManageDistributionListMembersResult->ManageDistributionListResult)) return $response->ManageDistributionListMembersResult->ManageDistributionListResult;
		return false;
	}
 	public function AddContactToDistributionListByEmailAddress($distId, $email) {
		$response = $this->SearchByFilter('Contact', 'AndSearch', array((object) array('Field' => 'EmailAddress', 'Operator' => 'Equals', 'Value' => $email)));
		if(!isset($response->SearchResult->Id)) return false;

		$contactId =  $response->SearchResult->Id;
		return $this->AddContactsToDistributionList($distId, array((object) array('Id' => $contactId, 'MessageId' => '')));
	}
	public function CreateContactAndAddToDistributionList($contact, $distId) {
		// pre: contact is an array with appropriate contact fields
		$contacts = array($contact);
		$results = $this->CreateUpdateContacts('Create', $contacts);
	 	print "<br/>create contacts<pre>";
		print_r($results);
		print "</pre><br/>";
		if(sizeof($results['passed']) == 1) { // new contact
			$contactId = $results['passed'][0]['result']->Id;
			print "contactId: ".$contactId;
			return $this->AddContactsToDistributionList($distId, array((object) array('Id' => $contactId, 'MessageId' => '')));
		} elseif (sizeof($results['failed']) == 1) { // error adding contact
			$errcode = $results['failed'][0]['result']->Errors->Error[0]->Code;
			if($errcode == 'CV40104' || $errcode == 'CV40103') { // contact already exists | duplicated contact object
				$emailaddress = $results['failed'][0]['contact']['EmailAddress'];
				print "emailaddress: ".$emailaddress;
				return $this->AddContactToDistributionListByEmailAddress($distId, $emailaddress);
			}
		}
		return false;
	}
	public function CreateUpdateContacts($type, $contacts) {
		# type = 'Create' or 'Update'
		// this could be improved A LOT
		if(!is_array($contacts)) $contacts = array($contacts);
		$total = sizeof($contacts);
		$pages = ceil($total / $this->RESULTS_PER_PAGE);
		$remainder = $total % $this->RESULTS_PER_PAGE;
		$passed = array();
		$failed = array();
		for($i = 0; $i < $pages; $i++) {
			$x = $i * $this->RESULTS_PER_PAGE;
			$y = $this->RESULTS_PER_PAGE;
			if($pages == $i + 1) $y = $remainder;
			if ($this->debug) print "CventClient::CreateUpdateContacts::Page $i, creating $y Ids starting at array index $x<br/>";
			$batch = array_slice($contacts, $x, $y);
			$criteria =  NULL;
			$tmp = NULL;
			$criteria->Contacts = $batch;
			# process batch
			if($type == 'Create') {
				$tmp = $this->client->CreateContact($criteria);
				$tmp = @$tmp->CreateContactResult->CreateContactResult;
			} elseif ($type == 'Update') {
				$tmp = $this->client->UpdateContact($criteria);
				$tmp = @$tmp->UpdateContactResult->UpdateContactResult;
			} else {
				throw new Exception("CventClient::CreateUpdateContacts:: Invalid $type for this method");
			}
			if(isset($tmp)) {
				if(is_array($tmp)) {
					$result = $tmp;
				} else {
					$result = array($tmp);
				}
				if(sizeof($result) != sizeof($batch)) throw new Exception("CventClient::CreateUpdateContacts:: Size of results mismatch with size of batch");
				# organize pass/fails
				$pass = array();
				$fail = array();
				for($j = 0; $j < sizeof($result); $j++) {
					if(isset($result[$j]->Errors->Error)) {
						$fail[] = array('contact' => $batch[$j], 'result' => $result[$j]);
					} else {
						$pass[] = array('contact' => $batch[$j], 'result' => $result[$j]);
					}
				}
				$failed = array_merge($failed, $fail);
				$passed = array_merge($passed, $pass);
			}
		}
		if(sizeof($passed) + sizeof($failed) != $total) throw new Exception("CventClient::CreateUpdateContacts:: Total pass+fails does not match total contacts.");
		return array('passed' => $passed, 'failed' => $failed);
	}
	# helpers
	private function RetrieveAllPages($objecttype, $ids) {
		if(!is_array($ids)) $ids = array($ids); // safety measure
		$results = array();
		for($i=0; $i < count($ids); $i += $this->RESULTS_PER_PAGE) {
			if ($this->debug) print "CventClient::RetrievePages:: retrieving $objecttype using Ids from $i to ".($i+$this->RESULTS_PER_PAGE)."<br/>";
			$batch = array_slice($ids, $i, $this->RESULTS_PER_PAGE);
			$criteria = (object) array('ObjectType' => $objecttype, 'Ids' => $batch);
			$tmp = $this->client->Retrieve($criteria);
			var_dump($tmp);
			if(is_array($tmp->RetrieveResult->CvObject)) {
				$results = array_merge($results, $tmp->RetrieveResult->CvObject);
			} else {
				$results = array_merge($results, array($tmp->RetrieveResult->CvObject));
			}
		}
		return $results;
	}
 	public function SearchByFilter($objecttype, $type, $filters)  {
		$response = $this->client->Search((object) array('ObjectType' => $objecttype, 'CvSearchObject' => (object) array('SearchType' => $type, 'Filter' => $filters)));
		return $response;
	}
}
?>