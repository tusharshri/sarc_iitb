
      
      <?php include 'header.php'; ?> 
      <div id="mainbody" >
     
          
       <?php include 'rightnav.php'; ?> 
         
            
            <div id="mainpart">
       <br><br><br>
            
            <?php 
      
      
      if(isset($_POST['sub'])){
        
        include_once ('dbconnect.php');
        
        $name=addslashes($_POST['name']);
        $roll=addslashes($_POST['roll']);
        $email=addslashes($_POST['email']);
        $phnum=addslashes($_POST['phnum']);
            //    $project=addslashes($_POST['project']);
        //if(time()<1349137372) echo '<h3 style="padding:200px;">Registrations not opened yet. The registrations will start soon!</h3>'; 
        //else{
		$sql="INSERT INTO mock_registrations (name,roll,email,phonenum) VALUES ('$name','$roll','$email',$phnum)";
                //echo $sql;
        $query = mysql_query($sql);
        //echo $query;
    if($query){
          echo '<h3 style="padding:200px;">We will inform you about the further details through mail.</h3>';    
        }else{
          $e =  mysql_error($con);
          if( strcmp(substr($e,0,9),"Duplicate") == 0){
               echo '<h3 style="padding:200px;"> Email address already registered  </h3>';
          }
          else{
            echo '<h3 style="padding:200px;">Try again there might be some error.</h3>';    
          }
        }}
      else{ ?>
              <H1 style="margin-left:300px;">Mock Interview</H2> <br />
            <H2 style="margin-left:200px;">&nbsp;&nbsp;Register here to give a Mock Interview in SAM.</H2>
            <br /><br />
            <p style="padding-left:70px;padding-right:30px;line-height: 24px;word-spacing: 1.3px;" >   
        <b>Registrations will open from Monday. Only for IITB final year students.</b>
    <br><br>
An interview fundae session, open to all will be organised on 6th October. 
    <br>Time   -  2 PM to 3 PM 
    <br>Venue - VMCC main Auditorium
<br>This will followed by personal interviews in hostels. The interviews would mostly be HR based. 
    <br>6th :  3:30 PM to 5:30 PM
    <br>7th :   2:00 PM to 5:00 PM
<br><br>
Read the rules & regulations below before filling the form.

              </p>
               <form action="mock_registration.php" method="post">
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
            <tr></tr>
            <tr></tr>
            <tr>
            <td><input type="submit" name="sub"></td>
            </tr>
            </table>
            </form>
                
      <p style="padding-left:70px;padding-right:30px;line-height: 24px;word-spacing: 1.3px;" >   
<b>Rules & Regulations</b> :
<br>It is open for final year students only, pre-registration would be done for students.
<br>The interviews would be taken by alumni of the institute, free of cost.
<br>There are incentive points for giving the mock interview.
<br>Slots would be allotted and intimated to the students.
<br>Interviews would be held parallely in hostels (council rooms, lounges, etc.).
  
<br><br>More details would be conveyed after the registration. 
<br><br>
If any queries, please contact 
<br>Shantonu Mandal&emsp;:&emsp;9167392077&emsp;shantonu.2610@gmail.com
<br>Mohit Gupta&emsp;:&emsp;9076059040&emsp;mohit.k.gupta22@gmail.com
<br><br>
</p>

            <?php } ?>
            
            </div>
             <?php include 'footer.php'; ?>
            
           
    <?php include 'social.php'; ?> 
<script type="text/javascript">
  $(function(){
    $('#rightnav').css('height','850px');    
  });
  
</script>  
        </body>

  
</html>