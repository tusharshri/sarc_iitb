<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	$volunteerID = $_GET['volunteer_ID'];
	$date = $_GET['date'];
	$agenda = $_GET['agenda'];
	
	if ($agenda == "" && $date == "" && $volunteerID == "") include "agendadetails_all.php";
	elseif ($agenda == "" && $date == "" && $volunteerID != "") include "agendadetails_volunteer.php";
	elseif ($agenda == "" && $date != "" && $volunteerID == "") include "agendadetails_date.php";
	elseif ($agenda == "" && $date != "" && $volunteerID != "") include "agendadetails_date_volunteer.php";
	elseif ($agenda != "" && $date == "" && $volunteerID == "") include "agendadetails_agenda.php";
	elseif ($agenda != "" && $date != "" && $volunteerID == "") include "agendadetails_date_agenda.php";
	elseif ($agenda != "" && $date == "" && $volunteerID != "") include "agendadetails_volunteer_agenda.php";
?>