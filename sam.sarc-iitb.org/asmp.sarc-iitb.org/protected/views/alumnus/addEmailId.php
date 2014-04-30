<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl.'/js/yourscript.js');
$cs->registerCssFile($baseUrl.'/css/custom/alumnus_addEmailId.css');

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

<h1>Add a new Phone Number <?php //echo $mAlumnus->id; ?></h1>

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

	<?php echo $form->errorSummary(array($mAlumnus,$mEmailId)); ?>

<div id="Page_phnum_new">
<?php
    echo $form->hiddenField($mAlumnus,'id');
    
    echo "<div class='row'>";

    echo $form->labelEx($mEmailId,'type');
    echo $form->dropDownList($mEmailId,'type',$mEmailId->getEmailTypeOptions());
    echo $form->error($mEmailId,'type');

    echo $form->labelEx($mEmailId,'emailId'); //,array('required'=>true)
    echo $form->textField($mEmailId,'emailId',array('size'=>32,'maxlength'=>32));
    echo $form->error($mEmailId,'emailId');

    echo "</div>";

?>

</div>

<div class="row buttons">
	<?php echo CHtml::submitButton($mEmailId->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
