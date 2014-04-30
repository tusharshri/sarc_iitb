<?php
$this->breadcrumbs=array(
	'Student Mentorship Continues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudentMentorshipContinue', 'url'=>array('index')),
	array('label'=>'Create StudentMentorshipContinue', 'url'=>array('create')),
	array('label'=>'Update StudentMentorshipContinue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudentMentorshipContinue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>View StudentMentorshipContinue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'studentId',
		'phaseYear',
		'confirmationCode',
		'confirmed',
		'about',
		'sop',
		'suggestion',
		'tos',
		'status',
		'createdAt',
	),
)); ?>
