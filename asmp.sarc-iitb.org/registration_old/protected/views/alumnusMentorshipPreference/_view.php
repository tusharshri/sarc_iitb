<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumnusId')); ?>:</b>
	<?php echo CHtml::encode($data->alumnusId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preference')); ?>:</b>
	<?php echo CHtml::encode($data->preference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numberOfMentees')); ?>:</b>
	<?php echo CHtml::encode($data->numberOfMentees); ?>
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