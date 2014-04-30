
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "550acres";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level5.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level4.php");
						 exit();
							  }
			   
				 ?>
        
			