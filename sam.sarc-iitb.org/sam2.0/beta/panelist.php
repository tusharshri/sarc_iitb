<?php 
//require_once('dbconnect.php');
?>

Alumni Visiting Student Alumni Meet 2012. </br>

<?php 



  /* $sql=mysql_query("SELECT * FROM profiles WHERE type='panelists' AND day=2");
        if(mysql_num_rows($sql)!=0){
            while($speaker = mysql_fetch_array($sql))
          {
          ?>

            <div class="profile">
                <div class="profile_info">

            <?php echo "Name" ;?>       <name><?php echo $speaker['name'] ?></name><br>
                <?php if($speaker['batch']!=0)echo $speaker['batch'].", "; echo $speaker['department']."<br>".$speaker['field']; ?>
                    <br>
                    <hr style="border-top:1px solid #eee;border-bottom:none;">
                               <div  class="desc"> <?php echo substr($speaker['description'], 0 , 200)."<span id='hid".$speaker['id']."' class='hidden'>".substr($speaker['description'], 200); ?>
 
                </div>
                </div>
         <div class="profile_pic">
                 <img src="image/profiles/<?php echo $speaker['picUrl']?>">
                </div>
         </div>
              <?php
}
        }
    else{ } */
       echo "This List is not yet available. Please visit Later."; 
    ?>   