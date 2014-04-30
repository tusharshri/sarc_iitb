<?php
$this->breadcrumbs=array(
	'Student Registration'=>array('/studentRegistration'),
	'Details',
);?>
<?php

?>
<h1>My Details</h1>
    <div class="notification">
         <b>Instructions</b>
        <ul>
            <li>
              Please fill in the following details correctly. Giving incorrect or misleading information may lead to de-registration from ASMP.
            </li>

        </ul>
    </div>


<?php echo $this->renderPartial('//student/_form', array('model'=>$model)); ?>
