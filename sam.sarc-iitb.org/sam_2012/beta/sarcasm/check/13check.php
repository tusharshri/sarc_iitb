


<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "sarcasmania";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level2.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level1.php");
						 exit();
							  }
			   
				 ?>
        
			