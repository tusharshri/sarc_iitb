<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/login.js'); ?>
<style>
.hint#student{
    display:none;
}

</style>
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <?php //echo $model->errors; ?>

    <div class="row" id="role">
       <!-- <span class="required">*</span>-->
        <?php if($model->role=="") $model->role='alumnus';?>
        <?php echo $form->radioButtonList(
                                $model,
                                'role',
                                array('alumnus'=>'Alumnus','student'=>'Student'),
                                array('separator'=>'&nbsp;',
                                    'class'=>'role',
                                    'labelOptions'=>array('style'=>'display:inline'))
        ); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'username',array('required'=>false)); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username',array(),false,false); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password',array(),false,false); ?>
		<p class="hint" id="student">
			Hint: Use LDAP Authentication.
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
