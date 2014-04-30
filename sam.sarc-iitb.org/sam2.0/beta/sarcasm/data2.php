<?php
	require_once('dbconnect.php');
	
	session_start();
	ini_set(' session.save_path','http://www.sam.sarc-iitb.org/sarcasm/css/');
	$req_num=$_POST['req_num'];
	$uid=$_SESSION['uid'];

	$sql="SELECT * FROM users_fb WHERE `userid`='".$uid."'";
	$query=mysql_query($sql);
	$result=mysql_num_rows($query);
	
	if($result!=0){
			//echo 'true';
			$sql1="SELECT * FROM users_fb WHERE `userid`='$uid'";
			$query1=mysql_query($sql1);		
			$row=mysql_fetch_row($query1);
			$val=$row[2]+$req_num;
			$sql3="UPDATE users_fb SET `req_num`='$val' WHERE `userid`='$uid'";
			mysql_query($sql3);
			if($val>3){
				$sql4="UPDATE users_status SET `level`=2 WHERE `userid`='$uid'";
				mysql_query($sql4);
				$_SESSION['level']=2;
				$_SESSION['fb_req']=$val;
				echo 'pass';	
			}else{
				echo 'fail';
			}
			//echo mysql_error();
	}else{
		$sql="INSERT INTO users_fb (`userid`,`req_num`) VALUE ('$uid','$req_num')";
		if(mysql_query($sql)){
			//echo 'true';
			if($req_num>3){
				
				$sql4="UPDATE users_status SET `level`=2 WHERE `userid`='$uid'";
				mysql_query($sql4);
				$_SESSION['level']=2;
				$_SESSION['fb_req']=$req_num;
				echo 'pass';	
			}else{
				echo 'fail';
			}
		}else{
			//echo mysql_error();	
			echo 'false';
		}
		
	}

?>