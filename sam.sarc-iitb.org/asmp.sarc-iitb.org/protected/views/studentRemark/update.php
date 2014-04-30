<?php
$this->breadcrumbs=array(
	'Student Remarks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentRemark', 'url'=>array('index')),
	array('label'=>'Create StudentRemark', 'url'=>array('create')),
	array('label'=>'View StudentRemark', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentRemark', 'url'=>array('admin')),
);
?>

<h1>Update StudentRemark <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>