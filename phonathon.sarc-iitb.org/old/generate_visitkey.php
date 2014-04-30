<?php

mysql_connect('admin.sarc-iitb.org','sarciitborg','j@g@njyoti') or die(mysql_error());
mysql_select_db('phonathon_14') or die(mysql_error());

$ids=mysql_query("SELECT PID FROM alumnus_basicdetail WHERE PID NOT IN (SELECT PID FROM alumnus_visitedlinks)") or die(mysql_error());
$i=0;
while($alumnusId=mysql_fetch_array($ids)){
	$PID=$alumnusId['PID'];
	$uid=uniqid($id);
	$query="INSERT INTO alumnus_visitedlinks (PID,`key`) VALUES ('$PID','$uid')";
	echo $query."<br/>";
    $i++;
	$sql=mysql_query($query) or die(mysql_error());
}
echo $i;

?>
