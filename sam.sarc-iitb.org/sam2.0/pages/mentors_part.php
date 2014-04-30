<?php
require_once('dbconnect.php');


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
  
</style>
<br /><br />
<div id="content1">

    <h3>Speakers Profile</h3>
  <?php
  if(isset($_GET['id'])){
include "slot.php";
}
?>
  
  <div id="day1" style="display:block;" class="speaker_profile">
  <h4>Day 1</h4>
<?php
    $sql=mysql_query("SELECT * FROM profiles2012 WHERE type='mentors' AND day='1'");
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
         <!--<img src="image/profiles/NotAvailable.jpg">-->
        </div>
    </div>
    <!--<script type="text/javascript">
$(function(){
    $('#rightnav').css('height','1800px');    
  });

</script>-->
    <?php
}     }
    else{
       echo "This List is not yet available. Please visit Later.";
    }
     ?>
    

</div>
<br />
  <div id="day2" style="display:block;" class="speaker_profile">
  <h4>Day 2</h4>
<?php
    $sql=mysql_query("SELECT * FROM profiles2012 WHERE type='mentors' AND day='2'");
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
         <!--<img src="image/profiles/NotAvailable.jpg">-->
        </div>
    </div>
    <script type="text/javascript">
$(function(){
    $('#rightnav').css('height','1800px');    
  });

</script>
    <?php
}     }
    else{
       echo "This List is not yet available. Please visit Later.";
    }
     ?>
    

</div>

</div>
