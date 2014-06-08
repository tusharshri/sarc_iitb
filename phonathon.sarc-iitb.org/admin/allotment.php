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
	if ($order != "") $order = "DESC";
	
	$selected = $_GET['selected'];
	$selected = explode (",", $selected);
	
	if (isset ($_POST['submit'])) {
		$searchterms = array ("firstname","middlename","lastname","department","degree","hostel","city","country","status");
		$search = array();
		foreach ($searchterms as $searchterm) {
			if ($_POST[$searchterm] != "") array_push ($search, $searchterm . " LIKE '%" . $_POST[$searchterm] . "%'");
		}
		$searchterms2 = array ("PID_from","PID_to");
		if($_POST['PID_from'] != "" && $_POST['PID_to'] != ""){
				array_push ($search, "PID" . " >='" . $_POST['PID_from'] . "'");
				array_push ($search, "PID" . " <='" . $_POST['PID_to'] . "'");
		}
		$search = implode (" AND ", $search);
	}
	
	if ($search != "") $search = "AND " . $search;
	
	if ($column == "") {
		$alumlist = $DBConn->get_array("SELECT firstname, middlename, lastname, PID, department, class, degree, hostel, city, country FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail WHERE PID NOT IN (SELECT PID FROM allotment)" . $search . " LIMIT 0, 500");
	}
	else {
		$alumlist = $DBConn->get_array("SELECT firstname, middlename, lastname, PID, department, class, degree, hostel, city, country FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail WHERE PID NOT IN (SELECT PID FROM allotment)" . $search . "ORDER BY $column$order LIMIT 0, 500");
	}
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
		<script language="javascript" type="text/javascript" src="js/allotment.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.slidinglabels.min.js"></script>
		<script>
			$(function(){
				$('#searchform').slidinglabels({
					/* these are all optional */
					className    : 'slider', // the class you're wrapping the label & input with -> default = slider
					topPosition  : '5px',  // how far down you want each label to start
					leftPosition : '5px',  // how far left you want each label to start
					axis         : 'x',    // can take 'x' or 'y' for slide direction
					speed        : 'fast'  // can take 'fast', 'slow', or a numeric value
				});
			});
		</script>
	</head>
	<body>
		<form id="searchform" method="post" action="allotment.php">
			<div id="search">
				<table>
					<tr>
						<td>
							<div class="slider">
								<label for="firstname">First Name</label>
								<input type="text" id="firstname" name="firstname" value="<?php if ($_POST['firstname'] != '') echo $_POST['firstname'] ?>">
							</div>
						</td>
						<td>
							<div class="slider">
								<label for="middlename">Middle Name</label>
								<input type="text" id="middlename" name="middlename" value="<?php if ($_POST['middlename'] != '') echo $_POST['middlename'] ?>">
							</div>
						</td>
						<td>
							<div class="slider">
								<label for="lastname">Last Name</label>
								<input type="text" id="lastname" name="lastname" value="<?php if ($_POST['lastname'] != '') echo $_POST['lastname'] ?>">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="slider">
								<label for="department">Department</label>
								<input type="text" id="department" name="department" value="<?php if ($_POST['department'] != '') echo $_POST['department'] ?>">
							</div>
						</td>
						<td>
							<div class="slider">
								<label for="degree">Degree</label>
								<input type="text" id="degree" name="degree" value="<?php if ($_POST['degree'] != '') echo $_POST['degree'] ?>">
							</div>
						</td>
						<td>
							<div class="slider">
								<label for="hostel">Hostel</label>
								<input type="text" id="hostel" name="hostel" value="<?php if ($_POST['hostel'] != '') echo $_POST['hostel'] ?>">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="slider">
								<label for="city">City</label>
								<input type="text" id="city" name="city" value="<?php if ($_POST['city'] != '') echo $_POST['city'] ?>">
							</div>
						</td>
						<td>
							<div class="slider">
								<label for="country">State</label>
								<input type="text" id="country" name="country" value="<?php if ($_POST['country'] != '') echo $_POST['country'] ?>">
							</div>
						</td>
						<td>
							<div class="slider">
								<label for="status">Status</label>
								<input type="text" id="status" name="status" value="<?php if ($_POST['status'] != '') echo $_POST['status'] ?>">
							</div>
						</td>
					</tr>
                    <tr>
						<td >
							<div class="slider">
								<label for="status">PID FROM</label>
								<input type="text" id="PID_from" name="PID_from" value="<?php if ($_POST['PID_from'] != '') echo $_POST['PID_from'] ?>">
							</div>
						</td>
                        <td>
                        to
                        </td>
						<td >
							<div class="slider">
								<label for="status">PID TO</label>
								<input type="text" id="PID_to" name="PID_to" value="<?php if ($_POST['PID_to'] != '') echo $_POST['PID_to'] ?>">
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<input type="submit" value="Search" name="submit" class="submit, button_style" />
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" name="order" id="order" value="<?php echo $column."_".$sel ?>" />
			<table id="alumlist">
				<tr class="head">
					<th></th>
					<th onClick="sort ('PID')"<?php if ($column == "PID") echo " class=\"$sel\"" ?>>PID</th>
					<th onClick="sort ('firstname')"<?php if ($column == "firstname") echo " class=\"$sel\"" ?>>Name</th>
					<th onClick="sort ('department')"<?php if ($column == "department") echo " class=\"$sel\"" ?>>Department</th>
					<th onClick="sort ('class')"<?php if ($column == "class") echo " class=\"$sel\"" ?>>Class</th>
					<!--<th onClick="sort ('degree')"<?php if ($column == "degree") echo " class=\"$sel\"" ?>>Degree</th>-->
                    <th>Time</th>
					<th onClick="sort ('hostel')"<?php if ($column == "hostel") echo " class=\"$sel\"" ?>>Hostel</th>
					<th onClick="sort ('city')"<?php if ($column == "city") echo " class=\"$sel\"" ?>>City</th>
					<th onClick="sort ('country')"<?php if ($column == "country") echo " class=\"$sel\"" ?>>State</th>
					<th>Phone Number</th>
				</tr>
