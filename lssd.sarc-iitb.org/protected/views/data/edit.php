<?php
$this->pageTitle=Yii::app()->name . ' - Edit';
$this->breadcrumbs=array(
	'Alumnus'=>array('data/index'),
	'Details'=>array('data/details','id'=>$model->id),
	'Edit'
);

?>
<div class="sub_nav">
<div style="float:left;" align="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit.png" width="50px"/></div><div style="float:left; font-size:20px; font-weight:bold; padding-top:10px;">Edit Details</div>
</div>

<div style="width:15%; height:400px; float:left;">

<ul class="left_nav">
	<li><a href="#basic_info">Basic Details</a></li>
    <li><a href="#email_info">Email Ids</a></li>
    <li><a href="#phone_info">Phone Details</a></li>
    <li><a href="#personal_info">Personal Info</a></li>
    <li><a href="#company_info">Company Info</a></li>
    <li><a href="#social_info">Socail Info</a></li>
    <li><a href="#attended_info">Attended any program</a></li>
    <li><a href="#contacted_info">Contacted</a></li>
    <li><a href="#mailed_info">Mailed</a></li>
</ul>

</div>


<div style="width:80%; float:right;">
<?php if(Yii::app()->user->hasFlash('profile')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('profile'); ?>
</div>

<?php else: ?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model)); ?>
    
    <fieldset name="basic_details">
    <a name="basic_info"></a>
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
	</div>
	
    <div class="row">
      <?php echo $form->labelEx($model,'gender'); ?>
      <?php echo $form->dropDownList($model,'gender', array('male'=>'male','female'=>'female'),array('select'=>$model->gender)); ?>
      <?php echo $form->error($model,'gender'); ?>
   </div>
   </fieldset>
   
   <fieldset>
   <a name="email_info"></a>
   <legend><h4>Email Ids</h4></legend>
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
    <a name="phone_info"></a>
    <legend><h4>Phone Details</h4></legend>
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
    
    <fieldset >
    <a name="personal_info"></a>
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
    <a name="company_info"></a>
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
    
    <div class="displayeditOthercompany <?php 
	if( $model4_2->getNotnull($model4_2))  echo 'show'; 
	else echo 'hide';
	?> 
    
    " >
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

    
    <div onclick="displayeditOthercompany();" class="add_button remove_button">Add Other comany</div>
    
    </fieldset>
    
    <fieldset>
    <a name="social_info"></a>
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
    <a name="attended_info"></a>
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
		<?php echo $form->textField($val,'['.$key.']year',array('class'=>'date_field')); ?>
	</div>
    </div>
    <?php } ?>
    <div onclick="displayOther_attend()" class="add_button remove_button_attend">Other Attended</div>
    </fieldset>
    
    <fieldset>
    <a name="contacted_info"></a>
    <legend><h4>Contacted</h4></legend>
        
        <?php foreach($model8 as $key=>$val){ ?>
        <div  class="<?php 
		if(count($model8)-$key<4 ){
			echo 'hide';	
		}?>" id="<?php
		if(count($model8)-$key==3 )
		echo 'first_contacted';
		else if(count($model8)-$key==2)
		echo 'second_contacted';
		else if(count($model8)-$key==1)
		echo 'third_contacted';
		?>">
        <div class="row">
            <?php echo $form->labelEx($val,'['.$key.']contacted_for'); ?>
            <?php echo $form->dropDownList($val,'['.$key.']contacted_for',CHtml::listData(Program_item::model()->findAll(), 'id', 'item')); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($val,'['.$key.']status'); ?>
            <?php echo $form->dropDownList($val,'['.$key.']status',array('contacted'=>'Contacted','couldnt_reach'=>'Couldn\'t Reach','dontcall'=>'Dont call')); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($val,'['.$key.']other_status'); ?>
            <?php echo $form->dropDownList($val,'['.$key.']other_status',array(''=>'None','Not avialable'=>'Not Avialable','Answering Machine'=>'Answering Machine','Invalid Number'=>'Invalid Number','Number Busy'=>
			'Number Busy','No response'=>'No response','Wrong number'=>'Wrong Number')); ?>
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
        
    
	    <div onclick="displayOther_contacted()" class="add_button remove_button_contacted">Other Contacted</div>    
    </fieldset>
    
    <fieldset>
    <a name="mailed_info"></a>
    <legend><h4>Mailed</h4></legend>
        
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
        
    
	    <div onclick="displayOther_mail()" class="add_button remove_button_mail">Other Mail</div>    
    </fieldset>

    
    
	<div class="row submit">
		<?php echo CHtml::submitButton('Submit',array('class'=>'submit_button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

</div>