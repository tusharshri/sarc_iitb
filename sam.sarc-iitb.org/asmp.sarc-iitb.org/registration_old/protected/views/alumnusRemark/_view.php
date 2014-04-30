<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumnusId')); ?>:</b>
	<?php echo CHtml::encode($data->alumnusId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occasion')); ?>:</b>
	<?php echo CHtml::encode($data->occasion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarkedBy')); ?>:</b>
	<?php echo CHtml::encode($data->remarkedBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdAt')); ?>:</b>
	<?php echo CHtml::encode($data->createdAt); ?>
	<br />


</div>