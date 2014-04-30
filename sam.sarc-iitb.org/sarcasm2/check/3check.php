
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "kanwalrekhi";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level4.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level3.php");
						 exit();
							  }
			   
				 ?>
        
			