<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phaseYear')); ?>:</b>
	<?php echo CHtml::encode($data->phaseYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phase')); ?>:</b>
	<?php echo CHtml::encode($data->phase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startedOn')); ?>:</b>
	<?php echo CHtml::encode($data->startedOn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endedOn')); ?>:</b>
	<?php echo CHtml::encode($data->endedOn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createdAt')); ?>:</b>
	<?php echo CHtml::encode($data->createdAt); ?>
	<br />

	*/ ?>

</div>