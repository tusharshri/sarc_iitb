<?php
if(isset($_GET['PID']) && isset($_GET['key'])){
    $PID=$_GET['PID'];
    $key=$_GET['key'];
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
    
    $alum = $DBConn->get_array("SELECT * FROM alumnus_visitedlinks WHERE `key` = ?", array($key));
    $alum = $alum[0];
    if($PID==$alum['PID']){
	
	    $firstname = $_GET['firstname'];
	    $middlename = $_GET['middlename'];
	    $lastname = $_GET['lastname'];
        $nickname = $_GET['nickname'];
	    $department = $_GET['department'];
        $hostel = $_GET['hostel'];
	    $class = $_GET['class'];
	    $degree = $_GET['degree'];
	    $dob = $_GET['dob'];
	
	    $DBConn->run_query ("UPDATE alumnus_basicdetail SET firstname=?, middlename=?, lastname=?, nickname=?, department=?, class=?, degree=?,hostel=?, dob=? WHERE PID=?", array($firstname, $middlename, $lastname, $nickname, $department, $class, $degree, $hostel, $dob, $PID));
    //TODO: updated_basicdetails column is to be updated
    }
}
?>
