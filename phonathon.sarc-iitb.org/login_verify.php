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
			$data_valid = TRUE;
			if($_SESSION['role']=="volunteer"){
				$simcardno=$_POST['simcardNo'];
				$sim = $DBConn->get_array("SELECT status,volunteerId FROM simcard WHERE simcardNo = ?", array($simcardno));
				$cardstatus=$sim[0]['status'];
				if($cardstatus != NULL && $cardstatus==1 && $sim[0]['volunteerId']==0){
					$_SESSION['simcardnum']=$simcardno;
					$DBConn->run_query ("INSERT INTO volunteer_attendance (volunteer_id,attendance_date,time_in,time_out) VALUES (?,?,?,?)", array($volunteer_id, $date,$time,0));
					$DBConn->run_query ("UPDATE simcard SET volunteerId = ? WHERE simcardNo = ?	", array($volunteer_id,$simcardno));
				}
				else{
					$data_valid = FALSE;
				}

			}
			
			if($data_valid){
		    	$_SESSION['user'] = $volunteer_id; 
		    	$_SESSION['role'] = $role; 
		    	$_SESSION['invalid'] = "";
            	$_SESSION['enable'] = $enable;
			
			//echo $volunteer_id;
			//$attendance = $DBConn->get_array("SELECT * FROM volunteer_attendance WHERE volunteer_id =? AND attendance_date =?",array($volunteer_id,$date));
			//if (count($attendance)>0){
                
			//}
			//else {
			//}
            
		    header("Location: $role/design.php");
			}
			else{
				$_SESSION['invalid'] = "Card not active or card no not existed";
		    	header("Location: login-page.php");
			}
		}else {
            $_SESSION['invalid'] = "Your Login has been disabled by Administrator. Contact us to re-enable it";
		    header("Location: login-page.php");
        }
	}
	else {
		$_SESSION['invalid'] = "Invalid Username / Password";
		header("Location: login-page.php");
	}
  
?>
