<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumnus-email-id-form',
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
		<?php echo $form->labelEx($model,'emailId'); ?>
		<?php echo $form->textField($model,'emailId',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'emailId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'confirmation'); ?>
		<?php echo $form->textField($model,'confirmation',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'confirmation'); ?>
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