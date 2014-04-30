<?php
$this->breadcrumbs=array(
	'Mentorship Connections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MentorshipConnection', 'url'=>array('index')),
	array('label'=>'Manage MentorshipConnection', 'url'=>array('admin')),
);
?>

<h1>Create MentorshipConnection</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>