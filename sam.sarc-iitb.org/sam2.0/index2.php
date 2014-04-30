<div id="upper" style="position:absolute;height:150%;width:100%;border:1px solid red;z-index:200;margin:0px auto; margin:0 auto; padding:0; border:none;" >

     <img src="image/poster_org.jpg" width="100%" height="1000px" onclick="dissapear()" />
     
</div>

      
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