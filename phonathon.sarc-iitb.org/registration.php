<html>
<head>
  <style rel="stylesheet" type="text/css">
  body{
    margin:0px;
    height: 1400px;
    width: 100%;
    background: #ffffff url("bg_phone.png") no-repeat bottom right;
    font-size: 16px;
    font-family: Gothic, Helvetica;
  }
  #header{
    background: #ffffff url("bg_top.jpg") repeat-x top;
    color: #ffffff;
  }
  h1,h4{
    text-align: center;
    width: 80%;
    color: #C10;
  }
  p#intro{
    text-align: center;
    width: 70%;
    margin: 0 25% 0 5%;
  }
  p#error{
    text-align: center;
    width: 70%;
    margin: 0 25% 0 5%;
    color: red;
  }

  form{
    margin-top: 2%;
    width: 800px;
    z-index: 10;
  }
  form label{
    width: 39%;
    float: left;
    clear: both;
    text-align:right;
    padding: 7px 1px;
  }
  form .input{
    width: 60%;
    float: right;
    text-align:left;
    padding: 7px 1px;
  }
  form .input #firstName,form .input #middleName,form .input #lastName,form #name .hint{
    width: 32.1%;
  }
  form #name .hint{
    width: 30%;
    float: right;
  }
  form .input input[type=text],form .input input[type=text], form .input select,  form .hint{
    width: 100%;
  }
  form .asterix{
    font-size: 15px;
    color: red;
  }
  table.freeslot th, table.freeslot td{
    width: 160px !important;
    line-height: 15px;
    font-size: 13px;
    text-align: center;
  }
  table.freeslot{
    float:left;
  }
  div#reg_thanks{
    margin-left: 10%;
    margin-top: 10%;
  }
  .invalid{
    border: 2px red solid;
    background-color: #FF9;
  }
  .hint{
    font-size: 13px;
    color: #aaa;
  }
  p#footer{
    margin: 0% 5% 3% 5%;
    clear: both;
    padding-top: 20px;
  }
  p a{    
    color: #C10;
  }
  </style>
  <script type="text/javascript">
function validEmail (email) {
  var invalidChars = " /:,;";
  if (email == "") {
    return true;
  }
  for (var k=0; k<invalidChars.length; k++) {
    var badChar = invalidChars.charAt(k);
    if (email.indexOf(badChar) > -1) {
      return false;
    }
  }
  var atPos = email.indexOf("@",1);
  if (atPos == -1) {
    return false;
  }
  if (email.indexOf("@",atPos+1) != -1) {
    return false;
  }
  var periodPos = email.indexOf(".",atPos);
  if (periodPos < atPos+2) {
    return false;
  }
  if (periodPos+3 > email.length) {
    return false;
  }
  return true;
}

function onlyText(text) {
  var allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ. '";
  for (var i = 0; i<text.length; i++) {
    var c = text.charAt (i);
    if (allowed.indexOf(c) == -1) return false;
  }
  return true;
}

function phonenum(phnum) {
  var allowed = "0123456789-+ ";
  for (var i = 0; i<phnum.length; i++) {
    var c = phnum.charAt (i);
    if (allowed.indexOf(c) == -1) return false;
  }
  return true;
}

function onlyTextNumSym(text) {
  var allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ. 0123456789-,./#():'";
  for (var i = 0; i<text.length; i++) {
    var c = text.charAt (i);
    if (allowed.indexOf(c) == -1) return false;
  }
  return true;
}

function rollnum(rollnum) {
  var allowed = "0123456789dD";
  for (var i = 0; i<rollnum.length; i++) {
    var c = rollnum.charAt (i);
    if (allowed.indexOf(c) == -1) return false;
  }
  if(rollnum.length>11 || rollnum.length<8) return false;
  return true;
}

function isclass(classyr) {
  var allowed = "0123456789";
  for (var i = 0; i<classyr.length; i++) {
    var c = classyr.charAt (i);
    if (allowed.indexOf(c) == -1) return false;
  }
  if(classyr.length!=4 || classyr < 2012) return false;
  return true;
}

function freeslot(freeslot){
  if(freeslot=='') {
    alert("Please give your Free Slot information");
    return false;  
  }
  return true;
}

