<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
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
	
	$contacted = $DBConn->get_grouped_array ("SELECT volunteer_id, count(*) AS contacted FROM allotment NATURAL JOIN calllog WHERE contacted = 1 GROUP BY volunteer_id", array("volunteer_id"));
	
	$numbers = $DBConn->get_grouped_array ("SELECT volunteer_id, name, date_of_confirmation, agenda, count(*) AS number FROM agenda NATURAL JOIN alumnus_basicdetail NATURAL JOIN alumnus_agendaconfirmation NATURAL JOIN allotment JOIN volunteer USING (volunteer_id) GROUP BY date_of_confirmation,volunteer_id,agenda_id", array("date_of_confirmation","agenda","name"));
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/statistics.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/statistics.js"></script>
	</head>
	<body>
		<table id="statistics">
			<tr class="head">
				<th>Date</th>
				<th>Volunteer</th>
				<th>Contacted</th>
<?php
	//print_array ($contacted);
	foreach ($agenda as $agendaitem) {
		$agenda_numbers[$agenda_id] = 0;
?>
				<th><?php echo $agendaitem['agenda'] ?></th>
<?php
	}
?>
			</tr>
<?php
	$groups = array_keys($numbers);
	for ($i=0; $i<count($groups); $i++) {
?>
			<tr>
				<td><?php echo $numbers[$groups[$i]]['date_of_confirmation'] ?></td>
				<td><?php echo $numbers[$groups[$i]]['name'] ?></td>
				<td><?php echo $contacted[$numbers[$groups[$i]]['volunteer_id']]['contacted'] ?></td>
<?php
	foreach ($agenda as $agendaitem) {
		$agenda_numbers[$agenda_id] = 0;
?>
				<td><?php echo $numbers[$groups[$i++]]['number'] ?></td>
<?php
	}
?>
			</tr>
<?php
	}
?>
		</table>
	</body>
</html>