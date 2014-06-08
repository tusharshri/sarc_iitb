<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	$volunteer_id = $_SESSION['user'];
	
	$agenda = $DBConn->get_array("SELECT * FROM agenda");
	$agenda_numbers = array();
	
	function print_array ($arr, $tabs = null) {
		if ($tabs == null) $tabs = array();
		if (! is_array($arr)) echo implode("",$tabs) . $arr . "<br />";
		else {
			foreach ($arr as $i => $new_arr) {
				echo implode("",$tabs) . $i . "=><br />";
				$new_tabs = $tabs;
				array_push ($new_tabs, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
				print_array ($new_arr, $new_tabs);
			}
		}
	}
	
	$volunteerID = $_GET['volunteer_ID'];
	
	$volunteer = $DBConn->get_array ("SELECT * FROM volunteer WHERE volunteer_ID=?", array ($volunteerID));
	
	$contacted = $DBConn->get_array ("SELECT * FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail NATURAL JOIN allotment NATURAL JOIN calllog WHERE contacted=1 AND volunteer_ID=?", array ($volunteerID));
	
	$mailed = $DBConn->get_array ("SELECT * FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail NATURAL JOIN allotment NATURAL JOIN calllog WHERE mailed=1 AND volunteer_ID=?", array ($volunteerID));
	
	$callagain = $DBConn->get_array ("SELECT * FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail NATURAL JOIN allotment NATURAL JOIN callagain WHERE called!=1 AND volunteer_ID=?", array ($volunteerID));
	
	//$callagain = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(T.PID) AS callagain FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM callagain WHERE called != 1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/calldetails.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/calldetails.js"></script>
	</head>
	<body>
		<h3>Volunteer : <?php echo $volunteer[0]['name'] ?></h3>
		<h4>Contacted : </h4>
		<table id="contacted">
			<tr class="head">
				<th>PID</th>
				<th>Name</th>
				<th>Department</th>
				<th>Class</th>
				<th>Degree</th>
				<th>City</th>
				<th>State</th>
				<th>Status</th>
			</tr>
<?php
	//print_array ($contacted);
	foreach ($contacted as $alum) {
		if ($alum['middlename'] != "") $alum['middlename'] .= " ";
?>
			<tr onclick="goto('alumnus.php?PID=<?php echo $alum['PID'] ?>')">
				<td><?php echo $alum['PID'] ?></td>
				<td><?php echo $alum['firstname'] . " " . $alum['middlename'] . $alum['lastname'] ?></td>
				<td><?php echo $alum['department'] ?></td>
				<td><?php echo $alum['class'] ?></td>
				<td><?php echo $alum['degree'] ?></td>
				<td><?php echo $alum['city'] ?></td>
				<td><?php echo $alum['country'] ?></td>
				<td><?php echo $alum['status'] ?></td>
			</tr>
<?php
	}
?>
		</table>
		<h4>Mailed : </h4>
		<table id="mailed">
			<tr class="head">
				<th>PID</th>
				<th>Name</th>
				<th>Department</th>
				<th>Class</th>
				<th>Degree</th>
				<th>City</th>
				<th>State</th>
				<th>Status</th>
			</tr>
<?php
	foreach ($mailed as $alum) {
		if ($alum['middlename'] != "") $alum['middlename'] .= " ";
?>
			<tr onclick="goto('alumnus.php?PID=<?php echo $alum['PID'] ?>')">
				<td><?php echo $alum['PID'] ?></td>
				<td><?php echo $alum['firstname'] . " " . $alum['middlename'] . $alum['lastname'] ?></td>
				<td><?php echo $alum['department'] ?></td>
				<td><?php echo $alum['class'] ?></td>
				<td><?php echo $alum['degree'] ?></td>
				<td><?php echo $alum['city'] ?></td>
				<td><?php echo $alum['country'] ?></td>
				<td><?php echo $alum['status'] ?></td>
			</tr>
<?php
	}
?>
		</table>
		<h4>Call Again : </h4>
		<table id="callagain">
			<tr class="head">
				<th>PID</th>
				<th>Name</th>
				<th>Department</th>
				<th>Class</th>
				<th>Degree</th>
				<th>City</th>
				<th>State</th>
				<th>Status</th>
			</tr>
<?php
	foreach ($mailed as $alum) {
		if ($alum['middlename'] != "") $alum['middlename'] .= " ";
?>
			<tr onclick="goto('alumnus.php?PID=<?php echo $alum['PID'] ?>')">
				<td><?php echo $alum['PID'] ?></td>
				<td><?php echo $alum['firstname'] . " " . $alum['middlename'] . $alum['lastname'] ?></td>
				<td><?php echo $alum['department'] ?></td>
				<td><?php echo $alum['class'] ?></td>
				<td><?php echo $alum['degree'] ?></td>
				<td><?php echo $alum['city'] ?></td>
				<td><?php echo $alum['country'] ?></td>
				<td><?php echo $alum['status'] ?></td>
			</tr>
<?php
	}
?>
		</table>
	</body>
</html>