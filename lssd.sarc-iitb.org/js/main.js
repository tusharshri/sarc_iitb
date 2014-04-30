// JavaScript Document

$(document).ready(function(){
  
  var r = window.location.origin;
  
  $('#alumnus_all tbody tr').click(function(){
    var v =$(this).find('td:first').text();
    window.location=r+'/data/details/id/'+v;
  });

  $('#student_all tbody tr').click(function(){
    var v =$(this).find('td:first').text();
    window.location=r+'/student/details/id/'+v;
  });

  $('#volunteer_all tbody tr').click(function(){
    var v =$(this).find('td:first').text();
    window.location=r+'/volunteer/details/id/'+v;
  });
  $( "#Alumnus_dateofbirth,#Alumnus_attended_year,.date_field" ).datepicker({
            changeMonth: true,
            changeYear: true,
      dateFormat:"yy-mm-dd"
    });
});

function displayOthercompany(){
  
  $('.other_company').css('display','block');
  $('div.remove_button').css('display','none');
  
  
}

function displayeditOthercompany(){
  
  $('.displayeditOthercompany').removeClass('hide');
  $('div.remove_button').css('display','none');
  
}

function displayOther_mail(){
  
  if($('#first_mail').hasClass('hide')){
    $('#first_mail').removeClass('hide').addClass('show');  
  }else{
    if($('#second_mail').hasClass('hide')){
      $('#second_mail').removeClass('hide').addClass('show');  
    }else{
      if($('#third_mail').hasClass('hide')){
        $('#third_mail').removeClass('hide').addClass('show');  
        $('div.remove_button_mail').css('display','none');
      }else{
        
      }
    }    
  }
  
}

function displayOther_attend(){
  
  if($('#first_attend').hasClass('hide')){
    $('#first_attend').removeClass('hide').addClass('show');  
  }else{
    if($('#second_attend').hasClass('hide')){
      $('#second_attend').removeClass('hide').addClass('show');  
    }else{
      if($('#third_attend').hasClass('hide')){
        $('#third_attend').removeClass('hide').addClass('show');  
        $('div.remove_button_attend').css('display','none');
      }else{
        
      }
    }    
  }
  
}

function displayOther_contacted(){
  
  if($('#first_contacted').hasClass('hide')){
    $('#first_contacted').removeClass('hide').addClass('show');  
  }else{
    if($('#second_contacted').hasClass('hide')){
      $('#second_contacted').removeClass('hide').addClass('show');  
    }else{
      if($('#third_contacted').hasClass('hide')){
        $('#third_contacted').removeClass('hide').addClass('show');  
        $('div.remove_button_contacted').css('display','none');
      }else{
        
      }
    }    
  }
  
}