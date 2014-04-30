
			<?php include 'header.php'; ?> 
            	<style type="text/css">
		#second_part{
			position:absolute;
			top:540px;
			left:780px;	
		}
		#second_part img{
			height:60px;	
		}
	
	</style>
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
							window.location='http://www.sam.sarc-iitb.org/sarcasm/level'+res+'.php';
					}
					else{
							window.location='http://www.sam.sarc-iitb.org/sarcasm/';
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
		<div id="debug"></div><div id="loader" style="display:none">
        </div>
		 	<div id="main_part">
          		<img src="image/sarcasm.jpg" width="80%" style="margin:0 10%;"/>
			</div>
            <div id="second_part">
            	<img src="image/f-connect.png" id="fb-auth"/>
            </div>
       	</div> 
            
            
             <?php include 'footer.php'; ?>
            
           
		<?php include 'social.php'; ?>			
        </body>

	
</html>