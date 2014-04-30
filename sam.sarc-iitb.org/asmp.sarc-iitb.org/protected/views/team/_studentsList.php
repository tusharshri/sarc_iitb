<?php
    Yii::app()->clientScript->registerCoreScript('jquery');
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl.'/js/jquery.tablednd.js');
    $cs->registerCssFile($baseUrl.'/css/custom/team_allot.css');
?>
<div class="note">
    <p> </p>
</div>

<div id="filter_panel">
    <div id="show">
        <span> Show Only: </span>
        <div>

        </div>
    </div>
    <div id="sort">
        <span> Sort By: </span>
        <div>

        </div>
    </div>
</div>

<table id="students" cellspacing="0">
    <tr>
        <th>S.No.</th>
        <th class="studentId">Id</th>
        <th class="rollNumber"> Roll No.</th>
        <th class="name">Name</th>
        <th class="degree">Course</th>
        <th class="year_class">Year</th>
        <th class="department">Dept</th>
        <th class="mentorshipPreferences">Preference</th>
        <th class="emailId">Email Id</th>
        <th class="phoneNumber">Ph. Number</th>
        <th class="status">Status</th>
    </tr>
<?php
    $i=1;
    foreach($mStudent as $key=>$student){
        $year=12-substr($student->rollNumber,0,2);
?>
    <tr>
        <td><?php echo $i ?></td>
        <td class="studentId"><?php echo "<a href='".Yii::app()->createUrl('team/allot',array('role'=>'student','id'=>$student->id))."'>".$student->id."</a>"; ?></td>
        <td class="rollNumber"><?php echo $student->rollNumber; ?></td>
        <td class="name"><?php echo str_replace("  "," ",$student->salutation." ".$student->firstName." ".$student->lastName); ?></td>
        <td class="degree"><?php echo $student->degree ?></td>
        <td class="year_class">
            <br/><b>Year:</b><span class="year"><?php echo $year ?></span>
            <br/><b>Class:</b><span class="class"><?php echo $student->class ?></span>
        </td>
        <td class="department"><?php echo $student->departmentCode ?></td>
        <td class="mentorshipPreferences">
<?php
            $studentPrefs=$student->mentorshipPreferences;
         foreach($studentPrefs as $key=>$studentPref){
            echo "<li style='list-style-type:none;'>";//TODO:remove this inline style
            echo "<br><b>Preference:</b><span class='pref'>".$studentPref->preference."</span>";
            echo "<br><b>Department:</b><span class='prefDept'>".$studentPref->preferredDepartmentCode."</span>";
            echo "<br><b>AreaOfInterest:</b><span class='aoi'>".$studentPref->areaOfInterest."</span>";
            echo "</li>";
         }
?>
        </td>
        <td class="emailId"><?php echo $student->emailId; ?></td>
        <td class="phoneNumber"><?php echo $student->phoneNumber; ?></td>
        <td class="status">
          <?php
          $status='working';
          echo $status;
          ?>
        </td>

    </tr>
<?php
    $i++;
    }
?>
</table>