function checkForm(elements,requirements) {
  var errors = new Array();
  for (var i=0; i<elements.length; i++) {
    var element = document.getElementById(elements[i]);
    var value = element.value;
    var required = requirements[i].split(" ");
    errors.push("");
    for (var j in required) {
      switch(required[j]) {
        case "reqd":
          if (value=="") errors[i]+=" empty";
          break;
        case "onlynum":
          if (isNaN(value)) errors[i]+=" onlynuminvalid";
          break;
        case "onlytext":
          if (! onlyText(value)) errors[i]+=" onlytextinvalid";
          break;
        case "compare":
          var otherid = elements[i].substring(0,elements[i].length - 1);
          var other = document.getElementById(otherid);
          var value2 = other.value;
          if (value != value2) errors[i]+=" compareinvalid";
          break;
        case "onlytextnumsym":
          if (! onlyTextNumSym(value)) errors[i]+=" onlytextnumsyminvalid";
          break;
        case "email":
          if (! validEmail(value)) errors[i]+=" emailinvalid";
          break;
        case "rollnum":
          if (! rollnum(value)) errors[i]+=" rollnuminvalid";
          break;
        case "isclass":
          if (! isclass(value)) errors[i]+=" classinvalid";
          break;
        case "phonenum":
          if (! phonenum(value)) errors[i]+=" phonenuminvalid";
          break;
        case "freeslot":
          if (! freeslot(value)) errors[i]+=" freeslotinvalid";
          break;
        default:
          if (required[j].indexOf("between") > -1) {
            var l = required[j].indexOf("between");
            var lowerlimit = parseInt(required[j].substring(0,l));
            var upperlimit = parseInt(required[j].substring(l+7));
            if (value.length < lowerlimit) errors[i]+=" lengthless";
            if (value.length > upperlimit) errors[i]+=" lengthmore";
          }
      }
    }
  }
  return errors;
}
    function serializeSlots(){
      var freeslots = new Array();
      var slots=document.getElementsByName("slot");
      for(var i=0; i < slots.length; i++){
        var slot = slots[i];
        if(slot.checked) freeslots.push(slot.id);
      }
      document.getElementsByName("freeSlot")[0].value=freeslots;    
    }

    function validate(){
      serializeSlots();
      var elements = new Array();
      var requirements = new Array();
      elements.push("firstName");
      elements.push("middleName");
      elements.push("lastName");
      elements.push("rollNumber");
      elements.push("class");
      elements.push("phoneNumber");
      elements.push("emailId");
      elements.push("freeSlots");
      requirements.push("reqd onlytext");
      requirements.push("onlytext");
      requirements.push("reqd onlytext");
      requirements.push("reqd rollnum");
      requirements.push("reqd isclass");
      requirements.push("reqd phonenum");
      requirements.push("reqd email");
      requirements.push("reqd freeslot");
      
      var errors = checkForm(elements,requirements);
      var valid = true;
      for(var i in errors) {
        var element = document.getElementById(elements[i]);
        element.className = element.className.replace("invalid","")
        if (errors[i] == "") {
          element.className += "";
        }
        else {
          element.className += " invalid";
          valid = false;
        }
      }
      return valid;
    }
  </script>
</head>
<body>
  <div id="header">
    Registration for Phonathon
  </div> 
<?php

mysql_connect("admin.sarc-iitb.org","sarciitborg","j@g@njyoti");
mysql_select_db("sarc_iitb");

function my_error(){
  return "<p id='error'>There seemed to be some problem with your registration. <br/> If error persists, contact us at sarc@iitb.ac.in<br/><p>";
}

