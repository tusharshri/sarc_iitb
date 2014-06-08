<?php
  session_start();
  if (!(isset($_SESSION['user']))) header("Location: ../login.php");
  $role = $_SESSION['role'];
  $curdir = getcwd();
  $enable = $_SESSION['enable'];
  if (!($role == basename($curdir))){ header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));}
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
					<li><a title="" onClick="$('.notificationdiv').fadeIn(); return false;">Notifications</a></li>
                    <li><a href="../common/script1.php?keepThis=true&TB_iframe=true&height=700&width=1400" title="" class="thickbox">Script</a></li>
                    <li><a href="../common/area.php?keepThis=true&TB_iframe=true&height=700&width=1400" title="" class="thickbox">Area Code</a></li>
                    <li><a href="../common/faq.php?keepThis=true&TB_iframe=true&height=700&width=1400" title="" class="thickbox">FAQ's</a></li>
                    <li><a href="../common/contact.php?keepThis=true&TB_iframe=true&height=700&width=1400" title="" class="thickbox">Contacts</a></li>
                    
                </ul>
            </div>
		<div class="notificationdiv"><span class="closenotification" onClick="$('.notificationdiv').fadeOut();"><u>X</u></span><br/>
			<?php 
/*	$con = mysql_connect("admin.sarc-iitb.org","sarciitborg","j@g@njyoti"); */

       $con = mysql_connect("localhost","root","");
					$db = mysql_select_db("phonathon_20_1",$con);
					$query = mysql_query("SELECT * FROM notifications") or die(mysql_error());
					while($array = mysql_fetch_array($query)){
						echo "<span class='notificationtext'>".$array['content']."</span>";
					}
			?>
		
		</div>
      <div id="pmenu">
        <ul>
          <li><a onClick="selected(0); loadPage('pending.php')">Pending of the Day</a></li>
          <li class="selected"><a onClick="selected(1); loadPage('alumni.php')">Alumni Allotted</a></li>
          <li><a onClick="selected(2); loadPage('mydetails.php')">My Details</a></li>
          <li id="logout"><a class="logout" onClick="logout()">Logout</a></li>
        </ul>
      </div>
      <div id="bar">
        <div id="phonathon"></div>
      </div>
      <iframe name="content" id="content" />
    </div>
  </body>
</html>
