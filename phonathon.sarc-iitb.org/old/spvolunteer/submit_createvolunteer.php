<?php
	session_start();
	
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	require_once ("../dbconnection.php");
	$user = $_SESSION['user'];
	$DBConn = new Connection();
	
	$DBConn->run_query ("INSERT INTO volunteer (name, username, password, degree, department, hostel, emailid, phnum, specialrequest, role) VALUES (?,?,?,?,?,?,?,?,?,'volunteer')", array($_POST['name'], $_POST['username'], $_POST['password'], $_POST['degree'],$_POST['department'],$_POST['hostel'],$_POST['emailid'],$_POST['phnum'],$_POST['specialrequest']));
	
	header ("Location: volunteers.php");
?>