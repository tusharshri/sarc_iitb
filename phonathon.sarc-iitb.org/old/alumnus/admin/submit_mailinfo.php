<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$user = $_SESSION['user'];
	$PID = $_SESSION['PID'];
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	if ($_GET['gotreply'] == "on") $gotreply = 1;
	else $gotreply = 0;
	
	if ($_GET['mailed'] == "on") $mailed = 1;
	else $mailed = 0;
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	$DBConn->run_query ("UPDATE calllog SET gotreply=?, mailed=? WHERE PID=?", array($gotreply, $mailed, $PID));
?>