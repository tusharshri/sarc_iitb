
			
			<?php include 'header.php'; ?> 
            <script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	
	
	</script>
			<div id="mainbody" >
		 
          
			<div id="rightnav" >
            <div class="one" onclick="contents_load('index_part')"></div>
            <div class="two" onclick="contents_load('event_part')"></div>
            <div class="three" onclick="contents_load('schedule_part')"></div>
            <div class="four" onclick="contents_load('sponsors_part')"></div>  
        </div> 
            
            <div id="mainpart">
			<?php require 'index_part.php'; ?>
            
            </div>
             <?php include 'footer.php'; ?>
            
           
		<?php include 'social.php'; ?>			
        </body>

	
</html>