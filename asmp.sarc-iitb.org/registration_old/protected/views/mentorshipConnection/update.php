<?php
$this->breadcrumbs=array(
	'Mentorship Connections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MentorshipConnection', 'url'=>array('index')),
	array('label'=>'Create MentorshipConnection', 'url'=>array('create')),
	array('label'=>'View MentorshipConnection', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MentorshipConnection', 'url'=>array('admin')),
);
?>

<h1>Update MentorshipConnection <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>