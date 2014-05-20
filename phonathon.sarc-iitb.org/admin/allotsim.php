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
	
	$alumlist = $DBConn->get_array("SELECT simcardNo,status,volunteerId,balance FROM simcard WHERE 1 ");
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
			<table id="alumlist" style="display:block;float:none">
				<tr class="head">
					<th>Alloted To</th>
					<th>Sim Card No</th>
					<th>Status</th>
					<th>Initial Balance</th>
					<th>Current Balance</th>
                    <th>Change Status</th>
				</tr>
<?php
		$index=0;
		$i=0;
	foreach ($alumlist as $alum) {
		$volunteer = $DBConn->get_array("SELECT name FROM volunteer WHERE volunteer_ID = '$alum[volunteerId]'");

?>

				<tr>
					<td><?php if($volunteer):echo $volunteer[0]['name']; else: echo "Not Alloted"; endif;?></td>
					<td name="simcardno"><?php echo $alum['simcardNo'] ?></td>
					<td name="status"><?php echo $alum['status'] ?></td>
					<td name="initial_bal"><?php echo $alum['balance'] ?></td>
					<td><input type="text" name="balance" id="balance"></td>
                    <td><input type="button" value="<?php if($alum['status']==0):?>Activate<?php else: ?> Deactivate <?php endif ?>" name="status_1" onclick="deactive(<?php echo $i++;?>);"></td>
				</tr>
<?php
	}	
?>
	</body>
</html>
