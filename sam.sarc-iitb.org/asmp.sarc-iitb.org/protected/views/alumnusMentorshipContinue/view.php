<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Continues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AlumnusMentorshipContinue', 'url'=>array('index')),
	array('label'=>'Create AlumnusMentorshipContinue', 'url'=>array('create')),
	array('label'=>'Update AlumnusMentorshipContinue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AlumnusMentorshipContinue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumnusMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>View AlumnusMentorshipContinue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alumnusId',
		'phaseYear',
		'confirmationCode',
		'confirmed',
		'suggestion',
		'tos',
		'status',
		'createdAt',
	),
)); ?>
