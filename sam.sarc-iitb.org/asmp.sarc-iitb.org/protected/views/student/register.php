<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Register',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Create Student</h1>

<?php echo $this->renderPartial('_form_asmp_register', array('model'=>$model)); ?>