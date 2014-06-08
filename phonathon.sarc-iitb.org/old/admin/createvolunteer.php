<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	$user = $_SESSION['user'];
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/createvolunteer.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/createvolunteer.js"></script>
	</head>
	<body>
		<div>
			<form action="submit_createvolunteer.php" method="post">
				<table>
					<tr>
						<td>Name</td><td><input name="name" type="text" /></td>
					</tr>
					<tr>
						<td>Username</td><td><input name="username" type="text" /></td>
					</tr>
					<tr>
						<td>Password</td><td><input name="password" type="password" /></td>
					</tr>
					<tr>
						<td>Degree</td><td><input name="degree" type="text" /></td>
					</tr>
					<tr>
						<td>Department</td><td><input name="department" type="text" /></td>
					</tr>
					<tr>
						<td>Hostel</td><td><input name="hostel" type="text" /></td>
					</tr>
					<tr>
						<td>Email ID</td><td><input name="emailid" type="text" /></td>
					</tr>
					<tr>
						<td>Phone Number</td><td><input name="phnum" type="text" /></td>
					</tr>
					<tr>
						<td>Special Request</td><td><input name="specialrequest" type="text" /></td>
					</tr>
					<tr>
						<td>Role</td><td><select name="role"><option value="volunteer">Volunteer</option><option value="spvolunteer">Special Volunteer</option><option value="admin">Admin</option></select></td>
					</tr>
				</table>
				<input type="submit" id="submit" value="Create" />
			</form>
		</div>
	</body>
</html>