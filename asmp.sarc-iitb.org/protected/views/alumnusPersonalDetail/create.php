<?php
$this->breadcrumbs=array(
	'Alumnus Personal Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlumnusPersonalDetail', 'url'=>array('index')),
	array('label'=>'Manage AlumnusPersonalDetail', 'url'=>array('admin')),
);
?>

<h1>Create AlumnusPersonalDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>