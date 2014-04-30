
      
      <?php include 'header.php'; ?> 
      <div id="mainbody" >
     
          
       <?php include 'rightnav.php'; ?> 
        
            
            <div id="mainpart">
      <br><br><br>
            
            <?php 
      
      
      if(isset($_POST['sub'])){
        
        include_once ('dbconnect.php');
        $name=addslashes($_POST['name']);
        $batch=addslashes($_POST['batch']);
        $email=addslashes($_POST['email']);
        $phnum=addslashes($_POST['phnum']);        
        
        $sql="INSERT INTO sports_registrations (name,batch,email,phonenum) VALUES ('$name','$batch','$email',$phnum)";
                //echo $sql;
        
                
        $query = mysql_query($sql);
        //echo $query;
        if($query){
          echo '<h3 style="padding:200px;">We will inform you about the further details aftwards.</h3>';    
        }else{
          $e =  mysql_error($con);
          if( strcmp(substr($e,0,9),"Duplicate") == 0){
               echo '<h3 style="padding:200px;"> Email address already registered  </h3>';
          }
          else{
            echo '<h3 style="padding:200px;">Try again there might be some error.</h3>';    
          }
        }
      }else{ ?>
             <H1 style="margin-left:270px;"> Sports Meet 2012</H2> <br />
             
            <H2 style="margin-left:200px;">&nbsp;&nbsp;&nbsp; Inform us before you visit in SAM.</H2>
            <br /><br />
               
  <p style="padding-left:70px;padding-right:30px;line-height: 24px;word-spacing: 1.3px;" >   
         Last year sports meet was pretty much dominated by the alumni, winning in almost all the sports.
        This year its going to be more entertaining with  lots of events running parallel in Student Alumni Meet.  
<br>Sports meet is being jointly organised by Sports body & SARC.
<br><br>

              </p>
            <form action="sports_registration.php" method="post">
            <table>
            <tr>
            <td>
            <label>Name</label> </td>
            <td><input type="text" name="name" /></td>
            </tr>
            <tr>
            <td>
            <label>Batch</label></td>
            <td><input type="text" name="batch"/></td>
            </tr>
            <tr>
            <td>
            <label>Email</label></td>
            <td><input type="text" name="email"/></td>
            </tr>
            <tr>
            <td>
            <label>Contact Detail</label></td>
            <td><input type="text" name="phnum"/></td>
            </tr>
            <tr></tr>
            <!--<tr>
            <td>Which Event your are interested?</td>
            </tr>
            <tr>
            <td>TT <input type="radio"></td>
            <td>Squash <input type="radio"></td>
            <td>VolleyBall <input type="radio"></td>
            </tr>
            <tr>
            <td>Cricket <input type="radio"></td>
            <td>BasketBall <input type="radio"></td>
            <td>Boardgames <input type="radio"></td>
            </tr>-->
            <tr></tr>
            <tr></tr>
            <tr>
            <td><input type="submit" name="sub"></td>
            </tr>
            </table>
            </form>
            <?php } ?>
            
            </div>
             <?php include 'footer.php'; ?>
            
           
    <?php include 'social.php'; ?>      
        </body>

  
</html>