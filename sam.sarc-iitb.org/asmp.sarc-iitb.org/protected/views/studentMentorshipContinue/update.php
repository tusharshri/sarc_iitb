<?php
$this->breadcrumbs=array(
	'Student Mentorship Continues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentMentorshipContinue', 'url'=>array('index')),
	array('label'=>'Create StudentMentorshipContinue', 'url'=>array('create')),
	array('label'=>'View StudentMentorshipContinue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>Update StudentMentorshipContinue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>