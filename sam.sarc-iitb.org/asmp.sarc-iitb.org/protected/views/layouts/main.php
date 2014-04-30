<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
    <link href="http://sarc-iitb.org/images/icon.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/step.css" />
        <link href="/css/styles.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" media="screen" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div id="header">
        <div class="container">
            <div id="social">
                        <ul>
                            <li><a href="http://www.facebook.com/pages/Alumni-Student-Mentorship-ProgramASMP-IIT-Bombay/128543253931051" target="_blank"><img src="http://sarc-iitb.org/images/blue/facebook_blue.png"></a></li>
                            <li><a href="http://www.twitter.com/sarc_iitb" target="_blank"><img src="http://sarc-iitb.org/images/blue/twitter_blue.png"></a></li>
                            <li><a href="http://www.linkedin.com/groups?mostPopular=&gid=3177153" target="_blank"><img src="http://sarc-iitb.org/images/blue/linkedin_blue.png"></a></li>
                            <li><a href="http://www.youtube.com/user/SARCIITB" target="_blank"><img src="http://sarc-iitb.org/images/blue/youtube.png"></a></li>
                        </ul>
            </div>
            <a style="border:0px solid black;" href="http://www.sarc-iitb.org"><img id="logo" style="border:0px solid black;" src="http://sarc-iitb.org/images/deco_logo.png"></a>
            <div id="menu">
                <ul id="maintab">
                    <?php if((controller()=='team')&&(action()=='allot')) echo "<li><a href='".Yii::app()->createUrl('team/allot',array('role'=>'alumnus'))."'>Alumni</a></li>"; //TODO:make createURL compatible with URL Manager ?>
                    <?php if((controller()=='team')&&(action()=='allot')) echo "<li><a href='".Yii::app()->createUrl('team/allot',array('role'=>'student'))."'>Student</a></li>"; //TODO:echo only if team member ?>
                    <li><?php if(Yii::app()->user->isGuest){ 
                            echo CHtml::link("Login",array("site/login")); 
                        } else if(controller()=='studentRegistration'){
                            echo CHtml::link("Logout",array("StudentRegistration/logout"));
                        } else {
                            echo CHtml::link("Logout",array("site/logout"));
                    }?></li>
                    <li><?php if(Yii::app()->user->isGuest){ 
                        } else if(controller()=='studentRegistration'){
                        } else {
                            echo CHtml::link("Send Message",array("sendmessage"));
						}?></li> 
                    <li><?php if(Yii::app()->user->isGuest){ 
                        } else if(controller()=='studentRegistration'){
                        } else if(Yii::app()->user->role=='student'){
                            echo CHtml::link("Contact Details",array("student/mentor"));
						}?></li>
                    <li><?php if(Yii::app()->user->isGuest){ 
                        } else if(controller()=='studentRegistration'){
                        } else if(Yii::app()->user->role=='student'){
                            echo CHtml::link("Mentor Profile",array("student/mentorprofile"));
						}?></li>
                    <li><?php if(Yii::app()->user->isGuest){ 
                        } else if(controller()=='studentRegistration'){
                        } else if(Yii::app()->user->role=='student'){
                            echo CHtml::link("Home",array("student/home"));
						}?></li>                         
                    <!--<li><?php echo CHtml::link("Suggestions",array("feedback/")); ?> </li>-->
                    <li><?php if(Yii::app()->user->isGuest) { echo CHtml::link("Register",array(""));?>
                    	<ul style="margin-left:13px;">
                        <li><?php echo CHtml::link("Alumnus Register",array("alumnusregistration/index/"));  ?></li>
                        <li><?php echo CHtml::link("Student Register",array("studentregistration/index/"));  ?></li>
                        </ul>
                        <?php } ?>


 <li><?php if(Yii::app()->user->isGuest) { echo CHtml::link("Testimonials",array(""));?>
                    	<ul style="margin-left:13px;">
                        <li><?php echo CHtml::link("mentee",array("site/mentee/"));  ?></li>
                        <li><?php echo CHtml::link("mentor",array("site/mentor/"));  ?></li>
                        </ul>
                        <?php } ?>





                    </li>
                 
		    <li><a href="http://asmp.sarc-iitb.org/mentor@intern/">Mentor@intern</a> </li>
			<li><a href="http://asmp.sarc-iitb.org/Mentee-Brochure.pdf">Mentee Brochure</a> </li>
			<li><a href="http://asmp.sarc-iitb.org/Mentor-Brochure.pdf">Mentor Brochure</a> </li>
                    <li><?php echo CHtml::link("FAQ",array("site/faq/")); ?> </li>

                    <li><?php echo CHtml::link("Contact Us",array("site/contact/")); ?> </li>
                     <li><?php if(!Yii::app()->user->isGuest && Yii::app()->user->role=='alumnus') echo CHtml::link("Mentees Details",array("alumnus/mentees")); ?></li>
                    <li><?php if(!Yii::app()->user->isGuest && Yii::app()->user->role=='alumnus') echo CHtml::link("My Details",array("alumnus/viewAllDetails")); ?></li>
                    <li><?php if(!Yii::app()->user->isGuest && Yii::app()->user->role=='alumnus') echo CHtml::link("Profile",array("alumnus/profile")); ?></li>
                     <li><?php if(!Yii::app()->user->isGuest && Yii::app()->user->role=='alumnus') echo CHtml::link("Home",array("alumnus/home")); ?></li>
                </ul>
            </div>
            
        </div>
    </div>
<div class="container" id="page">

	<!-- header -->

	<?php echo $content; ?>


</div><!-- page -->
<div id="footerfoot">
        <div class="container">
            <div style="float:left; margin-top:0px;">
            Designed by Web Team, Student Alumni Relations Cell (SARC) 2011.
            </div>
            <div style="float:right;vertical-align:text-top; margin-top:-17px">
                Best Viewed in: <br>
                <img style="height:25px" src="http://sarc-iitb.org/images/browser.png" alt="Firefox, Chrome, Safari" title="Mozilla Firefox, Google Chrome, Safari">
            </div>
            </div>
        </div>

</body>
</html>
