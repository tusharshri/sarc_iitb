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
  
  <h3>SARCasm has ended and the leaderboard is locked.</h3>
  
</br>
<table border="5px">
     <tr> 
    
     <th width="300" align="left"> Name </th>
     <th width="300" align="center"> level  </th>
       <th width="300" align="center"> Rank  </th>
     </tr>

<?php 
 $sql="SELECT users_status.userid,users.name,users_status.level ,users_fb.req_num  FROM users_status LEFT OUTER JOIN users_fb ON users_status.userid=users_fb.userid LEFT OUTER JOIN users ON users_status.userid=users.userid WHERE users_status.userid<>'100001221240314' AND users_status.userid<>'100002323254736' AND users_status.userid<>'1568167193' AND users_status.userid<>'100002015941257' AND users_status.userid<>'100001299229627' AND users_status.userid<>'100001179873334' AND users_status.userid<>'100002728803626' AND users_status.userid<>'1407366689' AND users_status.userid<>'100001186198583' AND users_status.userid<>'100001239999334' AND users_status.userid<>'1463191972' AND users_status.userid<>'100001420441642' AND users_status.userid<>'100000545384168' AND users_status.userid<>'100001207878953' AND users_status.userid<>'100001541835598' AND users_status.updated_at <= '2013-09-29 13:00:00' ORDER BY users_status.level DESC, users_status.updated_at ASC ";
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