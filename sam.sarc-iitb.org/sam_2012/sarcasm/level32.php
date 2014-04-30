

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
require_once('dbconnect.php');?> 


<?php   include 'header.php';
             
        ?>  
 
    
       
       

            
           <div  id="mainpart">
             <script type="text/javascript">
         $(document).ready(function(){
           checkDate();      
         });     
   function checkDate() {
     
     current_date = new Date();
     
     t="curr_date='"+current_date+"'";

     $(function(){  
        $.ajax({
        type: "POST",
        url: "data4.php",
        data: t,
        dataType: "text",
        success: function(res){
          if(res=='pass'){
              window.location='http://www.sam.sarc-iitb.org/sarcasm/level33.php';
          }
          else{
             setTimeout(function(){checkDate();},2500);
          }
        }
        });
        });
          
        }
                         
 </script>
           <?php include 'left_part.php' ?>
                    
            <div id="middle">
            
            
           
                         <div id="content">
                           
                            <h2 style="margin:160px 50px;" > 
                              u and i and dept. of ee
                <br>this day, that year
                              
                </h2>
            
            
                          </div>
            
                    <div id="form_part">
                               
                               <form>
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