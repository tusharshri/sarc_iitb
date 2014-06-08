<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	$user = $_SESSION['user'];
	
	$PID = $_GET['PID'];
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
    $alum = $DBConn->get_array("SELECT * FROM alumnus_basicdetail WHERE PID = ?", array($PID));
    if (count ($alum) == 0) header ("Location: alumni.php");

	$alum = $DBConn->get_array("SELECT * FROM allotment WHERE PID = ?", array($PID));	
	$_SESSION['PID'] = $PID;
    if(count($alum)>0){
	    $alum = $alum[0];
	    $status = $alum['status'];
    }else{
        $status = "Not Alloted";
    }
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/alumnus.css" />
		<link language="css" type="text/css" rel="stylesheet" href="css/jquery-ui.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery-ui.js"></script>
		<script language="javascript" type="text/javascript" src="js/ui.timepickr.js"></script>
		<script language="javascript" type="text/javascript" src="js/alumnus.js"></script>
	</head>
	<body id="body">
		<div id="smenu">
			<ul>
				<li class="back" onclick="back()"><< Back to All Alumni</li>
				<li class="selected">Details</li>
<?php
	if ($status == "Not Attempted") {
?>
				<li onclick="attempt()" id="lock">Attempt</li>
<?php
	}
	else if ($status == "Ongoing") {
?>
				<li onclick="lock()" class="unlocked" id="lock">Lock the Alumnus Profile</li>
<?php
	}
	else {
?>
				<li class="locked" id="lock">Alumnus Profile Locked</li>
<?php
	}
?>
			</ul>
		</div>
		<div id="content">
			<form>
			<div id="leftboxes">
				<div id="main" class="block">
					<div class="blocktopic">Alumnus Details</div>
					<div class="blockcontent">
					<div id="accordion">
						<h3><a href="#">Basic Details</a></h3>
						<div>
							<table>
								<tr>
<?php
	$basicdetails = $DBConn->get_array("SELECT * FROM alumnus_basicdetail WHERE PID=?", array($PID));
	$basicdetails = $basicdetails[0];
?>
									<td>Profile ID</td>
									<td><?php echo $basicdetails['PID'] ?></td>
								</tr>
<?php
	if ($status != "Ongoing") {
?>
								<tr>
									<td>First Name</td>
									<td><?php echo $basicdetails['firstname'] ?></td>
								</tr>
								<tr>
									<td>Middle Name</td>
									<td><?php echo $basicdetails['middlename'] ?></td>
								</tr>
								<tr>
									<td>Last Name</td>
									<td><?php echo $basicdetails['lastname'] ?></td>
								</tr>
								<tr>
									<td>Department</td>
									<td><?php echo $basicdetails['department'] ?></td>
								</tr>
								<tr>
									<td>Class</td>
									<td><?php echo $basicdetails['class'] ?></td>
								</tr>
								<tr>
									<td>Degree</td>
									<td><?php echo $basicdetails['degree'] ?></td>
								</tr>
								<tr>
									<td>Hostel</td>
									<td><?php echo $basicdetails['hostel'] ?></td>
								</tr>
								<tr>
									<td>Date of Birth</td>
									<td><?php if ($basicdetails['dob'] != "0000-00-00") echo date("m/d/Y", strtotime ($basicdetails['dob'])) ?></td>
								</tr>
<?php
	}
	else {
?>
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
									<td>Date of Birth</td>
									<td><input type="text" name="dob" class="date" value="<?php if ($basicdetails['dob'] != "0000-00-00") echo date("m/d/Y", strtotime ($basicdetails['dob'])) ?>" /></td>
								</tr>
<?php
	}
?>
							</table>
<?php
	if ($status == "Ongoing") {
?>
							<input type="button" value="Submit" onclick="SubmitBasicDetails()" />
<?php
	}
?>
						</div>
						<h3><a href="#">Contact Details</a></h3>
						<div>
							<table id="contactdetails">
								<tr>
