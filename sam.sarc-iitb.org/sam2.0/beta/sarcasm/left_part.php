 
 
 <div id="left_nav">
                  <p> <script language="JavaScript">
TargetDate = "09/23/2012 11:55 PM";
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
                         <h1 style="margin-left: 30px; font-size:20px; "> Level : <?php  echo $_SESSION['level'];  ?></h1>
                         
                         </div>
                         <div style="height: 50px;"> 
                         <h1 style="margin-left: 30px; font-size:20px;"> Score : <?php  echo ($_SESSION['level']*100)+($_SESSION['fb_req']*10);  ?></h1>
                         
                         </div>
                  </div>  