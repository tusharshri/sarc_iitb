<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/alumnusViewAllDetails.js');
$cs->registerCssFile($baseUrl.'/css/custom/alumnus_viewAllDetails.css');

$this->breadcrumbs=array(
	'Alumni'=>array('index'),
	$mAlumnus->id=>array('view','id'=>$mAlumnus->id),
	'Update',
);
?>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<h1>My Details</h1>

<div id="profilePicture">
    <table>
        <thead>
            <tr><th>Profile Picture</th><td></td><td><?php echo CHtml::link("Edit",array("alumnus/editprofile"))?></td></tr>
        </thead>
        <tbody>
            <tr>
            <td><img src="<?php  
			$filename=$_SERVER{'DOCUMENT_ROOT'} .'/beta.mentorship/images/alumnus/'.Yii::app()->session['alumnusId'].'.jpg';
			$file2='../images/alumnus/'.Yii::app()->session['alumnusId'].'.jpg';
				if (file_exists($filename)) {
					echo $file2;
				} else {
					echo '../images/dummy.gif';
				}
			?>" width="110" height="132" alt="PIC" /></td>
            </tr>
        </tbody>
    </table>
</div>


<div id="basicDetails">
    <table>
        <thead>
            <tr><th>Basic Details</th><td></td><td><?php echo CHtml::link("Edit",array("alumnus/updateBasic"))?></td></tr>
        </thead>
        <tbody>
            <tr> <th>Profile ID</th>    <td>:</td>      <td><?php if($mAlumnus->profileId==0) echo "NA"; else echo $mAlumnus->profileId; ?></td> </tr>
            <tr> <th>Name<span class="asterisk">*</span></th>          <td>:</td>      <td><?php echo str_replace("  "," ",$mAlumnus->salutation." ".$mAlumnus->firstName." ".$mAlumnus->middleName." ".$mAlumnus->lastName); ?></td> </tr>
            <tr> <th>Gender</th>        <td>:</td>      <td><?php if($mAlumnus->gender=='') echo "NA"; else if($mAlumnus->gender=="F") echo "Female"; else echo "Male"; ?></td>
            <tr> <th>Class<span class="asterisk">*</span></th>         <td>:</td>      <td><?php echo $mAlumnus->class; ?></td> </tr>
            <tr> <th>Degree<span class="asterisk">*</span></th>        <td>:</td>      <td><?php echo $mAlumnus->degree; ?></td> </tr>
            <tr> <th>Department<span class="asterisk">*</span></th>    <td>:</td>      <td><?php echo $mAlumnus->getDepartment(); ?></td> </tr>
            <tr> <th>Hostel<span class="asterisk">*</span></th>        <td>:</td>      <td><?php if($mAlumnus->hostel=="") echo "NA"; else echo $mAlumnus->hostel; ?></td> </tr>
            <tr> <th>Date of Birth</th> <td>:</td>      <td><?php if($mAlumnus->dateOfBirth=='0000-00-00') echo "NA"; else echo $mAlumnus->dateOfBirth; ?></td> </tr>
        </tbody>
    </table>
</div>

<hr/>

<div id="profDetails">
    <table>
        <thead>
            <tr> <th>Professional Details</th> <td></td> <td><?php echo CHtml::link("Edit",array("alumnus/updateProf"))?></td> </tr>
        </thead>
        <tbody>