<?php
	$contactdetails = $DBConn->get_array("SELECT * FROM alumnus_contactdetail WHERE PID=?", array($PID));
	$contactdetails = $contactdetails[0];
	$time = $DBConn->get_array("SELECT * FROM timezone WHERE country=?",array($contactdetails['country']));
	$time = $time[0];
	if ($status != "Ongoing") {
?>
									<td>Address</td>
									<td><?php echo nl2br($contactdetails['address']) ?></td>
								</tr>
								<tr>
									<td>City</td>
									<td><?php echo $contactdetails['city'] ?></td>
								</tr>
								<tr>
									<td>Country</td>
									<td><?php echo $contactdetails['country'] ?></td>
								</tr>
								<tr>
									<td colspan="2">
										<u>Phone Numbers</u>
										<p>Time there is around </p>
										<?php $pre_time = getdate();
										$pre_time = $pre_time['hours'] + (($pre_time['min'] / 60))/100;
										echo (($time['time_diff']) + $pre_time)%24;
										?>
									</td>
								</tr>
<?php
	}
	else {
?>
									<td>Address</td>
									<td><textarea name="address"><?php echo nl2br($contactdetails['address']) ?></textarea></td>
								</tr>
								<tr>
									<td>City</td>
									<td><input type="text" name="city" value="<?php echo $contactdetails['city'] ?>" /></td>
								</tr>
								<tr>
									<td>Country</td>
									<td><input type="text" name="country" value="<?php echo $contactdetails['country'] ?>" /></td>
								</tr>
								<tr>
									<td colspan="2">
										<u>Phone Numbers</u>
										<p>Time there is around </p>
										<?php $pre_time = getdate();
										$pre_time = $pre_time['hours'] + (($pre_time['min'] / 60))/100;
										echo (($time['time_diff']) + $pre_time)%24;
										?>
									</td>
								</tr>
<?php
	}
	$phonenums = $DBConn->get_array("SELECT * FROM alumnus_phonenum WHERE PID=? AND phnum!=''", array($PID));
	foreach ($phonenums as $phonenum) {
		if ($status != "Ongoing") {
?>
								<tr>
									<td><?php echo $phonenum['phnum_detail'] ?></td>
									<td><?php echo $phonenum['phnum'] ?></td>
								</tr>
<?php
		}
		else {
?>
								<tr>
									<td><input type="text" value="<?php echo $phonenum['phnum_detail'] ?>" /></td>
									<td><input class="phnum" type="text" value="<?php echo $phonenum['phnum'] ?>" /></td>
								</tr>
<?php
		}
	}
	if ($status == "Ongoing") {
?>
								<tr>
									<td><input type="text" /></td>
									<td><input class="phnum" type="text" /></td>
								</tr>
<?php
	}
?>
								<tr>
									<td colspan="2">
										Email IDs
									</td>
								</tr>
<?php
	$emailids = $DBConn->get_array("SELECT * FROM alumnus_email WHERE PID=? AND email!=''", array($PID));
	foreach ($emailids as $emailid) {
		if ($status != "Ongoing") {
?>
								<tr>
									<td><?php echo $emailid['email_detail'] ?></td>
									<td><?php echo $emailid['email'] ?></td>
								</tr>
<?php
		}
		else {
?>
								<tr>
									<td><input type="text" value="<?php echo $emailid['email_detail'] ?>" /></td>
									<td><input class="email" type="text" value="<?php echo $emailid['email'] ?>" /></td>
								</tr>
<?php
		}
	}
	if ($status == "Ongoing") {
?>
								<tr>
									<td><input type="text" value="" /></td>
									<td><input class="email" type="text" value="" /></td>
								</tr>
<?php
	}
?>
							</table>
<?php
	if ($status == "Ongoing") {
?>
							<input type="button" value="Submit" onclick="SubmitPhoneNums();SubmitEmailIDs();SubmitContactDetails()">
<?php
	}
?>
						</div>
						<h3><a href="#">Professional Details</a></h3>
						<div>
							<table>
								<tr>
<?php
	$contactdetails = $DBConn->get_array("SELECT * FROM alumnus_profdetail WHERE PID=?", array($PID));
	$contactdetails = $contactdetails[0];
	if ($status != "Ongoing") {
?>
									<td>Company</td>
									<td><?php echo $contactdetails['company'] ?></td>
								</tr>
								<tr>
									<td>Designation</td>
									<td><?php echo $contactdetails['designation'] ?></td>
								</tr>
<?php
	}
	else {
?>
									<td>Company</td>
									<td><input type="text" name="company" value="<?php echo $contactdetails['company'] ?>" /></td>
								</tr>
								<tr>
									<td>Designation</td>
									<td><input type="text" name="designation" value="<?php echo $contactdetails['designation'] ?>" /></td>
								</tr>
<?php
	}
?>
							</table>
<?php
	if ($status == "Ongoing") {
?>
							<input type="button" value="Submit" onclick="SubmitProfDetails()">
<?php
	}
?>
						</div>
					</div>
					</div>
				</div>
				<div id="research" class="block">
					<div class="blocktopic">Research Checklist</div>
<?php
	$rescheck = $DBConn->get_array("SELECT * FROM alumnus_researchchecklist WHERE PID = ?", array($PID));
	$rescheck = $rescheck[0];
?>
					<div class="blockcontent">
					<table>
