<?php
include "header.php";
?>


<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
 <script>
 
 	function TestFileType( ) {
		var fileInput = $("#uploaded_file")[0];
		var fileName=fileInput.value;
		var fileTypes=".pdf";
if (!fileName) return "FALSE";

dots = fileName.split(".")
//get the part AFTER the LAST period.
fileType = "." + dots[dots.length-1];

	return (fileType==fileTypes ?
	"TRUE":"FALSE"); 

}

function TestFileSize(){
	var fileInput = $("#uploaded_file")[0];
           var imgbytes = fileInput.files[0].fileSize; // Size returned in bytes.
           var imgkbytes = Math.round(parseInt(imgbytes)/1024);	
		   if(imgkbytes<=1024 && imgkbytes>0){
			   return "TRUE";
		   }else{
				return "FALSE";   
		   }
}
	
    function submit_nomination(){
      

                // binds form submission and fields to the validation engine

		  if(jQuery("#nomination").validationEngine('validate')){
			 if(TestFileType()=="TRUE")
			 {	
			 	document.forms['nomination'].submit();
			 }else{
		     	  alert("Please upload pdf files only."); 
	   	  	 }
			 
		  }
	   	  
      
      

    }

        </script>


<style type="text/css">

    #left_extra{
        width:200px;
        float:left;
        margin-right:5px;
    }
    #volunteer_form{
        text-align:center ;
        margin-bottom:25px;
		width:100%;
    }
    form{
    width: 900px;
    background-color: #aaa;
  }
  form label{
    width: 29%;
        margin:8px 10px 0 0;
    float: left;
    clear: both;
    text-align:right;
  }
  form .input{
      margin-top:10px;
    width: 65%;
    float: right;
    text-align:left;
  }
    #interested span{
        float:left;
        margin-right:10px;
        margin-left:1px
    }
    #interested input{
        float:left;
        margin-top:4px;
    }
  form .input #firstName,form .input #middleName,form .input #lastName,form #name .hint{
    width: 30%;
  }
  form .input input[type=text],form .input input[type=text], form .input select{
    width: 90%;
  }
    #reg_thanks{
        margin-left:10px;
        color:#222;
    }
</style>
    <div class="container">
    </div>
        <div id="center">
      <div class="first">
              <div id="content1">
                <h2 style="
    text-align: center;
    color: white;
	text-align: center;
display: block;
font-size: 40px;
padding: 20px;
background-color: rgba(53, 142, 251, 0.8);
color: #FFF; ">SARC Family Tree<h2>

    <div style="text-align: center; ">
<h2 style="
    text-align: center;
    color: white;
  text-align: center;
display: block;
font-size: 40px;
padding: 20px;
background-color: rgba(204, 37, 37, 0.8);
color: #FFF; ">SARC Team 2013-2014<h2>
  <img src="img/team7.jpg">

  <p style="
    text-align: center;
    font-size: 20px;
color:white;">
From left (Standing)<br>
   Tuhina, Piyush, Vishwas, Bharat, Piyush, Tejas, Ananya, Nikhil, Mayank, Pradeep, Prannoy, Siddhant, Mounika </br>
   From left (Sitting)<br>
   Pramod, Divyansh, Gaurav, Nishith, Tushar, Nawroz, Punit, DP, Akshay, Rohit
  </P>
  <a style="
    text-align: center;
    font-size: 20px;
color:white;
text-decoration: underline;" href="http://sarc-iitb.org/">Official Website</a>  
  
      <!--<td width="107"><b>No. of posts</b></td>-->
    
 

  </div>  


    <div style="text-align: center; ">
<h2 style="
    text-align: center;
    color: white;
  text-align: center;
display: block;
font-size: 40px;
padding: 20px;
background-color: rgba(204, 37, 37, 0.8);
color: #FFF; ">SARC Team 2012-2013<h2>
  <img src="img/team6.jpg">

  <p style="
    text-align: center;
    font-size: 20px;
color:white;">
From left<br>
   Abhijit, Aditya, Mohit, Neeraj, Nikhil, Tejas, Shantonu, Ajay, Anup, Saubhagya, Vaibhav 
  </P>
    <a style="
    text-align: center;
    font-size: 20px;
color:white;
text-decoration: underline;" href="http://sarc-iitb.org/sarc2012_2013/">Official Website</a>  
      <!--<td width="107"><b>No. of posts</b></td>-->
    
 

  </div>

    <div style="text-align: center; ">
<h2 style="
    text-align: center;
    color: white;
  text-align: center;
display: block;
font-size: 40px;
padding: 20px;
background-color: rgba(204, 37, 37, 0.8);
color: #FFF; ">SARC Team 2011-2012<h2>
  <img src="img/team5.jpg">

  <p style="
    text-align: center;
    font-size: 20px;
  color:white;
">
From left<br>
   Mahendra, Dharma, Khushal, Pratik, Ashish, Saurav(bottom), Sanket, aditi, Hasan, Vaibhav, Shruti
  </P>
      <!--<td width="107"><b>No. of posts</b></td>-->
    
 

  </div>

    <div style="text-align: center; ">
<h2 style="
    text-align: center;
    color: white;
  text-align: center;
display: block;
font-size: 40px;
padding: 20px;
background-color: rgba(204, 37, 37, 0.8);
color: #FFF; ">SARC Team 2010-2011<h2>
  <img src="img/team3.jpg">

      <!--<td width="107"><b>No. of posts</b></td>-->
    
 

  </div>


    <div style="text-align: center; ">
<h2 style="
    text-align: center;
    color: white;
  text-align: center;
display: block;
font-size: 40px;
padding: 20px;
background-color: rgba(204, 37, 37, 0.8);
color: #FFF; ">SARC Team 2009-2010<h2>
  <img src="img/team2.jpg">

      <!--<td width="107"><b>No. of posts</b></td>-->
    
 

  </div>


<div style="text-align: center; ">
<h2 style="
    text-align: center;
    color: white;
	text-align: center;
display: block;
font-size: 40px;
padding: 20px;
background-color: rgba(204, 37, 37, 0.8);
color: #FFF; ">First Team<h2>
  <img src="img/team1.jpg" width="400px" height="300px">

  <p style="
    text-align: center;
    font-size: 20px;
	color:white;
">
From left <br>
   Rahul Jain, Ruchit Mehta, Deepak Sevta, Apoorv Tiwari, Gurveen Bedi, Prashant Khandelwal (Bottom)
  </P>
      <!--<td width="107"><b>No. of posts</b></td>-->
	  
 

  </div>
    
  </div></div>     
                
</div>
    </div>
<?php
include "footer.php";
?>