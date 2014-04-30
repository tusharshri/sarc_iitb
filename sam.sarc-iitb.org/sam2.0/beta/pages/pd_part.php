<?php
require_once('dbconnect.php');


?>
<br />    <h3 style="font-size:22px; font-weight:bold;">Speakers Profile</h2>           

<div id="ca-container1" class="ca-container">
<div class="ca-wrapper">
<?php
    $sql=mysql_query("SELECT * FROM profiles2012 WHERE type='panelists'");
    if(mysql_num_rows($sql)!=0){
		$i=1;
    while($speaker = mysql_fetch_array($sql))
  {
  ?>
  					<div class="ca-item ca-item-<?php echo $i; ?>">
						<div class="ca-item-main">
							<div ><img src="image/profiles/<?php echo $speaker['picUrl']?>" height="170"></div>
							<h3><br /><?php echo $speaker['name'] ?></h3>
							<h4>
								<span class="ca-quote">&ldquo;</span>
								<span><?php echo $speaker['short_desp']; ?></span>
							</h4>
								<a href="#" class="ca-more">more...</a>
						</div>
						<div class="ca-content-wrapper">
							<div class="ca-content">
								<h6><?php echo $speaker['name'] ?></h6>
								<a href="#" class="ca-close">close</a>
								<div class="ca-content-text">
									<p><?php if($speaker['batch']!='0') echo $speaker['batch'].", "; echo $speaker['department']."<br>".$speaker['field']; ?> <br /><?php echo $speaker['description']; ?></p>
								</div>
								<ul>
									<li><a href="#">Read more</a></li>
									<li><a href="#">Share this</a></li>
									<li><a href="#">Become a member</a></li>
									<li><a href="#">Donate</a></li>
								</ul>
							</div>
						</div>
					</div>
    <?php
			$i++;
		}  
	}
     ?>
    

</div>



</div>
		<script type="text/javascript">
			$('#ca-container1').contentcarousel();
		</script>
