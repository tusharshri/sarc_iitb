<?php
$this->breadcrumbs=array(
	'Alumnus Phone Numbers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AlumnusPhoneNumber', 'url'=>array('index')),
	array('label'=>'Create AlumnusPhoneNumber', 'url'=>array('create')),
	array('label'=>'Update AlumnusPhoneNumber', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AlumnusPhoneNumber', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumnusPhoneNumber', 'url'=>array('admin')),
);
?>

<h1>View AlumnusPhoneNumber #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alumnusId',
		'phoneNumber',
		'type',
		'comment',
		'status',
		'updatedAt',
	),
)); ?>
