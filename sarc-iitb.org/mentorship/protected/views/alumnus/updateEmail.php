<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/alumnusUpdateEmail.js');
$cs->registerCssFile($baseUrl.'/css/custom/alumnus_updateEmail.css');

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

<span id="addnewemail" title="Add a new Email ID"><?php echo CHtml::link("Add new",array("alumnus/addEmailId"));?></span>
<h1>Update Email Ids <?php //echo $mAlumnus->id; ?></h1>

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

	<?php echo $form->errorSummary(array_merge(array($mAlumnus),$mEmailIds)); ?>

<div id="Page4">
    <?php echo $form->hiddenField($mAlumnus,'id');
    foreach ($mEmailIds as $mEmailId){
    ?>        
        <?php echo $form->hiddenField($mEmailId,'['.$mEmailId->id.']id');?>

	    <div class="row">
		    <?php echo $form->label($mEmailId,'['.$mEmailId->id.']emailId'); ?>
		    <?php echo $form->textField($mEmailId,'['.$mEmailId->id.']emailId',array('size'=>64,'maxlength'=>64)); ?>
		    <?php echo $form->error($mEmailId,'['.$mEmailId->id.']emailId'); ?>
	    </div>

	    <div class="row">
		    <?php echo $form->label($mEmailId,'['.$mEmailId->id.']type'); ?>
            <?php echo $form->dropDownList($mEmailId,'['.$mEmailId->id.']type',$mEmailId->getEmailTypeOptions()); ?>
		    <?php echo $form->error($mEmailId,'['.$mEmailId->id.']type'); ?>
	    </div>

         <hr class='small'/>
    <?php
    }        
    ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton($mAlumnus->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>
    
    <p class="note">Note: To delete an Email Id, make the text field blank and submit it. </p>

</div><!-- form -->
