<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/alumnusUpdateProf.js');
$cs->registerCssFile($baseUrl.'/css/custom/alumnus_updateProf.css');

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

<h1>Update Personal Details <?php //echo $mAlumnus->id; ?></h1>

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

	<?php echo $form->errorSummary(array($mAlumnus,$mPersonalDetail)); ?>

<div id="Page2">

	<div class="row">
		<?php echo $form->labelEx($mPersonalDetail,'address'); ?>
		<?php echo $form->textArea($mPersonalDetail,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($mPersonalDetail,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mPersonalDetail,'city'); ?>
		<?php echo $form->textField($mPersonalDetail,'city',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($mPersonalDetail,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mPersonalDetail,'state'); ?>
		<?php echo $form->textField($mPersonalDetail,'state',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($mPersonalDetail,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mPersonalDetail,'pincode'); ?>
		<?php echo $form->textField($mPersonalDetail,'pincode'); ?>
		<?php echo $form->error($mPersonalDetail,'pincode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mPersonalDetail,'countryId'); ?>
		<?php echo $form->dropDownList($mPersonalDetail,'countryId',$mPersonalDetail->getCountryOptions()); ?>
		<?php echo $form->error($mPersonalDetail,'countryId'); ?>
	</div>
    
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

    <hr class="big"/>
      
    <div>
        <span id="addnewphnum" title="Add a new Phone Number"><?php echo CHtml::link("Add new",array("alumnus/addPhoneNumber"))?></span>
        <h4>Phone Numbers</h4> 
        <div class="hint">To delete an Invalid number, make the textbox empty and save.</div>
    <?php 
        foreach($mPhoneNumbers as $mPhoneNumber){
            if($mPhoneNumber->type!='work'){
            echo "<div class='row'>";
           
            echo $form->hiddenField($mPhoneNumber,'['.$mPhoneNumber->id.']id');
            
            echo $form->label($mPhoneNumber,'['.$mPhoneNumber->id.']type');
		    echo $form->dropDownList($mPhoneNumber,'['.$mPhoneNumber->id.']type',$mPhoneNumber->getPhoneTypeOptions());
		    echo $form->error($mPhoneNumber,'['.$mPhoneNumber->id.']type');

            echo $form->label($mPhoneNumber,'['.$mPhoneNumber->id.']phoneNumber'); //,array('required'=>true)
	        echo $form->textField($mPhoneNumber,'['.$mPhoneNumber->id.']phoneNumber',array('size'=>32,'maxlength'=>32));
	        echo $form->error($mPhoneNumber,'['.$mPhoneNumber->id.']phoneNumber',array(),false,false);

            echo "</div>";
            echo "<hr class='small'/>";
            }
        }
    ?>
    </div>

</div>


<div class="row buttons">
	<?php echo CHtml::submitButton($mAlumnus->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
