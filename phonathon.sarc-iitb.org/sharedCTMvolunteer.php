<style>
td{
	border: 1px solid black;
	padding: 2px 5px;
}
</style>
<?php

// mysql_connect("admin.sarc-iitb.org","sarciitborg","j@g@njyoti");
mysql_connect("localhost","root","");
mysql_select_db("sarc_iitb");

//mysql_connect("localhost","root","");
//mysql_select_db("sarc_cdb");


$query=mysql_query("SELECT * FROM `Student` LEFT JOIN `PhonathonVolunteer` ON Student.id = PhonathonVolunteer.studentId ORDER BY `Student`.`id` ASC") or die(mysql_error());
?>
<table cellspacing="0">
<tr> <th>Id</th> <th>Name</th> <th>Rollnumber</th> <th>Degree</th> <th>Department</th> <th>Phone Number</th> <th>Email ID</th> <th>Free Slots</th> <th>Preferred Dept.</th> <th>Preferred Hostel</th> <tr>
<?php
while($student=mysql_fetch_array($query)){
?>
<tr>
<td><?php echo $student['studentId']; ?></td> 
<td><?php echo str_replace('  ',' ',$student['firstName'].' '.$student['middleName'].' '.$student['lastName']); ?></td> 
<td><?php echo $student['rollNumber']; ?></td> 
<td><?php echo $student['degree']; ?></td> 
<td><?php echo $student['departmentCode']; ?></td>
 <td><?php echo $student['phoneNumber']; ?></td>
 <td><?php echo $student['emailId']; ?></td>
 <td><?php echo $student['freeSlot']; ?></td> 
<td><?php echo $student['preferredDepartmentCode']; ?></td> 
<td><?php echo $student['preferredHostel']; ?></td> 
</tr>
<?php
}

?>
</table>
