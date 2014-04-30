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
		<?php echo $form->label($model,'alumnusId'); ?>
		<?php echo $form->textField($model,'alumnusId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preference'); ?>
		<?php echo $form->textField($model,'preference',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numberOfMentees'); ?>
		<?php echo $form->textField($model,'numberOfMentees'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferredDepartmentCode'); ?>
		<?php echo $form->textField($model,'preferredDepartmentCode',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'areaOfInterest'); ?>
		<?php echo $form->textArea($model,'areaOfInterest',array('rows'=>6, 'cols'=>50)); ?>
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