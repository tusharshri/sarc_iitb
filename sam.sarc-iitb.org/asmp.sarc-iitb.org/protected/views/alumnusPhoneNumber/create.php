<?php
$this->breadcrumbs=array(
	'Alumnus Phone Numbers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlumnusPhoneNumber', 'url'=>array('index')),
	array('label'=>'Manage AlumnusPhoneNumber', 'url'=>array('admin')),
);
?>

<h1>Create AlumnusPhoneNumber</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>