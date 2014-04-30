
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
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	
	
	</script>
			<div style="mainbody" >
            <div id="fb-root"></div>
        <script type="text/javascript">
            var button;
            var userInfo;
 
            window.fbAsyncInit = function() {
                FB.init({ appId: '386029624801886',
                    status: true,
                    cookie: true,
                    xfbml: true,
                    oauth: true});
 
               showLoader(true);
 
               function updateButton(response) {
                    button       =   document.getElementById('fb-auth');
                    userInfo     =   document.getElementById('user-info');
 
                    if (response.authResponse) {
                        //user is already logged in and connected
                        FB.api('/me', function(info) {
                            login(response, info);
                        });
 
                        button.onclick = function() {
                            FB.logout(function(response) {
                                logout(response);
                            });
                        };
                    } else {
                        //user is not connected to your app or logged out
                        button.innerHTML = 'Login';
                        button.onclick = function() {
                            showLoader(true);
                            FB.login(function(response) {
                                if (response.authResponse) {
                                    FB.api('/me', function(info) {
                                        login(response, info);
                                    });
                                } else {
                                    //user cancelled login or did not grant authorization
                                    showLoader(false);
                                }
                            }, {scope:'email,user_about_me'}); //,user_birthday,status_update,publish_stream,user_about_me
                        }
                    }
                }
 
                // run once with current status and whenever the status changes
                FB.getLoginStatus(updateButton);
                FB.Event.subscribe('auth.statusChange', updateButton);
            };
            (function() {
                var e = document.createElement('script'); e.async = true;
                e.src = document.location.protocol
                    + '//connect.facebook.net/en_US/all.js';
                document.getElementById('fb-root').appendChild(e);
            }());
 
            function login(response, info){
				FB.login(function(response) {
                if (response.authResponse) {
					 
                       var name=info.name;
					   var emailid= info.email;
					   var uid=info.id
					   var t='uid='+uid+'&name='+name+'&emailid='+emailid;
				$(document).ready(function(){	
				$.ajax({
				type: "POST",
				url: "data.php",
				data: t,
				dataType: "text",
				success: function(res){
					if(res!='false'){
							window.location='http://www.sam.sarc-iitb.org/sarcasm2/level'+res+'.php';
					}
					else{
							window.location='http://www.sam.sarc-iitb.org/sarcasm2/';
					}
				}
				});
				});
                    /*var accessToken                                 =   response.authResponse.accessToken;
 
                    userInfo.innerHTML                             = '<img src="https://graph.facebook.com/' + info.id + '/picture">' + info.name
                                                                     + "<br /> Your Access Token: " + accessToken;
                    button.innerHTML                               = 'Logout';
                    showLoader(false);
                    document.getElementById('other').style.display = "block"; */
					
                }else{
					
				}
				});
            }
 
            function logout(response){
                userInfo.innerHTML                             =   "";
                document.getElementById('debug').innerHTML     =   "";
                document.getElementById('other').style.display =   "none";
                showLoader(false);
            }
 
            //stream publish method
            function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
                showLoader(true);
                FB.ui(
                {
                    method: 'stream.publish',
                    message: '',
                    attachment: {
                        name: name,
                        caption: '',
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {
                    showLoader(false);
                });
 
            }
            function showStream(){
                FB.api('/me', function(response) {
                    //console.log(response.id);
                    streamPublish(response.name, 'I like the THE INSTI-ALUMNI CRYPT EVENT, PRIZES WORTH 2.5K', 'http://www.sam.sarc-iitb.org/sarcasm/', 'http://www.sam.sarc-iitb.org/sarcasm/', "Share http://www.sam.sarc-iitb.org/sarcasm/");
                });
            }
 
            function share(){
                showLoader(true);
                var share = {
                    method: 'stream.share',
                    u: 'http://www.sam.sarc-iitb.org/sarcasm/'
                };
 
                FB.ui(share, function(response) {
                    showLoader(false);
                    console.log(response);
                });
            }
 
            function graphStreamPublish(){
                showLoader(true);
 
                FB.api('/me/feed', 'post',
                    {
                        message     : "THE INSTI-ALUMNI CRYPT EVENT, PRIZES WORTH 2.5K",
                        link        : 'http://www.sam.sarc-iitb.org/sarcasm/',
                        picture     : 'http://www.sam.sarc-iitb.org/sarcasm/image/sarcasm_logo.png',
                        name        : 'SARCasm, SARC',
                        description : 'THE INSTI-ALUMNI CRYPT EVENT, PRIZES WORTH 2.5K From 9 PM Onwards on 21st Spetmber'
 
                },
                function(response) {
                    showLoader(false);
 
                    if (!response || response.error) {
                        alert('Error occured');
                    } else {
                        alert('Post ID: ' + response.id);
                    }
                });
            }
 
            function fqlQuery(){
                showLoader(true);
 
                FB.api('/me', function(response) {
                    showLoader(false);
 
                    //http://developers.facebook.com/docs/reference/fql/user/
                    var query       =  FB.Data.query('select name, profile_url, sex, pic_small from user where uid={0}', response.id);
                    query.wait(function(rows) {
                       document.getElementById('debug').innerHTML =
                         'FQL Information: '+  "<br />" +
                         'Your name: '      +  rows[0].name                                                            + "<br />" +
                         'Your Sex: '       +  (rows[0].sex!= undefined ? rows[0].sex : "")                            + "<br />" +
                         'Your Profile: '   +  "<a href='" + rows[0].profile_url + "'>" + rows[0].profile_url + "</a>" + "<br />" +
                         '<img src="'       +  rows[0].pic_small + '" alt="" />' + "<br />";
                     });
                });
            }
 
            function setStatus(){
                showLoader(true);
 
                status1 = document.getElementById('status').value;
                FB.api(
                  {
                    method: 'status.set',
                    status: status1
                  },
                  function(response) {
                    if (response == 0){
                        alert('Your facebook status not updated. Give Status Update Permission.');
                    }
                    else{
                        alert('Your facebook status updated');
                    }
                    showLoader(false);
                  }
                );
            }
 
            function showLoader(status){
                if (status)
                    document.getElementById('loader').style.display = 'block';
                else
                    document.getElementById('loader').style.display = 'none';
            }
 
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
			<p style="font-size:40px;">Has Started!!</p>
			<br><br><br>
			<img src="image/f-connect.png" id="fb-auth"/>
			<br>
			<p style="font-size:20px;">Think you know the institute and its alumni ?? Well, think again!! Get ready for a journey through time and space to uncover the institute&apos;s deepest secrets!!</p>
			
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


</body>
</html>