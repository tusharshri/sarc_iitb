<?php
require_once ("../dbconnection.php");
$DBConn = new Connection();

$result1=$DBConn->get_array("SELECT `volunteer_ID` FROM `volunteer` WHERE `role`='volunteer' and `enable`='1'");

$active_volunteer=sizeof($result1[0]);

//$enable_val=$result1[0]['enable'];

$count=0;
if($active_volunteer >0 ){
	foreach($result1 as $key=>$value){
		$sql1=$DBConn->run_query("UPDATE `volunteer` SET `enable`= 0 WHERE `volunteer_ID`=?",array($value['volunteer_ID']));
		if($sql1){
			$count++;
		}
	}
	if($count==0){
		echo 'Some problem in disabling.'	;
	}
	else{
		echo 'All volunteers has been disabled'	;
	}
}
else{
	echo 'all volunteers are already disabled';
}
?>