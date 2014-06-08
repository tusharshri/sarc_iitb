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
	
	$query = $_GET['query'];
	$time = $_GET['time'];
	$remarks = $_GET['remarks'];
	$date = date("Y-m-d");
	
	if ($query != "") $DBConn->run_query ("INSERT INTO query VALUES (?,?)", array($PID, $query));
	$DBConn->run_query ("UPDATE calldetail SET time=?,date=?,remarks=? WHERE PID=?", array($time, $date, $remarks, $PID))
?>