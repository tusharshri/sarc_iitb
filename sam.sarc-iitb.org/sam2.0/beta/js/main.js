function load(a){
    window.location= a;
   }
    
function contents_load(a){
       //alert(a+'.php')
        $("#mainpart").slideUp(200);
        $("#mainpart").html('<img src="image/ajax-loader.gif" style="margin-left:330px; margin-top:50px;"></img>');
        $("#mainpart").load(a+'.php');
        $("#mainpart").delay(200).slideDown('1000');

   }
 /* function dissapear(){
   $('#uppper').css('height','0px');
   $('#upper').slideUp(3000);
   $('#lower').css('height','0px');
   $('lower').slideDown(3000);
   
   } */
   
$(document).ready(function(){
		$(".one").mouseover(function(){
			$(".one").css({
			backgroundPosition: '-0px -430px'
			 });
		}).mouseout(function(){
			$(".one").css({
			backgroundPosition: '-215px -0px'
			 });
		});
		$(".two").mouseover(function(){
			$(".two").css({
			backgroundPosition: '-215px -215px'
			 });
		}).mouseout(function(){
			$(".two").css({
			backgroundPosition: '-0px -215px'
			 });
		});
		$(".three").mouseover(function(){
			$(".three").css({
			backgroundPosition: '-215px -430px'
			 });
		}).mouseout(function(){
			$(".three").css({
			backgroundPosition: '-0px -0px'
			 });
		});
		$(".four").mouseover(function(){
			$(".four").css({
			backgroundPosition: '-0px -645px'
			 });
		}).mouseout(function(){
			$(".four").css({
			backgroundPosition: '-215px -645px'
			 });
		});
		
});

$(document).ready(function(){
			var value=0;
			var value1=90;
				var rotation = function (){
			   $("#loading img").rotate({
				  angle:value, 
				  animateTo:value1, 
				  callback: rotation,
				  easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
					  return c*(t/d)+b;
				  }
			   });
			   value=value1;
			   value1=value1+90;
			}
			rotation();
		});

  function dissapear(){
   
   $('#upper').slideUp(3000);
   }
   
   
   function showmore(a){
	var type;
	type=$('#hid'+a).attr('class');
	
	if(type=="hidden"){
		$('#hid'+a).removeClass('hidden').slideDown(800).addClass('visible');
		$('#span'+a).html("..Show Less");
	        
	}
	else if(type=="visible"){
		$('#hid'+a).removeClass('visible');
	    $('#hid'+a).slideUp(800).addClass('hidden');
		$('#span'+a).html(">>Show More");		
	}
	}