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
		<?php echo $form->textField($model,'degree',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'degree'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departmentCode'); ?>
        <?php echo $form->dropDownList($model,'departmentCode',$model->getDepartmentOptions()); ?>
		<?php echo $form->error($model,'departmentCode'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hostel'); ?>
		<?php echo $form->textField($model,'hostel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hostel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roomNumber'); ?>
		<?php echo $form->textField($model,'roomNumber',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'roomNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateOfBirth'); ?>
		<?php echo $form->textField($model,'dateOfBirth'); ?>
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
		<?php echo $form->textField($model,'emailId',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'emailId'); ?>
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