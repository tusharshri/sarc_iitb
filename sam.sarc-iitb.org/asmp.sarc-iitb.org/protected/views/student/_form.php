<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
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
		<?php echo $form->labelEx($model,'degree'); ?>
		<?php echo $form->dropDownList($model,'degree',$model->getDegreeOptions()); ?>
		<?php echo $form->error($model,'degree'); ?>
	</div>

	<div class="row">
        <?php $departmentOptions = $model->getDepartmentOptions(); $departmentOptions['']="Select";?>
		<?php echo $form->labelEx($model,'departmentCode'); ?>
        <?php echo $form->dropDownList($model,'departmentCode',$departmentOptions); ?>
		<?php echo $form->error($model,'departmentCode'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hostel'); ?>
		<?php echo $form->dropDownList($model,'hostel',$model->getHostelOptions()); ?>
		<?php echo $form->error($model,'hostel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roomNumber'); ?>
		<?php echo $form->textField($model,'roomNumber',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'roomNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateOfBirth'); ?>
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
				'dateFormat'=>'yy-mm-dd',
				'defaultDate'=>$model->dateOfBirth,
				'changeMonth'=>true, 
				'changeYear'=>true,
                'yearRange'=>'-60:+0',
				'showOtherMonths'=>true,
			),
			'htmlOptions'=>array(
				
			),
			));
		?>
		<?php echo $form->error($model,'dateOfBirth'); ?>
        <i>(in yyyy-mm-dd)</i>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phoneNumber'); ?>
		<?php echo $form->textField($model,'phoneNumber',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'phoneNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emailId'); ?>
        <div class="hint">We strongly recommend using <b style="color:red;"><red>gmail</red></b> as your primary email address</div>
		<?php echo $form->textField($model,'emailId',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'emailId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emailId2'); ?>
		<?php echo $form->textField($model,'emailId2',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'emailId2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skypeId'); ?>
		<?php echo $form->textField($model,'skypeId',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'skypeId'); ?>
	</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Next' : 'Update'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
