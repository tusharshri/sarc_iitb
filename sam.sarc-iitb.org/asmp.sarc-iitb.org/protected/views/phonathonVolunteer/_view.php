<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentId')); ?>:</b>
	<?php echo CHtml::encode($data->studentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('freeSlot')); ?>:</b>
	<?php echo CHtml::encode($data->freeSlot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferredDepartmentCode')); ?>:</b>
	<?php echo CHtml::encode($data->preferredDepartmentCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferredHostel')); ?>:</b>
	<?php echo CHtml::encode($data->preferredHostel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suggestion')); ?>:</b>
	<?php echo CHtml::encode($data->suggestion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phonathon')); ?>:</b>
	<?php echo CHtml::encode($data->phonathon); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->updatedAt); ?>
	<br />

	*/ ?>

</div>