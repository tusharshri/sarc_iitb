<?php
$this->breadcrumbs=array(
	'Student Remarks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudentRemark', 'url'=>array('index')),
	array('label'=>'Create StudentRemark', 'url'=>array('create')),
	array('label'=>'Update StudentRemark', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudentRemark', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentRemark', 'url'=>array('admin')),
);
?>

<h1>View StudentRemark #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'studentId',
		'occasion',
		'remarks',
		'remarkedBy',
		'createdAt',
	),
)); ?>
