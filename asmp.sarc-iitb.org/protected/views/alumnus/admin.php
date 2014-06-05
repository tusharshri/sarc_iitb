<?php
$this->breadcrumbs=array(
	'Alumnuses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Alumnus', 'url'=>array('index')),
	array('label'=>'Create Alumnus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('alumnus-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Alumnuses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alumnus-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'profileId',
		'salutation',
		'firstName',
		'middleName',
		'lastName',
		/*
		'nickName',
		'gender',
		'class',
		'degree',
		'departmentCode',
		'hostel',
		'dateOfBirth',
		'skypeId',
		'website',
		'linkedin',
		'workProfile',
		'status',
		'createdAt',
		'updatedAt',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
