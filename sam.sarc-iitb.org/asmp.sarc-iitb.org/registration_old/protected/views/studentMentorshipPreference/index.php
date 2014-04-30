<?php
$this->breadcrumbs=array(
	'Student Mentorship Preferences',
);

$this->menu=array(
	array('label'=>'Create StudentMentorshipPreference', 'url'=>array('create')),
	array('label'=>'Manage StudentMentorshipPreference', 'url'=>array('admin')),
);
?>

<h1>Student Mentorship Preferences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
