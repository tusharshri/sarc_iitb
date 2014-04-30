<html>
	<head> 
    	<title>SAM</title> 
		<link  rel="stylesheet" href="css/main.css" type="text/css" media="all"/> 
		<link rel="stylesheet" href="css/rotate.css" type="text/css" media="all" /> 
  		<link rel="stylesheet" href="css/galleriffic-1.css" type="text/css" />
		<link rel="shortcut icon" href="image/favicon.ico" type="image/vnd.microsoft.icon">
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
       
        <script type="text/javascript" src="js/jQueryRotate.2.2.js"></script>
        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
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
		
		<script type="text/javascript">
		$(document).ready(function(){
		$(".one").mouseover(function(){
			$(".one").css({
			backgroundPosition: '-215px -215px'
			 });
		}).mouseout(function(){
			$(".one").css({
			backgroundPosition: '-215px -0px'
			 });
		});
		$(".two").mouseover(function(){
			$(".two").css({
			backgroundPosition: '-0px -0px'
			 });
		}).mouseout(function(){
			$(".two").css({
			backgroundPosition: '-0px -215px'
			 });
		});
		$(".three").mouseover(function(){
			$(".three").css({
			backgroundPosition: '-215px -645px'
			 });
		}).mouseout(function(){
			$(".three").css({
			backgroundPosition: '-215px -430px'
			 });
		});
		$(".four").mouseover(function(){
			$(".four").css({
			backgroundPosition: '-0px -430px'
			 });
		}).mouseout(function(){
			$(".four").css({
			backgroundPosition: '-0px -645px'
			 });
		});
		
});
		
		</script>
		<body> 
			<div id="header">
			<div id="head" class="container">
           	  			
          
              
               <div id="logosarc" > 
               	<a href="http://sarc-iitb.org/" > <img src="image/deco_logo.png" alt="SARC,IIT BOMBAY" style="height:70px;padding-top:20px;padding-right: 8px; "/></a> 
              </div> 
              <div id="divider"> <img src="image/divider1.gif" style="height:90px; margin-top:10px; " /> </div>
				<div id="logosam"  >
					<div style="float:left;">
		                  	<a style="text-decoration: none;" href="home.php">
		                	  <div id="loading" >
		                          <img src="image/sam_logo_withouttext1.png"  style="padding:0px;" alt="next" width="110" height="110"/>				                              </div >
	                           <div id="logo_text" >
	                           	<p style="font-family: Open Sans,sans-serif; padding-top:0px;"> SAM </p>                      
                               </div>  </a>
                    </div>
                    </div>
                <div id="samtext"> 
               	
                <span style="font-size:21px; font-family: Open Sans,sans-serif; " >Student Alumni Meet 2012 </span> <br />
                <span style="font-style: italic;font-size: 16px;vertical-align: center; font:white;" >6th-7th October</span>	</div>
               
               
               	<div id="logoiitb" > 
                 <a href="http://www.iitb.ac.in/" >
                  <img src="image/iitb_logo.png" style="padding: 9px;margin-top: 2px;" />
                  </a> 
               	</div>
                 
                 <div  style="float:right; 
               
                 margin-top:0px;margin-top:2px;">
                 <img src="image/hungama_bg.jpg" height="60" ></div>
               
                <div style=" float:right;margin: 0px 15px 0px 91px;
                 font-size: 13px;color:rgba(255, 255, 255, 0.6); color:; font-weight:bold;height:20px; 
                 margin-top:15px; ">
                <i> Powered By </i>
                 </div> 
                 
             
			</div> 
			</div>
	