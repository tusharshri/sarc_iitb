<?php
/* @var $this LssdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lssds',
);

$this->menu=array(
	array('label'=>'Create Lssd', 'url'=>array('create')),
	array('label'=>'Manage Lssd', 'url'=>array('admin')),
);
?>

<h1>Lssds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
