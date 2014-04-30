
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "bakuldesai";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level7.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level6.php");
						 exit();
							  }
			   
				 ?>
        
			