<?php
/* @var $this LssdController */
/* @var $model Lssd */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lssd-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

Hello Alumnus,<br/>
Please click on the <b><i>pen</i></b> icon corresponding to any alumnus' name to update his/her information.<br/>
We thank you for helping us in making the Institute-Alumni Relations better.<br/><br/>

<p>
A search feature is provided for your ease. You can search for people against any field<br/>

</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lssd-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'firstname',
		/*
		'middlename',
		'lastname',
		'email',
		'phone',
		*/
		'class',
		'department',
		'hostel',
		
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
