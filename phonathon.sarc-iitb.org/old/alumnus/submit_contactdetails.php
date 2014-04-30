<?php
if(isset($_GET['PID']) && isset($_GET['key'])){
    $PID=$_GET['PID'];
    $key=$_GET['key'];
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
    
    $alum = $DBConn->get_array("SELECT * FROM alumnus_visitedlinks WHERE `key` = ?", array($key));
    $alum = $alum[0];
    if($PID==$alum['PID']){
	
	    $address = $_GET['address'];
	    $address2 = $_GET['address2'];
	    $city = $_GET['city'];
	    $country = $_GET['country'];
        $postal_code = $_GET['postal_code'];
	
	    $DBConn->run_query ("UPDATE alumnus_contactdetail SET address=?, address2=?, city=?, country=?, postal_code=? WHERE PID=?", array($address, $address2, $city, $country, $postal_code, $PID));
    //TODO: updated_contacdetails column is to be updated
    }
}
?>
