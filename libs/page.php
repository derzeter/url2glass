<?
class Page {

	function header() {
	echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><title>URL2GLASS - Websites on Google Glass</title><link rel="stylesheet" href="box.css" type="text/css" media="all" /><link href="/icon/favicon.png" rel="shortcut icon" /><meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /><meta name="MSSmartTagsPreventParsing" content="TRUE" /><meta http-equiv="expires" content="-1" /><meta http-equiv= "pragma" content="no-cache" /><meta name="robots" content="all" /><meta name="author" content="Guillaume Raillard" /><meta name="description" content="Send website links to your Google Glass." /><meta name="keywords" content="url, link, google, glass" /></head><body><div id="top"><img src="images/logo.png" border="0"></div><div id="top2"></div><div id="top1"></div><div id="left"><p></p></div><div id="middle">';
	}

	function footer() {
		echo '<div align="right"><p><a href="https://code.google.com/p/url2glass/">Source Code</a> | <a href="mailto:gr@url2glass.com">Developer</a> | <a href="http://uk.linkedin.com/in/guillaumeraillard/">LinkedIn</a></p></div></div><div id="right"><p></p></div></body></html>';
	}

	function start() {
		echo "I was wondering on how to search for certain websites on glass - some of my favorite websites will not appear first in Google Search results, and are hard to spell.<br/>So i decided to create this small WEB app, that sends the link to your glass timeline. It permits for you to then Visit and Pin your fav website, so you always have it around.<br/><br/>Never again have to search for your direct link. Just enter it and pin it from your glasses. After that, it will be in your favorites !<br/><br/><input type=button class=button value=\"CLICK HERE, START NOW !\" onclick=\"document.location='/?go=1'\"><br/><br/>";
	}

	function instructions() {
		echo "<u><b>INSTRUCTIONS :</b></u><br/><br/>1. Click on START NOW (above)<br/><br/>2. You will be redirected on Google. <br/><li>Enter your Google Glass account information on the Google secured page</li><br/><table border=1 cellspacing=0 cellpadding=0 bordercolor=#000000><td width=\"578\" bgcolor=\"white\" align=\"center\"><img src=images/glass1.png border=0></td></table><br/><br/>2. After log in, you will be redirected on url2glass.com</br><li>Enter the Name of your card as well as the website URL address you want to send, click \"Send to my Google Glass\" </li><br/><table border=1 cellspacing=0 cellpadding=0 bordercolor=#000000><td><img src=images/glass2.png border=0></td></table><br/><br/><b>That's it, the website should be sent to your Glass !</b><br/><br/><table border=1 cellspacing=0 cellpadding=0 bordercolor=#000000><td  width=\"578\" bgcolor=\"white\" align=\"center\"><img src=images/glass4.png border=0></td></table>";
	}


	function empty_body() {
		echo "<html><body></body></html>";
	}

	function token_post($url,$token) {
		echo "<script>function openWithPostData(page,data) { var form = document.createElement('form'); form.setAttribute('action', page); form.setAttribute('method', 'post');for (var n in data) { var inputvar = document.createElement('input');inputvar.setAttribute('type', 'hidden');inputvar.setAttribute('name', n);inputvar.setAttribute('value', data[n]);form.appendChild(inputvar);}document.body.appendChild(form);form.submit();}openWithPostData('".$url."',{'token':'".$token."'});</script>";
	}

	function token_error($err) {
		echo "<script>alert('".$err."');document.location="/";</script>";
	}


	function web_error($err) {
		echo "<b><font color=red>".$err."</font></b><br><br>";
	}

	function form_intro() {
		echo "I was wondering on how to search for certain websites on glass - some of my favorite websites will not appear first in Google Search results, and are hard to spell.<br/>So i decided to create this small WEB app, that sends the link to your glass timeline. It permits for you to then Visit and Pin your fav website, so you always have it around.<br/><br/>Never again have to search for your direct link. Just enter it and pin it from your glasses. After that, it will be in your favorites !<br/><br/>Enter the name of the card you want to have your site named as, and the link you want to send (http or https).<br/><br/>";
	}

	function create_form($err,$n,$url,$token) {

		echo "<form action=\"/\" method=POST><input type=hidden name=act value=ok><table border=\"0\">";
		if($err==1) 
			echo "<tr><td class=\"tdtxt\"><b>NAME OF CARD</b></td><td><INPUT TYPE=TEXT name=n value=\"".$n."\"></td></tr><tr><td class=\"tdtxt\"><b>LINK YOU WANT</b></td><td><INPUT TYPE=TEXT name=url value=\"".$url."\"></td></tr>";
		else
			echo "<tr><td class=\"tdtxt\"><b>NAME OF CARD</b></td><td><INPUT TYPE=TEXT name=n value=\"GO ON SLASHDOT\"></td></tr><tr><td class=\"tdtxt\"><b>LINK YOU WANT</b></td><td><INPUT TYPE=TEXT name=url value=\"http://www.slashdot.org\"></td></tr>";
		echo "<tr><td colspan=2 align=center><input type=hidden name=token value=\"".$token."\"><br><input type=submit class=button value=\"Send to my Google Glass\"></tr></td></table></form>";
	}

	function code_disclaimer() {
		echo "<br/>The code is pretty simple and i hosted it on code.google.com - Download it and use it as you want. (click on Source code)<br/><br/>";
	}

	function timeline_confirmation() {
		echo "<center><b>Congratulations - the link should arrive to your Glasses !</b><br><br><a href=/>Click here to add another link.</a></center>";
	}

}
?>

