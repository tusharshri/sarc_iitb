$(function(){
$('#social img').hover(function() {
	$(this).animate({
    
   width: '75'
  }, 300);
}, function() {
	  $(this).animate({width:'50'},60);
    // Animation complete.
  });

});


$(function(){

	
	 	$('#abc ul').hide();	// Opera Fix
		$("#abc").hover(function(){
		$("#abc ul").slideDown(400);
		},function(){
			$("#abc ul").slideUp();
		
		});
	


});
$(function(){

	
	  $('#abc1 ul').hide();	// Opera Fix
		$("#abc1").hover(function(){
		$("#abc1 ul").slideDown(400);
		},function(){
			$("#abc1 ul").slideUp();
		
		});
	


});
