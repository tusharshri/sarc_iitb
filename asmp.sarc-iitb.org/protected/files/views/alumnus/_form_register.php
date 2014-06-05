<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumnus-form',
	//'enableAjaxValidation'=>true,
	'htmlOptions'=>array(),
/*	'enableClientValidation'=>true, //TODO: make client side validations work on once failing
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnType'=>false,
		'validateOnChange'=>true,
	),
*/
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($mAlumnus); ?>

<div id="Page1">
	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'profileId'); ?>
		<div class="hint"> provided by iitbombay.org </div>
		<?php echo $form->textField($mAlumnus,'profileId'); ?> 
		<?php echo $form->error($mAlumnus,'profileId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'salutation'); ?>
		<?php echo $form->dropDownList($mAlumnus,'salutation',$mAlumnus->getSalutationOptions()); ?>
		<?php echo $form->error($mAlumnus,'salutation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'firstName'); ?>
		<?php echo $form->textField($mAlumnus,'firstName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($mAlumnus,'firstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'middleName'); ?>
		<?php echo $form->textField($mAlumnus,'middleName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($mAlumnus,'middleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'lastName'); ?>
		<?php echo $form->textField($mAlumnus,'lastName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($mAlumnus,'lastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'nickName'); ?>
		<?php echo $form->textField($mAlumnus,'nickName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($mAlumnus,'nickName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'gender'); ?>
		<?php echo $form->dropDownList($mAlumnus,'gender',$mAlumnus->getGenderOptions()); ?>
		<?php echo $form->error($mAlumnus,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'class'); ?>
		<div class="hint"> Passing out year </div>
		<?php echo $form->textField($mAlumnus,'class'); ?>
		<?php echo $form->error($mAlumnus,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'degree'); ?>
		<?php echo $form->dropDownList($mAlumnus,'degree',$mAlumnus->getDegreeOptions()); ?>
		<?php echo $form->error($mAlumnus,'degree'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'departmentCode'); ?>
		<?php echo $form->dropDownList($mAlumnus,'departmentCode',$mAlumnus->getDepartmentOptions()); ?>
		<?php echo $form->error($mAlumnus,'departmentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'hostel'); ?>
		<?php echo $form->dropDownList($mAlumnus,'hostel',$mAlumnus->getHostelOptions()); ?>
		<?php echo $form->error($mAlumnus,'hostel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'dateOfBirth'); ?>
		<div class="hint">YYYY-MM-DD</div>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$mAlumnus,
			'attribute'=>'dateOfBirth',
			'value'=>$mAlumnus->dateOfBirth,
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',
				'defaultDate'=>$mAlumnus->dateOfBirth,
				'changeMonth'=>true, 
				'changeYear'=>true,
				'showOtherMonths'=>true,
			),
			'htmlOptions'=>array(
				
			),
			));
		?>
		<?php echo $form->error($mAlumnus,'dateOfBirth'); ?>
	</div>

</div>

<div id="Page2">
	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'website'); ?>
		<?php echo $form->textField($mAlumnus,'website',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($mAlumnus,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'skypeId'); ?>
		<?php echo $form->textField($mAlumnus,'skypeId',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($mAlumnus,'skypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'linkedin'); ?>
		<?php echo $form->textField($mAlumnus,'linkedin',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($mAlumnus,'linkedin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'workProfile'); ?>
		<?php echo $form->textArea($mAlumnus,'workProfile',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($mAlumnus,'workProfile'); ?>
	</div>
</div>

<div id="Page3">
<?php
	//$emailIds=$mAlumnus->emailIds;
	$i=1;$j=1;
	foreach($mEmailId as $email){
	echo $this->renderPartial('_form_email', array('form'=>$form, 'email'=>$email,'i'=>$i++,'j'=>$j++,'alumnusId'=>$mAlumnus->id));
	}
	$email = new AlumnusEmailId;
	echo $this->renderPartial('_form_email', array('form'=>$form, 'email'=>$email,'i'=>$i++,'j'=>$j++,'alumnusId'=>$mAlumnus->id));
?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($mAlumnus->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
