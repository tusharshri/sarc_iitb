<html>
	<head>  
    	<title>SAM</title>
		<link  rel="stylesheet" href="css/main.css" type="text/css" media="all"/> 
		<link rel="stylesheet" href="css/rotate.css" type="text/css" media="all" /> 
  		<link rel="stylesheet" href="css/galleriffic-1.css" type="text/css" />
		<link rel="shortcut icon" href="image/favicon.ico" type="image/vnd.microsoft.icon">
		<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
        <script type="text/javascript" src="js/jQueryRotate.2.2.js"></script>
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
		<style type="text/css">
		@font-face {  
  			font-family: Calibri ;  
			  src: url( css/CALIBRI.ttf ) format("truetype");  
		}
		body{
			font-family:Calibri Verdana, Geneva, sans-serif;
			margin:0;
			padding:0;
			border:none;	
		}
			.one:hover img{
		background: url('image/tmp.png');
		background-position: -215px -215px; width: 215px; height: 215px;
}
			.one{
				width:215px; height:215px; background:url(image/tmp.png); background-position: -215px -0px;
				margin:0 0 0 -29px;
				float:left;
				transform: rotate(22.5deg);
				-webkit-transform: rotate(22.5deg);
				-moz-transform:  rotate(22.5deg);
				-o-transform: rotate(22.5deg);
				-ms-transform: rotate(22.5deg);
				cursor:pointer;
			}
			.two{
				width:215px; height:215px; background:url(image/tmp.png); background-position: -0px -215px;
				margin:-98px 0 0 67px;
				float:left;
				transform: rotate(67.5deg);
				-webkit-transform: rotate(67.5deg);
				-moz-transform:  rotate(67.5deg);
				-o-transform: rotate(67.5deg);
				-ms-transform: rotate(67.5deg);	
				cursor:pointer;
			}
			.three{
				width:215px; height:215px; background:url(image/tmp.png); background-position: -215px -430px;
				margin:-72px 0 0 60px;
				float:left;
				transform: rotate(112.5deg);
				-webkit-transform: rotate(112.5deg);
				-moz-transform:  rotate(112.5deg);
				-o-transform: rotate(112.5deg);
				-ms-transform: rotate(112.5deg);
				cursor:pointer;	
			}
			.four{
				width:215px; height:215px; background:url(image/tmp.png); background-position: -0px -645px;
				margin:-110px 0 0 -37px;				
				float:left;
				transform: rotate(157.5deg);
				-webkit-transform: rotate(157.5deg);
				-moz-transform:  rotate(157.5deg);	
				-o-transform: rotate(157.5deg);
				-ms-transform: rotate(157.5deg);
				cursor:pointer;
			}
		
		</style>
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
			
			<div id="header" style="box-shadow: 1px 1px 10px 0px; height:110px; width:100%; padding:0 10%;">
				<div id="headerchildtwo" class="headerchild" style="margin-left:10%;"> 
               	<a href="http://sarc-iitb.org/" > <img src="image/deco_logo.png" width="130px"/></a> 
               	</div>
				<div id="headerchildone" class="headerchild">
					<div id="samlogodiv" >
		                  	<a href="home.php">
		                	  <div id="loading" style="margin-left:-240px;">
		                          <img src="image/sam_logo_withouttext1.png"  alt="next" width="110" height="110"/>				                              </div >
	                           <div id="logo_text" style="margin-left:-205px;">
	                           	<p> SAM </p>                      
                               </div>  </a>
                    </div>
                
                <span style="position: absolute; top: 40px;color: white; font-size:30px; margin:0 -110px;"> Student Alumni Meet 2012</span>
                
                
                
               </div>
               
               	<div id="headerchildthree" class="headerchild" style="margin-top:11px; margin-right:10%;" > 
                 <a href="http://www.iitb.ac.in/" > 	<img src="image/iitb_logo.png"/> </a> 
               	</div>
                
             
			</div>
			
            <div style="float:left; clear:both; width:100%;">
			<div style=" position:absolute; top:80px;   width:20%; overflow:hidden;">
            	<div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
                <div class="four"></div>
            </div>
			<div style="background: white; padding:1% 0; min-height: 460px; width:78%; margin:0 1% 0 21%;">
				<!--<div style="background:#e6eecc; width:94%; margin:2% 3%; height: 250px;">
                	<img src="image/panel.jpg" width="100%" height="250px">
				</div>-->
                <div style="float:left; margin:7% 0 0 10%;">
                <div id="thumbs" class="navigation" >
					<ul class="thumbs noscript">
						<li>
							<a class="thumb" href="image/panel.jpg" title="Panel Discussion">Panel Discussion</a>
						</li>

						<li>
							<a class="thumb" href="image/beyond.jpg" title="Beyond The Horizon">Beyond The Horizon</a>
						</li>

						<li>
							<a class="thumb" href="image/overflow.jpg" title="Mock Interviews">Mock Interviews</a>
						</li>

						<li>
							<a class="thumb" href="image/sam.jpg" title="Break The Ice">Break The Ice</a>
						</li>

						<li>
							<a class="thumb" href="image/features.jpg" title="High Tea">High Tea</a>
						</li>

						<li>
							<a class="thumb" href="image/captions.jpg" title="Alumni Lounge">Alumni Lounge</a>
						</li>

						<li>
							<a class="thumb" href="image/panel.jpg" title="Tech Fair">Tech Fair</a>
						</li>

						<li>
							<a class="thumb" href="image/panel.jpg" title="Cult Events">Cult Events</a>
						</li>

						<li>
							<a class="thumb" href="image/panel.jpg" title="Sports Events">Sports Events</a>
						</li>
					</ul>
				</div>
                <div id="gallery" class="content" style="float:left; margin:0 0 0 -17px;">
					
					<div class="slideshow-container" >
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
                    <div id="controls" class="controls"></div>
				</div>
                </div>
				
                	
			</div>
            </div>
            
            
            <div style="width:100%;  background:url('image/23.png'); float:left;">
            	<div style="margin-left:22%">
                <ul style="list-style:none; display:inline-block;">
                <li style="float:left; padding:10px 15px;">about Us</li>
                <li style="float:left;  padding:10px 15px;">Profiles</li>
                <li style="float:left;  padding:10px 15px;">Events</li>
                <li style="float:left;  padding:10px 15px;">Schedule</li>
                <li style="float:left;  padding:10px 15px;">Sponsors</li>
                </ul>
                
                <ul style="list-style:none; display:inline-block; margin-left:20%">
                <li style="float:left; padding:10px 5px;"><img src="image/small-facebook.png"></li>
                <li style="float:left;  padding:10px 5px;"><img src="image/small-rss.png"></li>
                <li style="float:left;  padding:10px 5px;"><img src="image/small-twitter.png"></li>
                </ul>
                </div>
             </div>
            <script type="text/javascript">
			// We only want these styles applied when javascript is enabled
			$('div.navigation').css({'width' : '300px', 'float' : 'left'});
			$('div.content').css('display', 'block');

			$(document).ready(function() {				
				// Initialize Minimal Galleriffic Gallery
				$('#thumbs').galleriffic({
					imageContainerSel:      '#slideshow',
					controlsContainerSel:   '#controls'
				});
			});
		</script>
			</body>

	
</html>