<?php foreach ($mAlumnus->profDetails as $profDetail){?>
            <tr> <th>Designation<span class="asterisk">*</span></th>   <td>:</td>      <td><?php echo $profDetail->designation; ?></td> </tr>
            <tr> <th>Company<span class="asterisk">*</span></th>       <td>:</td>      <td><?php echo $profDetail->company; ?></td> </tr>
            <tr> <th>Industry</th>          <td>:</td>      <td><?php echo $profDetail->industry->name; ?></td> </tr>
<?php if($profDetail->address!=''){?>   <tr> <th>Address</th>       <td>:</td>      <td><?php echo $profDetail->address; ?></td>        </tr><?php } ?>
<?php if($profDetail->city!=''){?>      <tr> <th>City</th>          <td>:</td>      <td><?php echo $profDetail->city; ?></td>           </tr><?php } ?>
<?php if($profDetail->state!=''){?>     <tr> <th>State</th>         <td>:</td>      <td><?php echo $profDetail->state; ?></td>          </tr><?php } ?>
<?php if($profDetail->pincode!='0'){?>  <tr> <th>Pincode</th>       <td>:</td>      <td><?php echo $profDetail->pincode; ?></td>        </tr><?php } ?>
<?php if($profDetail->country!=''){?>   <tr> <th>Country</th>       <td>:</td>      <td><?php echo $profDetail->country->name; ?></td>  </tr><?php } ?>
            <tr> <th></th>              <td></td>       <td></td> </tr>   
<?php } ?>
            <tr> <th>LinkedIn pub</th>  <td>:</td>      <td><?php echo $mAlumnus->linkedin; ?></td> </tr>  
            <tr> <th>Work Profile<span class="asterisk">*</span></th>  <td>:</td>      <td><?php echo $mAlumnus->workProfile; ?></td> </tr>
            <tr> <th></th> <td></td> <td></td> </tr>      
            <tr> <th>Ph No.</th> <td>:</td> <td><?php
                foreach($mAlumnus->phoneNumbers as $phoneNumber){
                    if($phoneNumber->type=="work"){
                        echo $phoneNumber->phoneNumber." (work) <br/>";
                    }
                }
            ?></td> </tr>           
        </tbody> 
    </table>
</div>

<hr/>

<div id="personalDetails">
    <table>
        <thead>
            <tr> <th>Personal Details</th> <td></td> <td><?php echo CHtml::link("Edit",array("alumnus/updatePersonal"))?></td> </tr>
        </thead>
        <tbody>
        <?php $personalDetail=$mAlumnus->personalDetails[0];?>
<?php if($personalDetail->address!=""){?>   <tr> <th>Address</th>   <td>:</td>  <td><?php echo $personalDetail->address ; ?></td>       </tr><?php } ?>
                                            <tr> <th>City<span class="asterisk">*</span></th>      <td>:</td>  <td><?php echo $personalDetail->city ; ?></td>          </tr>      
<?php if($personalDetail->state!=""){?>     <tr> <th>State</th>     <td>:</td>  <td><?php echo $personalDetail->state ; ?></td>         </tr><?php } ?>     
<?php if($personalDetail->pincode!="0"){?>  <tr> <th>Pincode</th>   <td>:</td>  <td><?php echo $personalDetail->pincode ; ?></td>       </tr><?php } ?>    
                                            <tr> <th>Country<span class="asterisk">*</span></th>   <td>:</td>  <td><?php echo $personalDetail->country->name ; ?></td> </tr>  
            <tr> <th></th>          <td></td>       <td></td> </tr>       
            <tr> <th>Website</th>   <td>:</td>      <td><?php if($mAlumnus->website=="")echo "NA";else echo $mAlumnus->website; ?></td> </tr>       
            <tr> <th>Skype ID<span class="asterisk">*</span></th>  <td>:</td>      <td><?php if($mAlumnus->skypeId=="")echo "NA";else echo $mAlumnus->skypeId; ?></td> </tr>       
            <tr> <th></th>          <td></td>       <td></td> </tr>       
            <tr> <th>Ph No.<span class="asterisk">*</span></th>    <td>:</td>      <td><?php
                foreach($mAlumnus->phoneNumbers as $phoneNumber){
                    if($phoneNumber->type!="work"){
                        echo $phoneNumber->phoneNumber." (".$phoneNumber->type.") <br/>";
                    }
                }
            ?></td> </tr> 
        </tbody>
    </table>
</div>

<hr/>

<div id="emailIds">
    <table>
        <thead>
            <tr> <th>Email IDs<span class="asterisk">*</span></th> <td></td> <td><?php echo CHtml::link("Add",array("alumnus/addEmailId"))?> <?php echo CHtml::link("Edit",array("alumnus/updateEmail"))?></td> </tr>
        </thead>
        <tbody>
<?php foreach($mAlumnus->emailIds as $emailId) { ?>
            <tr> <th></th><td></td><td><?php echo $emailId->emailId." ( ".$emailId->type." )"; ?></td></tr>
<?php } ?>
        </tbody>
    </table>
</div>

<hr/>

<span class="note"> NA : Not Available</span><br/>
<span class="note"> We recommend you to atleast keep <span class="asterisk">*</span> fields updated.</span>
<!--           <tr> <th></th> <td>:</td> <td></td> </tr>      
               -->

