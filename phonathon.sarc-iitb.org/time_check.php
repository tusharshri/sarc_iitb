<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php

require_once ("dbconnection.php");
$DBConn = new Connection();

$today=date('Y-m-d');
$time_now=mktime(date('h')+4,date('i')+30);
$current_time=date('h:i',$time_now);
echo $current_time.' '.$today.'<br>' ;
$count=$DBConn->get_array("SELECT `PID` FROM `callagain` WHERE `date`=? & `time`=?",array('2011-12-10','00:00'));
	foreach($count as $countid){
		//echo $countid['PID'].'<br>';
		$callagain = $DBConn->get_array ("SELECT * FROM alumnus_basicdetail WHERE PID=?", array ($countid['PID']));
		/*foreach($callagain as $callagainid){
		echo $countid['PID'].' '.$callagainid['firstname'].'<br>';
		}*/
	}

/*$time_now=mktime(date('h')+4,date('i')+30,date('s'));
print "<br>".date('h:i:s',$time_now);
$time_offset ="495"; // Change this to your time zone
$time_a = ($time_offset * 120);
$time = date("h:i:s",time() + $time_a);
echo 'Current time is : '.$time;

$nextmin = time() + (1 * 60);
print "<br>".date('h:i:s',$nextmin);	*/
?>
</body>
</html>