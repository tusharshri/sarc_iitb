<?php
$this->breadcrumbs=array(
	'Student Mentorship Continues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentMentorshipContinue', 'url'=>array('index')),
	array('label'=>'Manage StudentMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>Create StudentMentorshipContinue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>