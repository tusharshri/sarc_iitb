<?php
$this->breadcrumbs=array(
	'Mentorship Phases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MentorshipPhase', 'url'=>array('index')),
	array('label'=>'Manage MentorshipPhase', 'url'=>array('admin')),
);
?>

<h1>Create MentorshipPhase</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>