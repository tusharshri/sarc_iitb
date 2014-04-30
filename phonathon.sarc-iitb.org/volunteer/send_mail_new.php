<?php


session_start();
  if (! isset($_SESSION['user'])) header ("Location: ../login.php");
  $role = $_SESSION['role'];
  $curdir = getcwd();
  if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
  $user = $_SESSION['user'];

  $PID = $_SESSION['PID'];
  require_once ("../dbconnection.php");
    $volunteer_id=$_SESSION['user'];
  $DBConn = new Connection();
    // print_r($PID);
    $email = $DBConn->get_array("SELECT * FROM alumnus_email WHERE PID = ?", array($PID));
  $key = $DBConn->get_array("SELECT `key` FROM alumnus_visitedlinks WHERE PID = ?",array($PID));
  $key = $key[0]['key'];
    $email=$email[0];
    if($email['email']=="" || empty($email['email']) || $email['email']==NULL){
        die("E-mail Id not available");
    }
     $to=$email['email'];
     //$to="anuraganand.10@gmail.com";
//echo "xyz";
    if(isset($_POST['elm1'])){
    $from="phonathon@sarc-iitb.org";
    $subject="Student Alumni Relations Cell (SARC), IIT Bombay";
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= "Reply-To: sarc@iitb.ac.in\r\n";
    $headers .= 'Cc: sarciitb@gmail.com,' . "\r\n";
	$headers .= 'Bcc: sarciitb@gmail.com,' . "\r\n";


    $message= $_POST['elm1'];

    $mail_sent= mail($to, $subject, $message, $headers);

        if($mail_sent){
             $query="UPDATE calllog SET mailed='1' WHERE PID='$PID'";
            if(!mysql_query($query)){
                echo "Please contact Web Administrator. There is a problem in updating the database";
            }

        echo "Mail Successfully Sent to ".$to."<br><a href='http://phonathon.sarc-iitb.org/admin/alumni.php'>Click here</a> to go back";
                    }else{
        echo "Mail sending failed.";
            }
    }

