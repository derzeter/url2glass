<?
class Mirror {

public $mirror_url = "https://www.googleapis.com/mirror/v1/timeline";

function mirror_api_action($token,$n,$payload) {

	$headers = array( 'Authorization: Bearer '.$token, 'Content-Type: application/json' );

	// json string to create a timeline card that can open a website, get pinned or deleted

	$params_string = '{
	        "text": "'.$n.'",
		 "menuItems": [
		{
		"action": "OPEN_URI",
		"payload": "'.$payload.'"
		},
		{
		"action": "TOGGLE_PINNED"
		},
		{
		"action": "DELETE"
		}
		]
		}';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->mirror_url);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );
        $answer = curl_exec($ch);
        curl_close($ch);

    $responseObj = json_decode($answer);
    return $responseObj;
  }


}
?>

