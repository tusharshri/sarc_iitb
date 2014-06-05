<?php
$this->breadcrumbs=array(
	'Alumnus Prof Details',
);

$this->menu=array(
	array('label'=>'Create AlumnusProfDetail', 'url'=>array('create')),
	array('label'=>'Manage AlumnusProfDetail', 'url'=>array('admin')),
);
?>

<h1>Alumnus Prof Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
