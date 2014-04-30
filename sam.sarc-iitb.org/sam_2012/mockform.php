<html>
<head>
  <style rel="stylesheet" type="text/css">
 
 body{
	background-color: #EEE;
	
  			/*font-family: Open Sans sans-serif ; font-size: 14px; 
			  src: url( css/OpenSans.ttf ) format("truetype");  */ 
			 font-family: Open Sans, Tahoma, Verdana, Arial, sans-serif;
			 color:#362220;
			 font-size: 14px;
			 
		
}
 
  h1,h4{
   
    width: 80%;
    
  }
  
  dl{
    width: 40%;
    margin: 0 35% 0 25%;
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
   
  }
  p#footer{
    margin: 0% 5% 3% 5%;
    clear: both;
    padding-top: 20px;
  }
  p a{    
    
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
  
  <h1>Mock Interview Form </h1>
  
  <p > </p>
  <br/>
  <dl>  
  <dt><b> Time:</b><br/></dt>
    <dd> 10:00 AM to 4:PM <br/>
  6<sup>th</sup> October - 7<sup>th</sup> October<br/>
  </dd>
  <dt><b> Venue:</b><br/></dt>
  <dd>IC - 4<br/>
  
  </dd>
  </dl>

  <form id="student_registration" name="student_registration" action="registration.php" method="post" onsubmit="return validate()">
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
    <label>Year<span class="asterix">*</span></label>
    <div class="input">
      <select name="departmentCode" id="department">
     <option value="3">3rd year</option>
     <option value="4">4th year</option>
     <option value="5">5th year</option>
    <label>Department<span class="asterix">*</span></label>
    <div class="input">
      <select name="departmentCode" id="department">
        <option value="AE">Aerospace Engineering</option>
        <option value="AN">Animation</option>
        <option value="GP">Applied Geophysics</option>
        <option value="SI">Applied Statistics and Informatics</option>
        <option value="BM">Bio-Medical Engineering</option>
        <option value="BT">Bio-Technology</option>
        <option value="BS">Biosciences & Bioengineering</option>
        <option value="ES">Centre for Environmental Science & Engineering</option>
        <option value="NT">Centre for Research in Nano Technology and Sciences</option>
        <option value="GNR">Centre of Studies in Resources Engineering</option>
        <option value="CL">Chemical Engineering</option>
        <option value="CH">Chemistry</option>
        <option value="CE">Civil Engineering</option>
        <option value="CS">Computer Science & Engineering</option>
        <option value="CR">Corrosion Science & Engineering</option>
        <option value="TD">CTARA</option>
        <option value="GS">Earth Sciences</option>
        <option value="ET">Educational Technology</option>
        <option value="EE">Electrical Engineering</option>
        <option value="EN">Energy Science and Engineering</option>
        <option value="EP">Engineering Physics</option>
        <option value="GE">General</option>
        <option value="HS">Humanities & Social Sciences</option>
        <option value="ID">Industrial Design Centre</option>
        <option value="IE">Industrial Engineering & Operations Research</option>
        <option value="IN">Interaction Design</option>
        <option value="MS">Materials Science</option>
        <option value="MMM">Materials, Manufacturing and Modelling</option>
        <option value="MA">Mathematics</option>
        <option value="ME">Mechanical Engineering</option>
        <option value="MM">Metallurgical Engineering & Materials Science</option>
        <option value="MD">Mobility & Vehicle Design</option>
        <option value="PH">Physics</option>
        <option value="RE">Reliability Engineering</option>
        <option value="IT">School of Information Technology</option>
        <option value="MG">SJM School of Management</option>
        <option value="SC">Systems & Control Engineering</option>
        <option value="VC">Visual Communication</option>
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
  
    <div id="phonathon_interested">
      <label>Department</label>
      <div class="input">
        <select name="preferredDepartmentCode">
                 
                  <option value="AE">Aerospace Engineering</option>
                  <option value="AN">Animation</option>
                  <option value="GP">Applied Geophysics</option>
                  <option value="SI">Applied Statistics and Informatics</option>
                  <option value="BM">Bio-Medical Engineering</option>
                  <option value="BT">Bio-Technology</option>
                  <option value="BS">Biosciences & Bioengineering</option>
                  <option value="ES">Centre for Environmental Science & Engineering</option>
                  <option value="NT">Centre for Research in Nano Technology and Sciences</option>
                  <option value="GNR">Centre of Studies in Resources Engineering</option>
                  <option value="CL">Chemical Engineering</option>
                  <option value="CH">Chemistry</option>
                  <option value="CE">Civil Engineering</option>
                  <option value="CS">Computer Science & Engineering</option>
                  <option value="CR">Corrosion Science & Engineering</option>
                  <option value="TD">CTARA</option>
                  <option value="GS">Earth Sciences</option>
                  <option value="ET">Educational Technology</option>
                  <option value="EE">Electrical Engineering</option>
                  <option value="EN">Energy Science and Engineering</option>
                  <option value="EP">Engineering Physics</option>
                  <option value="GE">General</option>
                  <option value="HS">Humanities & Social Sciences</option>
                  <option value="ID">Industrial Design Centre</option>
                  <option value="IE">Industrial Engineering & Operations Research</option>
                  <option value="IN">Interaction Design</option>
                  <option value="MS">Materials Science</option>
                  <option value="MMM">Materials, Manufacturing and Modelling</option>
                  <option value="MA">Mathematics</option>
                  <option value="ME">Mechanical Engineering</option>
                  <option value="MM">Metallurgical Engineering & Materials Science</option>
                  <option value="MD">Mobility & Vehicle Design</option>
                  <option value="PH">Physics</option>
                  <option value="RE">Reliability Engineering</option>
                  <option value="IT">School of Information Technology</option>
                  <option value="MG">SJM School of Management</option>
                  <option value="SC">Systems & Control Engineering</option>
                  <option value="VC">Visual Communication</option>
                </select>
      </div>
      <label> Preferred Hostel</label>
      <div class="input">
        <select name="Hostel">
          
                  <option value="1">Hostel 1</option>
                  <option value="2">Hostel 2</option>
                  <option value="3">Hostel 3</option>
                  <option value="4">Hostel 4</option>
                  <option value="5">Hostel 5</option>
                  <option value="6">Hostel 6</option>
                  <option value="7">Hostel 7</option>
                  <option value="8">Hostel 8</option>
                  <option value="9">Hostel 9</option>
                  <option value="10">Hostel 10</option>
                  <option value="11">Hostel 11</option>
                  <option value="12">Hostel 12</option>
                  <option value="13">Hostel 13</option>
                  <option value="14">Hostel 14</option>
                  <option value="Tansa">Tansa</option>
        </select>
      </div>
     
      
    </div>
    
    <div class="input">
      <input type="submit" name="registration" value="submit"/>
    </div>
  </form>

</body>
</html>
