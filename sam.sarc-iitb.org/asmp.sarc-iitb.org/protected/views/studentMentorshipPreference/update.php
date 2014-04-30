<?php
$this->breadcrumbs=array(
	'Student Mentorship Preferences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentMentorshipPreference', 'url'=>array('index')),
	array('label'=>'Create StudentMentorshipPreference', 'url'=>array('create')),
	array('label'=>'View StudentMentorshipPreference', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentMentorshipPreference', 'url'=>array('admin')),
);
?>

<h1>Update StudentMentorshipPreference <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>