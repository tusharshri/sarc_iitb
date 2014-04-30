<?php
$this->breadcrumbs=array(
	'Alumnus Email Ids'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnusEmailId', 'url'=>array('index')),
	array('label'=>'Create AlumnusEmailId', 'url'=>array('create')),
	array('label'=>'View AlumnusEmailId', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnusEmailId', 'url'=>array('admin')),
);
?>

<h1>Update AlumnusEmailId <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>