<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	$user = $_SESSION['user'];
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	
	if (isset ($_POST['submit'])) {
		$searchterms = array ("firstname","middlename","lastname","department","degree","hostel","city","country","status","name");
		$search = array();
		foreach ($searchterms as $searchterm) {
			if ($_POST[$searchterm] != "") array_push ($search, $searchterm . " LIKE '%" . $_POST[$searchterm] . "%'");
		}
		$search = implode (" AND ", $search);
		if ($search == "") {
			$alumlist = $DBConn->get_array("SELECT firstname, middlename, lastname, alumnus_basicdetail.PID, department, class, degree, hostel, city, country, status, name FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail LEFT OUTER JOIN (SELECT PID, volunteer_ID, name, status FROM allotment NATURAL JOIN volunteer) AS V ON alumnus_basicdetail.PID = V.PID ORDER BY status DESC", array($user));
		}
		else {
			$alumlist = $DBConn->get_array("SELECT firstname, middlename, lastname, alumnus_basicdetail.PID, department, class, degree, hostel, city, country, status, name FROM alumnus_basicdetail NATURAL JOIN alumnus_contactdetail LEFT OUTER JOIN (SELECT PID, volunteer_ID, name, status FROM allotment NATURAL JOIN volunteer) AS V ON alumnus_basicdetail.PID = V.PID WHERE " . $search . " ORDER BY status DESC", array($user));
		}
		//echo "Search: " . $search;
	}
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/alumni.css" />
		<link language="css" type="text/css" rel="stylesheet" href="css/search.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/alumni.js"></script>
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
		<div id="search">
			<form id="searchform" method="post">
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
					</tr>
					<tr>
						<td>
							<div class="slider">
								<label for="hostel">Hostel</label>
								<input type="text" id="hostel" name="hostel" value="<?php if ($_POST['hostel'] != '') echo $_POST['hostel'] ?>">
							</div>
						</td>
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
						<td>
							<div class="slider">
								<label for="status">Volunteer</label>
								<input type="text" id="name" name="name" value="<?php if ($_POST['name'] != '') echo $_POST['name'] ?>">
							</div>
						</td>
					</tr>
				</table>
				<input type="submit" value="Search" name="submit" class="submit" />
			</form>
		</div>
<?php
	if (isset ($_POST['submit'])) {
		if (sizeof ($alumlist) == 0) {
?>
		<div style="text-align: center">
			No Search Results Found
		</div>
<?php
		}
		else {
?>
		<table id="alumlist">
			<tr class="head">
				<th>PID</th>
				<th>Name</th>
				<th>Department</th>
				<th>Class</th>
				<th>Degree</th>
				<th>Hostel</th>
				<th>City</th>
				<th>State</th>
				<th>Status</th>
				<th>Volunteer</th>
			</tr>
<?php
			foreach ($alumlist as $alum) {
				if ($alum['middlename'] != "") $alum['middlename'] .= " ";
?>
			<tr onclick="goto('alumnus.php?PID=<?php echo $alum['PID'] ?>')">
				<td><?php echo $alum['PID'] ?></td>
				<td><?php echo $alum['firstname'] . " " . $alum['middlename'] . $alum['lastname'] ?></td>
				<td><?php echo $alum['department'] ?></td>
				<td><?php echo $alum['class'] ?></td>
				<td><?php echo $alum['degree'] ?></td>
				<td><?php echo $alum['hostel'] ?></td>
				<td><?php echo $alum['city'] ?></td>
				<td><?php echo $alum['country'] ?></td>
				<td><?php echo $alum['status'] ?></td>
				<td><?php echo $alum['name'] ?></td>
			</tr>
<?php
			}
		}
	}
?>
		</table>
	</body>
</html>