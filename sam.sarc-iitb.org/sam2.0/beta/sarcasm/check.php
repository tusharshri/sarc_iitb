<?php

session_start();
ini_set(' session.save_path','http://www.sam.sarc-iitb.org/sarcasm/css/');
require_once('dbconnect.php');  

require_once('arbitapa.php');
  
?>

<?php
              if(isset($_POST['secret'])){
        
              $topsecret=$_POST['secret'];          
                $uid=$_SESSION['uid'];
          $level_current= $_SESSION['level'];
          $level_next=$level_current+1;
                  
            if(strcmp ($topsecret,$ans[$level_current])==0)
                   {
                     $query="UPDATE users_status SET `level`='$level_next' WHERE `userid`= '$uid' ";
              $result=mysql_query($query);
              
              $_SESSION['level']=$level_current+1;
              
                        
                   header("Location:level".$level_next.".php");  
             exit();      
                  } 
            else{
                    header("Location:level".$level_current.".php");
             exit();
                }
         
          }
        else {
          header("Location:level".$_SESSION['level'].".php");
        }
         ?>
        
      