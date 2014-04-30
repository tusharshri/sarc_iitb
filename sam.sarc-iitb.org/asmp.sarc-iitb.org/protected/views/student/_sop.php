<div class="form">

<style type="text/css">
    #sop_form textarea{
        height:150px;
    }

</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sop_form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sop'); ?>
		<?php echo $form->textArea($model,'sop', array('cols'=>65 , 'rows'=>45)); ?>
		<?php echo $form->error($model,'sop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resume'); ?><span style="color:red">*</span>
		<?php echo $form->fileField($model,'resume'); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Upload' : 'Update'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->