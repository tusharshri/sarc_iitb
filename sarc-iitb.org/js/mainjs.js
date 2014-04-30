/**
 * Created by JetBrains PhpStorm.
 * User: Swaroop
 * Date: 6/23/11
 * Time: 12:49 AM
 * To change this template use File | Settings | File Templates.
 */

function animate_quotes(){
var quote_time=4500;
var index_q= $('#inner_quote .example').length;
function quotes(){
    $('#inner_quote').animate({"margin-top": "-=94px"}, quote_time/2);
}
function reset_quote(){
    $('#inner_quote').css("margin-top", "0px");
}
setInterval(reset_quote, quote_time*(index_q-1));
setInterval(quotes, quote_time);
}
function load(a){
    window.location= a;
}
function more_events(a){
    $('#upcoming').animate({"margin-top": "-="+a+"px"}, 'slow');
    $('.hidden').delay('25000').addClass('visible');
    $('.hidden').removeClass('hidden');
    $('#all_events').html('<a onclick="less_events('+a+')"><span style="float:right">Less Events</span></a>');
}
function less_events(a){
    $('#upcoming').animate({"margin-top": "+="+a+"px"}, 'slow');
    $('.visible').addClass('hidden');
    $('.visible').removeClass('visible');
    $('#all_events').html('<a onclick="more_events('+a+')"><span style="float:left">More Events</span></a>');
}

function variable(a){
	$('#sample'+a).delay(2500).animate({"left": "-=200px"}, "fast");

}

function variable1(a){
	$('#slide_events').delay(5000).animate({"margin-left": "-=182px"}, "slow");

}
function loadimages(a, b){
                // alert("loading....");
                var image="";
                for(var i=1; i<=b; i++){
                image=image + '<a href="images/'+a+'/fullscreen/'+i+'.jpg"><img class="fancy" src="images/'+a+'/'+i+'.jpg" alt=""/></a>';
                }
                $('#slide_events').html(image);
                }
function set(){
	var index=$('#slide img').length;
	for(var i=1; i<=index; i++){
	$('#sample'+i).delay(2500).animate({"left": "+="+200*(index-1)+"px"}, "fast");

	}
}
function set1(){
	$('#slide_events').delay(2500).css('margin-left', '-8px');


}


$(document).ready(function(){

function slideShow(){
	var index=$('#slide img').length-1;
	 	for(var j=0; j<index; j++){
		variable(1);
		variable(2);
		variable(3);
		variable(4);
		}
		set();
}
setInterval(slideShow, 7500);
function slideShow1(){
        //alert("slide");
var index=$('#slide_events img').length-3;
    for(var j=0; j<index; j++){
        variable1();

    }
        set1();
    }
slideShow1();
    setInterval(slideShow1, 23000);


});
    

function emailcheck(){
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var str=$('#email').val();
		if(reg.test(str)==false){
			$('#emailerror').html("Invalid E-mail")
			$('#emailerror').css("display", "inline");
			return false;
		}
		if(reg.test(str)==true){
			$('#emailerror').css("display", "none");
			return true;
		}

	}

function contents_load(a){
       // alert(a+'.php')
        $("#center .first").slideUp(100);
        $("#center .first").html('<img src="images/ajax-loader.gif" style="margin-left:155px"></img>');
        $("#center .first").load(a+'.php');
        $("#center .first").delay(100).slideDown('500');

   }
function contents_load1(a){
       // alert(a+'.php')
        $("#center .first").slideUp(100);
        $("#center .first").html('<img src="images/ajax-loader.gif" style="margin-left:155px"></img>');
        $("#center .first").load(a);
        $("#center .first").delay(100).slideDown('500');

   }
function scroll(a){
	//alert(a);
       $('html, body').animate({"scrollTop": (a-50)}, 400);
   }
function fade_td(a, b){
	//alert($('#events').html());
    $('.'+a).animate({'backgroundColor' : '#cccccc'}, 1000);
	$('.'+a).animate({'backgroundColor' : '#ffffff'}, 200);
	$('.'+a).animate({'backgroundColor' : '#eeeeee'}, 1000);
	$('.'+a).animate({'backgroundColor' : '#ffffff'}, 200);
    scroll(b);
}	
function showmore(a){
	var type;
	type=$('#hid'+a).attr('class');
	
	if(type=="hidden"){
		$('#hid'+a).removeClass('hidden');
		$('#hid'+a).addClass('visible');
		$('#span'+a).html("..Show Less");
	}
	else if(type=="visible"){
		$('#hid'+a).removeClass('visible');
	    $('#hid'+a).addClass('hidden');
		$('#span'+a).html("..Show More");
	}
}
$(document).ready(function(){
   
    $('.open_ul ul').hide();
$('.open_ul').click(function(){
   $(this).find('ul').toggle(200);
});

});
	
