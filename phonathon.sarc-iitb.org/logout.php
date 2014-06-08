<?php
	session_start();
	require_once("dbconnection.php");
	$time_hr=gmdate("H")+5;
			$time_min=gmdate("i")+30;
			$time_sec=gmdate("s");
			$time=$time_hr.':'.$time_min.':'.$time_sec;
	
	$DBConn = new Connection();
	$DBConn->run_query ("UPDATE volunteer_attendance SET time_out=? WHERE volunteer_id=? AND attendance_date =? AND time_out=?", array($time,$_SESSION['user'], $_SESSION['date'],0));
	if(isset($_SESSION['user'])){
		$_SESSION=array();
		session_destroy();
	}
	$_SERVER["SCRIPT_NAME"] = "";
	header("Location: index.php");

?>