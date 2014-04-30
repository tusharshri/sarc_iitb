<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="alumnus.css" />
		<link language="css" type="text/css" rel="stylesheet" href="jquery-ui.css" />
		<script language="javascript" type="text/javascript" src="addonload.js"></script>
		<script language="javascript" type="text/javascript" src="jquery.js"></script>
		<script language="javascript" type="text/javascript" src="alumnus.js"></script>
	</head>
    <body>
        <div id="flash-saved"><span>Your changes have been Saved!</span></div>
        <div id="content">
<?php

if(isset($_GET['PID']) && isset($_GET['key'])){
    $PID=$_GET['PID'];
    $key=$_GET['key'];
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
    
    $alum = $DBConn->get_array("SELECT * FROM alumnus_visitedlinks WHERE `key` = ?", array($key));
    $alum = $alum[0];
    if($PID==$alum['PID']){
?>
    <form>
    <input type="hidden" name="PID" value="<?php echo $PID;?>"/>
    <input type="hidden" name="key" value="<?php echo $key;?>"/>
    <h3><a href="#">Basic Details</a></h3>
	<div>
		<table>
			<tr>
<?php
	$basicdetails = $DBConn->get_array("SELECT * FROM alumnus_basicdetail WHERE PID=?", array($PID));
	$basicdetails = $basicdetails[0];
?>
				<td>Profile ID</td>
				<td><?php echo $basicdetails['profile_id'] ?></td>
			</tr>
            <tr>
			    <td>First Name</td>
			    <td><input type="text" name="firstname" value="<?php echo $basicdetails['firstname'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Middle Name</td>
			    <td><input type="text" name="middlename" value="<?php echo $basicdetails['middlename'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Last Name</td>
			    <td><input type="text" name="lastname" value="<?php echo $basicdetails['lastname'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Nick Name</td>
			    <td><input type="text" name="nickname" value="<?php echo $basicdetails['nickname'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Department</td>
			    <td><input type="text" name="department" value="<?php echo $basicdetails['department'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Class</td>
			    <td><input type="text" name="class" value="<?php echo $basicdetails['class'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Degree</td>
			    <td><input type="text" name="degree" value="<?php echo $basicdetails['degree'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Hostel</td>
			    <td><input type="text" name="hostel" value="<?php echo $basicdetails['hostel'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Date of Birth (yyyy-mm-dd)</td>
			    <td><input type="text" name="dob" class="date" value="<?php if ($basicdetails['dob'] != "0000-00-00") echo date("Y-m-d", strtotime ($basicdetails['dob'])) ?>" /></td>
		    </tr>
        </table>
        <input type="button" value="Submit" onclick="SubmitBasicDetails()" />
    </div>

    <h3><a href="#">Contact Details</a></h3>
	<div>
		<table id="contactdetails">
<?php
	$contactdetails = $DBConn->get_array("SELECT * FROM alumnus_contactdetail WHERE PID=?", array($PID));
	$contactdetails = $contactdetails[0];
?>  
			<tr>
                <td>Address</td>
				<td><input type="text" name="haddress" value="<?php echo nl2br($contactdetails['address']) ?>" /></td>
			</tr>
            <tr>
                <td></td>
				<td><input type="text" name="haddress2" value="<?php echo nl2br($contactdetails['address2']) ?>" /></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="hcity" value="<?php echo $contactdetails['city'] ?>" /></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><input type="text" name="hcountry" value="<?php echo $contactdetails['country'] ?>" /></td>
			</tr>
			<tr>
				<td>Postal Code</td>
				<td><input type="text" name="hpostal_code" value="<?php echo $contactdetails['postal_code'] ?>" /></td>
			</tr>
            <tr>
				<td colspan="2">
					Phone Numbers
				</td>
			</tr>
<?php
	$phonenums = $DBConn->get_array("SELECT * FROM alumnus_phonenum WHERE PID=? AND phnum!=''", array($PID));
	foreach ($phonenums as $phonenum) {
?>
			<tr>
				<td><input type="text" value="<?php echo $phonenum['phnum_detail'] ?>" /></td>
				<td><input class="phnum" type="text" value="<?php echo $phonenum['phnum'] ?>" /></td>
			</tr>
<?php
	}
?>
            <tr>
				<td><input type="text" /></td>
				<td><input class="phnum" type="text" /></td>
			</tr>
            <tr>
				<td colspan="2">
					Email IDs
				</td>
			</tr>
<?php
	$emailids = $DBConn->get_array("SELECT * FROM alumnus_email WHERE PID=? AND email!=''", array($PID));
	foreach ($emailids as $emailid) {
?>
            <tr>
				<td><input type="text" value="<?php echo $emailid['email_detail'] ?>" /></td>
				<td><input class="email" type="text" value="<?php echo $emailid['email'] ?>" /></td>
			</tr>
<?php
	}
?>
            <tr>
				<td><input type="text" value="" /></td>
				<td><input class="email" type="text" value="" /></td>
			</tr>
        </table>
        <input type="button" value="Submit" onclick="SubmitPhoneNums();SubmitEmailIDs();SubmitContactDetails()">
    </div>

    <h3><a href="#">Professional Details</a></h3>
	<div>
		<table>
<?php
	$contactdetails = $DBConn->get_array("SELECT * FROM alumnus_profdetail WHERE PID=?", array($PID));
	$contactdetails = $contactdetails[0];
?>
		    <tr>
                <td>Company</td>
			    <td><input type="text" name="company" value="<?php echo $contactdetails['company'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Designation</td>
			    <td><input type="text" name="designation" value="<?php echo $contactdetails['designation'] ?>" /></td>
		    </tr>
		    <tr>
			    <td>Address</td>
			    <td><input type="text" name="waddress1" value="<?php echo $contactdetails['address1'] ?>" /></td>
		    </tr>
            <tr>
			    <td></td>
			    <td><input type="text" name="waddress2" value="<?php echo $contactdetails['address2'] ?>" /></td>
		    </tr>
            <tr>
			    <td>City</td>
			    <td><input type="text" name="wcity" value="<?php echo $contactdetails['city'] ?>" /></td>
		    </tr>
            <tr>
			    <td>State</td>
			    <td><input type="text" name="wstate" value="<?php echo $contactdetails['state'] ?>" /></td>
		    </tr>
            <tr>
			    <td>Country</td>
			    <td><input type="text" name="wcountry" value="<?php echo $contactdetails['country'] ?>" /></td>
		    </tr>
            <tr>
			    <td>Postal Code</td>
			    <td><input type="text" name="wpostal_code" value="<?php echo $contactdetails['postal_code'] ?>" /></td>
		    </tr>
        </table>
        <input type="button" value="Submit" onclick="SubmitProfDetails()">
    </div>
    </form>

<?php      
    }else{
        echo "Invalid Access!<br/>Contact:<a href='mailto:sarc@iitb.ac.in'>sarc@iitb.ac.in</a>";
    }
}
?>


Keep in touch using the following links!

    </div>
    </body>
</html>
