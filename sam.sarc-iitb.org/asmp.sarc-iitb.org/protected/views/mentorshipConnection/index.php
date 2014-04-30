<?php
$this->breadcrumbs=array(
	'Mentorship Connections',
);

$this->menu=array(
	array('label'=>'Create MentorshipConnection', 'url'=>array('create')),
	array('label'=>'Manage MentorshipConnection', 'url'=>array('admin')),
);
?>

<h1>Mentorship Connections</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
