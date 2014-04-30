
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "sameer";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level13.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level12.php");
						 exit();
							  }
			   
				 ?>
        
			