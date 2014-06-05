
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<h1>Thank You !</h1>
<!--
<p>Your given details will be sent to your preferred mentors for their preference of you on 23rd August after the student registrations are over.<br/>
We expect the mentor to reply within 5 days, if not, the ASMP Team will directly contact the alumni mentor.<br/>
You will be allotted any one of your selected mentor within 10 days of registration.<br/></p>-->

You have been successfully logged out.<br/>
Regards,  </br>
ASMP TEAM.
