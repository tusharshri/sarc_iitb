<?php
$this->pageTitle=Yii::app()->name . ' - Details';
$this->breadcrumbs=array(
	'Alumnus'=>array('data/index'),
	'Details'=>array('data/details/','id'=>$model->id),
	'Phonathon history'
);

?>

<div class="sub_nav">
<div style="float:left;" align="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/phone_book.png" width="50px"/></div><div style="float:left; font-size:20px; font-weight:bold; padding-top:10px;">Call Detail</div>
</div>

<label class="size250" style="font-weight:bold;">Alumnus Name</label>
<?php echo $model->firstName.' '.$model->lastName; ?>

<fieldset class="border_visible">
<legend class="bold_green">Call details</legend>
<ul class="no_style_ul">
<li><label class="size250">Time</label><?php echo $contacted->talk_time; ?></li>
<li><label class="size250">Remarks</label><?php echo $contacted->response; ?></li>
</ul>
</fieldset>

<fieldset class="border_visible">
<legend class="bold_green">Call log</legend>
<ul class="no_style_ul">
<li><label class="size250">Status</label><?php echo $contacted->status ?></li>
<?php if($contacted->status=='couldnt_reach'){ ?><li><label class="size250">Other Status</label><?php echo $contacted->other_status ?></li><?php } ?>
<li><label class="size250">Mailed</label><?php if($mailed!=NULL) echo 'Yes'; else echo 'No'; ?></li>
<?php if($mailed!=NULL) { ?><li><label class="size250">Got reply</label><?php if($mailed->reponse!='') echo $mailed->response; else echo 'No'; ?></li> <?php } ?>
</ul>
</fieldset>


<fieldset class="border_visible">
<legend class="bold_green">Agenda Confirmation</legend>
<ul class="no_style_ul">
<?php foreach($agenda as $val){ ?>
<li><label class="size250">Confirmed for</label><?php 
echo Agenda_item::model()->findByAttributes(array('id' => $val->agendaId))->item;  ?></li>
<?php } ?>

</ul>
</fieldset>

