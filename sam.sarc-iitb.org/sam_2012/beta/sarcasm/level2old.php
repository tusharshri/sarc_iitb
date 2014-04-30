<?php
require_once('dbconnect.php');  
 ob_start();?>
<?php include 'header.php'; ?>
<?php

              $topsecret = $_POST['secret'];			      
		      $secretreal= "sarcasmania";					
			  if(strcmp($topsecret,$secretreal) ==0)
			             { 
						 header("Location:rules.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:lead.php");
						 exit();
							  }
			   
				 ?>
        
			<div  id="mainpart" style="margin-left:0px;width:1150px; border:1px solid red;">
			<div style="float:left; width:183px; min-height:450px; border: 1px solid red;">
          <p style="padding:20px; line-height:30px;" > <a href="rules.php" target="_blank" > 
          Rules & Regulations </a> <br /> 
           <a href="lead.php" target="_blank"> Leaderboard</a>   <br />      </p>
            </div>	
			<div style="float:left; width:550px;min-height:450px; border: 1px solid red;">
            
            Vmcc stantds for??
            <br />
            <form action="level1.php" method="post" style="margin-top:100px;">
            Answer: <input type="text" name="secret"  />
                     
            </form>
          <p>  Answer should not have blah blah.  </p>
          
            
            </div>
			<div style="float:left; width:411px; min-height:450px; border: 1px solid red;"></div>
		
			
			
              

            </div>
            
             <?php include 'footer.php'; ?>
            
            
			</body>

	
</html>