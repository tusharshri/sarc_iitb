<?php 
if(substr($_SERVER["SERVER_NAME"],0, 4)!="www."){
	header("Location: http://www.".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);	
	exit();
}



session_start();


ini_set(' session.save_path','http://www.sam.sarc-iitb.org/sarcasm/css/');
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'Off');


?>

<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml" >
	<head> 
    	<title>SAM</title> 
		<link  rel="stylesheet" href="css/main.css" type="text/css" media="all"/> 
        <link  rel="stylesheet" href="css/new.css" type="text/css" media="all"/> 
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

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35007520-1']);
  _gaq.push(['_setDomainName', 'sarc-iitb.org']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
		                  	<a style="text-decoration: none;" href="http://sam.sarc-iitb.org/">
		                	  <div id="loading" >
		                          <img src="image/sam_logo_withouttext1.png"  style="padding:0px;" alt="next" width="110" height="110"/>				                              </div >
	                           <div id="logo_text" >
	                           	<p style="font-family: Open Sans,sans-serif;"> SAM </p>                      
                               </div>  </a>
                    </div>
                    </div>
                <div id="samtext"> 
               	
                <span style="font-size:21px;  " >Student Alumni Meet 2013 </span> <br />
                <span style="font-style: italic;font-size: 16px;vertical-align: center; font:white;" >5th-6th October</span>	</div>
               
               
               	<div id="logoiitb" > 
                 <a href="http://www.iitb.ac.in/" target="_blank" > 	
                 <img src="image/iitb_logo.png"  style="padding: 9px;margin-top: 2px;height:85px;" /> </a> 
               	</div>
                
                 <!--<div style="float:right;height:60px; margin-top:21px; margin-right:10px;
                 font-size: 15px;color:rgba(255, 255, 255, 0.6); font-style:italic ">
                 Powered By
                 </div>-->
             
			</div> 
			</div>
	