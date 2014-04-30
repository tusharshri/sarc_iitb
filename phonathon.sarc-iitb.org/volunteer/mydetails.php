<?php
	session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	
	require_once ("../dbconnection.php");
	$DBConn = new Connection();
	$volunteer_id = $_SESSION['user'];
	if (isset($_POST['newpass'])){
		$newpass = $_POST['newpass'];
		$DBConn->run_query("UPDATE `volunteer` SET `password`=? WHERE `volunteer_ID`=?", array($newpass, $volunteer_id));
	}
?>
<html>
	<head>
		<link language="css" type="text/css" rel="stylesheet" href="css/mydetails.css" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/mydetails.js"></script>
	</head>
	<body id="mydetails">
<?php
	$volunteerlist = $DBConn->get_array("SELECT * FROM `volunteer` WHERE `volunteer_ID` = '$volunteer_id'", array($user));
		foreach ($volunteerlist as $volunteer) {
		//upload
			
			if (isset($_FILES['imageur'])){
				$errors = array();
			$allowed_ext = array('jpg');
	
			$file_name = $_FILES['imageur']['name'];
			$file_ext = strtolower(end(explode('.', $file_name)));
			$file_size = $_FILES['imageur']['size'];
			$file_tmp = $_FILES['imageur']['tmp_name'];
			$path = "images/".$volunteer['username'].".jpg";
			if (!in_array($file_ext, $allowed_ext)){
			$errors[] = "Not an allowed file type";
			} 
			if (file_size > 1000000){
			$errors[] = "File size too large";
			}
			if(empty($errors)){
			//upload
			if(move_uploaded_file($file_tmp, $path)){
			$run=mysql_query("UPDATE volunteer SET dp=1
				WHERE `volunteer_ID` = '$volunteer_id'");
				if ($run){
			echo "File Successfully uploaded. Please Wait..<script type='text/javascript'>location.reload();</script>";}
			} 
		} else{
			foreach ($errors as $x){
			echo $x, '<br/>';
		}
	}
	
}//-upload
	?>	
<table id="mydetails_table">
<tr><td>Picture</td><td>	
<?php 

			if($volunteer['dp']==0){
			?>
				<center><form action="" method="POST" enctype="multipart/form-data">
					<p>
						<input type="file" name="imageur" />
						<input type="submit" value="Upload">
					</p>
				</form>	</center>
			<?php
			} else 	{ ?> <img id="volimage" src="./images/<?php echo $volunteer['username']; ?>.jpg" width="130px" height="110px" > <?php		}
			?>
					<form method="post" action="mydetails.php" name="savepass" id="savepass">
						<input type="hidden" name="newpass" id="newpass" value=""/>
					</form>
					
							</td></tr>
							<tr><td>Name</td><td><?php echo $volunteer['name'];?></td></tr>
							<tr><td>Username</td><td><?php echo $volunteer['username'];?></td></tr>
							<tr><td>Password</td><td><?php echo $volunteer['password'];?><input type="button" onclick="changePass();" value="Change Password"/></td></tr>
							<tr><td>EmailID</td><td><?php echo $volunteer['emailid'];?></td></tr>
							<tr><td>Ph. Number</td><td><?php echo $volunteer['phnum'];?></td></tr>
							<tr><td>Hostel</td><td><?php echo $volunteer['hostel'];?></td></tr>
							<tr><td>Degree</td><td><?php echo $volunteer['degree'];?></td></tr>
							<tr><td>Department</td><td><?php echo $volunteer['department'];?></td></tr>
							<tr><td>Roll No.</td><td><?php echo $volunteer['rollnum'];?></td></tr>
					</table>
					
<?php
	}
?>
	</body>
</html>