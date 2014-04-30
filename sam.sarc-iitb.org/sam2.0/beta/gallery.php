
      
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
            <div class="four" onclick="load('gallery.php')"></div>  
        </div> 
            
            <div id="mainpart">
    
                  <embed style="margin:10px;" type="application/x-shockwave-flash" src="https://picasaweb.google.com/s/c/bin/slideshow.swf" width="97%" height="600" flashvars="host=picasaweb.google.com&captions=1&hl=en_US&feat=flashalbum&RGB=0x000000&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F109629160310412101923%2Falbumid%2F5799145174517731873%3Falt%3Drss%26kind%3Dphoto%26hl%3Den_US" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
             </div>
            
            
            
            
            </div>
             <?php include 'footer.php'; ?>
            
           
    <?php include 'social.php'; ?>  
<!--<script type="text/javascript">
  $(function(){
    $('#rightnav').css('height','670px');    
  });
  
</script>-->
        </body>

  
</html>