$('#role').ready(function(){
    
    $('.role').change(function(){
        if(this.value==1){ // Student
            $('.hint#student').css('display','block');
        }else{
            $('.hint#student').css('display','none');
        }
    });
});
