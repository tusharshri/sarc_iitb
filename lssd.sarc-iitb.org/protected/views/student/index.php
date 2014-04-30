<?php
$this->pageTitle=Yii::app()->name . ' - Student';
$this->breadcrumbs=array(
	'Student',
);
?>

<div class="sub_nav">
<div style="float:left;" align="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/search_user.png" width="50px"/></div><div style="float:left; font-size:20px; font-weight:bold; padding-top:10px;">Student Register for ASMP</div>
<ul class="no_style_ul" style="float:right;">
<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit_profile.png" width="50px"/><br /><span>Edit user</span></li>
<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/add_user.png" width="50px"/><br /><span>Add user</span></li>
</ul>
</div>
<form method="get" style="float:left;">
<input type="search" placeholder="search" name="q" value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ; ?>" />
<input type="submit" value="search" />
</form>



<div id="student_all">
<?php

$this->widget('application.extensions.NPager.NGridView', array(
    'dataProvider' => $dataProvider,
	'columns'=>array(
		'id','firstName','middleName','lastName','batch','degree','department','hostel','phoneNumber','emailId','skypeId',
	),
));
?>
</div>