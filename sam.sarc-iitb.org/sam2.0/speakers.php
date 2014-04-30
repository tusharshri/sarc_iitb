<?php
require_once('db_connect.php');


?>
<style type="text/css">
	
	
	.speaker_profile{
		display:none;
		float:left;
		background-color:#eee;
		padding:10px 3px 10px 5px;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
	}
	#sectors li{
		display: inline;
padding: 6px 15px;
background-color: #00013D;
color: white;
font-weight: normal;
font-size: 14px;
text-shadow: 1px 1px 1px black;
-moz-border-radius:3px 3px 0 0;
-webkit-border-radius:3px 3px 0 0;
cursor:pointer;
	}
	.current{
	background-color: #EEE !important;
border: 1px #DDD solid !important;color: black !important;
font-weight: bold !important;
text-shadow: 1px 1px 1px #888 !important;
}
</style>
<script type="text/javascript">
	
		function changetab(a){
			$('.speaker_profile').css('display', 'none');
			$('#'+a).css('display', 'block');
			$('#fmcg1, #it1, #consult1, #finance1').removeClass('current');
			$('#'+a+'1').addClass('current');
			
	     	
		}
	
	
</script>
<div id="content1">

    <h2>Speakers at Student Alumni Meet 2011</h2>
	<?php
	if(isset($_GET['id'])){
include "slot.php";
}
?>
	<ul id="sectors" style="margin-bottom:0px">
		<li onclick="changetab('fmcg');" id="fmcg1" class="current" >FMCG</li>
		<li onclick="changetab('it');" id="it1" >IT/Softwares</li>
		<li onclick="changetab('consult');" id="consult1">Consultancy</li>
		<li onclick="changetab('finance');" id="finance1">Finance & Banking</li>
    </ul>
	<div id="fmcg" style="display:block;" class="speaker_profile">
	<h3>DAY 1</h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=1 AND field='FMCG'");
    if(mysql_num_rows($sql)!=0){
    while($speaker = mysql_fetch_array($sql))
  {
  ?>
    <div class="profile">
        <div class="profile_info">

            <name><?php echo $speaker['name'] ?></name><br>
        <?php if($speaker['batch']!='0') echo $speaker['batch'].", "; echo $speaker['department']."<br>".$speaker['field']; ?>
            <br>
            <hr style="border-top:1px solid #eee;border-bottom:none;">
           <?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
        </div>
        </div>
        <div class="profile_pic">
         <img src="images/profiles/<?php echo $speaker['picUrl']?>">
        </div>
    </div>
    <?php
}     }
    else{
       echo "This List is not yet available. Please visit Later.";
    }
     ?>
     <h3>DAY 2</h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=2 AND field='FMCG'");
        if(mysql_num_rows($sql)!=0){
            while($speaker = mysql_fetch_array($sql))
          {
          ?>

            <div class="profile">
                <div class="profile_info">

                    <name><?php echo $speaker['name'] ?></name><br>
                <?php echo $speaker['batch'].", ".$speaker['department']."<br>".$speaker['field']; ?>
                    <br>
                    <hr style="border-top:1px solid #eee;border-bottom:none;">
					<?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
				</div>
                </div>
                <div class="profile_pic">
                 <img src="images/profiles/<?php echo $speaker['picUrl']?>">
                </div>
            </div>
              <?php
}
        }
       else{
       echo "This List is not yet available. Please visit Later.";
    }
    ?>

</div>
<div class="speaker_profile hidden" id="it">
	<h3>DAY 1</h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=1 AND field='IT/Softwares'");
    if(mysql_num_rows($sql)!=0){
    while($speaker = mysql_fetch_array($sql))
  {
  ?>
    <div class="profile">
        <div class="profile_info">

            <name><?php echo $speaker['name'] ?></name><br>
        <?php echo $speaker['batch'].", ".$speaker['department']."<br>".$speaker['field']; ?>
            <br>
            <hr style="border-top:1px solid #eee;border-bottom:none;">
           <?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
        </div>
        </div>
        <div class="profile_pic">
         <img src="images/profiles/<?php echo $speaker['picUrl']?>">
        </div>
    </div>
    <?php
}     }
    else{
       echo "This List is not yet available. Please visit Later.";
    }
     ?>
     <h3>DAY 2 </h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=2 AND field='IT/Softwares'");
        if(mysql_num_rows($sql)!=0){
            while($speaker = mysql_fetch_array($sql))
          {
          ?>

            <div class="profile">
                <div class="profile_info">

                    <name><?php echo $speaker['name'] ?></name><br>
                <?php echo $speaker['batch'].", ".$speaker['department']."<br>".$speaker['field']; ?>
                    <br>
                    <hr style="border-top:1px solid #eee;border-bottom:none;">
					<?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
				</div>
                </div>
                <div class="profile_pic">
                 <img src="images/profiles/<?php echo $speaker['picUrl']?>">
                </div>
            </div>
              <?php
}
        }
       else{
       echo "This List is not yet available. Please visit Later.";
    }
    ?>

