<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl.'/js/yourscript.js');
$cs->registerCssFile($baseUrl.'/css/custom/alumnus_updateBasic.css');

$this->breadcrumbs=array(
	'Alumni'=>array('index'),
	$mAlumnus->id=>array('view','id'=>$mAlumnus->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List Alumnus', 'url'=>array('index')),
	array('label'=>'Create Alumnus', 'url'=>array('create')),
	array('label'=>'View Alumnus', 'url'=>array('view', 'id'=>$mAlumnus->id)),
	array('label'=>'Manage Alumnus', 'url'=>array('admin')),
);
*/
?>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<h1>Update Basic Details <?php //echo $mAlumnus->id; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumnus-form',
	//'enableAjaxValidation'=>true,
	'htmlOptions'=>array(),
	'enableClientValidation'=>true, //TODO: make client side validations work on once failing
/*	'clientOptions'=>array(
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

    <div class="row" id="fullname">
		<?php echo $form->dropDownList($mAlumnus,'salutation',$mAlumnus->getSalutationOptions()); ?>
		<?php echo $form->textField($mAlumnus,'firstName',array('size'=>60,'maxlength'=>64)); ?> <!-- ,'disabled'=>'disabled' -->
		<?php echo $form->textField($mAlumnus,'middleName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->textField($mAlumnus,'lastName',array('size'=>60,'maxlength'=>64)); ?>
        <br/>
		<?php echo $form->labelEx($mAlumnus,'salutation'); ?>
		<?php echo $form->labelEx($mAlumnus,'firstName'); ?>
		<?php echo $form->labelEx($mAlumnus,'middleName'); ?>
		<?php echo $form->labelEx($mAlumnus,'lastName'); ?>
        <br/>
		<?php echo $form->error($mAlumnus,'salutation'); ?>
		<?php echo $form->error($mAlumnus,'firstName'); ?>
		<?php echo $form->error($mAlumnus,'middleName'); ?>
		<?php echo $form->error($mAlumnus,'lastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'nickName'); ?>
		<?php echo $form->textField($mAlumnus,'nickName',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($mAlumnus,'nickName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mAlumnus,'gender',array('required'=>true)); ?>
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
                'yearRange'=>'-100:+0',
				'showOtherMonths'=>true,
			),
			'htmlOptions'=>array(
				
			),
			));
		?>
		<?php echo $form->error($mAlumnus,'dateOfBirth'); ?>
	</div>

</div>


<div class="row buttons">
	<?php echo CHtml::submitButton($mAlumnus->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
