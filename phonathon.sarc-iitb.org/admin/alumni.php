<?php
  session_start();
  if (! isset($_SESSION['user'])) header ("Location: ../login.php");
  if (isset ($_SESSION['PID'])) header ("Location: alumnus.php?PID=" . $_SESSION['PID']);
  $role = $_SESSION['role'];
  $curdir = getcwd();
  if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
  
  $user = $_SESSION['user'];
  
  require_once ("../dbconnection.php");
  $DBConn = new Connection();
  
  $alumlist = $DBConn->get_array("SELECT firstname, middlename, lastname, alumnus_basicdetail.PID, department, class, degree, city, country, status, mailed FROM alumnus_basicdetail JOIN alumnus_contactdetail ON alumnus_basicdetail.PID=alumnus_contactdetail.PID JOIN allotment ON alumnus_basicdetail.PID=allotment.PID JOIN calllog ON alumnus_basicdetail.PID=calllog.PID ORDER BY status ASC");
?>
<html>
  <head>
    <link language="css" type="text/css" rel="stylesheet" href="css/alumni.css" />
    <script language="javascript" type="text/javascript" src="js/addonload.js"></script>
    <script language="javascript" type="text/javascript" src="js/alumni.js"></script>
  </head>
  <body>
    <table id="alumlist">
      <tr class="head">
        <th>PID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Class</th>
        <th>Degree</th>
        <th>City</th>
        <th>State</th>
        <th>Status</th>
                <th>Mailed</th>
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
        <td><?php echo $alum['city'] ?></td>
        <td><?php echo $alum['country'] ?></td>
        <td><?php echo $alum['status'] ?></td>
        <td><?php echo $alum['mailed'] ?></td>
      </tr>
<?php
  }
?>
    </table>
  </body>
</html>
