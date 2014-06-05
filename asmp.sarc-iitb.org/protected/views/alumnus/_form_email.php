
<div class="alumnusEmail">
	<?php echo $i."<br/>";?>
	<?php if(!(isset($email->id))){
			$email->id='new-'.$j; 
			$email->alumnusId=$alumnusId;	
	}
	?>
	<?php // Not needed if LabelEx
		if($i==1)
			$req=array('required'=>true);
		else
			$req=array();	
	?>
	<?php echo $form->hiddenField($email,'['.$email->id.']id'); ?>
	<?php echo $form->hiddenField($email,'['.$email->id.']alumnusId',array('size'=>60,'maxlength'=>64)); ?>
	
	<div class="row">
		<?php echo $form->labelEx($email,'['.$email->id.']emailId',$req); ?>
		<?php echo $form->textField($email,'['.$email->id.']emailId',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($email,'['.$email->id.']emailId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($email,'['.$email->id.']type'); ?>
        <?php echo $form->dropDownList($email,'['.$email->id.']type',$email->getEmailTypeOptions()); ?>
		<?php //echo $form->textField($email,'['.$email->id.']type',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($email,'['.$email->id.']type'); ?>
	</div>
</div>

