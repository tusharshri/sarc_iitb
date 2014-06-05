<?php
$this->breadcrumbs=array(
	'Phonathon Volunteers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PhonathonVolunteer', 'url'=>array('index')),
	array('label'=>'Manage PhonathonVolunteer', 'url'=>array('admin')),
);
?>

<h1>Create PhonathonVolunteer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>