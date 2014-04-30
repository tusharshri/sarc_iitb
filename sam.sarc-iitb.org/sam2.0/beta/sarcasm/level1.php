
  <?php ob_start();
    ?>
    
     
      
      <?php  
        include 'header.php'; ?> 
      <?php  if(!(isset($_SESSION['uid']))) {
              header("location:home.php");
              exit();
                            }  ?>
        
       <?php if( !isset($_SESSION['uid']) && $_SESSION['level']!=1){
        header("location:home.php");
      } ?>
      
       
            
            
      <div  id="mainpart" >
      <?php include 'left_part.php' ?>
      
      
      <div style="float:left; width:550px;min-height:450px; ">
        
            <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
        <br><br>
        Send at least 3 request to your friends to proceed.
             <div id="fb_request">
               
               
    <p>
      
    <input type="button"
      onclick="sendRequestViaMultiFriendSelector(); return false;"
      value="Send Request" style="background:#3E3433; color:white; font-size:24px;"
    />
    </p>
    
    <script>
      FB.init({
        appId  : '386029624801886',
        frictionlessRequests: true
      });

      function sendRequestToRecipients() {
        var user_ids = document.getElementsByName("user_ids")[0].value;
        FB.ui({method: 'apprequests',
          message: 'SARCasm, The Insti-ALumni online crypt hunt FROM 9 PM onwards on 21st Spetmber. Visit http://www.sam.sarc-iitb.org/sarcasm/',
          to: user_ids
        }, requestCallback);
      }

      function sendRequestViaMultiFriendSelector() {
        FB.ui({method: 'apprequests',
          message: 'SARCasm, The Insti-ALumni online crypt hunt FROM 9 PM onwards on 21st Spetmber. Visit http://www.sam.sarc-iitb.org/sarcasm/'
        }, requestCallback);
      }
      
      function requestCallback(response) {
      var t='req_num='+response.to.length;
      $(document).ready(function(){  
        $.ajax({
        type: "POST",
        url: "data2.php",
        data: t,
        dataType: "text",
        success: function(res){
          if(res=='pass'){
              window.location='http://www.sam.sarc-iitb.org/sarcasm/level2.php';
          }
          else{
              alert('Send atleast 3 friend requests');
          }
        }
        });
        });
        console.log(response.to.length );
      }
    </script>
            
            
            </div>
            
            
            </div>
      </div>
             <?php include 'footer.php'; ?>
            
            
      </body>

  
</html>