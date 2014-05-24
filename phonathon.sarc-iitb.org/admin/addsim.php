<?php
	session_start();
	require_once("../dbconnection.php");
	  
	$sim = $_POST['simnumber'];

	$DBConn = new Connection();
	$row = $DBConn->get_array("SELECT status FROM simcard WHERE simcardNo = ?", array($sim));  
	if(!$row){
		$DBConn->run_query ("INSERT INTO simcard (simcardNo,status,balance) VALUES (?,?,?)", array($sim,0,0));
	}
	header("Location: allotsim.php");
?>
