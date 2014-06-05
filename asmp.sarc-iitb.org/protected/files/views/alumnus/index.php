<?php
$this->breadcrumbs=array(
	'Alumnuses',
);

$this->menu=array(
	array('label'=>'Create Alumnus', 'url'=>array('create')),
	array('label'=>'Manage Alumnus', 'url'=>array('admin')),
);
?>

<h1>Alumnuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
