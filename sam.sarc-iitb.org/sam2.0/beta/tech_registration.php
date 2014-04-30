
      
      <?php include 'header.php'; ?> 
      <div id="mainbody" >
     
          
       <?php include 'rightnav.php'; ?> 
        </div> 
            
            <div id="mainpart">
      <br><br><br>
            
            <?php 
      
      
      if(isset($_POST['sub'])){
        
        include_once ('dbconnect.php');
        
        $name=addslashes($_POST['name']);
        $roll=addslashes($_POST['roll']);
        $email=addslashes($_POST['email']);
        $phnum=addslashes($_POST['phnum']);
                $project=addslashes($_POST['project']);
        
        $sql="INSERT INTO tech_registrations (name,roll,email,phonenum,project) VALUES ('$name','$roll','$email',$phnum,'$project')";
                //echo $sql;
        
                
        $query = mysql_query($sql);
        //echo $query;
        if($query){
          echo '<h3 style="padding:200px;">We will inform you about the further details aftwards.</h3>';    
        }else{
          $e =  mysql_error($con);
          if( strcmp(substr($e,0,9),"Duplicate") == 0){
               echo '<h3 style="padding:200px;">Already registered a project with this email address </h3>';
          }
          else{
            echo '<h3 style="padding:200px;">Try again there might be some error.</h3>';    
          }
        }
      }else{ ?>
      <H1 style="margin-left:350px;">&nbsp;&nbsp;&nbsp; Tech Fair</H2>
            <H2 style="margin-left:200px;">&nbsp;&nbsp;&nbsp; Register here to present your project in SAM.</H2>
            <br /><br />
  <p style="padding-left:70px;padding-right:30px;line-height: 24px;
word-spacing: 1.3px;" >    SAM is a platform, a formal means for students to know & connect with our rich pool of alumni & thus benefit from their experience. 
<br><br>
Also, the alumni would very much appreciate being up to date with current "scene" @ IITB, tech being one of them!
<br>The Tech Fair is being jointly organised by STAB & SARC.
<br><br>
What's in it for you? <b>Networking opportunity!</b> This is a great chance to get to know many alumni of this institute. 
We recommend teams to participate and not lose this opportunity to interact with reputed alumni and seniors.<br><br>
              </p>
            <form action="tech_registration.php" method="post">
            <table>
            <tr>
            <td>
            <label>Name</label> </td>
            <td><input type="text" name="name" /></td>
            </tr>
            <tr>
            <td>
            <label>Roll Number</label></td>
            <td><input type="text" name="roll"/></td>
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
            <tr>
            <td>
            <label>Project Name</label></td>
            <td><input type="text" name="project"/></td>
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