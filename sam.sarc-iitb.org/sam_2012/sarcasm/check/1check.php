<?php
require_once('dbconnect.php');  
require_once('ans.php');
?>

<?php
              if(isset($_POST['secret'])){
			  
			        $topsecret=$_POST['secret'];		      
		            
					$level_current= $_SESSION['level'];
					$level_next=$level_current+1;
									
			      if(strcmp ($topsecret,$secretreal)==0)
			             {
			             	$query="SLELECT level from user_status WHERE ";
							$result=mysql_query($query);
							
							$player = mysql_fetch_assoc($query);
							
							$player['level']=$player['level']+1;
							
			                  
						       header("Location:level".$level_next.".php");	
						 exit();		  
				          } 
			      else{
						        header("Location:level".$level_current.".php");
						 exit();
							  }
			   
			    }
			  else {
			  	header("Location:level".$_SESSION['level'].".php");
			  }
				 ?>
        
			