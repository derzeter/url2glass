<?

class Config {

	public $google_url = "https://accounts.google.com/o/oauth2/auth";
	public $google_token = "https://accounts.google.com/o/oauth2/token";
	public $client_id = "INSERT_YOUR_GOOGLE_CLIENT_ID";
	public $redirect_uri = "INSERT_YOUR_REDIRECTED_URL";
	public $client_secret = "INSERT_YOUR_GOOGLE_SECRET_KEY";


	function create_params_oauth2($scope) {

		$params = array(
		    "response_type" => "code",
		    "client_id" => $this->client_id,
		    "redirect_uri" => $this->redirect_uri,
		    "scope" => $scope
		    );

		$request_to = $this->google_url . '?' . http_build_query($params);
		return $request_to;
	}


	function create_params_token($code) {

		    $params = array(
		        "code" => $code,
		        "client_id" => $this->client_id,
		        "client_secret" => $this->client_secret,
		        "redirect_uri" => $this->redirect_uri,
		        "grant_type" => "authorization_code"
		    );
		return $params;


	}

	function get_google_token($params) {

		$params_string="";

	        foreach($params as $key=>$value) { $params_string .= $key.'='.$value.'&'; }
	        $ch = curl_init();
 		curl_setopt($ch, CURLOPT_URL, $this->google_token);
	       	curl_setopt($ch,CURLOPT_POST, count($params));
        	curl_setopt($ch,CURLOPT_POSTFIELDS, $params_string);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        	$answer = curl_exec($ch);
        	curl_close($ch);
        	$responseObj = json_decode($answer);

		return($responseObj);

	}



}


?>
