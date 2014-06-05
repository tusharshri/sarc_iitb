<?php

?>

<h1>Create Student</h1>
    <div class="notification">
         <b>Instructions</b>
        <ul>
            <li>
              Please fill in the following details correctly. Giving incorrect or misleading information may lead to de-registration from ASMP.
            </li>

        </ul>
    </div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>