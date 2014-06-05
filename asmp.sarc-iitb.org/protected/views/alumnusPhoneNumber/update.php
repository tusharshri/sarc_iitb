<?php
$this->breadcrumbs=array(
	'Alumnus Phone Numbers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnusPhoneNumber', 'url'=>array('index')),
	array('label'=>'Create AlumnusPhoneNumber', 'url'=>array('create')),
	array('label'=>'View AlumnusPhoneNumber', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnusPhoneNumber', 'url'=>array('admin')),
);
?>

<h1>Update AlumnusPhoneNumber <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>