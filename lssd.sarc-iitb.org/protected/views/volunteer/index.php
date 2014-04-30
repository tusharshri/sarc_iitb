<?php
$this->pageTitle=Yii::app()->name . ' - Volunteer';
$this->breadcrumbs=array(
	'Volunteer',
);
?>

<div class="sub_nav">
<div style="float:left;" align="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/search_user.png" width="50px"/></div><div style="float:left; font-size:20px; font-weight:bold; padding-top:10px;">Volunteer</div>
<ul class="no_style_ul" style="float:right;">
<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit_profile.png" width="50px"/><br /><span>Edit user</span></li>
<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/add_user.png" width="50px"/><br /><span>Add user</span></li>
</ul>
</div>


<form method="get">
<input type="search" placeholder="search" name="q" value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ; ?>" />
<input type="submit" value="search" />
</form>

<div id="volunteer_all">

<?php

$this->widget('application.extensions.NPager.NGridView', array(
    'dataProvider' => $dataProvider,
));


?>

</div>