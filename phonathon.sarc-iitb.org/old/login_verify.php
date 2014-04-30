<?php
	session_start();
	require_once("dbconnection.php");
	  
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$DBConn = new Connection();
	$row = $DBConn->get_array("SELECT volunteer_ID, password, role, enable FROM volunteer WHERE username = ?", array($user));
  
	if ($pass == $row[0]['password']) {
		$volunteer_id = $row[0]['volunteer_ID'];
		$role = $row[0]['role'];
        $enable = $row[0]['enable'];
		if( $enable == 1){
		    $_SESSION['user'] = $volunteer_id; 
		    $_SESSION['role'] = $role; 
		    $_SESSION['invalid'] = "";
            $_SESSION['enable'] = $enable;
			$today = getdate();
			$date = $today['year'];
			$date .= "-".$today['mon']."-";
			$date .= $today['mday'];
			//echo $volunteer_id;
			$attendance = $DBConn->get_array("SELECT * FROM volunteer_attendance WHERE volunteer_id =? AND attendance_date =?",array($volunteer_id,$date));
			if (count($attendance)>0){
                
			}
			else {
				$DBConn->run_query ("INSERT INTO volunteer_attendance VALUES (?,?)", array($volunteer_id, $date));
			}
            
		    header("Location: $role/design.php");
		}else {
            $_SESSION['invalid'] = "Your Login has been disabled by Administrator. Contact us to re-enable it";
		    header("Location: login.php");
        }
	}
	else {
		$_SESSION['invalid'] = "Invalid Username / Password";
		header("Location: login.php");
	}
  
?>
