<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<div style="float:right;"><a href="index/">Back to home</a></div>
<h1>Contact Us</h1>

<h3>ASMP Team</h3>
<table>
<tr>
<td>Rohit Wakode [<b>ASMP Head<b>] </td><td>90047 69371</td><td><a href="mailto:rohitnwakode@gmail.com">rohitnwakode@gmail.com</a>
</td>
</tr>
<tr>
<td>Tuhina Ghanty [<b>ASMP Head<b>] </td><td>98696 10095</td><td><a href="mailto:tuhina.26oct@gmail.com">tuhina.26oct@gmail.com</a>
</td>
</tr>
<tr>
<td>Aman Chaudhary</td><td>97695 01715</td><td><a href="mailto:amanchaudhary257@gmail.com">amanchaudhary257@gmail.com</a>
</td>
</tr>
<tr>
<td>Ashu Bapna</td><td>99202 26704</td><td><a href="mailto:ashubapna10@gmail.com">ashubapna10@gmail.com</a>
</td>
</tr>
<tr>
<td>Neilabh Gupta</td><td>97694 70501</td><td><a href="mailto:neilabhgupta@gmail.com">neilabhgupta@gmail.com</a>
</td></tr>
<tr>
<td>Pritish Gupta</td><td>91674 69055</td><td><a href="mailto:imishu18@gmail.com">imishu18@gmail.com</a>
</td></tr>
<tr>
<td>Vineet Maliekkal</td><td>99304 00186</td><td><a href="mailto:vineetmaliekkal@gmail.com">vineetmaliekkal@gmail.com</a>
</td></tr>
<tr>
<td>Yashwanth Sandupatla</td><td>77385 47537</td><td><a href="mailto:yashwanths.iitb@gmail.com">yashwanths.iitb@gmail.com</a>
</td></tr>
</table>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>