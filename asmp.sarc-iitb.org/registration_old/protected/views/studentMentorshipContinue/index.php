<?php
$this->breadcrumbs=array(
	'Student Mentorship Continues',
);

$this->menu=array(
	array('label'=>'Create StudentMentorshipContinue', 'url'=>array('create')),
	array('label'=>'Manage StudentMentorshipContinue', 'url'=>array('admin')),
);
?>

<h1>Student Mentorship Continues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