<?php
	if ($status != "Ongoing") {
?>
						<tr>
							<td>Inquiry Numbers</td><td><?php if($rescheck['inquirynumbers']) echo "Yes"; else echo "No" ?></td>
							<td>Googled</td><td><?php if($rescheck['google']) echo "Yes"; else echo "No" ?></td>
						</tr>
						<tr>
							<td>Linkedin</td><td><?php echo $rescheck['linkedin'] ?></td>
							<td>Whitepages</td><td><?php echo $rescheck['whitepages'] ?></td>
						</tr>
						<tr>
							<td>Facebook</td><td><?php echo $rescheck['facebook'] ?></td>
							<td>Twitter</td><td><?php echo $rescheck['twitter'] ?></td>
						</tr>
						<tr>
							<td>Zaba Search</td><td><?php if($rescheck['zabasearch']) echo "Yes"; else echo "No" ?></td>
							<td>Others</td><td><?php echo $rescheck['others'] ?></td>
						</tr>
<?php
	}
	else {
?>
						<tr>
							<td>Inquiry Numbers</td><td><input type="checkbox" name="inquirynumbers"<?php if($rescheck['inquirynumbers']) echo " checked=\"checked\"" ?> /></td>
							<td>Googled</td><td><input type="checkbox" name="google"<?php if($rescheck['google']) echo " checked=\"checked\"" ?> /></td>
						</tr>
						<tr>
							<td>Linkedin</td><td><input type="text" name="linkedin" value="<?php echo $rescheck['linkedin'] ?>" /></td>
							<td>Whitepages</td><td><input type="text" name="whitepages" value="<?php echo $rescheck['whitepages'] ?>" /></td>
						</tr>
						<tr>
							<td>Facebook</td><td><input type="text" name="facebook" value="<?php echo $rescheck['facebook'] ?>" /></td>
							<td>Twitter</td><td><input type="text" name="twitter" value="<?php echo $rescheck['twitter'] ?>" /></td>
						</tr>
						<tr>
							<td>Zaba Search</td><td><input type="checkbox" name="zabasearch"<?php if($rescheck['zabasearch']) echo " checked=\"checked\"" ?> /></td>
							<td>Others</td><td><input type="text" name="others" value="<?php echo $rescheck['others'] ?>" /></td>
						</tr>
<?php
	}
?>
					</table>
<?php
	if ($status == "Ongoing") {
?>
					<input type="button" onclick="SubmitResChecklist()" value="Submit" />
<?php
	}
?>
					</div>
				</div>
			</div>
<?php
	$otherdetails = $DBConn->get_array("SELECT * FROM calldetail WHERE PID = ?", array($PID));
	$queries = $DBConn->get_array("SELECT * FROM query WHERE PID = ?", array($PID));
	$otherdetails = $otherdetails[0];
?>
			<div id="rightboxes">
				<div id="others" class="block">
					<div class="blocktopic">Conversation Details</div>
					<div class="blockcontent">
					<table>
<?php
	if ($status != "Ongoing") {
?>
						<tr>
							<td>Time</td>
							<td><?php echo $otherdetails['time'] ?></td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td><?php echo nl2br ($otherdetails['remarks']) ?></td>
						</tr>
<?php
	}
	else {
?>
						<tr>
							<td>Time</td>
							<td><input type="text" name="timeofcall" value="<?php echo $otherdetails['time'] ?>" /></td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td><textarea name="remarks"><?php echo nl2br ($otherdetails['remarks']) ?></textarea></td>
						</tr>
<?php
	}
?>
					</table>
<?php
	if ($status == "Ongoing") {
?>
					<input type="button" onclick="SubmitOtherDetails()" value="Submit" />
<?php
	}
?>
					</div>
				</div>
<?php
	$calllog = $DBConn->get_array("SELECT * FROM calllog WHERE PID = ?", array($PID));
	$calllog = $calllog[0];
	$agenda = $DBConn->get_array("SELECT * FROM agenda LEFT OUTER JOIN (SELECT * FROM alumnus_agendaconfirmation WHERE PID = ?) AS A USING(agenda_id)", array($PID));
	$callsagain = $DBConn->get_array("SELECT * FROM callagain WHERE PID = ?", array($PID));
?>
				<div id="callinfo" class="block">
					<div class="blocktopic">Contact Info</div>
					<div class="blockcontent">
					<table>
