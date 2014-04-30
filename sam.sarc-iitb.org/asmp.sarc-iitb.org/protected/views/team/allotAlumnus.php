<style>
#alumnus th{
    text-align: right;
}
#alumnus li{
    list-style-type:  none;
}
#alumnus li b{
    width:  100px;
}
</style>
<table id="alumnus">
    <tr><th>Alumnus Id: </th><td><?php echo $alumnus->id; ?></td></tr>
    <tr><th>Name: </th><td><?php echo str_replace("  "," ",$alumnus->salutation." ".$alumnus->firstName." ".$alumnus->middleName." ".$alumnus->lastName); ?></td></tr>
    <tr><th>Department: </th><td><?php echo $alumnus->departmentCode; ?></td></tr>
    <tr><th>Course: </th><td><?php echo $alumnus->degree; ?></td></tr>
    <tr><th>Class: </th><td><?php echo $alumnus->class; ?></td></tr>
    <?php if(isset($alumnus->mentorshipPreferences)){?>
    <tr>
        <th>Mentee Preferences: </th>
        <td>
            <ul>
                <?php foreach($alumnus->mentorshipPreferences as $key=>$menteePref){?>
                <li>
                    <br/><b>Number of Mentees: </b><span class="nom"><?php echo $menteePref->numberOfMentees; ?></span>
                    <br/><b>Preference: </b><span class="pref"><?php echo $menteePref->preference;?></span>
                    <br/><b>Department: </b><span class="prefDept"><?php echo $menteePref->preferredDepartmentCode;?></span>
                    <br/><b>Area Of Interest: </b><span class="aoi"><?php echo $menteePref->areaOfInterest;?></span>
                </li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php }
    if(isset($alumnus->profDetails)){
    ?>
    <tr>
        <th>Prof. Details: </th>
        <td>
            <ul>
                <?php foreach($alumnus->profDetails as $key=>$profDetail){?>
                <li>
                    <br/><b>Designation: </b><span class="designation"><?php echo $profDetail->designation; ?></span>
                    <br/><b>Company: </b><span class="company"><?php echo $profDetail->company; ?></span>
                    <br/><b>Industry: </b><span class="industry"><?php echo $profDetail->industry; ?></span>
                </li>
                <?php } ?>
            </ul>
            <b>Work Profile: </b><span class="workProfile"><?php echo $alumnus->workProfile ?></span>
        </td>
    </tr>
    <?php }
    if(isset($alumnus->personalDetails)){
    ?>
    <tr>
        <th>Personal Details: </th>
        <td>
            <ul>
                <?php foreach($alumnus->personalDetails as $key=>$personalDetail){ ?>
                <li>
                    <br/><b>Address: </b><span class="address"><?php echo $personalDetail->address; ?></span>
                    <br/><b>City: </b><span class="city"><?php echo $personalDetail->city; ?></span>
                    <br/><b>Pincode: </b><span class="pincode"><?php echo $personalDetail->pincode; ?></span>
                </li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php }
    if(isset($alumnus->emailIds)){
    ?>
    <tr>
        <th>Email Ids: </th>
        <td>
            <ul>
                <?php foreach($alumnus->emailIds as $key=>$emailId){ ?>
                <li><span class="emailId"><?php echo $emailId->emailId;?></span></li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php }
    if(isset($alumnus->phoneNumbers)){
    ?>
    <tr>
        <th>Phone Numbers: </th>
        <td>
            <ul>
                <?php foreach($alumnus->phoneNumbers as $key=>$phoneNumber){ ?>
                <li><span class="phoneNumber"><?php echo $phoneNumber->phoneNumber?></span></li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php } ?>
    <tr><th>Status: </th><td><span class="status"><?php echo ""; ?></span></td></tr>


</table>

<table id="mentorshipConnections">
    <tr>
        <th>Pref</th>
        <th>Mentor Pref</th>
        <th>Mentee Pref</th>
        <th>Name</th>
        <th>Course</th>
        <th>Year</th>
        <th>Dept.</th>
        <th>Hostel</th>
        <th>Ph. Number</th>
        <th>Email Id</th>
        <th>SOP</th>
        <th>Allot</th>
    </tr>

</table>

<table id="menteePref">
    <tr>
        <th>Pref</th>
        <th>Mentor Pref</th>
        <th>Mentee Pref</th>
        <th>Name</th>
        <th>Course</th>
        <th>Year</th>
        <th>Dept.</th>
        <th>Hostel</th>
        <th>Ph. Number</th>
        <th>Email Id</th>
        <th>SOP</th>
        <th>Allot</th>
    </tr>
    <?php
    foreach($alumnus->preferredStudents as $key=>$prefStudent){
        $student=$prefStudent->student;
        $year=12-substr($student->rollNumber,0,2);
        $studentPref=StudentPreferenceList::model()->findByAttributes(array('studentId'=>$student->id,'alumnusId'=>$alumnus->id))->preferenceIndex;
    ?>
    <tr>
        <td></td>
        <td><?php echo $prefStudent->preferenceIndex; ?></td>
        <td><?php echo $studentPref?></td>
        <td><?php echo str_replace("  "," ",$student->salutation." ".$student->firstName." ".$student->middleName." ".$student->lastName); ?></td>
        <td><?php echo $student->degree; ?></td>
        <td><?php echo $year; ?></td>
        <td><?php echo $student->departmentCode;?></td>
        <td><?php echo $student->hostel;?></td>
        <td><?php echo $student->phoneNumber;?></td>
        <td><?php echo $student->emailId; ?></td>
        <td><?php echo $student->sop; ?></td>
        <td><input type="button" value="Allot"/></td>
    </tr>
    <?php  } ?>
</table>