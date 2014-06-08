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
	
	$called = $_GET['called'];
	//$notcalled = $_GET['notcalled'];
	$newdate = $_GET['newdate'];
	$newtime = $_GET['newtime'];
	
	if ($called != "") $DBConn->run_query ("UPDATE callagain SET called=1 WHERE CONCAT(date,'_',time) IN ($called) AND PID=?", array($PID));
	//if ($notcalled != "") $DBConn->run_query ("UPDATE callagain SET called=0 WHERE CONCAT(date,'_',time) IN ($notcalled) AND PID=?", array($PID));
	
	if ($newdate != "") $DBConn->run_query ("INSERT INTO callagain (`PID`,`date`,`time`,`called`) VALUES (?,?,?,'0')", array($PID, date("Y-m-d", strtotime ($newdate)), $newtime));
?>