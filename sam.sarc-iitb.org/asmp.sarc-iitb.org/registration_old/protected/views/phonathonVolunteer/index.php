<?php
$this->breadcrumbs=array(
	'Phonathon Volunteers',
);

$this->menu=array(
	array('label'=>'Create PhonathonVolunteer', 'url'=>array('create')),
	array('label'=>'Manage PhonathonVolunteer', 'url'=>array('admin')),
);
?>

<h1>Phonathon Volunteers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
