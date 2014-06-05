<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Upload Documents</h1>

<?php echo $this->renderPartial('_sop', array('model'=>$model)); ?>