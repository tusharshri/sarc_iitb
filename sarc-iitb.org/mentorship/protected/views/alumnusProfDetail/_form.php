<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumnus-prof-detail-form',
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
		<?php echo $form->labelEx($model,'designation'); ?>
		<?php echo $form->textField($model,'designation',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'industryId'); ?>
		<?php echo $form->textField($model,'industryId'); ?>
		<?php echo $form->error($model,'industryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pincode'); ?>
		<?php echo $form->textField($model,'pincode'); ?>
		<?php echo $form->error($model,'pincode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countryId'); ?>
		<?php echo $form->textField($model,'countryId'); ?>
		<?php echo $form->error($model,'countryId'); ?>
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