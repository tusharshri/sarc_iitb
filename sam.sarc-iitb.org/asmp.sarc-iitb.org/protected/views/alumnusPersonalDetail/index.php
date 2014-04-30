<?php
$this->breadcrumbs=array(
	'Alumnus Personal Details',
);

$this->menu=array(
	array('label'=>'Create AlumnusPersonalDetail', 'url'=>array('create')),
	array('label'=>'Manage AlumnusPersonalDetail', 'url'=>array('admin')),
);
?>

<h1>Alumnus Personal Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
