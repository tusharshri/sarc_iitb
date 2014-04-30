<?php
$this->breadcrumbs=array(
	'Student Registration'=>array('/studentRegistration'),
	'Interests',
);?>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<h1>Mentor Preferences</h1>

    <div class="notification">
         <b>Instructions</b>
        <ul>
            <li>
               You are required to give atleast one set of preference.
            </li>

            <li>
               The final list of Alumni will be provided according to the set of preferences provided.
            </li>
        </ul>
    </div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-mentorship-preference-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary(array($mMentorshipPreference,$mMentorshipPreference1,$mMentorshipPreference2)); ?>
<b style="font-size:16px">Preference 1</b>

	<div class="row">
		<?php echo $form->label($mMentorshipPreference,'preference'); ?>
        <?php echo $form->dropDownList($mMentorshipPreference,'preference',$mMentorshipPreference->getPreferenceOptions()); ?>
		<?php echo $form->error($mMentorshipPreference,'preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mMentorshipPreference,'preferredDepartmentCode'); ?>
        <?php echo $form->dropDownList($mMentorshipPreference,'preferredDepartmentCode',$mMentorshipPreference->getDepartmentOptions())?>
		<?php echo $form->error($mMentorshipPreference,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mMentorshipPreference,'areaOfInterest'); ?>
		<?php echo $form->dropDownList($mMentorshipPreference,'areaOfInterest',$mMentorshipPreference->getAreaOfInterestOptions()) ?>
		<?php echo $form->error($mMentorshipPreference,'areaOfInterest'); ?>
	</div>
    <hr>
    <b style="font-size:16px">Preference 2</b>
    <div class="row">
		<?php echo $form->label($mMentorshipPreference1,'preference'); ?>
        <?php echo $form->dropDownList($mMentorshipPreference1,'preference',$mMentorshipPreference1->getPreferenceOptions(), array('name'=>'StudentMentorshipPreference[preference1]')); ?>
		<?php echo $form->error($mMentorshipPreference1,'preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mMentorshipPreference1,'preferredDepartmentCode'); ?>
        <?php echo $form->dropDownList($mMentorshipPreference1,'preferredDepartmentCode',$mMentorshipPreference1->getDepartmentOptions(),  array('name'=>'StudentMentorshipPreference[preferredDepartmentCode1]'))?>
		<?php echo $form->error($mMentorshipPreference1,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mMentorshipPreference1,'areaOfInterest'); ?>
		<?php echo $form->dropDownList($mMentorshipPreference1,'areaOfInterest',$mMentorshipPreference1->getAreaOfInterestOptions(),array('name'=>'StudentMentorshipPreference[areaOfInterest1]')); ?>
		<?php echo $form->error($mMentorshipPreference1,'areaOfInterest'); ?>
	</div>
    <hr>
    <b style="font-size:16px">Preference 3</b>
    <div class="row">
		<?php echo $form->label($mMentorshipPreference2,'preference'); ?>
        <?php echo $form->dropDownList($mMentorshipPreference2,'preference',$mMentorshipPreference2->getPreferenceOptions(), array('name'=>'StudentMentorshipPreference[preference2]')); ?>
		<?php echo $form->error($mMentorshipPreference2,'preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mMentorshipPreference2,'preferredDepartmentCode'); ?>
        <?php echo $form->dropDownList($mMentorshipPreference2,'preferredDepartmentCode',$mMentorshipPreference2->getDepartmentOptions(),  array('name'=>'StudentMentorshipPreference[preferredDepartmentCode2]'))?>
		<?php echo $form->error($mMentorshipPreference2,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mMentorshipPreference2,'areaOfInterest'); ?>
		<?php echo $form->dropDownList($mMentorshipPreference2,'areaOfInterest',$mMentorshipPreference2->getAreaOfInterestOptions(),array( 'name'=>'StudentMentorshipPreference[areaOfInterest2]')); ?>
		<?php echo $form->error($mMentorshipPreference2,'areaOfInterest'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($mMentorshipPreference->isNewRecord ? 'Submit' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
