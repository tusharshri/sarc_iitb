 <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/alumnusMentees.js'); ?>
<style>
    ol#mentees{
        margin-top: 20px;
    }
    table#mentee{

    }
    table#mentee tr th{
        width: 200px;
        text-align:right;
        padding: 5px;
        padding-right: 10px;
        margin:0px;
    }
    table#mentee tr td{
        padding-left: 10px;
    }
    tr.even{
  background-color: #F0F8FF;
    }
    ol#mentees li{
        margin: 20px;

    }
span.extra_sop{
  display:none;
}
a#expand{
  font-size:10px;
  text-decoration:none;
}

</style>
<?php
echo "Hi ".ucwords(str_replace("  "," ",$mAlumnus->salutation." ".$mAlumnus->firstName." ".$mAlumnus->middleName." ".$mAlumnus->lastName));
?>
<br/><br>
<p>The following mentee/s have been alloted to you.</p>
<ol id="mentees">
    <?php
    foreach($mMentees as $key=>$mentee){
        $mentee=$mentee->student;$department=Department::model()->findByAttributes(array('code'=>$mentee->departmentCode))->name;
        
        $year=13-substr($mentee->rollNumber,0,2);
        if($year==1)$year.='<sup>st</sup>';
        else if($year==2)$year.='<sup>nd</sup>';
        else if($year==3)$year.='<sup>rd</sup>';
        else $year.="<sup>th</sup>";

      if(isset($mentee->registrations[1]))
        $tsop=$mentee->registrations[1]->sop;
      else
        $tsop=$mentee->registrations[0]->sop;

        $soplen=strlen($tsop);
        if($soplen>200){
                $sop=substr($tsop,0,180)."<span class='extra_sop'>".substr($tsop,180)."</span>
                        <a href='#' id='expand'>
                                <span class='linktext'> &gt;&gt;&gt;Show&nbsp;More</span>
                                <span class='linktext' style='display:none'> <<<Show&nbsp;Less </span>
                        </a>";
        }else{
                $sop=$tsop;
        }

    ?><li>
    <table id="mentee">
        <tr><th class="name">Name:</th><td><?php echo ucwords(str_replace("  "," ",$mentee->salutation." ".$mentee->firstName." ".$mentee->middleName." ".$mentee->lastName));?></td></tr>
        <tr><th class="nick">Nick:</th><td><?php echo $mentee->nickName;?></td></tr>
        <tr><th class="degree">Course:</th><td><?php echo $mentee->degree;?></td></tr>
        <tr><th class="department">Department:</th><td><?php echo $department;?></td></tr>
        <tr><th class="year">Year:</th><td><?php echo $year; ?></td></tr>
        <tr><th class="hostel">Hostel:</th><td><?php echo $mentee->hostel;?></td></tr>
      <tr><th class="phoneNumber">Phone Number:</th><td><a href="tel:<?php echo $mentee->phoneNumber;?>"><?php echo $mentee->phoneNumber;?></a></td></tr>
      <tr><th class="emailId">EmailId:</th><td><a href="mailto:<?php echo $mentee->emailId;?>"><?php echo $mentee->emailId;?></a></td></tr>
      <tr><th class="skypeId">Skype Id:</th><td><?php if($mentee->skypeId=='') echo "<i>NOT AVAILABLE</i>"; else{ ?> 
<!--
Skype 'Skype Me™!' button
http://www.skype.com/go/skypebuttons
-->
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<a href="skype:<?php echo $mentee->skypeId;?>?call"><?php echo $mentee->skypeId;?><img width="20" height="20" src="http://download.skype.com/share/skypebuttons/buttons/call_green_white_92x82.png" style="border: none;" width="92" height="82" alt="Skype Me™!" /></a>
        <?php }?></td></tr>
        <tr><th class="sop">SOP:</th><td><?php echo $sop;?></td></tr>
    </table>
    </li>
    <?php } ?>
</ol>
    <p style="margin-top:100px;font-weight:bold;"> For any queries contact us at sarc@iitb.ac.in </p>

