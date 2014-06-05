<?php
$this->breadcrumbs=array(
	'Alumnus Phone Numbers',
);

$this->menu=array(
	array('label'=>'Create AlumnusPhoneNumber', 'url'=>array('create')),
	array('label'=>'Manage AlumnusPhoneNumber', 'url'=>array('admin')),
);
?>

<h1>Alumnus Phone Numbers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
