<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumnusId')); ?>:</b>
	<?php echo CHtml::encode($data->alumnusId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pincode')); ?>:</b>
	<?php echo CHtml::encode($data->pincode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryId')); ?>:</b>
	<?php echo CHtml::encode($data->countryId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->updatedAt); ?>
	<br />

	*/ ?>

</div>