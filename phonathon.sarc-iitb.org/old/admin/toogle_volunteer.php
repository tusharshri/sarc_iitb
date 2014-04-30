<?php
require_once ("../dbconnection.php");
$DBConn = new Connection();

$vid=$_POST['vid'];

$result1=$DBConn->get_array("SELECT `enable` FROM `volunteer` WHERE `volunteer_ID`=?",array($vid));

$enable_val=$result1[0]['enable'];


if($enable_val==1){
	$sql1=$DBConn->run_query("UPDATE `volunteer` SET `enable`= 0 WHERE `volunteer_ID`=?",array($vid));	
	echo '0';
}
else if($enable_val==0)
{
	$sql2=$DBConn->run_query("UPDATE `volunteer` SET `enable`= 1 WHERE `volunteer_ID`=?",array($vid));
	echo '1';
}


?>