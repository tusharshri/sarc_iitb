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
	
	$firstname = $_GET['firstname'];
	$middlename = $_GET['middlename'];
	$lastname = $_GET['lastname'];
	$department = $_GET['department'];
	$class = $_GET['class'];
	$degree = $_GET['degree'];
	$dob = $_GET['dob'];
	
	$DBConn->run_query ("UPDATE alumnus_basicdetail SET firstname=?, middlename=?, lastname=?, department=?, class=?, degree=?, dob=? WHERE PID=?", array($firstname, $middlename, $lastname, $department, $class, $degree, $dob, $PID));
?>