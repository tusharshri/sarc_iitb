			
			<?php include 'header.php'; ?> 
			<div id="mainbody" >
		 
          
			<div id="rightnav" >
            <a href="home.php"><div class="one"></div></a>	
            <a href="events.php"><div class="two"></div></a>    
             <a href="schedule.php"><div class="three"></div></a>   
              <a href="sponsors.php"><div class="four"></div></a>  
        </div> 
            
            
			<div id="mainpart">
        <!--    <h3 align="center" style="margin:20px 50px; font-size:18px;"> SAM Schedule  </h3>  -->
          <br/> 
		  
<center><img src="image/schedule_web.jpg" width="750" height="600" align="middle" alt="" /></center>
            
            
            
            
  </div>          
 
            </div>
             <?php include 'footer.php'; ?>
            
            <script type="text/javascript">
			// We only want these styles applied when javascript is enabled
			$('div.navigation').css({'width' : '250px', 'float' : 'left'});
			$('div.content').css('display', 'block');

			$(document).ready(function() {				
				// Initialize Minimal Galleriffic Gallery
				$('#thumbs').galleriffic({
					imageContainerSel:      '#slideshow',
					controlsContainerSel:   '#controls'
				});
			});
		</script>
        <?php include 'social.php'; ?>
			</body>

	
</html>

