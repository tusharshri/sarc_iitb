<?php
	session_start();
	require_once("dbconnection.php");
	  
	$DBConn = new Connection();
	// query for call *
	// to be run after all alumni fed
	$DBConn->run_query("TRUNCATE TABLE agenda");
	$DBConn->run_query("TRUNCATE TABLE allotment");
	$DBConn->run_query("TRUNCATE TABLE alumnus_agendaconfirmation");
	$DBConn->run_query("TRUNCATE TABLE alumnus_basicdetail");
	$DBConn->run_query("TRUNCATE TABLE alumnus_contactdetail");
	$DBConn->run_query("TRUNCATE TABLE alumnus_email");
	$DBConn->run_query("TRUNCATE TABLE alumnus_phonenum");
	$DBConn->run_query("TRUNCATE TABLE alumnus_profdetail");
	$DBConn->run_query("TRUNCATE TABLE alumnus_researchchecklist");
	$DBConn->run_query("TRUNCATE TABLE alumnus_visitedlinks");
	$DBConn->run_query("TRUNCATE TABLE callagain");
	$DBConn->run_query("TRUNCATE TABLE calldetail");
	$DBConn->run_query("TRUNCATE TABLE calllog");
	$DBConn->run_query("TRUNCATE TABLE simcard");
	$DBConn->run_query("TRUNCATE TABLE volunteer");
	$DBConn->run_query("TRUNCATE TABLE volunteer_attendance");
	$DBConn->run_query("TRUNCATE TABLE volunteer_freeslot");

	// then add agendas
	// add alumnus database
	// update call details according to PID of alumnus
	// add volunteer admin
	echo "Done";
?>