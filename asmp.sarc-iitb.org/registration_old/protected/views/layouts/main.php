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

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div id="header">
        <div class="container">
            <div id="social">
                        <ul>
                            <li><a href="http://www.facebook.com/pages/Student-Alumni-Relations-Cell-SARC/238851456155573" target="_blank"><img src="http://sarc-iitb.org/images/blue/facebook_blue.png"></a></li>
                            <li><a href="http://www.twitter.com/sarc_iitb" target="_blank"><img src="http://sarc-iitb.org/images/blue/twitter_blue.png"></a></li>
                            <li><a href="http://www.linkedin.com/groups?mostPopular=&gid=3177153" target="_blank"><img src="http://sarc-iitb.org/images/blue/linkedin_blue.png"></a></li>
                            <li><a href="http://www.youtube.com/user/SARCIITB" target="_blank"><img src="http://sarc-iitb.org/images/blue/youtube.png"></a></li>
                            </ul>
                        </div>

		<div id="logo"><a style="border:0px solid black;" href="http://www.sarc-iitb.org"><img style="border:0px solid black;" src="http://sarc-iitb.org/images/deco_logo.png"></a></div>
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
