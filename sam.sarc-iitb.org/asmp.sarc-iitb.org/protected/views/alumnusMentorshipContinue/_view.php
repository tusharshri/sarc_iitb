<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumnusId')); ?>:</b>
	<?php echo CHtml::encode($data->alumnusId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phaseYear')); ?>:</b>
	<?php echo CHtml::encode($data->phaseYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirmationCode')); ?>:</b>
	<?php echo CHtml::encode($data->confirmationCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirmed')); ?>:</b>
	<?php echo CHtml::encode($data->confirmed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suggestion')); ?>:</b>
	<?php echo CHtml::encode($data->suggestion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tos')); ?>:</b>
	<?php echo CHtml::encode($data->tos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdAt')); ?>:</b>
	<?php echo CHtml::encode($data->createdAt); ?>
	<br />

	*/ ?>

</div>