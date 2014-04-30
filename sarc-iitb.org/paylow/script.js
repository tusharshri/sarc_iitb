<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $("button").click(function(){
    var div=$("div");
    div.animate({height:'500px',opacity:'0.4'},"slow");
    div.animate({width:'500px',opacity:'0.8'},"slow");
   
  });
});
</script> 
