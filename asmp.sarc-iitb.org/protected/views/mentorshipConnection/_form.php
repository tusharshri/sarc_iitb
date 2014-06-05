<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mentorship-connection-form',
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
		<?php echo $form->labelEx($model,'studentId'); ?>
		<?php echo $form->textField($model,'studentId'); ?>
		<?php echo $form->error($model,'studentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alloterId'); ?>
		<?php echo $form->textField($model,'alloterId'); ?>
		<?php echo $form->error($model,'alloterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phaseYear'); ?>
		<?php echo $form->textField($model,'phaseYear',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'phaseYear'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->