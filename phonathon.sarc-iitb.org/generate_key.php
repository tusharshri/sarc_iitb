<?php

// mysql_connect('admin.sarc-iitb.org','sarciitborg','j@g@njyoti') or die(mysql_error());
mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('phonathon_14') or die(mysql_error());

$ids=mysql_query("SELECT PID FROM alumnus_basicdetails") or die(mysql_error());

$i=0;
while($alumnusId=mysql_fetch_array($ids)){
	$id=$alumnusId['PID'];
	$action='mentees';
	$uid=uniqid($id);
	$query="UPDATE alumnus_visitedlinks SET `key`='$uid' WHERE PID='$id'";
	echo $query."<br/>";$i++;
	//$sql=mysql_query($query) or die(mysql_error());
}
echo $i;

?>
