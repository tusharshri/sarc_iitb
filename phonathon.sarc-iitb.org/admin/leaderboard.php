<?php
  require_once ("../dbconnection.php");
  $DBConn = new Connection();

  $rankedVolunteers = $DBConn->get_array("SELECT name, points from volunteer where role='volunteer' AND enable = '1' order by points desc limit 30");
?>
<html>
  <head>
    <link language="css" type="text/css" rel="stylesheet" href="css/alumni.css" />
    <script language="javascript" type="text/javascript" src="js/addonload.js"></script>
    <script language="javascript" type="text/javascript" src="js/alumni.js"></script>
  </head>
  <body>
<div id="content">
  <div class="title" style="padding: 20px;">
    <table style="border: 1px solid black;width: 100%;text-align: center;" id = "alumlist">
      <tr class = "head">
        <th>
          Rank
        </th>
        <th>
          Name of Volunteer
        </th>
        <th>
          Points
        </th>
      </tr>
      <?php
      $i = 0;
      foreach($rankedVolunteers as $volunteer){
        $i++;
        ?>
        <tr>
          <td>
            <?php echo $i; ?>
          </td>
          <td>
            <?php echo $volunteer['name']; ?>
          </td>
          <td>
            <?php echo $volunteer['points']; ?>
          </td> 
        </tr>
      <?php
      } 
      ?>
    </table>
  </div>
</div>
</body>
</html>
