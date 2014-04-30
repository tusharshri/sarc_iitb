<?php
$this->breadcrumbs=array(
  'Student Registration'=>array('/studentRegistration'),
  'Sop',
);?>

<h1>Statement of Purpose</h1>

    <div class="notification">
         <b>Instructions</b>
        <ul>
            <li>
                This Statement Of Purpose(SOP) will be visible to the mentors. He may use it as a selection criteria. Thus your allotment depends hugely on your SOP. Please fill it carefully.
            </li>

            <li>
                Uploading your Resume is optional and doing so will not have any particular effect whatsoever on the allotment process.
            </li>
            <li>
                In the SOP you should mention your career interests, expectations out of this program and your mentor.
            </li>
            <li>
                You can modify your SOP at anytime before the registration closes.
            </li>
        </ul>
    </div>

<div class="form">

<style type="text/css">
    #sop_form textarea{
        height:150px;
    }

</style>
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'sop_form',
  'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

  <p class="note">Fields with <span class="required">*</span> are required.</p>

  <?php echo $form->errorSummary(array($mRegistration,$mResume)); ?>
    
  <div class="row">
    <?php echo $form->labelEx($mRegistration,'sop'); ?>
    <?php echo $form->textArea($mRegistration,'sop', array('cols'=>65 , 'rows'=>45)); ?>
    <?php echo $form->error($mRegistration,'sop'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($mResume,'resume'); ?><!--<span style="color:red">*</span>-->
    <?php echo $form->fileField($mResume,'resume'); ?>
    <?php echo $form->error($mResume,'resume'); ?>
  </div>



  <div class="row buttons">
    <?php echo CHtml::submitButton($mRegistration->isNewRecord ? 'Upload' : 'Update'); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
