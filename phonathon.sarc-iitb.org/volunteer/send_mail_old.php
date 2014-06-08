<?php


session_start();
	if (! isset($_SESSION['user'])) header ("Location: ../login.php");
	$role = $_SESSION['role'];
	$curdir = getcwd();
	if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
	$user = $_SESSION['user'];

	$PID = $_SESSION['PID'];
	require_once ("../dbconnection.php");
    $volunteer_id=$_SESSION['user'];
	$DBConn = new Connection();
    // print_r($PID);
    $email = $DBConn->get_array("SELECT * FROM alumnus_email WHERE PID = ?", array($PID));
    $email=$email[0];
    if($email['email']=="" || empty($email['email']) || $email['email']==NULL){
        die("E-mail Id not available");
    }
     $to=$email['email'];
     //$to="anuraganand.10@gmail.com";
//echo "xyz";
    if(isset($_POST['elm1'])){
    $from="phonathon@sarc-iitb.org";
    $subject="Student Alumni Relations Cell (SARC)";
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= "Reply-To: sarc@iitb.ac.in\r\n";
    $headers .= 'Bcc: lssd.sarc@gmail.com,' . "\r\n";


    $message= $_POST['elm1'];

    $mail_sent= mail($to, $subject, $message, $headers);

        if($mail_sent){
             $query="UPDATE calllog SET mailed='1' WHERE PID='$PID'";
            if(!mysql_query($query)){
                echo "Please contact Web Administrator. There is a problem in updating the database";
            }

        echo "Mail Successfully Sent to ".$to."<br><a href='http://phonathon.sarc-iitb.org/admin/design.php'>Click here</a> to go back";
                    }
    }

else{
    $alum = $DBConn->get_array("SELECT * FROM calllog WHERE PID = ?", array($PID));
    $alum = $alum[0];
    if($alum['mailed']=="1"){
        die("Mail already Sent.<br><a href='http://phonathon.sarc-iitb.org/admin/design.php'>Click here</a> to go back");
    }
	$basic_detail = $DBConn->get_array("SELECT * FROM alumnus_basicdetail WHERE PID = ?", array($PID));

	$volunteer = $DBConn->get_array("SELECT * FROM volunteer WHERE volunteer_ID = ?", array($volunteer_id));
	if (count ($alum) == 0) header ("Location: alumni.php");

    $basic_detail=$basic_detail[0];

    $volunteer=$volunteer[0];
	$contacted = $alum['contacted'];
	$reach = $alum['couldntreach'];

    if($contacted==1){
        $agendas = $DBConn->get_array("SELECT * FROM alumnus_agendaconfirmation WHERE PID = ?", array($PID));
    }
?>
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],
        <?php
        


    ?>



		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<form name="mail" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<div>       <span style="font-size:16px">To, <?php echo $to; ?></span> <br>
			<textarea id="elm1" name="elm1" rows="30" cols="80" style="width: 80%">
               Dear <?php echo $basic_detail['firstname']." ".$basic_detail['lastname'].","; ?>
