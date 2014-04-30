<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-mentorship-preference-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
<b style="font-size:16px">Preference 1</b>

	<div class="row">
		<?php echo $form->label($model,'preference'); ?>
        <?php echo $form->dropDownList($model,'preference',$model->getPreferenceOptions()); ?>
		<?php echo $form->error($model,'preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferredDepartmentCode'); ?>
        <?php echo $form->dropDownList($model,'preferredDepartmentCode',$model->getDepartmentOptions())?>
		<?php echo $form->error($model,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'areaOfInterest'); ?>
		<?php echo $form->dropDownList($model,'areaOfInterest',$model->getAreaOfInterestOptions()) ?>
		<?php echo $form->error($model,'areaOfInterest'); ?>
	</div>
    <hr>
    <b style="font-size:16px">Preference 2</b>
    <div class="row">
		<?php echo $form->label($model,'preference'); ?>
        <?php echo $form->dropDownList($model,'preference',$model->getPreferenceOptions(), array('name'=>'StudentMentorshipPreference[preference1]')); ?>
		<?php echo $form->error($model,'preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferredDepartmentCode'); ?>
        <?php echo $form->dropDownList($model,'preferredDepartmentCode',$model->getDepartmentOptions(),  array('name'=>'StudentMentorshipPreference[preferredDepartmentCode1]'))?>
		<?php echo $form->error($model,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'areaOfInterest'); ?>
		<?php echo $form->dropDownList($model,'areaOfInterest',$model->getAreaOfInterestOptions(),array('name'=>'StudentMentorshipPreference[areaOfInterest1]')); ?>
		<?php echo $form->error($model,'areaOfInterest'); ?>
	</div>
    <hr>
    <b style="font-size:16px">Preference 3</b>
    <div class="row">
		<?php echo $form->label($model,'preference'); ?>
        <?php echo $form->dropDownList($model,'preference',$model->getPreferenceOptions(), array('name'=>'StudentMentorshipPreference[preference2]')); ?>
		<?php echo $form->error($model,'preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferredDepartmentCode'); ?>
        <?php echo $form->dropDownList($model,'preferredDepartmentCode',$model->getDepartmentOptions(),  array('name'=>'StudentMentorshipPreference[preferredDepartmentCode2]'))?>
		<?php echo $form->error($model,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'areaOfInterest'); ?>
		<?php echo $form->dropDownList($model,'areaOfInterest',$model->getAreaOfInterestOptions(),array( 'name'=>'StudentMentorshipPreference[areaOfInterest2]')); ?>
		<?php echo $form->error($model,'areaOfInterest'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
