<?php
	session_start();
	
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	require_once ("../dbconnection.php");
	
	$user = $_SESSION['user'];
	$DBConn = new Connection();
	
	$volunteerlist = $DBConn->get_array("SELECT volunteer_id, name, emailid, phnum, enable,hostel, degree, department, rollnum, role, count(PID) AS count, IF (volunteer_id in (SELECT volunteer_id FROM volunteer_attendance WHERE attendance_date=?), 'Present', 'Absent') AS attendance FROM volunteer LEFT OUTER JOIN allotment USING (volunteer_id) GROUP BY volunteer_id ORDER BY volunteer_id", array(date("Y-m-d")));
	$volunteerlist1 = $DBConn->get_array("SELECT volunteer_id, count(PID) AS count FROM volunteer LEFT OUTER JOIN allotment USING (volunteer_id) WHERE status != 'Done and Locked' GROUP BY volunteer_id ORDER BY volunteer_id");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/volunteers.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript" src="js/volunteers.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
		
		$(document).ready(function(){
				$(".enabler").unbind('click');
				$(".enabler").click(function(){
					console.log('hii');
					var t="vid="+$(this).attr('title');
                    if(this.value=='enable'){
                        this.value='disable';
                    }else{
                        this.value='enable';
                    }
					$.ajax({
					type: "POST",
					url: "toogle_volunteer.php",
					data: t,
					dataType: "text",
					success: function(res){
							console.log(res);
					}
					});
				});
		
		
		$('#disable_all').click(function(){
			$.ajax({
					type: "POST",
					url: "disable_volunteers.php",
					data: t='',
					dataType: "text",
					success: function(res){
							console.log(res);
							$('#disable_all').val(res);
							window.location.reload()
					}
					});
			});
			
			
			/*$.ajax({
            		url:"http://www.worldweatheronline.com/feed/tz.ashx?key=740c6c04d9145820123001&q=Palo+Alto",
					type: "GET",
					success: function(res){
							console.log('hii');
					}
					}); 
			$.ajax({
    			 url:"http://www.worldweatheronline.com/feed/tz.ashx?key=740c6c04d9145820123001&q=Palo+Alto&format=json?callback=?",
				 dataType: 'JSONP', // Notice! JSONP <-- P
				 success:function(json){
					 
					 alert("Success");
				 },
				 error:function(){
					 alert("Error");
				 },
				});*/
				/*$.getJSON("http://www.worldweatheronline.com/feed/tz.ashx?key=740c6c04d9145820123001&q=Palo+Alto&format=json&callback=?",function(data) { alert(data.data.request[0].query);
				alert(data.data.time_zone[0].localtime); 
					
					  });*/
		});
		
		</script>
	</head>
	<body>
    	
		<div id="volunteer">
			<div id="create"><a href="createvolunteer.php">Create a New Volunteer</a></div>
            <input type="button" id="disable_all" class="button_style" value="<?php  $result1=$DBConn->get_array("SELECT `volunteer_ID` FROM `volunteer` WHERE `role`='volunteer' and `enable`='1'");

$active_volunteer=sizeof($result1[0]);  
if($active_volunteer>0){ echo 'Disable All Volunteers';} else { echo 'All Volunteers Disabled';} ?>"/>
			<table id="volunteerlist">
				<tr class="head">
					<th>VID</th>
					<th>Name</th>
					<th>Role</th>
					<th>Email ID</th>
					<th>Phone Number</th>
					<th>Hostel</th>
					<th>Degree</th>
					<th>Department</th>
					<th>Attendance</th>
					<th>Alumni Allotted</th>
					<th>Alumni Pending</th>
                    <th>Enabler</th>
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
				<tr>
					<td onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['volunteer_id'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['name'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['role'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['emailid'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['phnum'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['hostel'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['degree'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['department'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['attendance'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer['count'] ?></td>
					<td  onClick="goto('volunteer.php?volunteer_id=<?php echo $volunteer['volunteer_id'] ?>')"><?php echo $volunteer1['count'] ?></td>
                    <td><input type="button" id="enabler<?php echo $i; ?>" title="<?php echo $volunteer['volunteer_id'] ?>" class="enabler" value="<?php if($volunteer['enable']==0) echo 'enable'; else echo 'disable';?>"></td>
				</tr>
<?php
	}
?>
			</table>
		</div>
	</body>
</html>
