<?php
$this->breadcrumbs=array(
	'Mentorship Phases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MentorshipPhase', 'url'=>array('index')),
	array('label'=>'Create MentorshipPhase', 'url'=>array('create')),
	array('label'=>'View MentorshipPhase', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MentorshipPhase', 'url'=>array('admin')),
);
?>

<h1>Update MentorshipPhase <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>