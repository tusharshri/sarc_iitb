<?php
    Yii::app()->clientScript->registerCoreScript('jquery');
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl.'/js/jquery.tablednd.js');
    $cs->registerCssFile($baseUrl.'/css/custom/team_allot.css');
?>
<div class="note">
    <p> Only alumni who have responded to mails are being shown </p>
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

<table id="alumni" cellspacing="0">
    <tr>
        <th>S.No.</th>
        <th class="alumnusId">Id</th>
        <th class="name">Name</th>
        <th class="degree">Degree</th>
        <th class="class">Class</th>
        <th class="department">Dept</th>
        <th class="mentorshipPreferences">Preference</th>
        <th class="profDetails">Work</th>
        <th class="status">Status</th>
    </tr>
<?php
    $i=1;
    foreach($mAlumnus as $key=>$alumnus){
?>
    <tr>
        <td><?php echo $i ?></td>
        <td class="alumnusId"><?php echo "<a href='".Yii::app()->createUrl('team/allot',array('role'=>'alumnus','id'=>$alumnus->id))."'>".$alumnus->id."</a>" ?></td>
        <td class="name"><?php echo str_replace("  "," ",$alumnus->salutation." ".$alumnus->firstName." ".$alumnus->lastName); ?></td>
        <td class="degree"><?php echo $alumnus->degree ?></td>
        <td class="class"><?php echo $alumnus->class ?></td>
        <td class="department"><?php echo $alumnus->departmentCode ?></td>
        <td class="mentorshipPreferences">
<?php
            $alumnusPrefs=$alumnus->mentorshipPreferences;
         foreach($alumnusPrefs as $key=>$alumnusPref){
            $nom=$alumnusPref->numberOfMentees;if($nom==0){$nom='Any';}
            echo "<br><b>No.ofMentees:</b><span class='nom'>".$nom."</span>";
            echo "<br><b>Preference:</b><span class='pref'>".$alumnusPref->preference."</span>";
            echo "<br><b>Department:</b><span class='prefDept'>".$alumnusPref->preferredDepartmentCode."</span>";
            echo "<br><b>AreaOfInterest:</b><span class='aoi'>".$alumnusPref->areaOfInterest."</span>";
         }
?>
        </td>
        <td class="profDetails">
<?php
        $alumnusProfDetails=$alumnus->profDetails;
        foreach($alumnusProfDetails as $key=>$profDetail){
          echo "<li style='list-style-type:none;'>";
          echo "<br><b>Designation:</b><span class='designation'>".$profDetail->designation."</span>";
          echo "<br><b>Company:</b><span class='company'>".$profDetail->company."</span>";
          echo "<br><b>Industry:</b><span class='industry'>".$profDetail->industry."</span>";
          echo "</li>";
        }

          echo "<br><b>WorkProfile:</b><span class='workProfile'>".$alumnus->workProfile."</span>";
?>
        </td>
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