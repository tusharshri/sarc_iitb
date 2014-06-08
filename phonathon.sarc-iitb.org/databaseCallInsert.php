<?php
	session_start();
	require_once("dbconnection.php");
	  
	$DBConn = new Connection();
	// query for call *
	// to be run after all alumni fed
	$DBConn->run_query("TRUNCATE TABLE callagain");
	$DBConn->run_query("TRUNCATE TABLE calldetail");
	$DBConn->run_query("TRUNCATE TABLE calllog");
	$PIDArray = $DBConn->get_array("SELECT PID  from alumnus_basicdetail");
	foreach ($PIDArray as $PID) {
		$DBConn->run_query("INSERT INTO callagain VALUES ('$PID[PID]','0','0','0','0')");
		$DBConn->run_query("INSERT INTO calldetail VALUES ('$PID[PID]','0','0','','0')");
		$DBConn->run_query("INSERT INTO calllog VALUES ('$PID[PID]','0','','0','0','0','0')");
	}
	
	echo "Done";
?>