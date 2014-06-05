<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumnus-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'htmlOptions'=>array(),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'profileId'); ?>
		<div class="hint"> provided by iitbombay.org </div>
		<?php echo $form->textField($model,'profileId'); ?>
		<?php echo $form->error($model,'profileId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salutation'); ?>
		<?php echo $form->dropDownList($model,'salutation',$model->getSalutationOptions()); ?>
		<?php echo $form->error($model,'salutation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstName'); ?>
		<?php echo $form->textField($model,'firstName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'firstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middleName'); ?>
		<?php echo $form->textField($model,'middleName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'middleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nickName'); ?>
		<?php echo $form->textField($model,'nickName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nickName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->dropDownList($model,'gender',$model->getGenderOptions()); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<div class="hint"> Passing out year </div>
		<?php echo $form->textField($model,'class'); ?>
		<?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree'); ?>
		<?php echo $form->dropDownList($model,'degree',$model->getDegreeOptions()); ?>
		<?php echo $form->error($model,'degree'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departmentCode'); ?>
		<?php echo $form->dropDownList($model,'departmentCode',$model->getDepartmentOptions()); ?>
		<?php echo $form->error($model,'departmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hostel'); ?>
		<?php echo $form->dropDownList($model,'hostel',$model->getHostelOptions()); ?>
		<?php echo $form->error($model,'hostel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateOfBirth'); ?>
		<div class="hint">DD-MM-YYYY</div>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'dateOfBirth',
			'value'=>$model->dateOfBirth,
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'dd-mm-yy',
				'defaultDate'=>$model->dateOfBirth,
			),
			'htmlOptions'=>array(
			),
			));
		?>
		<?php echo $form->error($model,'dateOfBirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skypeId'); ?>
		<?php echo $form->textField($model,'skypeId',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'skypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'linkedin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'workProfile'); ?>
		<?php echo $form->textArea($model,'workProfile',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'workProfile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
