<?php
$this->breadcrumbs=array(
	'Alumnus Remarks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlumnusRemark', 'url'=>array('index')),
	array('label'=>'Manage AlumnusRemark', 'url'=>array('admin')),
);
?>

<h1>Create AlumnusRemark</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>