<?php
$this->breadcrumbs=array(
	'Alumnuses'=>array('index'),
	'Register',
);

$this->menu=array(
	array('label'=>'List Alumnus', 'url'=>array('index')),
	array('label'=>'Manage Alumnus', 'url'=>array('admin')),
);
?>

<h1>Mentor Registration</h1>

<?php echo $this->renderPartial('_form_register', array(
		'mAlumnus'=>$mAlumnus,
		'mEmailId'=>$mEmailId,

)); ?>
