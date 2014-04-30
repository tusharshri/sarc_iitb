
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "girishgaitonde";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level10.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level9.php");
						 exit();
							  }
			   
				 ?>
        
			