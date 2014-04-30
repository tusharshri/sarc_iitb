<?php
$this->breadcrumbs=array(
	'Alumnus Email Ids'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AlumnusEmailId', 'url'=>array('index')),
	array('label'=>'Create AlumnusEmailId', 'url'=>array('create')),
	array('label'=>'Update AlumnusEmailId', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AlumnusEmailId', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumnusEmailId', 'url'=>array('admin')),
);
?>

<h1>View AlumnusEmailId #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alumnusId',
		'emailId',
		'type',
		'comment',
		'status',
		'confirmation',
		'updatedAt',
	),
)); ?>