else{
    $alum = $DBConn->get_array("SELECT * FROM calllog WHERE PID = ?", array($PID));
    $alum = $alum[0];
    if($alum['mailed']=="1"){
        die("Mail already Sent.<br><a href='http://phonathon.sarc-iitb.org/admin/alumni.php'>Click here</a> to go back");
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
<form name="mail" method="post" action="send_mail.php">
<div>       <span style="font-size:16px">To, <?php echo $to; ?></span> <br>
      <textarea id="elm1" name="elm1" rows="30" cols="80" style="width: 80%">
               Dear <?php echo $basic_detail['firstname']." ".$basic_detail['lastname'].","; ?>
<?php
                if($contacted=="1"){

                ?>
                <p&gt;
          Thank you for your time, it was a pleasure talking to you. I had called you on behalf of Student Alumni Relations Cell (SARC), as a part of the ongoing March Phonathon.

        </p&gt;
		<p&gt;
          Thank you for showing your interest in the Silver jubilee Reunions to be held on the last weekend of December this year. We will soon be updating you with the progress regarding the same. 
        </p&gt;
		<p&gt;
          We will also be having our Alumni Day on December 28th at the time of the SJRU reunions. Do try to join in, and if not, and also, spread the word among your friends. But in case you are not able to join us, you can see the pics and videos later on our website later on.
        </p&gt;
		<p&gt;
          If you are interested in providing internships/projects or placement opportunities at your company/university, just reply to this mail. We will put you in touch with our placement cell regarding the same.
        </p&gt;
			
			<p&gt;
		Also, remember to keep your personal details complete and up to date in the Alumni Directory. You can do so on -  
		<a href="http://www.iitbombay.org/online-community/alumni-directory"&gt; http://www.iitbombay.org/online-community/alumni-directory </a&gt;
		
		or write to directory@iitbombay.org You can be a part of IITB online community. Visit <a href="http://www.iitbombay.org/online-community"&gt; http://www.iitbombay.org/online-community </a&gt;

		
		</p&gt;
		
        
                    <?php
          
        $agenda_one=false;
    $agendalist=''; /*
   for($i=0; $i<count($agendas); $i++){
        
   
        if($agendas[$i]['agenda_id']==4){//mock interview
                    ?>
<p&gt;
	If you have pledged and haven’t made the donations as per Give One initiative, or you wish to donate sometime soon then here is the link for your reference  <a href="http://iitbombay.org/giving-back/give-one"&gt; http://iitbombay.org/giving-back/give-one </a&gt;. </p&gt;


                    <?php
                } 
        else if($agendas[$i]['agenda_id']==3){
          ?>

           <p&gt; You can also be a mentor and guide current students of IITB in choosing future career options on a one to one basis in person or via email/skype. For more information about Alumni Student Mentorship Program(ASMP) and to register as a mentor,visit   <a href='http://www.sarc-iitb.org/mentorship.php' &gt; http://www.sarc-iitb.org/mentorship.php</a&gt;. The next phase starts in July 2013.</p&gt;
        <?php 
          }
      else if($agendas[$i]['agenda_id']==2){
          ?>
            <p&gt;If you are interested in becoming an interviewer for Mock Interviews wherein you get to interview current passing out junta of the institute, please fill this form up. <a href="http://goo.gl/ulp4p" &gt; http://goo.gl/ulp4p </a&gt; For more information on Mock interviews visit <a href="http://sam.sarc-iitb.org/events.php?q=mock-interviews" &gt; http://sam.sarc-iitb.org/events.php?q=mock-interviews </a&gt; </p&gt;         
          <?php 
      }
      else if($agendas[$i]['agenda_id']==1){
          ?>
          <p&gt; In case there is any information of yours that you would like to update in the alumni directory please visit
 <a href="http://www.iitbombay.org/online-community/alumni-directory" &gt; http://www.iitbombay.org/online-community/alumni-directory </a&gt; .</p&gt;
          <?php 
      } 
          ?>
          
                
<?php
   }*/
?>

<p&gt;You can be a part of IITB social networks on<br/> <a href="http://www.linkedin.com/groupInvitation?gid=3269&sharedKey=761B600FE619" &gt; Linkedin </a&gt; , <a href="https://www.facebook.com/groups/iitmumbai/" &gt; Facebook </a&gt; , <a href="https://twitter.com/iitbombay " &gt; Twitter </a&gt; , <a href="http://www.youtube.com/iitbombay" &gt; Youtube  </a&gt; 

</p&gt;

<p&gt;Hope you liked talking to us as much as we did talking to you.</p&gt;

<?php  

}
                else if(!empty($reach) && $reach!="" && $reach!=NULL){
                    ?>
 
<p&gt;
          Greetings from Student Alumni Relations Cell (SARC), IIT Bombay. We hope you are doing well and everything is fine on your side.


        </p&gt;
		<p&gt;
          We had called you on behalf of The Student Alumni Relations Cell (SARC), IIT Bombay as a part of the ongoing March Phonathon, but were unable to reach you. Hereby I am mentioning the links to our initiatives for your reference.



        </p&gt;
		<p&gt;
          This year your batch will behaving the Silver jubilee Reunions to be held on the last weekend of December this year. We will soon be updating you with the progress regarding the same. 


        </p&gt;
		<p&gt;
          We will also be having our Alumni Day on December 28th at the time of the SJRU reunions. Do try to join in, and if not, and also, spread the word among your friends. But in case you are not able to join us, you can see the pics and videos later on our website later on.


        </p&gt;
		<p&gt;
		If you are interested in providing internships/projects or placement opportunities at your company/university, just reply to this mail. We will put you in touch with our placement cell regarding the same.
		</p&gt;
		
		<!-- insert here -->
		<p&gt;
		Also, remember to keep your personal details complete and up to date in the Alumni Directory. You can do so on -  
		<a href="http://www.iitbombay.org/online-community/alumni-directory"&gt; http://www.iitbombay.org/online-community/alumni-directory </a&gt;
		
		or write to directory@iitbombay.org You can be a part of IITB online community. Visit <a href="http://www.iitbombay.org/online-community"&gt; http://www.iitbombay.org/online-community </a&gt;

		
		</p&gt;





<p&gt;You can be a part of IITB social networks on <br/> <a href="http://www.linkedin.com/groupInvitation?gid=3269&sharedKey=761B600FE619" &gt; Linkedin </a&gt; , <a href="https://www.facebook.com/groups/iitmumbai/" &gt; Facebook </a&gt; , <a href="https://twitter.com/iitbombay " &gt; Twitter </a&gt; , <a href="http://www.youtube.com/iitbombay" &gt; Youtube  </a&gt; 

</p&gt;

<p&gt;Thank you for your precious time and efforts.
</p&gt;



                        <?php
            

                }
        ?>
                
Regards,
</p&gt;
                <p&gt;
                <?php
                echo $volunteer['name'];
    ?>
    <br&gt;Student Volunteer<br&gt;
Student Alumni Relations Cell(SARC)<br&gt;(http://www.sarc-iitb.org/)<br&gt;
IIT Bombay
                 <hr&gt;
                 <span style="font-size=10px; color:#555"&gt;Please note that this mail is sent from Phonathon@sarc-iitb.org. Please make sure you are not sending any mails on this email as we donot receive replies to this email.  You can alternatively mail us at sarc@iitb.ac.in
      </textarea>
        <input type="submit" value="Send Mail">


      </div>
    </form>
    <?php
    }
?>
