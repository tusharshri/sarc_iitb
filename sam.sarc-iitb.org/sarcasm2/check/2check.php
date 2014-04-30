
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "victormenezes";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level3.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level2.php");
						 exit();
							  }
			   
				 ?>
        
			