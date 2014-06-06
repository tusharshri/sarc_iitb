<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$user = $_SESSION['user'];
	$PID = $_SESSION['PID'];
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	$to_insert = stripslashes($_GET['to_insert']);
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	$arrappend=array();
	$index=0;
	$let1=explode('|',$to_insert);
	if($let1[0]=="2"){
		$alum = $DBConn->get_array("SELECT volunteerId,balance FROM simcard WHERE simcardNo = ?", array ($let1[1]));
		$volunteer = $DBConn->get_array("SELECT name,points FROM volunteer WHERE volunteer_ID = ?",array ($alum[0]['volunteerId']));
		$new_points = $volunteer[0]['points']+($alum[0]['balance']-$let1[2])*3;
		$arr1=$DBConn->run_query ("UPDATE volunteer SET  points=? WHERE volunteer_ID=?",array($new_points,$alum[0]['volunteerId']));
	}
	$arr2=$DBConn->run_query ("UPDATE simcard SET  status=?,balance=? WHERE simcardNo=?",array($let1[0],$let1[2],$let1[1]));
	
?>
