<?php
$this->breadcrumbs=array(
	'Alumnus Prof Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AlumnusProfDetail', 'url'=>array('index')),
	array('label'=>'Create AlumnusProfDetail', 'url'=>array('create')),
	array('label'=>'Update AlumnusProfDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AlumnusProfDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumnusProfDetail', 'url'=>array('admin')),
);
?>

<h1>View AlumnusProfDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alumnusId',
		'designation',
		'company',
		'industryId',
		'address',
		'city',
		'state',
		'pincode',
		'countryId',
		'updatedAt',
	),
)); ?>
