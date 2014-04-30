
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "pranavmistry";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level11.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level10.php");
						 exit();
							  }
			   
				 ?>
        
			