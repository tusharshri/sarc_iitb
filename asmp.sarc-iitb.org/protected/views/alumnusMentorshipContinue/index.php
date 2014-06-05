<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Continues',
);

$this->menu=array(
	array('label'=>'Create AlumnusMentorshipContinue', 'url'=>array('create')),
	array('label'=>'Manage AlumnusMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>Alumnus Mentorship Continues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
