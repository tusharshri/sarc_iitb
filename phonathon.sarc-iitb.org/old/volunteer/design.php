<?php
	session_start();
	if (!(isset($_SESSION['user']))) header("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	$enable = $_SESSION['enable'];
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
?>
<html>
	<head>
		<link rel="stylesheet" href="css/main.css" type="text/css" />
        <link rel="stylesheet" href="../jscripts/thickbox/thickbox.css" type="text/css" media="screen" />
		<script language="javascript" type="text/javascript" src="js/addonload.js"></script>
		<script language="javascript" type="text/javascript" src="js/main.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
        <script language="javascript" type="text/javascript" src="../jscripts/thickbox/thickbox.js"></script>
	</head>
	<body id="body">
		<div id="header">
            <div id="tmenu">
                <ul class="tmenu">
                    <li><a href="../common/script.html?keepThis=true&TB_iframe=true&height=400&width=900"" title="" class="thickbox">Script</a></li>
                    <li><a >Time Zone</a></li>
                    <li><a >Add. Info</a></li>
                    <li><a >Contacts</a></li>
                </ul>
            </div>
			<div id="pmenu">
				<ul>
					<li class="selected"><a onclick="selected(0); loadPage('pending.php')">Pending of the Day</a></li>
					<li><a onclick="selected(1); loadPage('alumni.php')">Alumni Allotted</a></li>
					<li><a onclick="selected(2); loadPage('mydetails.php')">My Details</a></li>
					<li id="logout"><a class="logout" onclick="logout()">Logout</a></li>
				</ul>
			</div>
			<div id="bar">
				<div id="phonathon"></div>
			</div>
			<iframe name="content" id="content" />
		</div>
	</body>
</html>
