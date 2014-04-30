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
	
	$num_allotted = 0;
	$num_contacted = 0;
	$num_mailed = 0;
	$num_callagain = 0;
    $num_ongoing = 0;
    $num_locked = 0;
	
	$allotted = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(*) AS allotted FROM allotment GROUP BY volunteer_ID", array("volunteer_ID"));
	
	$contacted = $DBConn->get_grouped_array ("SELECT name, volunteer_ID, count(T.PID) AS contacted FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE contacted=1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
	
	$mailed = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(T.PID) AS mailed FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE mailed=1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
	
	$callagain = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(T.PID) AS callagain FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM callagain WHERE called != 1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));

    $ongoing = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(*) AS ongoing FROM allotment WHERE status='Ongoing' GROUP BY volunteer_ID", array("volunteer_ID"));

    $locked = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(*) AS locked FROM allotment WHERE status='Done and Locked' GROUP BY volunteer_ID", array("volunteer_ID"));
	
	$numbers = $DBConn->get_grouped_array ("SELECT volunteer_ID, name, date_of_confirmation, agenda, count(*) AS number FROM agenda NATURAL JOIN alumnus_basicdetail NATURAL JOIN alumnus_agendaconfirmation NATURAL JOIN allotment JOIN volunteer USING (volunteer_id) GROUP BY date_of_confirmation,name,agenda", array("date_of_confirmation","name","agenda"));
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/statistics.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/statistics.js"></script>
	</head>
	<body>
		<table id="calldetails">
			<tr class="head">
				<th>Volunteer</th>
				<th>Allotted</th>
				<th>Contacted</th>
				<th>Mailed</th>
				<th>Call Again</th>
                <th>Ongoing</th>
                <th>Done and Locked</th>
			</tr>
<?php
	//print_array ($contacted);
	foreach ($contacted as $vol=>$num) {
?>
			<tr onclick="goto('calldetails.php?volunteer_ID=<?php echo $vol ?>')">
				<td><?php echo $num['name'] ?></td>
				<td><?php echo $allotted[$vol]['allotted'] ?></td>
				<td><?php echo $num['contacted'] ?></td>
				<td><?php echo $mailed[$vol]['mailed'] ?></td>
				<td><?php echo $callagain[$vol]['callagain'] ?></td>
				<td><?php echo $ongoing[$vol]['ongoing'] ?></td>
				<td><?php echo $locked[$vol]['locked'] ?></td>
			</tr>
<?php
		$num_allotted += $allotted[$vol]['allotted'];
		$num_contacted += $num['contacted'];
		$num_mailed += $mailed[$vol]['mailed'];
		$num_callagain += $callagain[$vol]['callagain'];
        $num_ongoing += $ongoing[$vol]['ongoing'];
        $num_locked += $locked[$vol]['locked'];
	}
?>
			<tr class="head">
				<th>Total</th>
				<th><?php echo $num_allotted ?></th>
				<th><?php echo $num_contacted ?></th>
				<th><?php echo $num_mailed ?></th>
				<th><?php echo $num_callagain ?></th>
				<th><?php echo $num_ongoing ?></th>
				<th><?php echo $num_locked ?></th>
			</tr>
		</table>
		<table id="agendadetails">
			<tr class="head">
				<th>Volunteer</th>
<?php
	foreach ($agenda as $agendaitem) {
?>
				<th><?php echo $agendaitem['agenda'] ?></th>
<?php
	}
?>
			</tr>
<?php
	$keys = array_keys ($numbers);
	$length = count($keys);
	foreach ($agenda as $agendaitem) {
		$agenda_numbers[$agendaitem['agenda']] = 0;
		$agenda_total_numbers[$agendaitem['agenda']] = 0;
	}
	for ($i=0; $i<$length; $i++) {
		$key = $keys[$i];
		$key = explode ("_", $key);
		$date = $key[0];
		$volunteer = $key[1];
		if ($date != $x_date) {
			if ($i != 0) {
?>
				<tr onclick="goto('agendadetails.php?date=<?php echo $x_date ?>')">
					<th>Total</th>
<?php
				foreach ($agenda as $agendaitem) {
?>
					<th><?php echo $agenda_numbers[$agendaitem['agenda']] ?></th>
<?php
					$agenda_total_numbers[$agendaitem['agenda']] += $agenda_numbers[$agendaitem['agenda']];
					$agenda_numbers[$agendaitem['agenda']] = 0;
				}
			}
			$x_volunteer = "";
?>
				</tr>
				<tr onclick="goto('agendadetails.php?date=<?php echo $date ?>')">
					<th><?php echo $date ?></th>
				</tr>
<?php
		}
		if ($volunteer != $x_volunteer) {
?>
				<tr onclick="goto('agendadetails.php?date=<?php echo $x_date ?>&volunteer_ID=<?php echo $numbers[$keys[$i]]['volunteer_ID'] ?>')">
					<td><?php echo $volunteer ?></td>
<?php
			foreach ($agenda as $agendaitem) {
				$key = $numbers[$date."_".$volunteer."_".$agendaitem['agenda']];
				$num = $key;
				$num = ($num['number'] != "") ? $num['number'] : '0';
				$agenda_numbers[$agendaitem['agenda']] += $num;
				//$date."_".$volunteer."_".$agendaitem['agenda'] . "=>" . 
?>
					<td><?php echo $num ?></td>
<?php
				$num = 0;
			}
?>
				</tr>
<?php
			$x_volunteer = $volunteer;
		}
		$x_date = $date;
	}
?>
				<tr onclick="goto('agendadetails.php?date=<?php echo $x_date ?>')">
					<th>Total</th>
<?php
			foreach ($agenda as $agendaitem) {
?>
					<th><?php echo $agenda_numbers[$agendaitem['agenda']] ?></th>
<?php
				$agenda_total_numbers[$agendaitem['agenda']] += $agenda_numbers[$agendaitem['agenda']];
			}
?>
				</tr>
				<tr onclick="goto('agendadetails.php')">
					<th>Absolute Total</th>
<?php
			foreach ($agenda as $agendaitem) {
?>
					<th><?php echo $agenda_total_numbers[$agendaitem['agenda']] ?></th>
<?php
			}
?>
		</table>
	</body>
</html>