<?php
	if ($status != "Ongoing") {
?>
						<tr>
							<td>Contacted</td>
							<td><?php if($calllog['contacted']) echo "Yes"; else echo "No" ?></td>
						</tr>
						<tr>
							<td>Could not reach</td>
							<td><?php echo $calllog['couldntreach'] ?></td>
						</tr>
<?php
		if($calllog['dontcall']) {
?>
						<tr>
							<td colspan="2">Do Not Call</td>
						</tr>
<?php
		}
	}
	else {
?>
						<tr>
							<td>Contacted</td>
							<td><input type="checkbox" name="contacted" <?php if($calllog['contacted']) echo " checked=\"checked\"" ?> /></td>
						</tr>
						<tr>
							<td>Could not reach</td>
							<td>
								<select name="couldntreach">
									<option <?php if($calllog['couldntreach'] == "") echo " selected=\"selected\"" ?>></option>
									<option <?php if($calllog['couldntreach'] == "Not Available") echo " selected=\"selected\"" ?>>Not Available</option>
									<option <?php if($calllog['couldntreach'] == "No Reply") echo " selected=\"selected\"" ?>>No Reply</option>
									<option <?php if($calllog['couldntreach'] == "Number Busy") echo " selected=\"selected\"" ?>>Number Busy</option>
									<option <?php if($calllog['couldntreach'] == "Answering Machine") echo " selected=\"selected\"" ?>>Answering Machine</option>
									<option <?php if($calllog['couldntreach'] == "Invalid Number") echo " selected=\"selected\"" ?>>Invalid Number</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Do Not Call</td>
							<td><input type="checkbox" name="dontcall" <?php if($calllog['dontcall']) echo " checked=\"checked\"" ?> /></td>
						</tr>
<?php
	}
?>
					</table>
					<table>
						<tr><td colspan="3">Call Again</td></tr>
						<tr>
							<th>Date</th>
							<th>Time</th>
							<th>Called</th>
						</tr>
<?php
	foreach ($callsagain as $callagain) {
		if ($status != "Ongoing") {
?>
						<tr>
							<td><?php echo date("m/d/Y", strtotime ($callagain['date'])) ?></td>
							<td><?php echo $callagain['time'] ?></td>
							<td><?php if($callagain['called']) echo "Yes"; else echo "No" ?></td>
						</tr>
<?php
		}
		else {
?>
						<tr>
							<td><?php echo date("m/d/Y", strtotime ($callagain['date'])) ?></td>
							<td><?php echo $callagain['time'] ?></td>
							<td>
<?php
	if($callagain['called']) {
?>
								Called
<?php
	}
	else {
?>
								<input type="checkbox" name="<?php echo $callagain['date'] . "_" . $callagain['time'] ?>" />
<?php
	}
?>
							</td>
						</tr>
<?php
		}
	}
	if ($status == "Ongoing") {
?>
						<tr>
							<td><input type="text" name="newdate" class="date" /></td>
							<td><input type="text" name="newtime" class="time" /></td>
							<td></td>
						</tr>
<?php
	}
?>
					</table>
<?php
	if ($status == "Ongoing") {
?>
					<input type="button" onclick="SubmitCallInfo();SubmitCallAgain();" value="Submit" />
<?php
	}
?>
					</div>
				</div>
				<div id="mailinfo" class="block">
					<div class="blocktopic">Mail Info</div>
					<div class="blockcontent">
					<table>
<?php
	if ($status != "Ongoing") {
?>
						<tr>
							<td>Mailed</td>
							<td><?php if($calllog['mailed']) echo "Yes"; else echo "No" ?></td>
						</tr>
						<tr>
							<td>Received Response</td>
							<td><?php if($calllog['gotreply']) echo "Yes"; else echo "No" ?></td>
						</tr>
<?php
	}
	else {
?>
						<tr>
							<td>Mailed</td>
							<td><input type="checkbox" name="mailed" <?php if($calllog['mailed']) echo " checked=\"checked\"" ?> /></td>
						</tr>
						<tr>
							<td>Received Response</td>
							<td><input type="checkbox" name="gotreply" <?php if($calllog['gotreply']) echo " checked=\"checked\"" ?> /></td>
						</tr>
<?php
	}
?>
					</table>
<?php
	if ($status == "Ongoing") {
?>
					<input type="button" onclick="SubmitMailInfo()" value="Submit" />
<?php
	}
?>
					</div>
				</div>
				<div id="agendachecklist" class="block">
					<div class="blocktopic">Agenda Checklist</div>
					<div class="blockcontent">
					<table>
<?php
	foreach ($agenda as $agendapoint) {
		if ($status != "Ongoing") {
?>
						<tr>
							<td><?php echo $agendapoint['agenda'] ?></td>
							<td><?php if($agendapoint['PID'] != null) echo "Yes"; else echo "No" ?></td>
						</tr>
<?php
		}
		else {
?>
						<tr>
							<td><?php echo $agendapoint['agenda'] ?></td>
							<td><?php if($agendapoint['PID'] != null) echo "Yes"; else echo "<input type=\"checkbox\" name=\"" . $agendapoint['agenda_id'] . "\" />" ?></td>
						</tr>
<?php
		}
	}
?>
					</table>
<?php
	if ($status == "Ongoing") {
?>
					<input type="button" onclick="SubmitAgenda()" value="Submit" />
<?php
	}
?>
					</div>
				</div>
			</div>
			</form>
		</div>
	</body>
</html>