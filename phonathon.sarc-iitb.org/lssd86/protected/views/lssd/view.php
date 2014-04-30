<?php
/* @var $this LssdController */
/* @var $model Lssd */



?>

<h1><?php echo $model->firstname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'firstname',
		//'middlename',
		//'lastname',
		'email',
		'phone',
		'class',
		'department',
		'hostel',
		
	),
)); ?>
<?php echo CHtml::button('Update', array('submit' => array('lssd/update', 'id'=>$model->id))); ?>
<?php echo CHtml::button('Browse All', array('submit' => array('lssd/admin'))); ?>