<html>
	<head> 
    	<title>SAM</title> 
		<link  rel="stylesheet" href="css/main.css" type="text/css" media="all"/> 
		
		<link rel="shortcut icon" href="image/favicon.ico" type="image/vnd.microsoft.icon">
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
        
        <script type="text/javascript" src="js/jQueryRotate.2.2.js"></script>
        
		<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
        <script type="text/javascript">
		$(document).ready(function(){
			var value=0;
			var value1=90;
				var rotation = function (){
			   $("#loading img").rotate({
				  angle:value, 
				  animateTo:value1, 
				  callback: rotation,
				  easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
					  return c*(t/d)+b;
				  }
			   });
			   value=value1;
			   value1=value1+90;
			}
			rotation();
		});
		
		</script>
		</head>
		
		 
			
			<?php include 'header.php'; ?> 
			
				
		 
          
			 
            
            
			<div id="mainpart">
				
				
				
<div id="rules"> 
							<span style="padding-left:40px; font-size: 20px;">	<b>	 Rules and Regulations:-  </b></span>
						 
						 <br />
<p>					
1.	Sarcasm is open to all Students/Alumni from any discipline.<br>
2.	Score 10 will be provided for each request you send to you friends.<br>
3.	Primary decision of winner will be decided by your level and score will help you in tie.<br> 
4.  Any decision taken by SARC,IIT BOMBAY will be final.

</p>		</div>
              

            </div>
            
             <?php include 'footer.php'; ?>
            
            
			</body>

	
</html>