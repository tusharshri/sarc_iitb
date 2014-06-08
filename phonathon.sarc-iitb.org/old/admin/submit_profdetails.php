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
	
	$company = $_GET['company'];
	$designation = $_GET['designation'];
	
	$DBConn->run_query ("UPDATE alumnus_profdetail SET company=?, designation=? WHERE PID=?", array($company, $designation, $PID));
?>