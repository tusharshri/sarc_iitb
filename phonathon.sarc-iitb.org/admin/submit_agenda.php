<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$user = $_SESSION['user'];
	$PID = $_SESSION['PID'];
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	$date = date("Y-m-d");
	
	$agenda = $DBConn->get_array("SELECT * FROM agenda");
	foreach ($agenda as $agendaitem) {
		$agenda_id = $agendaitem['agenda_id'];
		if ($_GET[$agenda_id] == "on") {
			$DBConn->run_query ("INSERT INTO alumnus_agendaconfirmation (`PID`,`agenda_id`,`status`,`date_of_confirmation`) VALUES(?, ?, ?, ?)", array($PID, $agenda_id,'1', $date));
		}
	}
?>