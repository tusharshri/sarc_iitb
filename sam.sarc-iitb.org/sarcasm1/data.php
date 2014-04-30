<?php
	require_once('dbconnect.php');
	
	session_start();
	ini_set(' session.save_path','http://www.sam.sarc-iitb.org/sarcasm/css/');
	$uid=$_POST['uid'];
	$name=$_POST['name'];
	$email=$_POST['emailid'];

	$sql="SELECT * FROM users WHERE `userid`='".$_POST['uid']."'";
	$query=mysql_query($sql);
	$result=mysql_num_rows($query);
	
	if($result!=0){
			//echo 'true';
			$_SESSION['uid']=$_POST['uid'];
			$sql1="SELECT * FROM users_status WHERE `userid`='$uid'";
			$query1=mysql_query($sql1);		
			$row=mysql_fetch_row($query1);
			$_SESSION['level']=$row[2];
			$sql1="SELECT * FROM users_fb WHERE `userid`='$uid'";
			$query12=mysql_query($sql1);
			$results=mysql_num_rows($query12);
			if($results==0){
				$_SESSION['fb_req']=0;	
			}else{
				$row=mysql_fetch_row($query12);
				$_SESSION['fb_req']=$row[2];	
			}
			echo $_SESSION['level'];
	}else{
		$sql="INSERT INTO users (userid,name,emailid) VALUE ('$uid','$name','$email')";
		$sql2="INSERT INTO users_status (userid,level) VALUE ('$uid',0)";
		if(mysql_query($sql) && mysql_query($sql2)){
			//echo 'true';
			$_SESSION['uid']=$_POST['uid'];	
			$_SESSION['level']=0;
			$_SESSION['fb_req']=0;	
			echo $_SESSION['level'];
		}else{
			//echo mysql_error();	
			echo 'false';
		}
		
	}

?>