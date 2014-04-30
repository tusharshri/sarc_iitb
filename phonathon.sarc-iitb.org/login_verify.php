<?php
	session_start();
	require_once("dbconnection.php");
	  
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$simcardno=$_POST['simcardNo'];

	$DBConn = new Connection();
	$row = $DBConn->get_array("SELECT volunteer_ID, password, role, enable FROM volunteer WHERE username = ?", array($user));
	$sim = $DBConn->get_array("SELECT status FROM simcard WHERE simcardNo = ?", array($simcardno));
  
	if ($pass == $row[0]['password']) {
		$volunteer_id = $row[0]['volunteer_ID'];
		$role = $row[0]['role'];
        $enable = $row[0]['enable'];
		$cardstatus=$sim[0]['status'];
		if( $enable == 1){
			
			if($cardstatus==1 && $cardstatus != NULL){
		    $_SESSION['user'] = $volunteer_id; 
		    $_SESSION['role'] = $role; 
		    $_SESSION['invalid'] = "";
            $_SESSION['enable'] = $enable;
			$_SESSION['simcardnum']=$simcardno;
			
			$today = getdate();
			$todate=gmdate("M-d-Y");
			$time_hr=gmdate("H")+5;
			$time_min=gmdate("i")+30;
			$time_sec=gmdate("s");
			$time=$time_hr.':'.$time_min.':'.$time_sec;
			
			//echo $todate.' '.$time;
			$date = $today['year'];
			$date .= "-".$today['mon']."-";
			$date .=$today['mday'];
			$_SESSION['date']=$date;
			//echo $volunteer_id;
			//$attendance = $DBConn->get_array("SELECT * FROM volunteer_attendance WHERE volunteer_id =? AND attendance_date =?",array($volunteer_id,$date));
			//if (count($attendance)>0){
                
			//}
			//else {
				$DBConn->run_query ("INSERT INTO volunteer_attendance (volunteer_id,attendance_date,time_in,time_out) VALUES (?,?,?,?)", array($volunteer_id, $date,$time,0));
			//}
            
		    header("Location: $role/design.php");
			}
			else{
				$_SESSION['invalid'] = "Card not active or card no not existed";
		    header("Location: login.php");
			}
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