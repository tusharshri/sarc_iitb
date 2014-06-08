<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	$PID = $_SESSION['PID'];
	$volunteers = $DBConn->get_array("SELECT volunteer_ID FROM allotment WHERE PID=?", array ($PID));
	$points = $DBConn->get_array("SELECT points FROM volunteer WHERE volunteer_ID = ?", array ($volunteers[0]['volunteer_ID']));
	$points[0]['points'] = $points[0]['points'] + 1;
	$DBConn->run_query ("UPDATE volunteer SET points=? WHERE volunteer_ID=?", array ($points[0]['points'],$volunteers[0]['volunteer_ID']));
	$DBConn->run_query ("UPDATE allotment SET status='Ongoing' WHERE PID=?", array ($PID));
	header("Location: alumnus.php?PID=" . $PID);
?>