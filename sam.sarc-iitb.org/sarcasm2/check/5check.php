
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "nandannilekani";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level6.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level5.php");
						 exit();
							  }
			   
				 ?>
        
			