<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Continues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlumnusMentorshipContinue', 'url'=>array('index')),
	array('label'=>'Manage AlumnusMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>Create AlumnusMentorshipContinue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>