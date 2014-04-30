<?php
$this->pageTitle=Yii::app()->name . ' - Search Box';
$this->breadcrumbs=array(
	'Edit Profile',
);
?>

<h1>Edit Details</h1>

<?php if(Yii::app()->user->hasFlash('profile')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('profile'); ?>
</div>

<?php else: ?>
<div id="showcontent">
		<table>
        <tr>
        	<th>AlumnusId</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Batch</th><th>Hostel</th><th>Department</th><th>Gender</th><th>Date of birth</th>
        </tr>
        <?php foreach($model as $model1){ ?>
		<tr onclick="window.location='<?php echo Yii::app()->homeUrl.'/data/edit/id/'.$model1->id; ?>'">
        <td><?php echo $model1->id;	?></td>
        <td><?php echo $model1->firstName;	?></td>
        <td><?php echo $model1->middleName;	?></td>
        <td><?php echo $model1->lastName;	?></td>
        <td><?php echo $model1->batch;	?></td>
        <td><?php echo $model1->hostel;	?></td>
        <td><?php echo $model1->department;	?></td>
        <td><?php echo $model1->gender;	?></td>
        <td><?php echo $model1->dateofbirth;	?></td>
        </tr>
        <?php  } ?>
</table>
</div>
<?php endif; ?>