</div>


<div class="speaker_profile hidden" id="consult">
	<h3>DAY 1 </h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=1 AND field='Consultancy'");
    if(mysql_num_rows($sql)!=0){
    while($speaker = mysql_fetch_array($sql))
  {
  ?>
    <div class="profile">
        <div class="profile_info">

            <name><?php echo $speaker['name'] ?></name><br>
        <?php echo $speaker['batch'].", ".$speaker['department']."<br>".$speaker['field']; ?>
            <br>
            <hr style="border-top:1px solid #eee;border-bottom:none;">
           <?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
        </div>
        </div>
        <div class="profile_pic">
         <img src="images/profiles/<?php echo $speaker['picUrl']?>">
        </div>
    </div>
    <?php
}     }
    else{
       echo "This List is not yet available. Please visit Later.";
    }
     ?>
     <h3>DAY 2</h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=2 AND field='Consultancy'");
        if(mysql_num_rows($sql)!=0){
            while($speaker = mysql_fetch_array($sql))
          {
          ?>

            <div class="profile">
                <div class="profile_info">

                    <name><?php echo $speaker['name'] ?></name><br>
                <?php echo $speaker['batch'].", ".$speaker['department']."<br>".$speaker['field']; ?>
                    <br>
                    <hr style="border-top:1px solid #eee;border-bottom:none;">
					<?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
				</div>
                </div>
                <div class="profile_pic">
                 <img src="images/profiles/<?php echo $speaker['picUrl']?>">
                </div>
            </div>
              <?php
}
        }
       else{
       echo "This List is not yet available. Please visit Later.";
    }
    ?>

</div>

<div class="speaker_profile hidden" id="finance">
	<h3>DAY 1</h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=1 AND field='Finance and Banking'");
    if(mysql_num_rows($sql)!=0){
    while($speaker = mysql_fetch_array($sql))
  {
  ?>
    <div class="profile">
        <div class="profile_info">

            <name><?php echo $speaker['name'] ?></name><br>
        <?php echo $speaker['batch'].", ".$speaker['department']."<br>".$speaker['field']; ?>
            <br>
            <hr style="border-top:1px solid #eee;border-bottom:none;">
           <?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
        </div>
        </div>
        <div class="profile_pic">
         <img src="images/profiles/<?php echo $speaker['picUrl']?>">
        </div>
    </div>
    <?php
}     }
    else{
       echo "This List is not yet available. Please visit Later.";
    }
     ?>
     <h3>DAY 2</h3>
<?php
    $sql=mysql_query("SELECT * FROM profiles WHERE type='speakers' AND day=2 AND field='Finance and Banking'");
        if(mysql_num_rows($sql)!=0){
            while($speaker = mysql_fetch_array($sql))
          {
          ?>

            <div class="profile">
                <div class="profile_info">

                    <name><?php echo $speaker['name'] ?></name><br>
                <?php echo $speaker['batch'].", ".$speaker['department']."<br>".$speaker['field']; ?>
                    <br>
                    <hr style="border-top:1px solid #eee;border-bottom:none;">
					<?php
					if(strlen($speaker['description'])>200){
					?>
            <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200)."</span><span onClick=showmore(".$speaker['id'].") id='span".$speaker['id']."' class='more'> >>Show more</span>"; ?>
                <?php
				}
				else{
				?>
				<div  class="desc"> <?php echo $speaker['description']; ?>
				<?php
				}
				?>
				</div>
                </div>
                <div class="profile_pic">
                 <img src="images/profiles/<?php echo $speaker['picUrl']?>">
                </div>
            </div>
              <?php
}
        }
       else{
       echo "This List is not yet available. Please visit Later.";
    }
    ?>

</div>


</div>