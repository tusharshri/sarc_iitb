<?php
$this->breadcrumbs=array(
	'Alumnus Email Ids',
);

$this->menu=array(
	array('label'=>'Create AlumnusEmailId', 'url'=>array('create')),
	array('label'=>'Manage AlumnusEmailId', 'url'=>array('admin')),
);
?>

<h1>Alumnus Email Ids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
