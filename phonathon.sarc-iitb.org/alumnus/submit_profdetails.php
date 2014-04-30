<?php
if(isset($_GET['PID']) && isset($_GET['key'])){
    $PID=$_GET['PID'];
    $key=$_GET['key'];
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
    
    $alum = $DBConn->get_array("SELECT * FROM alumnus_visitedlinks WHERE `key` = ?", array($key));
    $alum = $alum[0];
    if($PID==$alum['PID']){
	
	    $company = $_GET['company'];
	    $designation = $_GET['designation'];
	    $address1 = $_GET['address1'];
	    $address2 = $_GET['address2'];
	    $city = $_GET['city'];
	    $state = $_GET['state'];
	    $country = $_GET['country'];
        $postal_code = $_GET['postal_code'];
	
	    $DBConn->run_query ("UPDATE alumnus_profdetail SET company=?, designation=?, address1=?, address2=?, city=?, state=?, country=?, postal_code=? WHERE PID=?", array($company, $designation,$address1, $address2, $city, $state, $country, $postal_code, $PID));
    //TODO: updated_profdetails column is to be updated
    }
}
?>
