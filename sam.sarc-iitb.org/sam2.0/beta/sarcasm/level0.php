
      
      <?php include 'header.php'; ?> 
      
  <style type="text/css">
      div#container_notlike, div#container_like {
        display: none;
      }
    </style>
    
      <div  id="mainpart">
            <?php include 'left_part.php' ?>
            <div style="float:left; width:550px;min-height:450px; ">
            <div id="fb-root"></div>
            <script src="http://connect.facebook.net/en_US/all.js"></script>
            <script>
                FB.init({
                    appId :'386029624801886',
                    status : true, // check login status
                    cookie : true, // enable cookies to allow the server to access the session
                    xfbml : true, // parse XFBML
                    //channelUrl : 'full path to file', // channel.html file
                    oauth : true // enable OAuth 2.0
                });
            </script>


        <script>
           FB.Event.subscribe('edge.create', function(href, widget) {
                top.window.location = 'level1.php';
        alert('hii');
            });
      
      FB.getLoginStatus(function(response) {
          var page_id = "238851456155573";
          if (response && response.authResponse) {
            var user_id = response.authResponse.userID;
            var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
            FB.Data.query(fql_query).wait(function(rows) {
              if (rows.length == 1 && rows[0].uid == user_id) {
                console.log("LIKE");
                $('#container_like').show();
        window.location="level1.php";
              } else {
                console.log("NO LIKEY");
                $('#container_notlike').show();
              }
            });
          } else {
            FB.login(function(response) {
              if (response && response.authResponse) {
                var user_id = response.authResponse.userID;
                var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
                FB.Data.query(fql_query).wait(function(rows) {
                  if (rows.length == 1 && rows[0].uid == user_id) {
                    console.log("LIKE");
                    $('#container_like').show();
          window.location="level1.php";
                  } else {
                    console.log("NO LIKEY");
                    $('#container_notlike').show();
                  }
                });
              } else {
                console.log("NO LIKEY");
                $('#container_notlike').show();
              }
            }, {scope: 'user_likes'});
          }
        });
    
    
    function run(){
      FB.getLoginStatus(function(response) {
          var page_id = "238851456155573";
          if (response && response.authResponse) {
            var user_id = response.authResponse.userID;
            var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
            FB.Data.query(fql_query).wait(function(rows) {
              if (rows.length == 1 && rows[0].uid == user_id) {
                console.log("LIKE");
                $('#container_like').show();
        window.location="level1.php";
              } else {
                console.log("NO LIKEY");
                $('#container_notlike').show();
              }
            });
          } else {
            FB.login(function(response) {
              if (response && response.authResponse) {
                var user_id = response.authResponse.userID;
                var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
                FB.Data.query(fql_query).wait(function(rows) {
                  if (rows.length == 1 && rows[0].uid == user_id) {
                    console.log("LIKE");
                    $('#container_like').show();
          window.location="level1.php";
                  } else {
                    console.log("NO LIKEY");
                    $('#container_notlike').show();
                  }
                });
              } else {
                console.log("NO LIKEY");
                $('#container_notlike').show();
              }
            }, {scope: 'user_likes'});
          }
        });
      
    }
        </script>

        <!--<div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#appId=386029624801886&amp;xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>-->
              
      
    <div id="container_notlike">
    To Proceed click on like button
      <!--<div class="fb-like" data-href="https://www.facebook.com/SARC.2012" data-send="false" data-width="450" data-show-faces="true"></div>-->
      <div id="fb_facebook" onclick="run()">
      <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FSARC.2012&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=386029624801886" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
      </div>
      
      <input type="button" onclick="run()" value="Proceed"/>
    </div>

    <div id="container_like"><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FSARC.2012&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=386029624801886" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
      </div>
    </div>
            
      </div>
            </div>
            
             <?php include 'footer.php'; ?>
            
            
      </body>

  
</html>