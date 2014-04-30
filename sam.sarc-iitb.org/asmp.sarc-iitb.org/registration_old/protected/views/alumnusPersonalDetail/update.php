<?php
$this->breadcrumbs=array(
	'Alumnus Personal Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnusPersonalDetail', 'url'=>array('index')),
	array('label'=>'Create AlumnusPersonalDetail', 'url'=>array('create')),
	array('label'=>'View AlumnusPersonalDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnusPersonalDetail', 'url'=>array('admin')),
);
?>

<h1>Update AlumnusPersonalDetail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>