if(isset($_POST['registration'])){
  
  require_once('recaptchalib.php');
  $privatekey = "6Lc2nsYSAAAAAOvmuUVy4Pi-n40pgurKSM1scu9Y";
  $resp = recaptcha_check_answer ($privatekey,
                            $_SERVER["REMOTE_ADDR"],
                            $_POST["recaptcha_challenge_field"],
                            $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
  // What happens when the CAPTCHA was entered incorrectly
  die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . my_error());
  } else {
  
  $firstName=addslashes($_POST['firstName']);
  $middleName=addslashes($_POST['middleName']);
  $lastName=addslashes($_POST['lastName']);
  $name = str_replace("  "," ","$firstName $middleName $lastName");
  $rollNumber=addslashes($_POST['rollNumber']);
  $class=addslashes($_POST['class']);
  $departmentCode=addslashes($_POST['departmentCode']);
  $phoneNumber=addslashes($_POST['phoneNumber']);
  $emailId=addslashes($_POST['emailId']);
  $phonathonthistime=18;
  /*  
  $phonathon=addslashes($_POST['phonathon']);
  $asmp=addslashes($_POST['asmp']);
  $sam=addslashes($_POST['sam']);
  $webdesign=addslashes($_POST['webdesign']);
  */
  $freeSlot=addslashes($_POST['freeSlot']);
  $preferredDepartmentCode=addslashes($_POST['preferredDepartmentCode']);
  $preferredHostel=addslashes($_POST['preferredHostel']);
  $query = "INSERT INTO Student (firstName,middleName,lastName,rollNumber,class,departmentCode,phoneNumber,emailId) VALUES ('$firstName','$middleName','$lastName','$rollNumber','$class','$departmentCode','$phoneNumber','$emailId')";
  $sql = mysql_query($query) or die(my_error());
  $studentId=mysql_insert_id();
  //if($phonathon=='on'){
    $query2="INSERT INTO PhonathonVolunteer (studentId,freeSlot,preferredDepartmentCode,preferredHostel,phonathon) VALUES ('$studentId','$freeSlot','$preferredDepartmentCode','$preferredHostel','$phonathonthistime')";
    $sql2=mysql_query($query2) or die(my_error());
  //}
  /*
  if($asmp=='on')$asmp=1; else $asmp=0;
  if($sam=='on')$sam=1; else $sam=0;
  if($webdesign=='on')$webdesign=1; else $webdesign=0;
  $query3="INSERT INTO StudentInterest (studentId,asmp,sam,webdesign) VALUES ('$studentId','$asmp','$sam','$webdesign')";
  $sql3=mysql_query($query3) or die(my_error());
  */
  if($sql){
?>
    <div id="reg_thanks">
      <?php echo "Hi ".$name;?><br/>
      <p>Thank you for your enthusiasm in being a volunteer for SARC. We'll contact you soon regarding your interests. </p>
    </div>
<?php
  }
}
}else{
?>
  <form id="student_registration" name="student_registration" action="registration.php" method="post" onSubmit="return validate()">
    <label>Name</label>
    <div class="input" id="name">
      <input id="firstName" name="firstName" type="text"/> 
      <input id="middleName" name="middleName" type="text"/>
      <input id="lastName" name="lastName" type="text"/> 
      <br/>
      
      <span class="hint">Last Name<span class="asterix">*</span></span>
      <span class="hint">Middle Name</span>
      <span class="hint">First Name<span class="asterix">*</span></span>
    </div>
    <label>Roll Number<span class="asterix">*</span></label>
    <div class="input">
      <input id="rollNumber" name="rollNumber" type="text"/>
    </div>
    <label>Class<span class="asterix">*</span></label>
    <div class="input">
      <input id="class" name="class" type="text"/>
    <span class="hint">Passing out year</span>
    </div>
    <label>Department<span class="asterix">*</span></label>
    <div class="input">
      <select name="departmentCode" id="department">
<?php
$query="SELECT code,name FROM Department ORDER BY name";
$deptList1=mysql_query($query) or die(my_error());
while($dept=mysql_fetch_array($deptList1)) {
  if($dept['code']!='NN'){
?>
        <option value="<?php echo $dept['code'];?>"><?php echo $dept['name'];?></option>
<?php
  }
}
?>
      </select>
    </div>
    <label> Contact Number<span class="asterix">*</span></label>
    <div class="input">
      <input id="phoneNumber" name="phoneNumber" type="text"/>
    </div>
    <label> Email ID<span class="asterix">*</span></label>
    <div class="input">
      <input id="emailId" name="emailId" type="text"/>
      <span class="hint">Prefer gmail ID</span>
    </div>
    <!--
    <label> Interested in:</label>
    <label> Phonathon:</label>
    <div class="input">
      <input type="checkbox" name="phonathon" checked="checked">
    </div>
    <label> SAM:</label>
    <div class="input">
      <input type="checkbox" name="sam" checked="checked">
    </div>
    <label> ASMP:</label>
    <div class="input">
      <input type="checkbox" name="asmp" checked="checked">
    </div>
    <label> Web &amp; Designing:</label>
    <div class="input">
      <input type="checkbox" name="webdesign" checked="checked">
    </div>
    -->
    <div id="phonathon_interested">
      <label>  Hostel</label>
      <div class="input">
        <select name="preferredHostel">
          <option value="NN">Any</option>
        <?php
        for($i=1;$i<=14;$i++){
        ?>
          <option value="<?php echo $i;?>">Hostel <?php echo $i;?></option>
        <?php
        }
        ?>
          <option value="Tansa">Tansa</option>
        </select>
      </div>
	  <label>Have you attended a phonathon before?</label>
	  <div class="input">
        <select name="preferredHostel">
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </div>
      <label style="padding-top: 20px;"> Free Slots</label>
      <div class="input" id="freeSlot">
        <input type="hidden" name="freeSlot" id="freeSlots"/>
        <!--
        <table class="freeslot">
          <tr><th>Day</th><th>2:00am - 4:30am (A) </th><th> 5:00am - 7:30am (B) </th></tr>
          <tr><th>Mon</th><td><input type="checkbox" name="slot" id="MonA"/></td><td><input type="checkbox" name="slot" id="MonB"/></td></tr>
          <tr><th>Tue</th><td><input type="checkbox" name="slot" id="TueA"/></td><td><input type="checkbox" name="slot" id="TueB"/></td></tr>
          <tr><th>Wed</th><td><input type="checkbox" name="slot" id="WedA"/></td><td><input type="checkbox" name="slot" id="WedB"/></td></tr>
          <tr><th>Thu</th><td><input type="checkbox" name="slot" id="ThuA"/></td><td><input type="checkbox" name="slot" id="ThuB"/></td></tr> 
          <tr><th>Fri</th><td><input type="checkbox" name="slot" id="FriA"/></td><td><input type="checkbox" name="slot" id="FriB"/></td></tr>
          <tr><th>Sat</th><td><input type="checkbox" name="slot" id="SatA"/></td><td><input type="checkbox" name="slot" id="SatB"/></td></tr> 
          <tr><th>Sun</th><td><input type="checkbox" name="slot" id="SunA"/></td><td><input type="checkbox" name="slot" id="SunB"/></td></tr>
        </table>
        -->
        <!--
        <table class="freeslot">
          <tr><th>Day</th><th>11:00am - 12:30pm (C) </th><th> 1:30pm - 3:00pm (D) </th><th> 3:30pm - 5:00pm (E) </th></tr>
          <tr><th>Sat</th><td><input type="checkbox" name="slot" id="SatC"/></td><td><input type="checkbox" name="slot" id="SatD"/></td><td><input type="checkbox" name="slot" id="SatE"/></td></tr>
          <tr><th>Sun</th><td><input type="checkbox" name="slot" id="SunC"/></td><td><input type="checkbox" name="slot" id="SunD"/></td><td><input type="checkbox" name="slot" id="SunE"/></td></tr>
        </table>
        -->
        <table class="freeslot">
          <tr><th>Week Ends</th>
          <th>2:00pm - 3:30pm <br>(A) </th><th> 3:30pm - 5:00pm<br> (B) </th><th> 5:00pm - 6:30pm<br> (C) </th><th> 6:30pm - 8:00pm<br> (D) </th></tr>
          <tr>
            <th>8<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="8A"/></td><td><input type="checkbox" name="slot" id="8B"/></td><td><input type="checkbox" name="slot" id="8C"/></td><td><input type="checkbox" name="slot" id="8D"/></td></tr>
          <tr>
            <th>9<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="9A"/></td><td><input type="checkbox" name="slot" id="9B"/></td><td><input type="checkbox" name="slot" id="9C"/></td><td><input type="checkbox" name="slot" id="9D"/></td></tr>
			<tr>
            <th>15<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="15A"/></td><td><input type="checkbox" name="slot" id="15B"/></td><td><input type="checkbox" name="slot" id="15C"/></td><td><input type="checkbox" name="slot" id="15D"/></td></tr>
            <tr>
            <th>16<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="16A"/></td><td><input type="checkbox" name="slot" id="16B"/></td><td><input type="checkbox" name="slot" id="16C"/></td><td><input type="checkbox" name="slot" id="16D"/></td></tr>
            <tr><th>Week Days</th>
          <th>7:00pm - 8:30pm<br> (A) </th><th> 8:30pm - 10:00pm (B) </th></tr>
          <tr>
            <th>10<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="10A"/></td><td><input type="checkbox" name="slot" id="10B"/></td></tr>
		  <tr>
            <th>11<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="11A"/></td><td><input type="checkbox" name="slot" id="11B"/></td></tr>
          <tr>
            <th>12<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="12A"/></td><td><input type="checkbox" name="slot" id="12B"/></td></tr>
          <tr>
            <th>13<sup>th</sup> Mar</th>
            <td><input type="checkbox" name="slot" id="13A"/></td><td><input type="checkbox" name="slot" id="13B"/></td></tr>
          <tr>
            <th>14<sup>th</sup> Mar</th><td><input type="checkbox" name="slot" id="14A"/></td><td><input type="checkbox" name="slot" id="14B"/></td></tr>
          
          
        </table>
      </div>
    </div>
    <label></label>
    <div class="input">
    <?php
          require_once('recaptchalib.php');
          $publickey = "6Lc2nsYSAAAAADvvdsmK0oLTB_8kJRy4GdPDA45v"; 
          echo recaptcha_get_html($publickey);
        ?>
    </div>
    <label></label>
    <div class="input">
      <input type="submit" name="registration" value="submit"/>
    </div>
  </form>
<?
}
?>

</body>
</html>