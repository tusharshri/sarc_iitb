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
			<form action="addsim.php" method="POST" id="alumlist">
				<label for="simnumber">SIM Number:</label>
				<input name="simnumber" type="number" size="20px" id="simnumber" />
				<input type="submit" value="Add Sim" size="20px" id="simnumber" />
				</form>
			<input type="hidden" name="order" id="order" value="<?php echo $column."_".$sel ?>" />
			<table id="alumlist" style="display:block;float:none">
				<tr class="head">
					<th>Alloted To</th>
					<th>Sim Card No</th>
					<th>Status</th>
					<th>Initial Balance</th>
					<th>Current Balance</th>
                    <th>Change Status</th>
                    <th>Remove Sim</th>
				</tr>
<?php
		$index=0;
		$i=0;
	foreach ($alumlist as $alum) {
		$volunteer = $DBConn->get_array("SELECT name FROM volunteer WHERE volunteer_ID = '$alum[volunteerId]'");

?>

				<tr id="<?php echo $alum['simcardNo'];?>">
					<td id="<?php echo 'volunteername_'.$alum['simcardNo'];?>"><?php if($volunteer&&$alum['status']==1):echo $volunteer[0]['name']; else: echo "Not Alloted"; endif;?></td>
					<td id="<?php echo 'simcardno_'.$alum['simcardNo'];?>"><?php echo $alum['simcardNo'] ?></td>
					<td id="<?php echo 'status_'.$alum['simcardNo'];?>"><?php echo $alum['status'] ?></td>
					<td id="<?php echo 'initial_bal_'.$alum['simcardNo'];?>"><?php echo $alum['balance'] ?></td>
					<td><input type="text" name="balance" id="<?php echo 'balance_'.$alum['simcardNo'];?>"></td>
                    <td><input type="button" id="<?php echo 'status_1_'.$alum['simcardNo'];?>" value="<?php if($alum['status']==0):?>Activate<?php elseif($alum['status']==1): ?> Deactivate <?php else: ?>Close<?php endif ?>" onclick="deactive(<?php echo $i.','.$alum['simcardNo'];?>)"></td>
                    <td><input type="button" name="remove_1" value="Remove" onclick="remove_me(<?php echo $i.','.$alum['simcardNo'];?>)"></td>
				</tr>
<?php
	$i++;}	
?>
	</body>
</html>
