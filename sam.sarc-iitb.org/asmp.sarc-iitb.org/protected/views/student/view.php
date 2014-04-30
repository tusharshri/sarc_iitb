<?php
$id=Yii::app()->User->id;
?>
<style type="text/css">
    .button{
        background-color:#000A1B;
        height:18px;
        color:#FFF;
        font-weight:bold;
        padding:8px 10px;
        width:55px;
        text-align:center;
        -webkit-border-radius:3px; -moz-border-radius:3px;

        float:left;
        margin:5px;
    }
    .button a{
        color:#fff;
        text-decoration:none;
    }
</style>
<h1>Your Details</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rollNumber',
		'ldapId',
		'salutation',
		'firstName',
		'middleName',
		'lastName',
		'nickName',
		'gender',
		'degree',
		'departmentCode',
		'hostel',
		'roomNumber',
		'dateOfBirth',
		'phoneNumber',
		'emailId',
		'skypeId',

	),
)); ?>

<div class="button"><a href="../update/<?php echo $id; ?>">Change</a></div>
    <div class="button"><a href="../sam">Continue</a></div>
