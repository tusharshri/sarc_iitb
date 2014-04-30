<?php
$this->pageTitle=Yii::app()->name . ' - Add Profile';
$this->breadcrumbs=array(
	'Alumnus'=>array('data/index'),
	'Add profile'
);

?>

<div class="sub_nav">
<div style="float:left;" align="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/save.png" width="50px"/></div><div style="float:left; font-size:20px; font-weight:bold; padding-top:10px;">Add Profile</div>
</div>



<?php if(Yii::app()->user->hasFlash('profile')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('profile'); ?>
</div>

<?php else: ?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model,$model1,$model2,$model3,$model4_1,$model4_2,$model5)); ?>
    
    <fieldset>
    <legend><h4>Basic Details</h4></legend>
	<div class="row">
		<?php echo $form->labelEx($model,'firstName'); ?>
		<?php echo $form->textField($model,'firstName'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'middleName'); ?>
		<?php echo $form->textField($model,'middleName'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'batch'); ?>
		<?php echo $form->textField($model,'batch'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->dropDownList($model,'department', CHtml::listData(Department::model()->findAll(), 'code', 'name')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hostel'); ?>
		<?php echo $form->dropDownList($model,'hostel',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14')); ?>
	</div>
	
    <div class="row">
		<?php echo $form->labelEx($model,'dateofbirth'); ?>
        <?php echo $form->textField($model,'dateofbirth'); ?>
		<?php 
        /*$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'language'=>'',
                'model'=>$model,                                // Model object
                'attribute'=>'dateofbirth', // Attribute name
                //'mode'=>'date',                     // Use "time","date" or "datetime" (default)
                'options'=>array(),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true) // HTML options
        )); */                            
        ?> 
	</div>
	
    <div class="row">
      <?php echo $form->labelEx($model,'gender'); ?>
      <?php echo $form->dropDownList($model,'gender', array('male'=>'male','female'=>'female')); ?>
      <?php echo $form->error($model,'gender'); ?>
   </div>
    </fieldset>
   
    <fieldset>
	<legend><h4>Emailid Info</h4></legend>
	 <div class="row">
		<?php echo $form->labelEx($model1,'emailId1'); ?>
		<?php echo $form->textField($model1,'emailId1'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model1,'emailId2'); ?>
		<?php echo $form->textField($model1,'emailId2'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model1,'emailId3'); ?>
		<?php echo $form->textField($model1,'emailId3'); ?>
	</div>
    </fieldset>
    
    <fieldset>

	<legend>	<h4>Phone Details</h4></legend>
    <div class="row">
		<?php echo $form->labelEx($model2,'phnum1'); ?>
		<?php echo $form->textField($model2,'phnum1'); ?>
	</div>
	
    <div class="row">
		<?php echo $form->labelEx($model2,'phnum2'); ?>
		<?php echo $form->textField($model2,'phnum2'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model2,'phnum_other'); ?>
		<?php echo $form->textField($model2,'phnum_other'); ?>
	</div>
     </fieldset>
    
     <fieldset>
    	<legend><h4>Personal Info</h4></legend>
    
    <div class="row">
		<?php echo $form->labelEx($model3,'address'); ?>
		<?php echo $form->textField($model3,'address'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model3,'city'); ?>
		<?php echo $form->textField($model3,'city'); ?>
	</div>
	
    <div class="row">
		<?php echo $form->labelEx($model3,'state'); ?>
		<?php echo $form->textField($model3,'state'); ?>
	</div>
    
        
    <div class="row">
      <?php echo $form->labelEx($model3,'country'); ?>
      <?php echo $form->dropDownList($model3,'country', CHtml::listData(Country::model()->findAll(), 'id', 'name')); ?>
   </div>
	 </fieldset>
     
    <fieldset>
    <legend><h4>Company Info</h4></legend>
    <div class="row">
		<?php echo $form->labelEx($model4_1,'[1]designation'); ?>
		<?php echo $form->textField($model4_1,'[1]designation'); ?>
	</div> 
    
    <div class="row">
		<?php echo $form->labelEx($model4_1,'[1]company'); ?>
		<?php echo $form->textField($model4_1,'[1]company'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model4_1,'[1]IndustryId'); ?>
		<?php echo $form->dropDownList($model4_1,'[1]IndustryId', CHtml::listData(Industry::model()->findAll(), 'id', 'name')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model4_1,'[1]jobNumber'); ?>
		<?php echo $form->textField($model4_1,'[1]jobNumber'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model4_1,'[1]country'); ?>
		<?php echo $form->dropDownList($model4_1,'[1]country', CHtml::listData(Country::model()->findAll(), 'id', 'name')); ?>
	</div>
    <div onclick="displayOthercompany();" class="add_button remove_button">Add Other comany</div>
    <div class="other_company">
        <div class="row">
            <?php echo $form->labelEx($model4_2,'[2]designation'); ?>
            <?php echo $form->textField($model4_2,'[2]designation'); ?>
        </div> 
        
        <div class="row">
            <?php echo $form->labelEx($model4_2,'[2]company'); ?>
            <?php echo $form->textField($model4_2,'[2]company'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model4_2,'[2]IndustryId'); ?>
            <?php echo $form->dropDownList($model4_2,'[2]IndustryId', CHtml::listData(Industry::model()->findAll(), 'id', 'name')); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model4_2,'[2]jobNumber'); ?>
            <?php echo $form->textField($model4_2,'[2]jobNumber'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model4_2,'[2]country'); ?>
            <?php echo $form->dropDownList($model4_2,'[2]country', CHtml::listData(Country::model()->findAll(), 'id', 'name')); ?>
        </div>
    </div>
    </fieldset>
    
    <fieldset>
    <legend><h4>Social Info</h4></legend>
    <div class="row">
		<?php echo $form->labelEx($model5,'link1'); ?>
		<?php echo $form->textField($model5,'link1'); ?>
	</div>
    
    
    <div class="row">
		<?php echo $form->labelEx($model5,'link2'); ?>
		<?php echo $form->textField($model5,'link2'); ?>
	</div>
    
    
    <div class="row">
		<?php echo $form->labelEx($model5,'link3'); ?>
		<?php echo $form->textField($model5,'link3'); ?>
	</div>
    </fieldset>
    
    <fieldset>
    <legend><h4>Attended Any Program</h4></legend>
    <?php foreach($model6 as $key=>$val){ ?>
    <div  class="<?php 
		if(count($model7)-$key<4 ){
			echo 'hide';	
		}?>" id="<?php
		if(count($model7)-$key==3 )
		echo 'first_attend';
		else if(count($model7)-$key==2)
		echo 'second_attend';
		else if(count($model7)-$key==1)
		echo 'third_attend';
		?>">
    <div class="row">
		<?php echo $form->labelEx($val,'['.$key.']attended'); ?>
		<?php echo $form->textField($val,'['.$key.']attended',array('length'=>'60')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($val,'['.$key.']program_for'); ?>
		<?php echo $form->dropDownList($val,'['.$key.']program_for',array('other'=>'Other','SAM'=>'SAM','alumnivisit'=>'Alumni Visit')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($val,'['.$key.']year'); ?>
		<?php echo $form->textField($val,'['.$key.']year'); ?>
	</div>
    </div>
    <?php } ?>
    <div onclick="displayOther_attend()" class="add_button remove_button_attend">Other Attended</div>
    </fieldset>
    
    
    <fieldset>
    <legend><h4>Mailed</h4></legend>
    <div id="mailed_to">
        
        <?php foreach($model7 as $key=>$val){ ?>
        <div  class="<?php 
		if(count($model7)-$key<4 ){
			echo 'hide';	
		}?>" id="<?php
		if(count($model7)-$key==3 )
		echo 'first_mail';
		else if(count($model7)-$key==2)
		echo 'second_mail';
		else if(count($model7)-$key==1)
		echo 'third_mail';
		?>">
        <div class="row">
            <?php echo $form->labelEx($val,'['.$key.']mailed_for'); ?>
            <?php echo $form->dropDownList($val,'['.$key.']mailed_for',CHtml::listData(Program_item::model()->findAll(), 'id', 'item')); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($val,'['.$key.']response'); ?>
            <?php echo $form->textArea($val,'['.$key.']response',array('rows'=>5,'cols'=>50)); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($val,'['.$key.']phaseYear'); ?>
            <?php echo $form->textField($val,'['.$key.']phaseYear'); ?>
        </div>
        </div>
        <?php } ?>
        
                
    </div>
    
	    <div onclick="displayOther_mail()" class="add_button remove_button_mail">Other Mail</div>    
    </fieldset>
    
    
    
	<div class="row submit">
		<?php echo CHtml::submitButton('Submit',array('class'=>'add_button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>