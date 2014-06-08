<?php
  session_start();
  error_reporting (E_ALL ^ E_NOTICE);
  if (!(isset($_SESSION['user']))) header("Location: ../login.php");
  $role = $_SESSION['role'];
  $curdir = getcwd();
    $enable = $_SESSION['enable'];
    if ($enable != 1) {
    header("Location:locked.php");
  }
    else {
    if ($role == basename($curdir)) header ("Location: ../$role/" . basename ($_SERVER["SCRIPT_NAME"]));
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
                    <li><a href="../common/script.html?keepThis=true&TB_iframe=true&height=600&width=900" title="" class="thickbox">Script</a></li>
                    <li><a href="../common/timezone.php?keepThis=true&TB_iframe=true&height=400&width=900" onClick="" title="" class="thickbox" >Time Zone</a></li>
                    <li><a >Add. Info</a></li>
                    <li><a >Contacts</a></li>
                </ul>
            </div>
			
	<!--notification div to be placed here-->
			<div class="notificationdiv"><span class="closenotification" onClick="$('.notificationdiv').fadeOut();"><u>X</u></span><br/>
			<?php 	
        /* $con = mysql_connect("admin.sarc-iitb.org","sarciitborg","j@g@njyoti"); */
          $con = mysql_connect("localhost","root","");
					$db = mysql_select_db("phonathon_19",$con);
					$query = mysql_query("SELECT * FROM notifications") or die(mysql_error());
					while($array = mysql_fetch_array($query)){
						echo "<span class='notificationtext'>".$array['content']."</span>";
					}
			?>
		
			</div>
	<!--/notification div to be placed here-->
			
      <div id="pmenu">
        <ul class="pmenu">
          <li class="selected"><a onClick="selected(0); loadPage('pending.php')">Pending of the Day</a></li>
          <li><a onClick="selected(1); loadPage('alumni.php')">Alumni Allotted</a></li>
          <li><a onClick="selected(2); loadPage('volunteers.php')">Volunteers</a></li>
          <li><a onClick="selected(3); loadPage('mydetails.php')">My Details</a></li>
          <li onMouseOver="showList(this)" onMouseOut="hideList(this)">   
            <a>
              Administer
              <ul class="smenu">
                <li><a onClick="selected(4); loadPage('allotment.php')">Allot</a></li>
                <li><a onClick="selected(4); loadPage('allotsim.php')">Allot Sim card</a></li>
                <li><a onClick="selected(4); loadPage('createvolunteer.php')">Create Volunteer</a></li>
                <li><a onClick="selected(4); loadPage('allalumni.php')">All Alumni</a></li>
                <li><a onClick="selected(4); loadPage('search.php')">Search</a></li>
                <li><a onClick="selected(4); loadPage('statistics.php')">Statistics</a></li>
              </ul>
            </a>
          </li>
          <li><a onClick="selected(5); loadPage('leaderboard.php')">Leaderboard</a></li>
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
<?php
  }
?>
