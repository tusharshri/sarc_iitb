<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rollNumber')); ?>:</b>
	<?php echo CHtml::encode($data->rollNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldapId')); ?>:</b>
	<?php echo CHtml::encode($data->ldapId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salutation')); ?>:</b>
	<?php echo CHtml::encode($data->salutation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstName')); ?>:</b>
	<?php echo CHtml::encode($data->firstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('middleName')); ?>:</b>
	<?php echo CHtml::encode($data->middleName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastName')); ?>:</b>
	<?php echo CHtml::encode($data->lastName); ?>
	<br />


	<?php echo CHtml::encode($data->getAttributeLabel('nickName')); ?>:</b>
	<?php echo CHtml::encode($data->nickName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('degree')); ?>:</b>
	<?php echo CHtml::encode($data->degree); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departmentCode')); ?>:</b>
	<?php echo CHtml::encode($data->departmentCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hostel')); ?>:</b>
	<?php echo CHtml::encode($data->hostel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roomNumber')); ?>:</b>
	<?php echo CHtml::encode($data->roomNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateOfBirth')); ?>:</b>
	<?php echo CHtml::encode($data->dateOfBirth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phoneNumber')); ?>:</b>
	<?php echo CHtml::encode($data->phoneNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emailId')); ?>:</b>
	<?php echo CHtml::encode($data->emailId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skypeId')); ?>:</b>
	<?php echo CHtml::encode($data->skypeId); ?>
	<br />

?>

</div>