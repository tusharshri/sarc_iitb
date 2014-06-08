<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$user = $_SESSION['user'];
	$PID = $_SESSION['PID'];
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	if ($_GET['google'] == "on") $google = 1;
	else $google = 0;
	
	if ($_GET['inquirynumbers'] == "on") $inquirynumbers = 1;
	else $inquirynumbers = 0;
	
	if ($_GET['zabasearch'] == "on") $zabasearch = 1;
	else $zabasearch = 0;
	
	$linkedin = $_GET['linkedin'];
	$whitepages = $_GET['whitepages'];
	$facebook = $_GET['facebook'];
	$twitter = $_GET['twitter'];
	$others = $_GET['others'];
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	$DBConn->run_query ("UPDATE alumnus_researchchecklist SET inquirynumbers=?,google=?,linkedin=?,whitepages=?,facebook=?,twitter=?,zabasearch=?,others=? WHERE PID=?", array($inquirynumbers, $google, $linkedin, $whitepages, $facebook, $twitter, $zabasearch, $others, $PID));
?>