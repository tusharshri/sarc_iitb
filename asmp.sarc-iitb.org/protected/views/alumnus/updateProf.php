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

<h1>Update Professional Details <?php //echo $mAlumnus->id; ?></h1>

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
    
    <p class="note">Please include your past work expriences also. </p>

	<?php echo $form->errorSummary(array_merge(array($mAlumnus),$mProfDetails,$mPhoneNumbers)); ?>

<div id="Page3">

<?php foreach($mProfDetails as $mProfDetail){ ?>
    
    <?php echo $form->hiddenField($mProfDetail,'['.$mProfDetail->id.']id'); ?>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']designation'); ?>
		<?php echo $form->textField($mProfDetail,'['.$mProfDetail->id.']designation',array('size'=>64,'maxlength'=>64)); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']company'); ?>
		<?php echo $form->textField($mProfDetail,'['.$mProfDetail->id.']company',array('size'=>64,'maxlength'=>64)); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']industryId'); ?>
		<?php echo $form->dropDownList($mProfDetail,'['.$mProfDetail->id.']industryId',$mProfDetail->getIndustryOptions()); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']industryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']address'); ?>
		<?php echo $form->textArea($mProfDetail,'['.$mProfDetail->id.']address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']city'); ?>
		<?php echo $form->textField($mProfDetail,'['.$mProfDetail->id.']city',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']state'); ?>
		<?php echo $form->textField($mProfDetail,'['.$mProfDetail->id.']state',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']pincode'); ?>
		<?php echo $form->textField($mProfDetail,'['.$mProfDetail->id.']pincode'); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']pincode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($mProfDetail,'['.$mProfDetail->id.']countryId'); ?>
		<?php echo $form->dropDownList($mProfDetail,'['.$mProfDetail->id.']countryId',$mProfDetail->getCountryOptions()); ?>
		<?php echo $form->error($mProfDetail,'['.$mProfDetail->id.']countryId'); ?>
	</div>  
    <hr class="big"/>  

<?php } ?>

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
    <hr class="big"/> 
    
    <div>
        <span id="addnewphnum" title="Add a new Phone Number"><?php echo CHtml::link("Add new",array("alumnus/addPhoneNumber"))?></span>
        <h4>Phone Numbers</h4> 
     <?php 
        foreach($mPhoneNumbers as $mPhoneNumber){ // render phonenumber partial
            if($mPhoneNumber->type=='work'){
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
