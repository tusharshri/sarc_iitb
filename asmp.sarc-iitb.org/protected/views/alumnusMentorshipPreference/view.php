<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Preferences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AlumnusMentorshipPreference', 'url'=>array('index')),
	array('label'=>'Create AlumnusMentorshipPreference', 'url'=>array('create')),
	array('label'=>'Update AlumnusMentorshipPreference', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AlumnusMentorshipPreference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumnusMentorshipPreference', 'url'=>array('admin')),
);
?>

<h1>View AlumnusMentorshipPreference #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alumnusId',
		'preference',
		'numberOfMentees',
		'preferredDepartmentCode',
		'areaOfInterest',
		'updatedAt',
	),
)); ?>
