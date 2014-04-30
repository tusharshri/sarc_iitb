<?php
require_once('db_connect.php');
if(isset($_POST['firstName'])){
$name=addslashes($_POST['firstName']);
	$rollno=addslashes($_POST['rollno']);
	$departmentCode=addslashes($_POST['departmentCode']);
	$phoneNumber=addslashes($_POST['phoneNumber']);
	$emailId=addslashes($_POST['emailId']);
	$comments=addslashes($_POST['address']);
	$query = "INSERT INTO placement_info (name,rollno, department,phoneNumber, batch, emailId, address) VALUES ('$firstName','$rollno', '$departmentCode','$phoneNumber', '2011', '$emailId', '$comments')";
	$sql = mysql_query($query) or die(mysql_error());
	if($sql){
    echo "success";
	}
}else{
?>
<style type="text/css">

    #left_extra{
        width:200px;
        float:left;
        margin-right:5px;
    }
    #volunteer_form{
        float: left ;
        margin-bottom:25px;
    }
    form{
		width: 500px;
		background-color: #aaa;
	}
	form label{
        color:#222;
		width: 29%;
        margin:8px 10px 0 0;
		float: left;
		clear: both;
		text-align:right;
	}
	form .input{
	    margin-top:10px;
		width: 65%;
		float: right;
		text-align:left;
	}
    #interested span{
        float:left;
        margin-right:10px;
        margin-left:1px
    }
    #interested input{
        float:left;
        margin-top:4px;
    }
	
	form .input input[type=text],form .input input[type=text], form .input select{
		width: 60%;
	}
    #reg_thanks{
        margin-left:10px;
        color:#222;
    }
	#submitbutton{
		float:left;
	}
	.hint{
		clear:both;
	}
</style>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<script src="js/jquery-1.6.min.js" type="text/javascript">
        </script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
		<script>
		
		jQuery(document).ready(function(){
                jQuery("#placement_info").validationEngine();
            });
            
		</script>
        
<div id="content1">
   <h2>Registrations for Networking Sessions at SAM 2011</h2>
<?php
	$query="SELECT code,name FROM Department";
	$sql=mysql_query($query) or die(mysql_error());
?>
	<div id="info" style="border:solid 1px #999; padding:10px">
		<b>Please Note</b>
		<ul>
			<li>Registration is mandatory for obtaining incentive points.</li>
			<li>Attending one session will fetch you <b>1.5 incentive points</b>. That makes a total of 6 points for four sessions.</li>
			<li>You will be awarded points only for the sessions you attend.</li>
		</ul>
	</div>
    <p></p>		
	
    <div id="volunteer_form">
	<form id="placement_info" name="placement_info" method="post">
		<label>Name:</label>
		<div  class="input" id="name">
			<input  class="validate[required]" id="firstName" name="firstName" type="text"/>
			</div>
			<label>Roll No.:</label>
		<div class="input" id="rollno">
			<input class="validate[required]" id="rollno" name="rollno" type="text"/>
			</div>
		<label>Department:</label>
		<div class="input">
			<select class="validate[required]" name="departmentCode" id="department">
<?php
while($dept=mysql_fetch_array($sql)) {
?>
				<option  value="<?php echo $dept['code'];?>"><?php echo $dept['name'];?></option>
<?php
}
?>
			</select>
		</div>
		<label>Contact Number:</label>
		<div class="input">
			<input class="validate[required]" id="phoneNumber" name="phoneNumber" type="text"/>
		</div>
		<label>Email ID:</label>
		<div class="input">
			<input class="validate[required]" id="emailId" name="emailId" type="text"/>
			<span class="hint">Preferebly Gmail ID</span>
		</div>
        <label>Permanent Address</label>
                <div class="input">
                    <textarea class="validate[required]" rows="5" cols="35" name="address" id="comment"></textarea>
                </div>

		<div class="input">
			<div  id="submitbutton" name="submit" class="submit_placement">Submit</div>		</div>

	</form>
    </div>
	</div>
<?php
}
?>


