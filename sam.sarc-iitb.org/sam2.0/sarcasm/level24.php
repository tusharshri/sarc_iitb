

<?php 
session_start();
   if(!(isset($_SESSION['uid']))) {
    header("location:home.php");
      exit(); 
 }   
if($_SESSION['level']!=24){
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
                           
                             <img src="ques/birla.jpg"/>
            
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