<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumnusId')); ?>:</b>
	<?php echo CHtml::encode($data->alumnusId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emailId')); ?>:</b>
	<?php echo CHtml::encode($data->emailId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirmation')); ?>:</b>
	<?php echo CHtml::encode($data->confirmation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->updatedAt); ?>
	<br />

	*/ ?>

</div>