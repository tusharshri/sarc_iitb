

<?php 
session_start();
   if(!(isset($_SESSION['uid']))) {
    header("location:home.php");
      exit(); 
 }   
if($_SESSION['level']!=22){
    header('Location: level'.$_SESSION['level'].'.php');
        exit();
      }
  
  ?>

<?php
require_once('dbconnect.php');?> 


<?php   include 'header.php';
             
       
               ?>          
      
            
           <div  id="mainpart">
           <?php include 'left_part.php' ?>
                    
            <div id="middle">
            
            
           
                         <div id="content">
                           
                            <h2 style="margin:160px 40px;" > 
                            	IIT Bombay is an organisation, we get infi fundaes from the whole freaking universe! Some things are worth noting though.
								Especially the puns in the first multiple of 5. 
                            	
								</h2>
            
            
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