
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
    <p>Please login at http://asmp.sarc-iitb.org/login.php to see whether you have successfully registered or not. <br/>
    <?php        
        }
    ?>
    Regards,  </br>
    ASMP TEAM.
<?php } else {
    $this->redirect(array("StudentRegistration/login"));
}
?>
