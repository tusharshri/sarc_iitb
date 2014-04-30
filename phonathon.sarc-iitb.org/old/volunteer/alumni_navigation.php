<?php
$id=$_GET['pid'];
$agenda=$_GET['agenda'];


if($agenda=="1" || $agenda=="2"){
$agenda_code="donations";
$url=urlencode('http://www.iitbombay.org/chapters-and-events/iitbaa/decennial/how-to-donate');
}
else if($agenda=="3"){
$agenda_code="'86 SJRU";
$agenda_code=mysql_real_escape_string($agenda_code);
$url=urlencode('http://www.iitbombay.org/chapters-and-events/reunions/1986/Home');
}
else if($agenda=="4"){
$agenda_code="Mentorship Program";
$url=urlencode('http://sarc-iitb.org/mentorship-registration/mentor/');
}
else{
$agenda_code="Other";
$url=urlencode('http://sarc-iitb.org');
}
require_once('db_connect.php');
$query = "INSERT INTO alumni_url_vsits ( pid, agenda, url_redirected ) VALUES ('$id', '$agenda_code', '$url')";
	$sql = mysql_query($query) or die(mysql_error());
	if($sql){
	
	}
	header("Location: ".urldecode($url));
?>