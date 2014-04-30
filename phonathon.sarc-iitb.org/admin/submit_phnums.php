<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$user = $_SESSION['user'];
	$PID = $_SESSION['PID'];
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	$DBConn->run_query ("DELETE FROM alumnus_phonenum WHERE PID=?",array($PID));
	
	$phnums = stripslashes($_GET['phnums']);
	if ($phnums == ",") die("");
	if ($phnums[0] == ",") $phnums = substr($phnums, 1);
	$phnums = "(" . $PID . "," . str_replace (";", "),(" . $PID . ",", $phnums) . ")";
	
	$DBConn->run_query ("INSERT INTO alumnus_phonenum (`PID`,`phnum_detail`,`phnum`)VALUES $phnums");
?>
