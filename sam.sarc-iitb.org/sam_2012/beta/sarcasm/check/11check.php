
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "ma105";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level12.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level11.php");
						 exit();
							  }
			   
				 ?>
        
			