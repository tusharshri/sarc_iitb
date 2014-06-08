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
	$DBConn->run_query ("DELETE FROM alumnus_email WHERE PID=?",array($PID));
	
	
	$emails = stripslashes($_GET['emails']);
	if ($emails == ",") die("");
	if ($emails[0] == ",") $emails = substr($emails, 1);
	$emails = "(" . $PID . "," . str_replace (";", "),(" . $PID . ",", $emails) . ")";
	
	$DBConn->run_query ("INSERT INTO alumnus_email (`PID`,`email_detail`,`email`) VALUES $emails");
?>
