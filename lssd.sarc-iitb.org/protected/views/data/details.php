<?php
$this->pageTitle=Yii::app()->name . ' - Details';
$this->breadcrumbs=array(
	'Alumnus'=>array('data/index'),
	'Details'
);

?>

<div class="sub_nav">
<div style="float:left;" align="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/user_accept.png" width="50px"/></div><div style="float:left; font-size:20px; font-weight:bold; padding-top:10px;">Details</div>
<ul class="no_style_ul" style="float:right;">
<li><a href="<?php echo Yii::app()->homeUrl ?>data/edit/id/<?php echo $details->id; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit.png" width="50px"/><br /><span>Edit user</span></a></li>
</ul>
</div>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script>
    $(function() {
        $( "#accordion_detail" ).accordion();
    });
    </script>

<?php if(Yii::app()->user->hasFlash('profile')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('profile'); ?>
</div>

<?php else: ?>


<div class="form">
<div id="accordion_detail">
    <h3>Personal</h3>
    <div>
        <p>
        <table cellpadding="5px" cellspacing="10px">
	        <tr><th>First Name</th><td><?php echo $details->firstName; ?></td></tr>
            <?php if($details->middleName!=NULL){ ?><tr><th> Middle Name</th><td><?php echo $details->middleName; ?></td></tr><?php } ?>
            <tr><th>Last Name</th><td><?php echo $details->lastName; ?></td></tr>
            <tr><th>Batch</th><td><?php echo $details->batch; ?></td></tr>
            <tr><th>Department</th><td><?php echo $details->department; ?></td></tr>
            <tr><th>Date of birth</th><td><?php echo $details->dateofbirth; ?></td></tr>
            <tr><th>Gender</th><td><?php echo $details->gender; ?></td></tr>
        </table>
        </p>
    </div>
    <h3>Email id</h3>
    <div>
        <p>
        <table>
	        <tr><th>Email Id (Primary)</th><td><?php echo $details->emailid[0]->emailId1; ?></td></tr>
            <?php if($details->emailid[0]->emailId2!=NULL){ ?><tr><th> Email Id (Secondary)</th><td><?php echo $details->emailid[0]->emailId2; ?></td></tr><?php } ?>
            <?php if($details->emailid[0]->emailId3!=NULL){ ?><tr><th> Email Id (Other)</th><td><?php echo $details->emailid[0]->emailId3; ?></td></tr><?php } ?>
        </table>
        </p>
    </div>
    <?php if(isset($details->phnum[0])) {?>
    <h3>Phone Info</h3>
    <div>
        <p>
        <table>
	        <tr><th>Phone Number (Primary)</th><td><?php echo $details->phnum[0]->phnum1; ?></td></tr>
            <?php if($details->phnum[0]->phnum2!=NULL){ ?><tr><th> Phone Number (Secondary)</th><td><?php echo $details->phnum[0]->phnum2; ?></td></tr><?php } ?>
            <?php if($details->phnum[0]->phnum_other!=NULL){ ?><tr><th> Phone Number (Other)</th><td><?php echo $details->phnum[0]->phnum_other; ?></td></tr><?php } ?>
        </table>
        </p>
        
    </div>
    <?php } ?>
    
    <?php if(isset($details->info[0])){ ?>
    
    <h3>Address Info</h3>
    <div>
        <p>
        <table>
        <?php foreach($details->info as $val){ ?>
	        <tr><th>Address</th><td><?php echo $val->address; ?></td></tr>
            <tr><th>City</th><td><?php echo $val->city; ?></td></tr>
            <tr><th>State</th><td><?php echo $val->state; ?></td></tr>
            <tr><th>Pin code</th><td><?php echo $val->pincode; ?></td></tr>
            <tr><th>Country</th><td><?php if(Country::model()->findBypk($val->country)->name) echo Country::model()->findBypk($val->country)->name; ?></td></tr>
            <?php } ?>
        </table>
        </p>
    </div>
    
    <?php } ?>
    
    <?php if(isset($details->company[0])){ ?>
    <h3>Company Info</h3>
    <div>
        <p>
        <table>
        	<tr><th>Designation</th><th>Company</th><th>Industry</th><th>Job Number</th><th>Country</th></tr>
        <?php foreach($details->company as $val){ ?>
	        <tr>
            	<td><?php echo $val->designation; ?></td>
                <td><?php echo $val->company; ?></td>
                <td><?php echo Industry::model()->findBypk($val->IndustryId)->name; ?></td>
                <td><?php echo $val->jobNumber; ?></td>
                <td><?php ?></td>
            </tr>
            <?php } ?>
        </table>
        </p>
    </div>
    <?php } ?>
    
    
    <?php if(isset($details->social[0])){ ?>
    <h3>Social Info</h3>
    <div>
        <p>
        <table>
        <?php  foreach($details->social as $val){ ?>
	        <tr><th>Linked In</th><td><?php echo $val->link1; ?></td></tr>
            <tr><th>Skype</th><td><?php echo $val->link2; ?></td></tr>
            <tr><th>Facebook</th><td><?php echo $val->link3; ?></td></tr>
            <?php } ?>
        </table>
        </p>
    </div>
    <?php } ?>
    
    <?php if(isset($details->attended[0])){ ?>
    <h3>Attended Info</h3>
    <div>
        <p>
        <table>
        <?php  foreach($details->attended as $val){ ?>
	        <tr><th>Attended</th><td><?php echo $val->attended; ?></td></tr>
            <tr><th>For</th><td><?php echo $val->program_for; ?></td></tr>
            <tr><th>Date</th><td><?php echo $val->year; ?></td></tr>
            <?php } ?>
        </table>
        </p>
    </div>
    <?php } ?>
    
    <?php if(isset($details->mailed[0])){ ?>
    <h3>Mailed Info</h3>
    <div>
        <p>
        <table>
        <?php  foreach($details->mailed as $val){ ?>
	        <tr><th>Mailed For</th><td><?php echo $val->mailed_for; ?></td></tr>
            <tr><th>Response</th><td><?php echo $val->response; ?></td></tr>
            <tr><th>Phase Year</th><td><?php echo $val->phaseYear; ?></td></tr>
            <?php } ?>
        </table>
        </p>
    </div>
    <?php } ?>
    
    <?php 
	$case=FALSE;
	$asmp_val=Program_item::model()->findByAttributes(array('item'=>'ASMP'))->id;
	
	foreach($details->program as $val){
		
		if($val->enrolled_for==$asmp_val){
			$case=TRUE;
		}
	}
	
	if($case){ ?>
    <h3>Mentorship History</h3>
    <div>
        <p>
        <table>
        <tr><th>Student Name</th><th>Phase Year</th></tr>
        <?php foreach($details->mentorship_allotment as $val){ ?>
	        <tr><td>
            <?php
				$student=Student::model()->findByPk($val->studentId);
				echo $student->firstName.' '.$student->lastName;
			?>
            </td><td><?php echo $val->phaseYear; ?></td></tr>
            <?php } ?>
        </table>
        </p>
    </div>
    <?php  } ?>
    <?php 
	$case=FALSE;
	$item_val=Program_item::model()->findByAttributes(array('item'=>'Phonathon'))->id;
	
	foreach($details->program as $val){
		
		if($val->enrolled_for==$item_val){
			$case=TRUE;
		}
	}
	
	if($case){ ?>
    <h3>Phonathon History</h3>
    <div>
        <p>
        <table>
        <tr><th>Student Name</th><th>Phase Year</th><th>Details</th></tr>
        <?php foreach($details->phonathon_allotment as $val){ ?>
	        <tr><td>
            <?php
				$volunteer=Volunteer::model()->findByPk($val->volunteerId);
				echo $volunteer->name;
			?>
            </td>
            <td><?php echo $val->phaseYear; ?></td>
            
            <td><?php 
				echo CHtml::link(
'Detail',
array(
'phonathon/index',
'id' => $details->id, 
'phase' => $val->phaseYear,
)
);
			?></td>
            </tr>
            
            <?php } ?>
        </table>
    </div>
    <?php  } ?>
</div>
</div><!-- form -->

<?php endif; ?>