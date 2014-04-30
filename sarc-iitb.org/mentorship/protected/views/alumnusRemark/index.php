<?php
$this->breadcrumbs=array(
	'Alumnus Remarks',
);

$this->menu=array(
	array('label'=>'Create AlumnusRemark', 'url'=>array('create')),
	array('label'=>'Manage AlumnusRemark', 'url'=>array('admin')),
);
?>

<h1>Alumnus Remarks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
