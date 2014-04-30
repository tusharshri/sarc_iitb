<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'studentId'); ?>
		<?php echo $form->textField($model,'studentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'freeSlot'); ?>
		<?php echo $form->textArea($model,'freeSlot',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferredDepartmentCode'); ?>
		<?php echo $form->textField($model,'preferredDepartmentCode',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferredHostel'); ?>
		<?php echo $form->textField($model,'preferredHostel',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suggestion'); ?>
		<?php echo $form->textArea($model,'suggestion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phonathon'); ?>
		<?php echo $form->textField($model,'phonathon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatedAt'); ?>
		<?php echo $form->textField($model,'updatedAt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->