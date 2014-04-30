<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mentorship-phase-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'phaseYear'); ?>
		<?php echo $form->textField($model,'phaseYear',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'phaseYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phase'); ?>
		<?php echo $form->textField($model,'phase'); ?>
		<?php echo $form->error($model,'phase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startedOn'); ?>
		<?php echo $form->textField($model,'startedOn'); ?>
		<?php echo $form->error($model,'startedOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endedOn'); ?>
		<?php echo $form->textField($model,'endedOn'); ?>
		<?php echo $form->error($model,'endedOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdAt'); ?>
		<?php echo $form->textField($model,'createdAt'); ?>
		<?php echo $form->error($model,'createdAt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->