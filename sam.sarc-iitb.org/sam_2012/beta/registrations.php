
      
      <?php include 'header.php'; ?> 
      <div id="mainbody" >
     
          
       <?php include 'rightnav.php'; ?> 
        </div> 
            
            <div id="mainpart">
      <br><br><br>
            
            <?php 
      
      
      if(isset($_POST['sub'])){
        
        include_once ('dbconnect');
        
        $name=addslashes($_POST['name']);
        $batch=addslashes($_POST['batch']);
        $email=addslashes($_POST['email']);
        $phnum=addslashes($_POST['phnum']);
        
        $sql="INSERT INTO sports_registrations ('name','batch','email','phonenum') Values ($name,$batch,$email,$phnum)";
        if(mysql_query($sql)){
          echo '<h3>We will inform you about the further details aftwards.</h3>';    
        }else{
          echo '<h3>Try again there might be some error.</h3>';    
        }
      }else{ ?>
            <H2 style="margin-left:200px;">&nbsp;&nbsp;&nbsp; Please Inform  us about your visit for sports events.</H2>
            <br /><br />
            <form>
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