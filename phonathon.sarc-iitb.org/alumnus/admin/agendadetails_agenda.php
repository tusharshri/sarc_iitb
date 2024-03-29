<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	$volunteer_id = $_SESSION['user'];
	
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
	
	$list = $DBConn->get_array ("SELECT * FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail NATURAL JOIN allotment NATURAL JOIN alumnus_agendaconfirmation NATURAL JOIN (SELECT volunteer_ID, name FROM volunteer) AS v NATURAL JOIN agenda WHERE agenda=? ORDER BY date_of_confirmation", array($agenda));
	
	$num = 0;
	$total = 0;
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/agendadetails.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/agendadetails.js"></script>
	</head>
	<body>
		<h3>Agenda : <?php echo $agenda ?></h3>
		<table class="agendaconfirmationlist">
			<tr class="head">
				<th>PID</th>
				<th>Name</th>
				<th>Department</th>
				<th>Class</th>
				<th>Degree</th>
				<th>City</th>
				<th>State</th>
				<th>Status</th>
				<th>Volunteer</th>
			</tr>
<?php
	foreach ($list as $alum) {
		if ($alum['middlename'] != "") $alum['middlename'] .= " ";
		if ($date != $alum['date_of_confirmation']) {
			if ($num != 0) {
?>
			<tr>
				<th>Total</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th><?php echo $num ?></th>
			</tr>
<?php
			}
?>
			<tr onclick="goto('agendadetails.php?agenda=<?php echo $agenda ?>&date=<?php echo $alum['date_of_confirmation'] ?>')">
				<th><?php echo $alum['date_of_confirmation'] ?></th>
			</tr>
<?php
			$date = $alum['date_of_confirmation'];
			$total += $num;
			$num = 0;
		}
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
				<td><?php echo $alum['name'] ?></td>
			</tr>
<?php
			$num ++;
	}
	if ($num != 0) {
?>
			<tr>
				<th>Total</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th><?php echo $num ?></th>
			</tr>
<?php
			$total += $num;
	}
?>
			<tr>
				<th>Absolute Total</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th><?php echo $total ?></th>
			</tr>
		</table>
	</body>
</html>