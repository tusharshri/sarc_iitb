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
	$today = date("Y-m-d");
	
	$contacted = $DBConn->get_grouped_array ("SELECT name, volunteer_ID, count(T.PID) AS contacted FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE contacted=1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
	
	$mailed = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(T.PID) AS mailed FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE mailed=1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
	
	$callagain = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(T.PID) AS callagain FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM callagain WHERE called != 1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
	
	//$numbers = $DBConn->get_grouped_array ("SELECT volunteer_id, name, date_of_confirmation, agenda, count(*) AS number FROM agenda NATURAL JOIN alumnus_basicdetail NATURAL JOIN alumnus_agendaconfirmation NATURAL JOIN allotment JOIN volunteer USING (volunteer_id) GROUP BY date_of_confirmation,volunteer_id,agenda_id", array("date_of_confirmation","agenda","name"));
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/statistics.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/statistics.js"></script>
	</head>
	<body>
		<table id="">
			<tr class="head">
				<th>Volunteer</th>
				<th>Contacted</th>
				<th>Mailed</th>
				<th>Call Again</th>
			</tr>
<?php
	//print_array ($contacted);
	foreach ($contacted as $vol=>$num) {
?>
			<tr>
				<th><?php echo $num['name'] ?></th>
				<th><?php echo $num['contacted'] ?></th>
				<th><?php echo $mailed[$vol]['mailed'] ?></th>
				<th><?php echo $callagain[$vol]['callagain'] ?></th>
			</tr>
<?php
	}
?>
		</table>
	</body>
</html>