<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	$user = $_SESSION['user'];
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	$column = $_GET['column'];
	
	$order = $_GET['order'];
	if ($order != "") $order = " DESC";
	
	$selected = $_GET['selected'];
	$selected = explode (",", $selected);
	
	
	
	if ($search != "") $search = "AND " . $search;
	
	
		$alumlist = $DBConn->get_array("SELECT simcardNo,status FROM simcard WHERE 1 ");
	
	$volunteerlist = $DBConn->get_array("SELECT volunteer_id, name, specialrequest, count(PID) AS count FROM volunteer LEFT OUTER JOIN allotment USING (volunteer_id) GROUP BY volunteer_id ORDER BY name", array(date("Y-m-d")));
	$volunteerlist1 = $DBConn->get_array("SELECT volunteer_id, count(PID) AS count FROM volunteer LEFT OUTER JOIN allotment USING (volunteer_id) WHERE status != 'Done and Locked' GROUP BY volunteer_id ORDER BY volunteer_id", array(date("Y-m-d")));
	$sel = "selected";
	if ($order == " DESC") $sel .= "-down";
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/allotment.css" />
        <link language="css" type="text/css" rel="stylesheet" href="css/main.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/allotSim.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		
		
	</head>
	<body>

			<input type="hidden" name="order" id="order" value="<?php echo $column."_".$sel ?>" />
			<table id="alumlist">
				<tr class="head">
					<th></th>
					<th >Sim Card No</th>
					<th > Status</th>
                    <th></th>
				</tr>
<?php
		$index=0;
		$i=0;
	foreach ($alumlist as $alum) {
		

?>

				<tr>
					<td><input type="radio" name="radioSim" class="alum" id="radioSim" value="<?php   echo $alum['simcardNo'].','.$alum['status'] ?>"/></td>
					<td><?php echo $alum['simcardNo'] ?></td>
					<td><?php echo $alum['status'] ?></td>
                    <td><input type="button" value="<?php echo $alum['status']==0?Active:Deactive; ?>" name="status_1" onclick="deactive(<?php echo $alum['simcardNo'].','.$alum['status'].','.$i++;  
					?>)">  </td>
				</tr>
<?php
	}
?>

			</table>
			<input type="button" value="Allot Sim" onClick="allotSim()" id="allot" class="button_style" />
			<div id="volunteer">
				<table id="volunteerlist">
                <tr>
	<td></td>
	<td><b>Name</b></td>
	<td><b>Alloted</b></td>
	<td><b>Special request</b></td>	
	</tr>
<?php
	
	foreach ($volunteerlist as $i => $volunteer) {
		if ($volunteer['middlename'] != "") $volunteer['middlename'] .= " ";
		$volunteer1 = $volunteerlist1[$i];
?>
					<tr onClick="selectVol(this)">
						<td><input type="radio"  name="volunteer" value="<?php echo $volunteer['volunteer_id'] ?>" /></td>
						<td><?php echo $volunteer['name'] ?></td>
						<td><?php echo $volunteer['count'] ?></td>
						<!--<td><?php //echo $volunteer1['count'] ?></td>-->
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
