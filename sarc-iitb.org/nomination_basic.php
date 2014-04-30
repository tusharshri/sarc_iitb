<script type="text/javascript">


  $(document).ready(function(){
    var a=1;
    $('#add').click(function(){
     
      if(a<=2){
      $('#divPost'+(a+1)).css("display", "block");
      a++;
         if(a>=3){
      $('#add').css("display", "none"); 
       return;
        } 
      }
    })
  })
</script>
<?php
require_once('db_connect.php');

  if(isset($_POST['firstName'])){
   
    
    
    echo "<center style='text-align:center;color: white;text-align: center;display: block;font-size: 22px;padding: 20px;background-color:rgba(204, 37, 37, 0.8)' >Thanks for the nomination. You will be contacted soon.<br>SARC Team.</center></div></div>";
  $firstName=addslashes($_POST['firstName']);
  $middleName=addslashes($_POST['middleName']);
  $lastName=addslashes($_POST['lastName']);
  $name = str_replace("  "," ","$firstName $middleName $lastName");
  $room=addslashes($_POST['room']);
  $roll=addslashes($_POST['roll']);
  $hostel=addslashes($_POST['hostel']);
  $programCode=addslashes($_POST['programCode']);
  $departmentCode=addslashes($_POST['departmentCode']);
  $phoneNumber=addslashes($_POST['phoneNumber']);
  $emailId=addslashes($_POST['emailId']);
  $post1=addslashes($_POST['post1']);
  //$post2=addslashes($_POST['post2']);
  //$post3=addslashes($_POST['post3']);  
  //$sop=addslashes($_POST['sop']);
  //$query = "INSERT INTO visits (firstName,middleName,lastName,class,programCode,departmentCode,phoneNumber,emailId, date_of_visit,purpose,comments) VALUES ('$firstName','$middleName','$lastName','$class','$programCode','$departmentCode','$phoneNumber','$emailId', '$date', '$purpose', '$comment')";
  

  
  
  $query = "INSERT INTO nominations (name,rollNo,roomNo,hostel,programCode,departmentCode,phoneNumber,emailId,post1,post2,post3) VALUES ('$name','$roll','$room','$hostel','$programCode','$departmentCode','$phoneNumber','$emailId', '$post1', '$post2', '$post3')";
    $sql = mysql_query($query) or die(mysql_error());
     $from="webmaster@sarc-iitb.org";
   $to="siddhantiitbmittal3@gmail.com";  
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= 'Cc: tushariitb2@gmail.com' . "\r\n";
    $headers .= 'Bcc: tejas.kolhe411@gmail.com' . "\r\n";

    $subject="New SARC CTM Nomination";

    $message="<b>".$name."</b> applied for SARC Core-Team Member 2012. Please find the details below:<br><br><b>Name: </b>".$firstName." ".$middleName." ".$lastName."<br><b>Roll No.:</b> ".$roll."<br><b>Program: </b>".$programCode."<br><b>Department: </b>".$departmentCode."<br><b>Room No.: </b> H-".$hostel." ".$room."<br><b>Phone Number: </b>".$phoneNumber."<br><b>Email: </b>".$emailId."<br><b>Post Applying for: </b><br>&nbsp;&nbsp;&nbsp;&nbsp;1.".$post1."<br><br><hr><font size=2px color='#555'>This is a system generated mail. Please do not reply on this mail.</font>";

    $mail_sent= mail($to, $subject, $message, $headers);
    }
  if($sql){
   echo "<center style='text-align: center;color: white;text-align: center;display: block;font-size: 22px;padding: 20px;background-color: rgba(204, 37, 37, 0.8)' >success</center></div></div>";

?>

<?php
 
}else{
  //echo "<p>Filling of nominations has been closed.<br>If you have already filled the Nomination. You will be contacted after Mid-Sems for the Interview.<br><br>Thanks,<br>SARC Team.</p>";
  
  
  
  $query="SELECT code,name FROM Department";
  $sql=mysql_query($query) or die(mysql_error());
?>
    <p style="text-align:center; font-size:20px">Kindly fill in the information to apply for SARC Core-Team-Member post for 2014-15</p>    
    </div>
                </div>
  
    <div id="volunteer_form" style="
    width: 100%;
    padding-left: 100px;
">
  <form enctype="multipart/form-data" id="nomination" name="nomination" method="post"  action="nomination.php?q=apply" >
    <label>Name:</label>
    <div class="input" id="name"  >
      <input id="firstName"  style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" class="validate[required]" name="firstName" type="text"/>
      <input id="middleName" style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" name="middleName" type="text"/>
      <input id="lastName" style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" name="lastName" type="text"/>
      <span class="hint">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="hint">Middle Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="hint">Last Name</span>
    </div>
    <label>Roll No.</label>
    <div class="input" >
      <input id="roll" style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" class="validate[required,minSize[8],maxSize[11]]" name="roll" type="text"/>
    
    </div>
    <label>Hostel No.</label>
    <div class="input">
      <input id="hostel" style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" name="hostel" class="validate[required,custom[integer],max[16],min[1]]" type="text"/>
    
    </div>
    <label>Room No.</label>
    <div class="input">
      <input class="validate[required]" id="room" style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" name="room" type="text"/>
    
    </div>
    <label>Program:</label>
    <div class="input">
      <select class="validate[required]" name="programCode" id="program">
        <option value="UG">UG</option>
          <option value="PG">PG</option>
      </select>
    </div>
    <label>Department:</label>
    <div class="input">
      <select class="validate[required]" name="departmentCode" id="department">
<?php
while($dept=mysql_fetch_array($sql)) {
?>
        <option value="<?php echo $dept['code'];?>"><?php echo $dept['name'];?></option>
<?php
}
?>
      </select>
    </div>
    <label>Contact Number:</label>
    <div class="input">
      <input id="phoneNumber" style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" class="validate[required,custom[integer],minSize[10],maxSize[10]]" name="phoneNumber" type="text"/>
    </div>
    <label>Email ID:</label>
    <div class="input">
      <input id="emailId" style="
    border: 1px solid rgb(255, 255, 255);
    color: white;
" class="validate[required,custom[email]]" name="emailId" type="text"/>
      <span class="hint">Preferebly personal ID</span>
    </div>
       
    <label>Post Applying For:</label>
    <div class="input" >
      Preference &nbsp;
      <select class="validate[required]" id='post1' name='post1' style="width:200px">
        <option value=''>Select</option>
        <option value='category A'>Category A</option>
        <option value='category B'>Category B</option>
        <option value='category AB'>Both category</option>
          </select>
     </div>
     <!--<div class="input hidden" id="divPost2">     
     Second Preference &nbsp;
      <select class="validate[required]" id='post2' name='post2' style="width:200px">
      <option value=''>Select</option>
       <option value='ASMP'>ASMP</option>
        <option value='Events'>Events</option>
        <option value='Operations'>Operations</option>
        <option value='HDA'>Hostel & Department Alumni Affairs</option>
        <option value='Publi'>Public Relations</option>
        <option value='Web&Design'>Web & Design</option>
         
      </select>
          </div>
          
          <div class="input hidden" id='divPost3'>
      Third Preference &nbsp;
            <select class="validate[required]" id='post3' name='post3' style="width:200px">
         <option value=''>Select</option>
        <option value='ASMP'>ASMP</option>
        <option value='Events'>Events</option>
        <option value='Operations'>Operations</option>
        <option value='HDA'>Hostel & Department Alumni Affairs</option>
        <option value='Publi'>Public Relations</option>
        <option value='Web&Design'>Web & Design</option>
         
      </select>
          
         
    </div>
          <div class="input">
            <span class="hint" style="cursor:pointer; color:blue" id="add"><br />Add another Preference</span>
          </div>-->
            <label>Statement of Purpose:</label>
          <div class="input">Mail your SOP to sarc@iitb.org before 12 Februrary 2014
          <!--<textarea id="sop" class="validate[required,minSize[100]]" cols="35" rows="10" name="sop"></textarea><input type="file" name="uploaded_file" id="uploaded_file" required = "required" />-->
            <span class="hint"><br />
            SOP guidelines:<br />
            <div>
              <p>1. You can mention specific portfolios according to your interest (preference-wise)<br />
              2. Your skills and motivation for working in SARC<br />
              3. Vision of enhancing student alumni relations and reconnecting alumni with institute<br />
              4. Your personal benefits</p>
            </div>
          </div>
          <div class='input' style='font-size: 18px;'>
          <input id="eligibility" style="
    border: 1px solid rgb(255, 255, 255);
	font-size:25px;
    color: white;
" class="validate[required]" type="checkbox" name='verify'> &nbsp;I certify that I am eligible for the post I am applying for. To see the eligibility criteria <a href='nomination.php' target="_blank">click here</a>.
             </div>

   <center> <div class="input" >
<div id="submitbutton" style="
    color: white;
	text-align: center;
display: block;


    font-weight: bold;
    padding: 10px;
background-color: rgba(53, 142, 251, 0.8);
color: #FFF;
    width: 100px;
    margin: 0 auto;
    margin-bottom: 15px;
" onClick="submit_nomination()">Submit</div>  </div>

  </form>
  
    
<?php
              
}
     
?>
              </div>
			  