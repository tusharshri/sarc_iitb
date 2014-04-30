
			
			<?php include 'header.php'; ?> 
            <script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	
	
	</script>
			<div id="mainbody" >
		 
          
			<!--<div id="rightnav" >
            <div class="one" onclick="contents_load('index_part')"></div>
            <div class="two" onclick="contents_load('event_part')"></div>
            <div class="three" onclick="contents_load('schedule_part')"></div>
            <div class="four" onclick="load('gallery.php')"></div>  
        </div> -->
        <div id="rightnav">
            <a href="home.php"><div class="one"></div></a>	
            <a href="events.php"><div class="two"></div></a>    
             <a href="schedule.php"><div class="three"></div></a>   
              <a href="sponsors.php"><div class="four"></div></a>  
        </div> 
            
            <div id="mainpart">
			<?php require 'index_part.php'; ?>
            
            </div>
             <?php include 'footer.php'; ?>
            
           
		<?php include 'social.php'; ?>			
        </body>

	
</html>