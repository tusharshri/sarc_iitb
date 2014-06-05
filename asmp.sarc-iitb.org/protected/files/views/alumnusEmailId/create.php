<?php
$this->breadcrumbs=array(
	'Alumnus Email Ids'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlumnusEmailId', 'url'=>array('index')),
	array('label'=>'Manage AlumnusEmailId', 'url'=>array('admin')),
);
?>

<h1>Create AlumnusEmailId</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>