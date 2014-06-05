<?php
$this->breadcrumbs=array(
	'Mentorship Phases',
);

$this->menu=array(
	array('label'=>'Create MentorshipPhase', 'url'=>array('create')),
	array('label'=>'Manage MentorshipPhase', 'url'=>array('admin')),
);
?>

<h1>Mentorship Phases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