$(function(){
       $('#industrial li div').hide();
       $('#industrial li').click(function(){
        alert('found');
       $(this).next('div').show();
    });

	$('#map').click(function(){
		$('#gmap').slideToggle(400);

	});
	$('#social li img').hover(function(){
		$(this).animate({
		width:'30'
		}, 300);



	}, function(){
			$(this).animate({width:25}, 200);
		});

	
	/*$('#maintab li').hover(function(){
        $('#maintab li ul').css('display','none');
		$(this).find('ul:first').slideDown(100);

		alert('saurav');
	},function(){
		$(this).find('ul:first').hide();

	});*/




	$('.submit_contact').click(function(){
	if($('#nam').val()==""){
		$('#namerror').css("display", "inline");
		return 0;
	}
	if($('#email').val()==""){
		$('#emailerror').html("Please Provide E-mail");
		$('#emailerror').css("display", "inline");
		return 0;
	}
	if(emailcheck()==false){
		return 0;
	}
	var message=$('#message').val();
	if(message.length<10){
		$('#mssgerror').css("display", "inline");
		return 0;
	}
	$('#formdisplay').slideUp(400);
    var q=$('#feedback').serialize();
        //alert(q);
    $.ajax({
            data: q,
            type: 'POST',
            url : 'feedback_submit.php',
            success: function(data){
                if(data=="success"){
                   $('#formhide').slideDown(700);
                }
                else{
                    $('#formhide').html('There was a problem sending your message. Please Try again Later');
                    $('#formhide').slideDown(700);
                }
            }
        
                
    });

	//document.forms['contactus'].submit();


});
    $('.submit_inform').click(function(){
        var q=$('#inform_visit').serialize();
       // alert(q);
         $.ajax({
            data: q,
            type: 'POST',
            url : 'inform_basic.php',
            success: function(data){

                   $('#volunteer_form').slideUp(700);
                   $('#content1 p').html('Thanks for the information. We\'ll get back to you soon.<br><span style="float:right;"><a href="index.php">Back to Home</a></span>');
                

            }


    });

    });
	$('.submit_replacement').click(function(){
		//alert('working');
		
		var condition=$("#placement_info").validationEngine('validate');
		//alert(condition);
		if(condition==false){
		//alert(condition);
		$("#placement_info").validationEngine('validate');
		return 0;
		}
		else{
		
        var q=$('#placement_info').serialize();
        //alert(q);
         $.ajax({
            data: q,
            type: 'POST',
            url : 'slot.php',
            success: function(data){
				//alert(data);
				   if(data.trim()=="success"){
				    //alert('got');
                   $('#message').fadeOut(600, function(){});
				   $('#info p').delay(600).fadeIn(200);
				   
				   
				   
                }
				else{
				//alert('not done');
				   $('#volunteer_form').fadeOut(1000, function(){
					});
					$('#info').html('Sorry, we couldnot save your preference right now. Please visit us later or drop us a mail at <span style="color:#0000ff">sarc@iitb.ac.in</span><br>Regrets,<br>SARC Team.');
                   
                
				}

            }
			


    });
	}
	
    });
	$('.submit_hostel').click(function(){
		//alert('working');
		
		var condition=$("#placement_info").validationEngine('validate');
		//alert(condition);
		if(condition==false){
		//alert(condition);
		$("#placement_info").validationEngine('validate');
		return 0;
		}
		else{
		
        var q=$('#placement_info').serialize();
        //alert(q);
         $.ajax({
            data: q,
            type: 'POST',
            url : 'hostel_reg.php',
            success: function(data){
				//alert(data);
				   if(data.trim()=="success"){
				    //alert('got');
                   $('#message').fadeOut(600, function(){});
				   $('#info p').delay(600).fadeIn(200);
				   
				   
				   
                }
				else{
				//alert('not done');
				   $('#volunteer_form').fadeOut(1000, function(){
					});
					$('#info').html('Sorry, we couldnot save your preference right now. Please visit us later or drop us a mail at <span style="color:#0000ff">sarc@iitb.ac.in</span><br>Regrets,<br>SARC Team.');
                   
                
				}

            }
			


    });
	}
	
    });
	$('.submit_placement').click(function(){
		//alert('working');
		
		var condition=$("#placement_info").validationEngine('validate');
		//alert(condition);
		if(condition==false){
		//alert(condition);
		$("#placement_info").validationEngine('validate');
		return 0;
		}
		else{
		
        var q=$('#placement_info').serialize();
        //alert(q);
         $.ajax({
            data: q,
            type: 'POST',
            url : 'registrations.php',
            success: function(data){
				//alert(data);
				   if(data.trim()=="success"){
				   // alert('got');
                   $('#volunteer_form').slideUp(700);
				   $('#volunteer_form').html('');
				   $('#info').css('display', 'none');
                   $('#content1 p').html("Thank You. You have been registered for the 'Networking Sessions' at SAM 2011. <br>Please note that NOT attending sessions won't fetch you any incentive points.<br>Thanks<br>SARC Team.");
                }
				else{
				// alert('not done');
					$('#volunteer_form').html('');
					$('#volunteer_form').slideUp(700);
					$('#info').css('display', 'none');
                   $('#content1 p').html("We encountered a problem registering you. Please mail us your information for registration.<br>Inconvinience caused is highly regretted.<br>Thanks<br>SARC Team.");
                
				}

            }
			


    });
	}
	
    });
    $('.submit_tell').click(function(){
        var q=$('#tell').serialize();
       // alert(q);
         $.ajax({
            data: q,
            type: 'POST',
            url : 'tell_basic.php',
            success: function(data){

                   $('#volunteer_form').slideUp(700);
                   $('#content1 p').html('Thanks for the your co-operation.<br><span style="float:right;"><a href="index.php">Back to Home</a></span>');


            }


    });

    });
	$('#who').change(function(){
		if($(this).val()=="student"){
			$('#alumnitr').css("display", "none");
			$('#studenttr').show();
		}
		if($(this).val()=="alumni"){
            $('#studenttr').css("display", "none");
		    $('#alumnitr').show();
		}
		if($(this).val()=="other"){
			$('#alumnitr').css("display", "none");;
			$('#studenttr').css("display", "none");
		}

	});
});
