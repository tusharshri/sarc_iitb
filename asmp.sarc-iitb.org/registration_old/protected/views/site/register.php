

<?php
echo "Saurav";
$this->pageTitle=Yii::app()->name . ' - Login';


$this->breadcrumbs=array(
	'Login',
);
?>
<h1>Create Alumnus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
