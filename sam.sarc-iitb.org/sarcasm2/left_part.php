

 <div id="left_nav">
 <div style="width:100%; height:30px; background:#E70776; color:#FFF; font-size:20px; margin-top:50px;"><center>Leaderboard</center></div>
<table border="5px" style="margin-top: 10px; background: #FFF; color: #737373;">
     <tr> 
    
     <th width="300" align="left"> Name </th>
     <th width="300" align="center"> level  </th>
       <th width="300" align="center"> Rank  </th>
     </tr>

<?php 
 $sql="SELECT users_status.userid,users.name,users_status.level ,users_fb.req_num  FROM users_status LEFT OUTER JOIN users_fb ON users_status.userid=users_fb.userid LEFT OUTER JOIN users ON users_status.userid=users.userid WHERE users_status.userid<>'100001221240314' AND users_status.userid<>'100002323254736' AND users_status.userid<>'1568167193' AND users_status.userid<>'100002015941257' AND users_status.userid<>'100001299229627' AND users_status.userid<>'100001179873334' AND users_status.userid<>'100002728803626' AND users_status.userid<>'1407366689' AND users_status.userid<>'100001186198583' AND users_status.userid<>'100001239999334' AND users_status.userid<>'1463191972' AND users_status.userid<>'100001420441642' AND users_status.userid<>'100000545384168' AND users_status.userid<>'100001207878953' AND users_status.userid<>'100001541835598' AND users_status.updated_at <= '2013-09-29 13:00:00' ORDER BY users_status.level DESC, users_status.updated_at ASC LIMIT 10";
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
	
     </table>  
	 <div style="text-align:center; font-size: 20px;"><a href="./lead.php" target="_blank">More</a></div>
	 
	 <a href="https://www.facebook.com/SARC.2012/app_202980683107053" target="_blank"><div class="dabbabox">Hints</div></a>
	 <a href="./rules.php" target="_blank"><div class="dabbabox">Rules</div></a>
	 <div style="clear:both"></div>
     <!--               <p> <script language="JavaScript">
TargetDate = "09/29/2013 11:55 PM";
BackColor = "#EEEEEE";
ForeColor = "red";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "Time Remaining <br> %%H%% :: %%M%% :: %%S%% <br>";
FinishMessage = "SARCasm is over. But you can still have a go! :)<br>";
</script>
<script language="JavaScript" src="http://scripts.hashemian.com/js/countdown.js"></script>
                       <a href="rules.php" target="_blank" >Rules & Regulations </a> <br /> 
                       <a href="lead.php" target="_blank"> Leaderboard</a>   <br />      
                       <a href="https://www.facebook.com/SARC.2012/app_202980683107053" target="_blank">Forum</a> <br/>
                       <a href="hints.php" target="_blank">Hints</a><br /></p>
                       <div style="height: 50px;"> 
                         <h1 style="margin-left: 30px; font-size:20px; "> Level : <?php  //echo $_SESSION['level'];  ?></h1>
                         
                         </div>
                         <div style="height: 50px;"> 
                         <h1 style="margin-left: 30px; font-size:20px;"> Score : <?php  //echo ($_SESSION['level']*100)+($_SESSION['fb_req']*10);  ?></h1>
                         
                         </div> -->
                  </div>  
				  
				  
				 