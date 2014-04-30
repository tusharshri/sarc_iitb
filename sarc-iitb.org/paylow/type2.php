<html>
<head>

<link rel="stylesheet" type="text/css" href="mystyle.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script>
function toggle_visibility(id) {
      var thelist = document.getElementsByClassName("alist");
      for (var i = 0; i < thelist.length; i++) {
        thelist[i].style.display = 'none';
      }
      var e = document.getElementById(id);
      if(e.style.display == 'block') {
        e.style.display = 'none';
      } else {
        e.style.display = 'block';
      }
    }
</script>

<style>

*{
margin:0px;
}

#header {
   border: 1px solid #EDEDED;
   background: #f9f9f9;
  /* background: -webkit-gradient(linear, left top, left bottom, from(#d1d2f0), to(#a2afc7));
   background: -webkit-linear-gradient(top, #d1d2f0, #a2afc7);
   background: -moz-linear-gradient(top, #d1d2f0, #a2afc7);
   background: -ms-linear-gradient(top, #d1d2f0, #a2afc7);
   background: -o-linear-gradient(top, #d1d2f0, #a2afc7);
   background-image: -ms-linear-gradient(top, #d1d2f0 0%, #a2afc7 100%);*/
   -webkit-border-radius: 0px;
   -moz-border-radius: 0px;
   border-radius: 0px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:300px;
   padding:10px;
   width:100%;
  
   }
.header{
width: 100%;
height: 80px;
background-color: #64ce83;
box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

.form-container {
   border: 1px solid #EDEDED;
   background: #f7f7f7;
   /*background: -webkit-gradient(linear, left top, left bottom, from(#d1d2f0), to(#a2afc7));
   background: -webkit-linear-gradient(top, #d1d2f0, #a2afc7);
   background: -moz-linear-gradient(top, #d1d2f0, #a2afc7);
   background: -ms-linear-gradient(top, #d1d2f0, #a2afc7);
   background: -o-linear-gradient(top, #d1d2f0, #a2afc7);
   background-image: -ms-linear-gradient(top, #d1d2f0 0%, #a2afc7 100%);*/
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:300px;
   padding:25px;
   width:26%;
   margin-top:0px;
   margin-left:4%;

   }

.form-field {
   border: 1px solid #CDCDCD;
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   color: #000000;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(222,000,000,0.7) 0 0px 0px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(222,000,000,0.7) 0 0px 0px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(222,000,000,0.7) 0 0px 0px;
   padding:12px;
   background: #fff;
   margin-bottom:20px;
   width:90%;
}
.form-field:focus {
   background: #fff;
   color: #333;
 outline: none;
border: 1px solid #64ce83;
-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
}
   }
.form-container h2 {
   text-shadow: #fdf2e4 0 1px 0;
   font-size:18px;
   margin: 0 0 10px 0;
   font-weight:bold;
   text-align:center;
    }
.form-title {
   margin-bottom:10px;
   color: #000000;
   text-shadow: #fdf2e4 0 1px 0;
    }
.submit-container {
   margin:8px 0;
   text-align:right;
   }
.submit-container1 {
margin:8px 0;
/*text-align:left;*/
/*float: left;*/
display:inline;
margin-left:10%;
}

.testbutton {
  border: 1px solid #CDCDCD;
 -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

.wrapper  {
-moz-border-radius:7px 7px 7px 7px;
 /*border:1px solid #000; */
float:left;
/*margin:20px 0 20px;*/
min-height:100px;
width:100%;
padding:5px;
  
}

.post {
-moz-border-radius:7px 7px 7px 7px;

margin:20px;
min-height:100px;

padding-left: 0.0px;
  
}

.show {
-moz-border-radius:7px 7px 7px 7px;

display: block;
width: 600px;
padding: 140px;
margin-top: -600px;
  
}

.box{
  margin-top:10px;
}
</style>
</head>




<body>
      <div class="header">
        <div style="position: absolute;
left: 100px;
top: -15px;
width: 150px;
vertical-align: middle;
text-align: center;
font-family: Georgia, 'Times New Roman', Times, serif;
font-style: italic;
font-size: 45px;
padding: 0.6em 0 1em 0;">
          <h4><span style="color:white">pay</span><span style="color:black">LOW</span></h4>
        </div>
      </div>
      <!--<img src="logo1.png"> -->

<!--    <div id="header"> 
      
        </div> -->
    <!--
    <div class="box">
          <div style="margin-left:21%;" class="submit-container1">
        <div class="mybox" type="submit" value="Submit" />
        <img src="box11.png">
        </div>
      </div>

      <div style="margin-left:21%;" class="submit-container1">
        <div class="mybox" type="submit" value="Submit" />
        <img src="box11.png">
        </div>
      </div>

      <div style="margin-left:21%;" class="submit-container1">
        <div class="mybox" type="submit" value="Submit" />
        <img src="box11.png">
        </div>
      </div>
      -->
<!--            <div style="margin-left:21%;" class="submit-container1">
        <div class="mybox" type="submit" value="Submit" />
        <img src="box11.png">
          <p>Submit</p>
        </div>
      </div>                ***SAMPLE***   -->
         
          
        </div>
<div class="wrapper">
<div class="post">
    <div>
    <form class="form-container">
    <div class="form-title"><h2></h2></div>
    
    <div class="form-title">MOBILE NUMBER</div> 
    <input class="form-field" type="text" name="firstname" /><br />
    
    <div class="form-title">
                  <div class="form-title">PROVIDER</div>
                  <select id="state" class="form-field">
                    <option>Vodafone</option>
                    <option>Airtel</option>
                    <option>Videocon</option>
        <option>BSNL</option>
                  </select>
              </div>
    <div class="form-title">RECHARGE AMOUNT <a href="#" onclick="toggle_visibility('list1');">
      <p>See Tarif plans</p>
    </a>
    <input class="form-field" type="text" name="email" /><br />

    <div class="submit-container">
    <input class="myButton" type="submit" value="Submit" />

    </div>

  </form>

    </div></div>


 <div id="list1" class="show" style="display:none;">
<?php include 'vodafone_tarif.php'; ?>
</div>


<!--
<div class="post">
    <div style="width=100%">
    <div class="testbutton" style="background:#f7f7f7;height:0px;width:0px;">

</div>

<div>
<button id="test_button">Start Animation</button>
</div>
    </div>
   
</div>
-->

   
 

   
 

</div>

</div>

</div>




  


</body>

</html>
