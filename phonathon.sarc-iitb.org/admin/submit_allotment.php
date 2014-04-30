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
	for($i=0;$i<sizeof($let1);$i++){
		array_push($arrappend,'('.$let1[$i].')');	
	}
	for($i=0;$i<sizeof($let1);$i++){
		$arr = explode(',',$let1[$i]);
		$arr2=$DBConn->get_array("SELECT PID, volunteer_ID FROM allotment WHERE PID=?",array($arr[0]));
			
			if(!$arr2){
				$DBConn->run_query ("INSERT INTO allotment (PID, volunteer_ID, status) VALUES" . $arrappend[$i]);	
					
			}
			else{
				echo $arr2[0][0].',';
				$index++;
			}
	}
	if($index!=0){
		echo ' is already alloted ';	
	}
	
?>
