<?php
$this->breadcrumbs=array(
	'Mentorship Phases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MentorshipPhase', 'url'=>array('index')),
	array('label'=>'Create MentorshipPhase', 'url'=>array('create')),
	array('label'=>'Update MentorshipPhase', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MentorshipPhase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MentorshipPhase', 'url'=>array('admin')),
);
?>

<h1>View MentorshipPhase #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'phaseYear',
		'phase',
		'year',
		'startedOn',
		'endedOn',
		'status',
		'createdAt',
	),
)); ?>
