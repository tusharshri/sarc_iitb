<?php
$this->breadcrumbs=array(
	'Alumnus Mentorship Preferences',
);

$this->menu=array(
	array('label'=>'Create AlumnusMentorshipPreference', 'url'=>array('create')),
	array('label'=>'Manage AlumnusMentorshipPreference', 'url'=>array('admin')),
);
?>

<h1>Alumnus Mentorship Preferences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
