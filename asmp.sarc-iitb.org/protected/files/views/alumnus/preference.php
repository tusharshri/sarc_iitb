 <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/alumnusPreference.js'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.tablednd.js'); ?>
<style>
table th{
  text-align: center;
}
span.extra_sop{
  display:none;
}
a#expand{
  font-size:10px;
  text-decoration:none;
}
tr.even{
  background-color: #F0F8FF;
}
table#alumnusPreference{
  width:100%;
    font-size:12px;
    border-bottom:solid 1px #0000ff;
  margin-left: 0%;
}
table#alumnusPreference tr td{
  border-top:solid 1px #0000ff;
}
td.aoi{
  min-width: 150px;
}

</style>
<div class="notification">
<b>Instructions</b>
  <ul>
    <li> Please go through the details of these students and give us your preference. </li>
    <li> These students have been sorted as per our best match algorithm, with the best matches on the top.</li> 
    <li> You can reorder them if you want to. <b>Click and drag the rows to reorder them. </b></li>
    <li> The Statement of Purpose (student's career interests and expectations out of this program) and the resume of the the students have been made available. </li>
    <li> Once you finalize the preference order of your mentees, click <b>Submit button</b> in the bottom of the page. </li>
    <li> You will be alloted a maximum of 3 mentees based on your preferences. </li>
  </ul>
</div>
<?php

  $students=$mAlumnus->preferredStudents;
  echo "
      <table id='alumnusPreference'>
      <tr class='nodrop nodrag'>
        <th class='sno'> S.Id. </th>
        <th class='name'> Name </th>
        <th class='degree'>Course</th>
        <th class='department'>Department</th>
        <th class='year'>Year</th>
        <th class='hostel'>Hostel</th>
        <th class='aoi'>Areas of Interest</th>
        <th > Statement of Purpose </th>
        <th class='resume'>Resume</th>
      </tr>
      ";
  foreach($students as $key=>$student){
    $student=$student->student;

    $year=13-substr($student->rollNumber,0,2);
    if($year==1)$year.='<sup>st</sup>';
    else if($year==2)$year.='<sup>nd</sup>';
    else if($year==3)$year.='<sup>rd</sup>';
    else $year.="<sup>th</sup>";
    
    $department=Department::model()->findByAttributes(array('code'=>$student->departmentCode))->name;

        $tsop = $student->registrations[0]->sop;

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
    $i=0;
    $aoi[0]=$aoi[1]=$aoi[2]='';
    foreach($student->mentorshipPreferences as $key=>$preference){
      if($preference->areaOfInterest != 'Any'&& $i==0){
        $aoi[0]="<li>".$preference->areaOfInterest.'<br/>';$i++;  
      }else if($preference->areaOfInterest != 'Any'&& $i==1 && "<li>".$preference->areaOfInterest.'<br/>' != $aoi[0]){
        $aoi[1]="<li>".$preference->areaOfInterest.'<br/>';$i++;  
      }else if($preference->areaOfInterest != 'Any'&& $i==2 && "<li>".$preference->areaOfInterest.'<br/>' != $aoi[0] && "<li>".$preference->areaOfInterest.'<br/>' != $aoi[1]){
        $aoi[2]="<li>".$preference->areaOfInterest.'<br/>';$i++;
      }
    }
    $aois=$aoi[0].$aoi[1].$aoi[2];
    if($aois=='') $aois ="<i>Any</i>";
    ?>
    <tr id="<?php echo $student->id ?>">
      <td class='sno'><?php echo $student->id ?></td>
      <td class='name'><?php echo str_replace("  "," ",$student->salutation." ".$student->firstName." ".$student->middleName." ".$student->lastName); ?></td>
      <td class='degree'><?php echo $student->degree ?></td>
      <td class='department'><?php echo $department ?></td>
      <td class='year'><?php echo $year; ?></td>
      <td class='hostel'><?php echo $student->hostel ?></td>
      <td class='aoi'><?php echo $aois ?></td>
      <td class="sop"><?php echo $sop ?></td>
      <td class="resume"><a href='downloadResume/rollNumber/<?php echo $student->rollNumber ?>'>Resume</a></td>
    </tr>
    <?php
  }
  ?>
                </table>

  <form name="alumnusPreference" id="preferenceForm" action="submitPreference" method="post">
    <input type="hidden" name="preference" id="preferenceOrder">
    <input type="submit" style="padding:5px" value="Submit">
  </form>
  
  <p style="margin-top:100px;font-weight:bold;"> For any queries contact us at sarc@iitb.ac.in </p>

