<?php 
session_start();
   if(!(isset($_SESSION['uid']))) {
    header("location:home.php");
      exit(); 
 }   
if($_SESSION['level']!=32){
    header('Location: level'.$_SESSION['level'].'.php');
        exit();
      }
  
  ?>


<?php
  require_once('dbconnect.php');
  
  session_start();
  ini_set(' session.save_path','http://www.sam.sarc-iitb.org/sarcasm/css/');
  $curr_date=$_POST['curr_date'];
  $uid=$_SESSION['uid'];
  
  $domain = strstr($curr_date, 'Jun 2 1995');
  if($domain!=""){
        $sql4="UPDATE users_status SET `level`=33 WHERE `userid`='$uid'";
        mysql_query($sql4);
        $_SESSION['level']=33;
        echo 'pass';  
  }
  else{
  	echo 'fail';
  }

 
?>