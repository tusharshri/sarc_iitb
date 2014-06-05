<?php
$this->breadcrumbs=array(
	'Alumnuses'=>array('index'),
	$mAlumnus->id=>array('view','id'=>$mAlumnus->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List Alumnus', 'url'=>array('index')),
	array('label'=>'Create Alumnus', 'url'=>array('create')),
	array('label'=>'View Alumnus', 'url'=>array('view', 'id'=>$mAlumnus->id)),
	array('label'=>'Manage Alumnus', 'url'=>array('admin')),
);
*/
?>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<h1>Update Alumnus <?php echo $mAlumnus->id; ?></h1>

<?php echo $this->renderPartial('_form_register', array(
		'mAlumnus'=>$mAlumnus,
		'mEmailId'=>$mEmailId,

)); ?>
