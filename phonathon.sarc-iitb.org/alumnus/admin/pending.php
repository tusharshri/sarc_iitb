<?php
  session_start();
  
  if (! isset($_SESSION['user'])) header ("Location: ../login.php");
  $role = $_SESSION['role'];
  $curdir = getcwd();
  if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
  require_once ("../dbconnection.php");
  
  $user = $_SESSION['user'];
  
  $DBConn = new Connection();
  $today = date("Y-m-d");
  
  $notmailed = $DBConn->get_array("SELECT firstname, middlename, lastname, PID, name FROM alumnus_basicdetail NATURAL JOIN calllog NATURAL JOIN allotment JOIN volunteer USING(volunteer_id) WHERE mailed = 0 AND status='Ongoing' AND PID NOT IN (SELECT PID FROM callagain WHERE date > ?)", array($today));
  
  $queries =  $DBConn->get_array("SELECT firstname, middlename, lastname, PID, name FROM alumnus_basicdetail NATURAL JOIN allotment NATURAL JOIN query JOIN volunteer USING(volunteer_id) WHERE answered = 0");
  $callagain = $DBConn->get_array("SELECT firstname, middlename, lastname, PID, time, name, couldntreach FROM alumnus_basicdetail NATURAL JOIN allotment NATURAL JOIN calllog NATURAL JOIN callagain JOIN volunteer USING(volunteer_id) WHERE date < ?", array($today));
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/pending.css" />
    <script type="text/javascript" src="js/pending.js"></script>
  </head>
  <body>
    
    <div id="main">
      <div class="column" id="mails">
        <div class="topic">
          Mails to be sent
        </div>
        <table>
          <tr class="head">
            <th>PID</th>
            <th>Name</th>
            <th>Volunteer</th>
          </tr>
<?php
  foreach ($notmailed as $mail) {
    if ($mail['middlename'] != "") $mail['middlename'] .= " ";
?>
          <tr onclick="gotoalumnus('<?php echo $mail['PID'] ?>')">
            <td><?php echo $mail['PID'] ?></td>
            <td><?php echo $mail['firstname']." ".$mail['middlename'].$mail['lastname'] ?></td>
            <td><?php echo $mail['name'] ?></td>
          </tr>
<?php
  }
?>
        </table>  
      </div>
        
      <div class="column" id="queries">
        <div class="topic">  
          Queries to be Answered
        </div>
        <table>
          <tr class="head">
            <th>PID</th>
            <th>Name</th>
            <th>Volunteer</th>
          </tr>
<?php
  foreach($queries as $query){
    if($query['middlename'] != "") $query['middlename'] .= " ";
?>
          <tr onclick="gotoalumnus('<?php echo $mail['PID'] ?>')">
            <td><?php echo $query['PID'] ?></td>
            <td><?php echo $query['firstname']." ".$query['middlename'].$query['lastname'] ?></td>
            <td><?php echo $query['name'] ?></td>
          </tr>
<?php
  }
?>
        </table>
      </div>
      
      <div class="column" id="calls">
        <div class="topic">  
          To be Called Again: Pending
        </div>
        <table>
          <tr class="head">
            <th>PID</th>
            <th>Name</th>
            <th>Time</th>
            <th>Volunteer</th>
            <th>Reason</th>
          </tr>
<?php
  foreach($callagain as $call){
    if($call['middlename'] != "") $call['middlename'] .= " ";
?>
          <tr onclick="gotoalumnus('<?php echo $mail['PID'] ?>')">
            <td><?php echo $call['PID'] ?></td>
            <td><?php echo $call['firstname']." ".$call['middlename'].$call['lastname'] ?></td>
            <td><?php echo $call['time'] ?></td>
            <td><?php echo $call['name'] ?></td>
            <td><?php if ($call['couldntreach'] == "Answering Machine") echo "Answering Machine"; else echo "Requested" ?></td>
          </tr>
<?php
  }
?>
        </table>
      </div>
    </div>
  </body>
</html>