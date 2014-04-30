<?php
$this->breadcrumbs=array(
	'Alumnus Prof Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnusProfDetail', 'url'=>array('index')),
	array('label'=>'Create AlumnusProfDetail', 'url'=>array('create')),
	array('label'=>'View AlumnusProfDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnusProfDetail', 'url'=>array('admin')),
);
?>

<h1>Update AlumnusProfDetail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>