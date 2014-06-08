<?php
	session_start();
	require_once("dbconnection.php");
	  
	$DBConn = new Connection();
	$query = "DELETE FROM alumnus_profdetail WHERE NOT(LOWER(country) = LOWER('INDIA'))";
	$DBConn->run_query($query);
	$query = "SELECT PID FROM alumnus_profdetail";
	$reqd_PID = $DBConn->get_array($query);
	$available_PID = $DBConn->get_array("SELECT PID from alumnus_basicdetail");
	$i = 0;
	foreach($available_PID as $single_PID){
		if($reqd_PID[$i]['PID']!=$single_PID['PID']){
			$DBConn->run_query("DELETE FROM alumnus_basicdetail WHERE PID = ?",array($single_PID['PID'])); 
			$DBConn->run_query("DELETE FROM alumnus_contactdetail WHERE PID = ?",array($single_PID['PID'])); 
			$DBConn->run_query("DELETE FROM alumnus_email WHERE PID = ?",array($single_PID['PID'])); 
			$DBConn->run_query("DELETE FROM alumnus_phonenum WHERE PID = ?",array($single_PID['PID'])); 
		}else{
			$i++;
		}
	}
	 
?>