<?php
		$index=0;
	foreach ($alumlist as $alum) {
		if ($alum['middlename'] != "") $alum['middlename'] .= " ";
		$phnum = $DBConn->get_array("SELECT phnum FROM alumnus_phonenum WHERE PID = ?", array ($alum['PID']));
		$s = in_array ($alum['PID'], $selected);

?>

				<tr onClick="selectAlum(this)" class="<?php if ($s) echo "selected" ?>">
					<td><input type="checkbox" name="" class="alum" id="<?php echo $alum['PID'] ?>"<?php if ($s) echo " checked" ?> /></td>
					<td><?php echo $alum['PID'] ?></td>
					<td><?php echo $alum['firstname'] . " " . $alum['middlename'] . $alum['lastname'] ?></td>
					<td><?php echo $alum['department'] ?></td>
					<td><?php echo $alum['class'] ?></td>
					<!--<td><?php //echo $alum['degree'] ?></td>-->
                    <td id="i<?php echo $index;?>">Not available<script type="text/javascript">
			$(document).ready(function(){
				
				var r=<?php echo "'".urlencode($alum['city'])."'"; ?>;
				var s=<?php echo "'".$alum['country']."'"; ?>;
				if(r=='' && s=='USA'){
					var p='New+york,USA';	
				}
				else if(r=='' || s==''){
					var p='';	
				}
				else{
				var p=r+','+s;
				}
				//document.write(p)
					if(p!=''){
					console.log(p);
					$.getJSON("http://www.worldweatheronline.com/feed/tz.ashx?key=740c6c04d9145820123001&format=json&callback=?",{
					q: p	
					},function(data) { 
							$('#i<?php echo $index; $index++;   ?>').html(data.data.time_zone[0].localtime);
					  });
					}
			});
		
		</script></td>
					<td><?php echo $alum['hostel'] ?></td>
					<td><?php echo $alum['city'] ?></td>
					<td><?php echo $alum['country'] ?></td>
					<td><?php echo ($phnum == 0) ? "Not Available" : "Available" ?></td>
				</tr>
<?php
	}
?>

			</table>
			<input type="button" value="Allot Alumni" onClick="allotAlums()" id="allot" class="button_style" />
			<div id="volunteer">
				<table id="volunteerlist">
                <tr>
	<td></td>
	<td><b>Name</b></td>
	<td><b>Alloted</b></td>
	<td><b>Remaining</b></td>
	<td><b>Special request</b></td>	
	</tr>
<?php
	$k = 0;
	foreach ($volunteerlist as $i=>$volunteer) {
//		if ($volunteer['middlename'] != "") $volunteer['middlename'] .= " ";
		if($volunteerlist[$i]['count']==0){
			$volunteer1 = $volunteerlist[$i];
		}
		else{
			$volunteer1 = $volunteerlist1[$k];
			$k++;
		}
?>
					<tr onClick="selectVol(this)">
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
