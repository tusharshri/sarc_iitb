<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Preferences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnusMentorshipPreference', 'url'=>array('index')),
	array('label'=>'Create AlumnusMentorshipPreference', 'url'=>array('create')),
	array('label'=>'View AlumnusMentorshipPreference', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnusMentorshipPreference', 'url'=>array('admin')),
);
?>

<h1>Update AlumnusMentorshipPreference <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>