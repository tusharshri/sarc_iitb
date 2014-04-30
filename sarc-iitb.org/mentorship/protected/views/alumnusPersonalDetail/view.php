<?php
$this->breadcrumbs=array(
	'Alumnus Personal Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AlumnusPersonalDetail', 'url'=>array('index')),
	array('label'=>'Create AlumnusPersonalDetail', 'url'=>array('create')),
	array('label'=>'Update AlumnusPersonalDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AlumnusPersonalDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumnusPersonalDetail', 'url'=>array('admin')),
);
?>

<h1>View AlumnusPersonalDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alumnusId',
		'address',
		'city',
		'state',
		'pincode',
		'countryId',
		'updatedAt',
	),
)); ?>
