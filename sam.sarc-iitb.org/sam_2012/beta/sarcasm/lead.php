<?php session_start();
ini_set(' session.save_path','http://www.sam.sarc-iitb.org/sarcasm/css/');

require_once('dbconnect.php');
?>
<?php include 'header.php'; ?> 

<?php
  $uid=$_SESSION['uid'];
  $score=0;
?>
<html>
<br>
<u><h1 style="margin-left:223px;"> Leaderboard</h1></u><br><br>
  
  <br><h3>SARCasm is over. All winners are locked. But you can still have a go! :)
</h3></br>
<table border="5px">
     <tr> 
    
     <th width="300" align="left"> Name </th>
     <th width="300" align="center"> level  </th>
       <th width="300" align="center"> Rank  </th>
     </tr>

<?php 
 $sql="SELECT users_status.userid,users.name,users_status.level ,users_fb.req_num  FROM users_status LEFT OUTER JOIN users_fb ON users_status.userid=users_fb.userid LEFT OUTER JOIN users ON users_status.userid=users.userid WHERE users_status.userid<>'100001053825620' AND users_status.userid<>'100001207878953' AND users_status.userid<>'100001154236917' AND users_status.userid<>'100001330375585' AND users_status.userid<>'100001179873334' AND users_status.userid<>'1109693432' AND users_status.userid<>'1818793293' AND users_status.userid<>'100001541835598' AND users_status.userid<>'100001266585840' AND users_status.userid<>'100001330375585' AND users_status.userid<>'100001330375585' AND users_status.userid<>'100001330375585' AND users_status.userid<>'100001330375585' AND users_status.userid<>'100001330375585' AND users_status.userid<>'1435131917' ORDER BY users_status.level DESC, users_fb.req_num DESC ";
 $query=mysql_query($sql);

    $i=1;
  while($player = mysql_fetch_assoc($query)) {
    $name=$player["name"];
    $level=$player["level"];
    $score=($player["level"]*100)+($player["req_num"]*10);
    
    
  ?>
    
     <tr> 
     
     <td width="300" align="left"><?php echo $name;?></td>
     <td width="300" align="center"> <?php echo $level;?> </td>
       <td width="300" align="center"> <?php echo $i++; ?> </td>
     </tr>  
   <?php  } ?>
       
       </html>  