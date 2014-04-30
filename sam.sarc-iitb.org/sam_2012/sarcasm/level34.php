
<?php 
session_start();
  if(!(isset($_SESSION['uid']))) {
    header("location:home.php");
      exit(); 
 }   
if($_SESSION['level']!=34){
    header('Location: level'.$_SESSION['level'].'.php');
        exit();
      }
  ?>


<?php
require_once('dbconnect.php'); ?> 


<?php   include 'header.php'; ?>          

       
           
            
           <div  id="mainpart">
            <?php include 'left_part.php' ?>
                    
            <div id="middle">
            
            
           
                         <div id="content">
                           <h2 style="" >
                           <br>Congrats! \m/ Now you have really completed SARCasm. :) 
						   <br>Check out our Student Alumni Meet page <a href="http://sam.sarc-iitb.org/">here</a>
						   <br>Stay tuned for event updates! See u in SAM! 
            
                          </div>
            
                          <div id="form_part">
                               
                               
                           </div>
         
          
            
            </div>
    
      
      
      </div>
          <?php include 'footer.php'?>
           
      </body>

  
</html>