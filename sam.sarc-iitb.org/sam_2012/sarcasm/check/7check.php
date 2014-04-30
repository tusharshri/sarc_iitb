
<?php
require_once('dbconnect.php');  
?>

<?php
              $topsecret = $_POST['secret'];			      
		      $secretreal= "hostel14";					
			  if(strcmp ($topsecret,$secretreal)==0)
			             { 
						 header("Location:level8.php");	
						 exit();		  
				          } 
			  else{
						 header("Location:level7.php");
						 exit();
							  }
			   
				 ?>
        
			