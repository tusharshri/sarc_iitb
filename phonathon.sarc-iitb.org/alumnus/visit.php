<?php
// This Page is meant to count the visit statistics of a particular alumnus.
?><?php
if(isset($_GET['page']) && isset($_GET['PID']) && isset($_GET['key'])){
    $page=$_GET['page'];
    $PID =$_GET['PID'];
    $key =$_GET['key'];

    require_once ("../dbconnection.php");
    $DBConn = new Connection();

    $location="visit.php";
    $field="";

    $alum = $DBConn->get_array("SELECT * FROM alumnus_visitedlinks WHERE `key` = ?", array($key));
    $alum = $alum[0];
    if($PID==$alum['PID']){
        switch($page){
            case "sarc":
                $field="sarc";
                $location="http://www.sarc-iitb.org/";
                break;
            case "database":
                $field="database";
                $location="update.php?PID=$PID&key=$key";
                break;
            case "linkedin": 
                break;
            case "facebook":
                break;
            case "youtube":
                break;
            default:
        }

        
        $prev = $DBConn->get_array("SELECT `".$field."` FROM alumnus_visitedlinks WHERE PID=?",array($PID));
        $prev = $prev[0][$field]; 
        $prev++;
        $DBConn->run_query("UPDATE alumnus_visitedlinks SET `".$field."`=? WHERE PID=?",array($prev,$PID));

        //$DBConn->run_query ("UPDATE alumnus_basicdetail SET firstname=?, middlename=?, lastname=?, department=?, class=?, degree=?, dob=? WHERE PID=?", array($firstname, $middlename, $lastname, $department, $class, $degree, $dob, $PID));

        header("Location:$location");
        

    } else{
        //mail(); //TODO: mail sarc coreteam or lssd.sarc
        echo("Something went wrong!Try using the original link. <br/>If problem persists, please write to us at <a href='mailto:sarc@iitb.ac.in'>sarc@iitb.ac.in</a>");
    }
}else{
    echo("Invalid Access!");
}
?>
