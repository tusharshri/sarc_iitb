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
	
	$address = $_GET['address'];
	$city = $_GET['city'];
	$country = $_GET['country'];
	
	$DBConn->run_query ("UPDATE alumnus_contactdetail SET address=?, city=?, country=? WHERE PID=?", array($address, $city, $country, $PID));
?>