<?php
$this->breadcrumbs=array(
	'Student Remarks',
);

$this->menu=array(
	array('label'=>'Create StudentRemark', 'url'=>array('create')),
	array('label'=>'Manage StudentRemark', 'url'=>array('admin')),
);
?>

<h1>Student Remarks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
