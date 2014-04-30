<?php
if(isset($_GET['PID']) && isset($_GET['key'])){
    $PID=$_GET['PID'];
    $key=$_GET['key'];
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
    
    $alum = $DBConn->get_array("SELECT * FROM alumnus_visitedlinks WHERE `key` = ?", array($key));
    $alum = $alum[0];
    if($PID==$alum['PID']){
	    $DBConn->run_query ("DELETE FROM alumnus_email WHERE PID=?",array($PID));
	
	    $emails = stripslashes($_GET['emails']);
	    if ($emails == ",") die("");
	    if ($emails[0] == ",") $emails = substr($emails, 1);
	    $emails = "(" . $PID . "," . str_replace (";", "),(" . $PID . ",", $emails) . ")";
	
	    $DBConn->run_query ("INSERT INTO alumnus_email VALUES $emails");
    }
}
?>
