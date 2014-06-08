<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$user = $_SESSION['user'];
	$PID = $_SESSION['PID'];
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	if ($_GET['contacted'] == "on") $contacted = 1;
	else $contacted = 0;
	
	if ($_GET['dontcall'] == "on") $dontcall = 1;
	else $dontcall = 0;
	
	$couldntreach = $_GET['couldntreach'];
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	$DBConn->run_query ("UPDATE calllog SET contacted=?, dontcall=?, couldntreach=? WHERE PID=?", array($contacted, $dontcall, $couldntreach, $PID));
?>