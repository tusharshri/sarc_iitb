<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$user = $_SESSION['user'];
	$PID = $_SESSION['PID'];
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	$to_insert = $_GET['to_insert'];
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	$DBConn->run_query ("INSERT INTO allotment VALUES" . $to_insert);
?>