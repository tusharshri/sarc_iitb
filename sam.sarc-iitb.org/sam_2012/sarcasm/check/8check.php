
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "bharatdesai";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level9.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level8.php");
						 exit();
							  }
			   
				 ?>
        
			