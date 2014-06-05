
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php if(isset($studentId)){ ?>
    <h1>Thank You !</h1>
    <?php
        $mRegistration=StudentRegistration::model()->findByAttributes(array('studentId'=>$studentId,'phaseYear'=>'02_2012'));
        if($mRegistration->step==6){
    ?>
    <p>Your preferences has been saved. <br/>
    You shall be allotted a alumni mentor within a week from the end of registrations.<br/>
    <?php
        }else{
    ?>
    <p>You have not yet completed your registration. Please come back before 29<sup>st</sup> Jan 11:59 p.m. to complete your registration.<br/>
    <?php        
        }
    ?>
    Regards,  </br>
    ASMP TEAM.
<?php } else {
    $this->redirect(array("StudentRegistration/login"));
}
?>
