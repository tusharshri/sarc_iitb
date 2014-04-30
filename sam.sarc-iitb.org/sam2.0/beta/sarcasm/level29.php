<?php 
session_start();
  if(!(isset($_SESSION['uid']))) {
    header("location:home.php");
      exit(); 
 }   
if($_SESSION['level']!=29){
    header('Location: level'.$_SESSION['level'].'.php');
        exit();
      }
header("location:politics.php");
  ?>
