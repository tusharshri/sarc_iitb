<?php
if(isset($_GET['PID']) && isset($_GET['key'])){
    $PID=$_GET['PID'];
    $key=$_GET['key'];
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
    
    $alum = $DBConn->get_array("SELECT * FROM alumnus_visitedlinks WHERE `key` = ?", array($key));
    $alum = $alum[0];
    if($PID==$alum['PID']){

	    $DBConn->run_query ("DELETE FROM alumnus_phonenum WHERE PID=?",array($PID));
	
	    $phnums = sriptslashes($_GET['phnums']);
	    if ($phnums == ",") die("");
	    if ($phnums[0] == ",") $phnums = substr($phnums, 1);
	    $phnums = "(" . $PID . "," . str_replace (";", "),(" . $PID . ",", $phnums) . ")";
	
	    $DBConn->run_query ("INSERT INTO alumnus_phonenum VALUES $phnums");
    }
}
?>
