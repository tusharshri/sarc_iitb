<?php
$this->breadcrumbs=array(
	'Alumnuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alumnus', 'url'=>array('index')),
	array('label'=>'Create Alumnus', 'url'=>array('create')),
	array('label'=>'Update Alumnus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alumnus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alumnus', 'url'=>array('admin')),
);
?>

<h1>View Alumnus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'profileId',
		'salutation',
		'firstName',
		'middleName',
		'lastName',
		'nickName',
		'gender',
		'class',
		'degree',
		'departmentCode',
		'hostel',
		'dateOfBirth',
		'skypeId',
		'website',
		'linkedin',
		'workProfile',
		'status',
		'createdAt',
		'updatedAt',
	),
)); ?>
