<?php
$this->breadcrumbs=array(
	'Student Remarks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentRemark', 'url'=>array('index')),
	array('label'=>'Manage StudentRemark', 'url'=>array('admin')),
);
?>

<h1>Create StudentRemark</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>