<!--some know to alter things too, especially to 4 bit data-->

<?php 
session_start();
   if(!(isset($_SESSION['uid']))) {
    header("location:home.php");
       exit(); 
     }  
if($_SESSION['level']!=13){
    header('Location: level'.$_SESSION['level'].'.php');
        exit();
      }
    ?>

<?php
require_once('dbconnect.php'); ?> 


<?php   include 'header.php';
             
       
               ?>          
      
            
           <div  id="mainpart">
           <?php include 'left_part.php' ?>
                    
            <div id="middle">
            
            
           
                         <div id="content">
                           
                            <h2 style="margin:160px 50px;" > There are only 10 types of people in the world, those who understand binary and those who don't . </h2>
            
                          </div>
            
                          <div id="form_part">
                               
                               <form action="check.php" method="post">
                                    <label style="font-family:20px;">  Answer: </label>
                                 <td>   <input name="secret" type="text" ></td>
                                  <input name="submit" type="submit" value="submit">
                              </form>
                                 <p style="margin-left:50px; margin-top:10px;">
                                  Make sure you answer in appropriate format. <br />   
                                  
                                  To see rules and regulations click here <a href="rules.php" target="_blank"> here </a>
                                 </p>
                           </div>
         
          
            
            </div>
    
      
      
      </div>
          <?php include 'footer.php'?>
           
      </body>

  
</html>