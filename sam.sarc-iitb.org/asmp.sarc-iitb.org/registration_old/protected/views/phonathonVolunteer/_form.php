<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phonathon-volunteer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'studentId'); ?>
		<?php echo $form->textField($model,'studentId'); ?>
		<?php echo $form->error($model,'studentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'freeSlot'); ?>
		<?php echo $form->textArea($model,'freeSlot',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'freeSlot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferredDepartmentCode'); ?>
		<?php echo $form->textField($model,'preferredDepartmentCode',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'preferredDepartmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferredHostel'); ?>
		<?php echo $form->textField($model,'preferredHostel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'preferredHostel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suggestion'); ?>
		<?php echo $form->textArea($model,'suggestion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'suggestion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phonathon'); ?>
		<?php echo $form->textField($model,'phonathon'); ?>
		<?php echo $form->error($model,'phonathon'); ?>
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