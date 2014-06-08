<?php
// $host = 'admin.sarc-iitb.org';
// $user = 'sarciitborg';
// $pass = 'j@g@njyoti';
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'phonathon';
$file = 'export';

$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");

$result = mysql_query("SELECT alumnus_basicdetail.PID, firstname, middlename, lastname, degree, department, class, email FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail NATURAL JOIN alumnus_profdetail LEFT JOIN alumnus_email ON alumnus_basicdetail.PID = alumnus_email.PID WHERE alumnus_basicdetail.PID IN (SELECT PID FROM calllog WHERE contacted = 1) ORDER BY alumnus_basicdetail.PID ASC");
$i = 0;
if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_assoc($result)) {
$csv_output .= $row['Field'].", ";
$i++;
}
}
$csv_output .= "\n";

$values = mysql_query("SELECT alumnus_basicdetail.PID, firstname, middlename, lastname, degree, department, class, email FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail NATURAL JOIN alumnus_profdetail LEFT JOIN alumnus_email ON alumnus_basicdetail.PID = alumnus_email.PID WHERE alumnus_basicdetail.PID IN (SELECT PID FROM calllog WHERE contacted = 1) ORDER BY alumnus_basicdetail.PID ASC");
while ($rowr = mysql_fetch_row($values)) {
for ($j=0;$j<$i;$j++) {
$csv_output .= $rowr[$j].", ";
}
$csv_output .= "\n";
}

$filename = $file."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;
?>