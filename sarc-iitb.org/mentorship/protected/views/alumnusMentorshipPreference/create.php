<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Preferences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlumnusMentorshipPreference', 'url'=>array('index')),
	array('label'=>'Manage AlumnusMentorshipPreference', 'url'=>array('admin')),
);
?>

<h1>Create AlumnusMentorshipPreference</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>