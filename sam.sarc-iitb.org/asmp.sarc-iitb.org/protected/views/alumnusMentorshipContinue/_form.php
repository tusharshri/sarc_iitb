<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumnus-mentorship-continue-form',
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
		<?php echo $form->labelEx($model,'phaseYear'); ?>
		<?php echo $form->textField($model,'phaseYear',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'phaseYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'confirmationCode'); ?>
		<?php echo $form->textField($model,'confirmationCode',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'confirmationCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'confirmed'); ?>
		<?php echo $form->textField($model,'confirmed'); ?>
		<?php echo $form->error($model,'confirmed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suggestion'); ?>
		<?php echo $form->textArea($model,'suggestion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'suggestion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tos'); ?>
		<?php echo $form->textField($model,'tos'); ?>
		<?php echo $form->error($model,'tos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>13,'maxlength'=>13)); ?>
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