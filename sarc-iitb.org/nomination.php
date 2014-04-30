<?php
include "header.php";
?>


<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
 <script>
 



	
    function submit_nomination(){
      

                // binds form submission and fields to the validation engine

		  if(jQuery("#nomination").validationEngine('validate')){
			 	document.forms['nomination'].submit();
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
                <?php if(isset($_GET['q']) && $_GET['q']=="apply"){ ?>
                <h2 style="
    text-align: center;
    color: white;
	text-align: center;
display: block;
font-size: 25px;
padding: 20px;
background-color: rgba(53, 142, 251, 0.8);
color: #FFF; ">Nomination Form for SARC Core-Team 2014-15.</h2>

<?php
include "nomination_basic.php";
}
  else{  ?>
        <center><h2 style="
    text-align: center;
    color: white;
	text-align: center;
display: block;
font-size: 25px;
padding: 20px;
background-color: rgba(53, 142, 251, 0.8);
color: #FFF;
">Call for Nominations SARC CTM 2014-15</h2> </center>
         <?php 
include "nomination_content.php";
}
  ?>       
                
</div>
    </div>
<?php
include "footer.php";
?>