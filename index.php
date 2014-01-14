<?

/* to start with, create your Mirror API instance (on cloud.google.com) and edit the libs/config.php file */
/* Guillaume R. gr@url2glass.com - 2014 */

include_once("libs/page.php");
include_once("libs/config.php");
include_once("libs/mirror.php");

$go="";$token = "";$code = "";
if(isset($_GET['go']))$go = $_GET['go'];
if(isset($_GET['error']))$error = $_GET['error'];else $error="";
if(isset($_GET['code']))$code = $_GET['code'];else $code="";
if(isset($_POST['token']))$token = $_POST['token'];
if($token=="") if(isset($_GET['token'])) $token=$_GET['token'];
if(isset($_POST['n'])) $n = $_POST['n'];
if(isset($_POST['url'])) $url = $_POST['url'];
if(isset($_POST['act'])) $act = $_POST['act'];


if($go==1) { // start authentification
	$Config = new Config();
	header("Location: " . $Config->create_params_oauth2("https://www.googleapis.com/auth/glass.timeline"));
	die();
}
if($token=="" && $code=="") { // Home page
	$Page = new Page;
	$Page->header();
	/* Index [start/instruction] page */
	$Page->start();
	$Page->instructions();
	/* End of Index [start/instruction] page */
	$Page->footer();
}
if($code!="") { // into oauth2 authentification
	$Page = new Page;

	$Page->empty_body();

	if($error=="access_denied") {
	        $Page->token_error("For some reason you cannot use the app.. sorry.");
        	die();
	}
	if($code!="") {
	        $Config = new Config();
        	$params = $Config->create_params_token($code);
        	$responseObj = $Config->get_google_token($params);
	        $Page->token_post("/",$responseObj->access_token);
	}
}
if($token!="") { // into the url2glass app

	$Page = new Page;
	$Page->header();

	$err=0;

	if($act=="ok") {
		if(substr($url,0,strlen("http://"))=="http://");
		else if(substr($url,0,strlen("https://"))=="https://"); else $err=1;
		if($err==1) $act="";
	}
	if($act=="ok") {
        	$Page->timeline_confirmation();
        	$Mirror = new Mirror;
        	$ans = $Mirror->mirror_api_action($token,$n,$url);
	}
	if($act=="") {
	        if($err==1) {
        	        $Page->web_error("Please enter something starting with http:// or https://");
	        }
	        $Page->form_intro();
	        $Page->create_form($err,$n,$url,$token);
	}

	$Page->code_disclaimer();
	$Page->footer();

}

?>


