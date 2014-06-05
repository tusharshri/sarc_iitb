<?php
$this->breadcrumbs=array(
	'Phonathon Volunteers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PhonathonVolunteer', 'url'=>array('index')),
	array('label'=>'Create PhonathonVolunteer', 'url'=>array('create')),
	array('label'=>'Update PhonathonVolunteer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PhonathonVolunteer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PhonathonVolunteer', 'url'=>array('admin')),
);
?>

<h1>View PhonathonVolunteer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'studentId',
		'freeSlot',
		'preferredDepartmentCode',
		'preferredHostel',
		'suggestion',
		'phonathon',
		'updatedAt',
	),
)); ?>
