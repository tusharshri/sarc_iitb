
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "sarcasticallycorrect";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level1.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level0.php");
						 exit();
							  }
			   
				 ?>
        
			