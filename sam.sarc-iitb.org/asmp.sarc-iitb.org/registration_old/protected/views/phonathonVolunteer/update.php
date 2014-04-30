<?php
$this->breadcrumbs=array(
	'Phonathon Volunteers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PhonathonVolunteer', 'url'=>array('index')),
	array('label'=>'Create PhonathonVolunteer', 'url'=>array('create')),
	array('label'=>'View PhonathonVolunteer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PhonathonVolunteer', 'url'=>array('admin')),
);
?>

<h1>Update PhonathonVolunteer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>