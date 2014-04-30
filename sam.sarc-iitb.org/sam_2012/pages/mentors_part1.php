<?php
require_once('dbconnect.php');


?>
<style type="text/css">
  
  
  .speaker_profile{
    display:none;
    float:left;
    background-color:#eee;
    padding:10px 3px 10px 5px;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
  }
  
</style>
<script>
  $(function() {
    $( "#tabs-par" ).tabs();
     
  });
  
  </script>  

<br />    <h3 style="font-size:22px; font-weight:bold;">Speakers Profile</h2>
<div class="demo" style="float:left; width:800px;  margin:50px 45px; font-size:17px;">

<div id="tabs-par">
      <ul >
        <li ><a href="#Day_1"style="font-size:12px;">Day 1</a></li>
        <li><a href="#Day_2" style="font-size:12px;">Day 2</a></li>
      </ul>
  
  
  
          <div id="Day_1" style="display:block;" class="speaker_profile">
          <h4>Day 1</h4>
                <?php 
                    include('bti_part.php');
                ?>
          </div>

          <div id="Day_2" style="display:block;" class="speaker_profile" >
          <h4>Day 2</h4>
                <?php 
                    include('bti_part1.php');
                ?>
           </div>

  
  </div> 
</div>