<p>Commencement of the Student Registrations has been shifted to <b>8PM, 21st January, 2012</b>. We are sorry for the inconvenience.

<p>Meanwhile you can check out the mentor's list for this phase <a href="http://www.sarc-iitb.org/mentorship/student/mentorlist">http://www.sarc-iitb.org/mentorship/student/mentorlist</a>

  <p>For more details about ASMP, visit <a href="http://sarc-iitb.org/mentorship">http://sarc-iitb.org/mentorship</a>

<?php
die;
// change the following paths if necessary
$yii=dirname(__FILE__).'/../../../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
// defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
