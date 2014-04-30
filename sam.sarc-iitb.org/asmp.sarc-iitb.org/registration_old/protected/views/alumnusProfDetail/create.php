<?php
$this->breadcrumbs=array(
	'Alumnus Prof Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlumnusProfDetail', 'url'=>array('index')),
	array('label'=>'Manage AlumnusProfDetail', 'url'=>array('admin')),
);
?>

<h1>Create AlumnusProfDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>