<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentId')); ?>:</b>
	<?php echo CHtml::encode($data->studentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferenceIndex')); ?>:</b>
	<?php echo CHtml::encode($data->preferenceIndex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preference')); ?>:</b>
	<?php echo CHtml::encode($data->preference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferredDepartmentCode')); ?>:</b>
	<?php echo CHtml::encode($data->preferredDepartmentCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('areaOfInterest')); ?>:</b>
	<?php echo CHtml::encode($data->areaOfInterest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->updatedAt); ?>
	<br />


</div>