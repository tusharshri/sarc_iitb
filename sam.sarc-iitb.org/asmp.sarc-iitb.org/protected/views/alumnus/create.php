<?php
$this->breadcrumbs=array(
	'Alumnuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alumnus', 'url'=>array('index')),
	array('label'=>'Manage Alumnus', 'url'=>array('admin')),
);
?>

<h1>Create Alumnus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>