<?php
                if($contacted=="1"){
                ?>
                &lt;p&gt;
					It was a pleasure talking to you today. I called you on the behalf of IIT Bombay and Student Alumni Relations Cell (SARC) , a voluntary student organization working to build better student alumni relations.
				&lt;/p&gt;
                    <?php
        $agenda_one=false;
		for($i=0; $i<count($agendas); $i++){

                if($agendas[$i]['agenda_id']=="1" || $agendas[$i]['agenda_id']=="2"){
                    if($agenda_one==false){
                        
                    ?>
                    &lt;p&gt;We are glad that you agreed to be a part of the decennial celebrations of IITB Alumni Association on 20th August, 2011. Please visit http://sarc-iitb.org/alumni_navigation.php?pid=<?php echo $PID;?>&agenda=1 for further details and registration.
&lt;/p&gt;&lt;p&gt;
Also, if you would like to donate to IITB Alumni Association; please visit http://sarc-iitb.org/alumni_navigation.php?pid=<?php echo $PID;?>&agenda=2
&lt;/p&gt;
                    <?php
                    $agenda_one=true;

                }
                }
                if($agendas[$i]['agenda_id']==3){
                    ?>
                        &lt;p&gt;IIT Bombay invites you for the grand Silver Jubilee Reunion of your batch (1986). Come back to the place where you belonged once and relive those memories! For details and registrations; visit http://sarc-iitb.org/alumni_navigation.php?pid=<?php echo $PID;?>&agenda=3
&lt;/p&gt;
                    <?php
                }
                if($agendas[$i]['agenda_id']==4){
                    ?>
                       &lt;p&gt;We appreciate your efforts of giving back to your alma mater. We are glad to know that you are interested in mentoring. The details regarding the same are as follows:&lt;br&gt;
The students will learn from your experiences and your suggestions will help them to come to an informed decision at this very critical juncture which decides their career paths. For more details and registrations for Alumni Student Mentorship Program you can visit: http://sarc-iitb.org/alumni_navigation.php?pid=<?php echo $PID;?>&agenda=4  .
&lt;/p&gt;
                    <?php
                }
    }		

}
                else if(!empty($reach) && $reach!="" && $reach!=NULL){
                    ?>
                       &lt;p&gt;We, the volunteers at Student Alumni Relations Cell (SARC), IIT Bombay tried reaching  you but somehow we could not establish contact. SARC was launched with the vision of establishing and maintaining quality relations between students and Alumni. The call was a part of SARC’s initiative, Phonathon 13.
&lt;/p&gt;&lt;p&gt;
Alumni act as the greatest strength for any institute. Several valuable lessons can be drawn from the experiences of alumni, who are essentially the crucial pillars of strength of any institute.
&lt;/p&gt;&lt;p&gt;
Since you could not be reached, we would be glad if you could fill up your details for updating our database: https://spreadsheets.google.com/viewform?formkey=dG11MlotZEZJZ1RBQ1MwVnd1R1pzemc6MQ. We assure you that the details shall be kept confidential.
&lt;/p&gt;&lt;p&gt;
IIT Bombay Alumni Association is celebrating its 10 years on 20th August, 2011. On this special occasion, IITB AA is organizing a grand gathering of eminent IITB alumni, esteemed faculties, current students and your fellow alumni friends on 20th August. On behalf of the association, we take pleasure inviting you to join us in our celebrations at your favourite campus of IIT Bombay. Please visit http://sarc-iitb.org/alumni_navigation.php?pid=<?php echo $PID;?>&agenda=1 for further details and registration.
&lt;/p&gt;&lt;p&gt;Also, if you would like to donate to IITB Alumni Association; please visit http://sarc-iitb.org/alumni_navigation.php?pid=<?php echo $PID;?>&agenda=2
SARC has started Alumni Student Mentorship Program where the students will learn from your experiences and your suggestions will help them to come to an informed decision at this very critical juncture which decides their career paths. We would be glad if you could contribute to this initiative by becoming a mentor. For more details and registrations for Alumni Student Mentorship Program you can visit: http://sarc-iitb.org/mentorship-registration/mentor/  .
&lt;/p&gt;&lt;p&gt;
IIT Bombay invites you for the grand Silver Jubilee Reunion of your batch (1986). Come back to the place where you belonged once and relive those memories! For details and registrations; visit http://sarc-iitb.org/alumni_navigation.php?pid=<?php echo $PID;?>&agenda=3
&lt;/p&gt;
                        <?php

                }
                ?>
                &lt;p&gt;
                If you plan to visit the campus anytime in future do inform us at http://sarc-iitb.org/inform.php
Please feel free to contact us by replying to this mail. &lt;br&gt;
Thank You for your precious time.&lt;br&gt
Regards,
&lt;/p&gt;
                &lt;p&gt;
                <?php
                echo $volunteer['name'];
    ?>
    &lt;br&gt;Student Volunteer&lt;br&gt;
Student Alumni Relations Cell(SARC)&lt;br&gt;(http://www.sarc-iitb.org/)
                 &lt;hr&gt;
                 &lt;span style="font-size=10px; color:#555"&gt;Please note that this mail is sent from Phonathon@sarc-iitb.org. Please make sure you are not sending any mails on this email as we donot receive replies to this email.  You can alternatively mail us at sarc@iitb.ac.in
			</textarea>
        <input type="submit" value="Send Mail">


			</div>
    </form>
    <?php
    }
?>