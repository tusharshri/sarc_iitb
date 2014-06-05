<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Continues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnusMentorshipContinue', 'url'=>array('index')),
	array('label'=>'Create AlumnusMentorshipContinue', 'url'=>array('create')),
	array('label'=>'View AlumnusMentorshipContinue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnusMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>Update AlumnusMentorshipContinue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>