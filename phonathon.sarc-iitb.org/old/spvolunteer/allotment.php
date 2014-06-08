<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	$user = $_SESSION['user'];
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	$column = $_GET['column'];
	
	$order = $_GET['order'];
	if ($order != "") $order = " DESC";
	
	$selected = $_GET['selected'];
	$selected = explode (",", $selected);
	
	if ($column == "") {
		$alumlist = $DBConn->get_array("SELECT firstname, middlename, lastname, PID, department, class, degree, hostel, city, country FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail WHERE PID NOT IN (SELECT PID FROM allotment)");
	}
	else {
		$alumlist = $DBConn->get_array("SELECT firstname, middlename, lastname, PID, department, class, degree, hostel, city, country FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail WHERE PID NOT IN (SELECT PID FROM allotment) ORDER BY $column$order");
	}
	$volunteerlist = $DBConn->get_array("SELECT volunteer_id, name, specialrequest, count(PID) AS count FROM volunteer LEFT OUTER JOIN allotment USING (volunteer_id) GROUP BY volunteer_id", array(date("Y-m-d")));
	$volunteerlist1 = $DBConn->get_array("SELECT volunteer_id, count(PID) AS count FROM volunteer LEFT OUTER JOIN allotment USING (volunteer_id) WHERE status != 'Done and Locked' GROUP BY volunteer_id ORDER BY volunteer_id", array(date("Y-m-d")));
	$sel = "selected";
	if ($order == " DESC") $sel .= "-down";
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/allotment.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/allotment.js"></script>
	</head>
	<body>
		<form>
			<input type="hidden" name="order" id="order" value="<?php echo $column."_".$sel ?>" />
			<table id="alumlist">
				<tr class="head">
					<th></th>
					<th onclick="sort ('PID')"<?php if ($column == "PID") echo " class=\"$sel\"" ?>>PID</th>
					<th onclick="sort ('firstname')"<?php if ($column == "firstname") echo " class=\"$sel\"" ?>>Name</th>
					<th onclick="sort ('department')"<?php if ($column == "department") echo " class=\"$sel\"" ?>>Department</th>
					<th onclick="sort ('class')"<?php if ($column == "class") echo " class=\"$sel\"" ?>>Class</th>
					<th onclick="sort ('degree')"<?php if ($column == "degree") echo " class=\"$sel\"" ?>>Degree</th>
					<th onclick="sort ('hostel')"<?php if ($column == "hostel") echo " class=\"$sel\"" ?>>Hostel</th>
					<th onclick="sort ('city')"<?php if ($column == "city") echo " class=\"$sel\"" ?>>City</th>
					<th onclick="sort ('country')"<?php if ($column == "country") echo " class=\"$sel\"" ?>>State</th>
					<th>Phone Number</th>
				</tr>
<?php
	foreach ($alumlist as $alum) {
		if ($alum['middlename'] != "") $alum['middlename'] .= " ";
		$phnum = $DBConn->get_array("SELECT phnum FROM alumnus_phonenum WHERE PID = ?", array ($alum['PID']));
		$s = in_array ($alum['PID'], $selected);
?>
				<tr onclick="selectAlum(this)" class="<?php if ($s) echo "selected" ?>">
					<td><input type="checkbox" name="" class="alum" id="<?php echo $alum['PID'] ?>"<?php if ($s) echo " checked" ?> /></td>
					<td><?php echo $alum['PID'] ?></td>
					<td><?php echo $alum['firstname'] . " " . $alum['middlename'] . $alum['lastname'] ?></td>
					<td><?php echo $alum['department'] ?></td>
					<td><?php echo $alum['class'] ?></td>
					<td><?php echo $alum['degree'] ?></td>
					<td><?php echo $alum['hostel'] ?></td>
					<td><?php echo $alum['city'] ?></td>
					<td><?php echo $alum['country'] ?></td>
					<td><?php echo ($phnum == 0) ? "Not Available" : "Available" ?></td>
				</tr>
<?php
	}
?>
			</table>
			<input type="button" value="Allot Alumni" onclick="allotAlums()" id="allot" />
			<div id="volunteer">
				<table id="volunteerlist">
<?php
	foreach ($volunteerlist as $i => $volunteer) {
		if ($volunteer['middlename'] != "") $volunteer['middlename'] .= " ";
		$volunteer1 = $volunteerlist1[$i];
?>
					<tr onclick="selectVol(this)">
						<td><input type="radio" name="volunteer" value="<?php echo $volunteer['volunteer_id'] ?>" /></td>
						<td><?php echo $volunteer['name'] ?></td>
						<td><?php echo $volunteer['count'] ?></td>
						<td><?php echo $volunteer1['count'] ?></td>
						<td><?php echo $volunteer['specialrequest'] ?></td>
					</tr>
<?php
	}
?>
				</table>
			</div>
		</form>
	</body>
</html>