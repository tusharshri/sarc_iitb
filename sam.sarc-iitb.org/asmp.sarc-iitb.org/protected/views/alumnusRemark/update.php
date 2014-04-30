<?php
$this->breadcrumbs=array(
	'Alumnus Remarks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnusRemark', 'url'=>array('index')),
	array('label'=>'Create AlumnusRemark', 'url'=>array('create')),
	array('label'=>'View AlumnusRemark', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnusRemark', 'url'=>array('admin')),
);
?>

<h1>Update AlumnusRemark <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>