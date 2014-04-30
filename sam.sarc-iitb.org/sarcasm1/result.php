
<!DOCTYPE html>
<head>

	<meta charset="utf-8" />	
	<title>SARCasm</title>
		
	<!--[if lt IE 9]>
	    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link  rel="stylesheet" href="css/main.css" type="text/css" media="all"/> 
    <link rel="stylesheet" href="css/rotate.css" type="text/css" media="all" />
    


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
	<script src="countdown.js" type="text/javascript"></script>
	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="css/landingcss/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/landingcss/foundation.css"/>
	<link rel="stylesheet" type="text/css" href="css/landingcss/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/landingcss/ico.css"/>
	<link rel="stylesheet" type="text/css" href="css/landingcss/flexslider.css" />
	<link rel="stylesheet" type="text/css" href="css/landingcss/prettyphoto.css" />

	<!-- FAVICON-->
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- Google Webfont -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>
<body>
<!-- Header section -->
<div id="header">
      <div id="head" class="container">
                     
          
              
               <div id="logosarc" > 
                 <a href="http://sarc-iitb.org/" > <img src="image/deco_logo.png" alt="SARC,IIT BOMBAY" style="height:70px;padding-top:20px;padding-right: 8px; "/></a> 
              </div> 
              <div id="divider"> <img src="image/divider1.gif" style="height:90px; margin-top:10px; " /> </div>
        <div id="logosam"  >
          <div style="float:left;">
                        <a style="text-decoration: none;" href="index.php">
                        <div id="loading" >
                              <img src="image/sam_logo_withouttext2.png"  style="padding:0px;" alt="next" width="110" height="110"/>                                      </div >
                             <div id="logo_text" >
                               <p style="font-family: Open Sans,sans-serif; padding-top:0px;"> SAM </p>                      
                               </div>  </a>
                    </div>
                    </div>
                <div id="samtext"> 
                 
                <span style="font-size:21px; font-family: Open Sans,sans-serif; " >Student Alumni Meet 2013 </span> <br />
                <span style="font-style: italic;font-size: 16px;vertical-align: center; font:white;" >5th-6th October</span>  </div>
               
               
                 <div id="logoiitb" > 
                 <a href="http://www.iitb.ac.in/" > <img src="image/iitb_logo.png" style="padding: 9px;margin-top: 2px;" /> </a> 
                 </div>
                 
                 
             
      </div> 
      </div>
<header>
	<div class="header">
		<div class="row">

			<!-- Logo content -->

			<div class="eight columns">

				<!-- Nav menu -->
				
			</div>
			
		</div>
	</div>
</header>
<!-- Header section -->

<!-- Slider section -->
<section class="slider-top" style="background: url(../images/bg.jpg) no-repeat center;background-size:auto 100%">
	<div class="row">
		<div class="twelve columns top-content">
			<h3>SARCasm</h3>
			<?php
if(strtolower($_POST['name'])=='hostelten'){
echo "<h3>Congrats, your answer was correct. Fill this <a href='https://docs.google.com/forms/d/1VdUcIerzXbcVjlzfBdcYp15kCl8ooC-xRAasRV30o4g/viewform'>form</a> and enter you entry to win and stay tuned for SARCasm !!!!!</h3> ";
}else{
Header("Location: tryagain.php?q=done");
}
?>
<center><h2><a href="https://docs.google.com/forms/d/1VdUcIerzXbcVjlzfBdcYp15kCl8ooC-xRAasRV30o4g/viewform">Fill the form to win</a></h2></center>
		</div>

		<div class="twelve columns">
			<!-- Slider content -->
			<div id="main-slider" class="flexslider">
				<ul class="slides">
					<li><img src="demo/slides/slide1.png" alt=""/></li>
					<li><img src="demo/slides/slide2.png" alt=""/></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- Slider section -->

<!-- Footer section -->
<footer>
	<div class="footer">
		<p>&copy; 2013. <a href="#">SARC</a> All rights reserved.</p>
	</div>
</footer>
<!-- Footer section -->

<!-- Back to top button Section -->
<p id="back-top">
	<a href="#top"><span></span></a>
</p>
<!-- Back to top button Section -->

<!-- jQuery Files -->
<script type="text/javascript" src="js/landingjs/jquery.js"></script>
<script type="text/javascript" src="js/landingjs/jquery.localscroll-1.2.7-min.js"></script>
<script type="text/javascript" src="js/landingjs/jquery.mobilemenu.js"></script>
<script type="text/javascript" src="js/landingjs/jquery.scrollTo.js"></script>
<script type="text/javascript" src="js/landingjs/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/landingjs/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/landingjs/main.js"></script>
<script type="text/javascript" src="js/landingjs/contact.js"></script>
<script type="text/javascript" src="js/landingjs/carousel.js"></script>
<script type='text/javascript' src="js/landingjs/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/landingjs/jquery.prettyphoto.js"></script>
<script type="text/javascript">// set the date we're counting down to
var target_date = new Date("Sep 28, 2013").getTime();
 
// variables for time units
var days, hours, minutes, seconds;
 
// get tag element
var countdown = document.getElementById("countdown");
 
// update the tag with id "countdown" every 1 second
setInterval(function () {
 
    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000 + (21*3600);
 
    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
	if (seconds<10)
  {
  seconds="0"+seconds;
  }
  if (minutes<10)
  {
  minutes="0"+minutes;
  }
  if (hours<10)
  {
  hours="0"+hours;
  }
  if (days<10)
  {
  days="0"+days;
  }
     
    // format countdown string + set tag value
    countdown.innerHTML = days + " " + hours + " "
    + minutes +" " + seconds ;  
 
}, 1000);</script>

</body>
</html>