<?php
$this->pageTitle=Yii::app()->name . ' - Search Box';
$this->breadcrumbs=array(
	'SearchBox',
);
?>

<h1>Search Details</h1>

<?php if(Yii::app()->user->hasFlash('profile')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('profile'); ?>
</div>

<?php else: ?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="row">
    <select name="optionselect">
    	<option value="id">AlumnusId</option>
    	<option value="firstName">First Name</option>
        <option value="middleName">Middle Name</option>
        <option value="lastName">Last Name</option>
        <option value="batch">Batch</option>
        <option value="department">Department</option>
    </select>
    <input type="text" id="contentfield" name="contentfield" />
        <?php //echo $form->dropDownList($model,'texts', array('firstName'=>'firstName','lastName'=>'lastName')); ?>
	</div>
	<div class="row submit">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div id="showcontent">
		<table>
<?php
	
	if(isset($model)){
		
		?>
        <tr>
        	<th>AlumnusId</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Batch</th><th>Hostel</th><th>Department</th><th>Gender</th><th>Date of birth</th>
        </tr>
        <?php foreach($model as $model1){ ?>
		<tr onclick="window.location='<?php echo Yii::app()->homeUrl.'/data/details/id/'.$model1->id; ?>'">
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
        <?php
		
	}
?>
</table>
</div>
<?php endif; ?>