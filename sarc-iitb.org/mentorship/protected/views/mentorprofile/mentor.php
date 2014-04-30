<?php //TODO: Copy the content into partial inside alumnus view page 
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php if($mAlumnus!=NULL){ ?>
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
<!--<a href="<?php echo $this->createUrl('site/logout')?>" style="float:right;">Logout</a>-->
<table id="alumnus">
    <tr><th>Alumnus Id: </th><td><?php echo $mAlumnus->id; ?></td></tr>
    <tr><th>Name: </th><td><?php echo str_replace("  "," ",$mAlumnus->salutation." ".$mAlumnus->firstName." ".$mAlumnus->middleName." ".$mAlumnus->lastName); ?> <a href="">View Profile</a></td></tr>
    <tr><th>Department: </th><td><?php echo $mAlumnus->departmentCode; ?></td></tr>
    <tr><th>Course: </th><td><?php echo $mAlumnus->degree; ?></td></tr>
    <tr><th>Class: </th><td><?php echo $mAlumnus->class; ?></td></tr>
    <?php
    if(isset($mAlumnus->profDetails)){
    ?>
    <tr>
        <th>Prof. Details: </th>
        <td>
            <ul>
                <?php foreach($mAlumnus->profDetails as $key=>$profDetail){?>
                <li>
                    <br/><b>Designation: </b><span class="designation"><?php echo $profDetail->designation; ?></span>
                    <br/><b>Company: </b><span class="company"><?php echo $profDetail->company; ?></span>
                    <br/><b>Industry: </b><span class="industry"><?php echo $profDetail->industryId; ?></span>
                </li>
                <?php } ?>
            </ul>
            <b>Work Profile: </b><span class="workProfile"><?php echo $mAlumnus->workProfile ?></span>
        </td>
    </tr>
    <?php }
    if(isset($mAlumnus->personalDetails)){
    ?>
    <tr>
        <th>Personal Details: </th>
        <td>
            <ul>
                <?php foreach($mAlumnus->personalDetails as $key=>$personalDetail){ ?>
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
    if(isset($mAlumnus->emailIds)){
    ?>
    <tr>
        <th>Email Ids: </th>
        <td>
            <ul>
                <?php foreach($mAlumnus->emailIds as $key=>$emailId){ ?>
                <li><span class="emailId"><?php echo $emailId->emailId;?></span></li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php }
    if(isset($mAlumnus->phoneNumbers)){
    ?>
    <tr>
        <th>Phone Numbers: </th>
        <td>
            <ul>
                <?php foreach($mAlumnus->phoneNumbers as $key=>$phoneNumber){ ?>
                <li><span class="phoneNumber"><?php echo $phoneNumber->phoneNumber?></span></li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php } ?>


</table>
<?php }else { ?>
<p>
Sorry! You are not alloted any mentor yet. <br/> If you have registered for the program, please contact us at sarc@iitb.ac.in
</p>
<?php } ?>
