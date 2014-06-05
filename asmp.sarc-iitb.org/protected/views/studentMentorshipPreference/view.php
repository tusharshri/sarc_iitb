<?php
$this->breadcrumbs=array(
	'Student Mentorship Preferences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudentMentorshipPreference', 'url'=>array('index')),
	array('label'=>'Create StudentMentorshipPreference', 'url'=>array('create')),
	array('label'=>'Update StudentMentorshipPreference', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudentMentorshipPreference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentMentorshipPreference', 'url'=>array('admin')),
);
?>

<h1>View StudentMentorshipPreference #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'studentId',
		'preferenceIndex',
		'preference',
		'preferredDepartmentCode',
		'areaOfInterest',
		'updatedAt',
	),
)); ?>
