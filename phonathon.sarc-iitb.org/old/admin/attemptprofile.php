<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	$PID = $_SESSION['PID'];
	
	$DBConn->run_query ("UPDATE allotment SET status='Ongoing' WHERE PID=?", array ($PID));
	header("Location: alumnus.php?PID=" . $PID);
?>