<?php
/* @var $this LssdController */
/* @var $model Lssd */

$this->breadcrumbs=array(
	'Lssds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lssd', 'url'=>array('index')),
	array('label'=>'Manage Lssd', 'url'=>array('admin')),
);
?>

<h1>Create Lssd</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>