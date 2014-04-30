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
   
   

