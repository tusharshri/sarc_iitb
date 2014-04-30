<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumnus-mentorship-preference-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'alumnusId'); ?>
		<?php echo $form->textField($model,'alumnusId'); ?>
		<?php echo $form->error($model,'alumnusId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preference'); ?>
		<?php echo $form->textField($model,'preference',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numberOfMentees'); ?>
		<?php echo $form->textField($model,'numberOfMentees'); ?>
		<?php echo $form->error($model,'numberOfMentees'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferredDepartmentCode'); ?>
		<?php echo $form->textField($model,'preferredDepartmentCode',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'areaOfInterest'); ?>
		<?php echo $form->textArea($model,'areaOfInterest',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'areaOfInterest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatedAt'); ?>
		<?php echo $form->textField($model,'updatedAt'); ?>
		<?php echo $form->error($model,'updatedAt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->